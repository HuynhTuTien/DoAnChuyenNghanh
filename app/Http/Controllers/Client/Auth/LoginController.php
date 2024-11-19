<?php

namespace App\Http\Controllers\Client\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;


class LoginController extends Controller
{
    //
    public function index()
    {
        return view('clients.login.index');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $findUser = User::where('google_id', $user->id)->first();

            if ($findUser) {
                Auth::login($findUser);
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => encrypt('12345678'),
                ]);

                Auth::login($newUser);
            }

            return redirect()->intended('/');
        } catch (\Exception $e) {
            // Ghi log lỗi chi tiết
            \Log::error('Lỗi khi đăng nhập Google: ' . $e->getMessage());
            return redirect()->route('login')->withErrors(['msg' => 'Có lỗi xảy ra trong quá trình đăng nhập.']);
        }
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        try {
            $facebookUser = Socialite::driver('facebook')->stateless()->user();

            $user = User::firstOrCreate(
                ['facebook_id' => $facebookUser->id],
                [
                    'name' => $facebookUser->name,
                    'email' => $facebookUser->email,
                    'password' => bcrypt('123456789'),
                ]
            );

            Auth::login($user);

            return redirect()->intended('/');
        } catch (\Exception $e) {
            \Log::error('Lỗi khi đăng nhập Facebook: ' . $e->getMessage());
            return redirect()->route('login')->withErrors(['msg' => 'Có lỗi xảy ra trong quá trình đăng nhập bằng Facebook.']);
        }
    }
}
