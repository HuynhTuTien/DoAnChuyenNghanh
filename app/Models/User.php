<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'role',
        'slug',
        'active',
        'google_id',
        'facebook_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function hasRole($role)
    {
        return $this->role === $role;
    }

    public static function getLatestPaginated($perPage = 5)
    {
        return self::latest('id')->where('active', 'active')->paginate($perPage);
    }
    public static function getInactiveLatestPaginated($perPage = 5)
    {
        return self::latest('id')->where('active', 'inactive')->paginate($perPage);
    }

    public static function createUser($data)
    {

        $data['password'] = Hash::make($data['password']);
        $data['active'] = 'active';

        return self::create($data);
    }

    public function updateUser(array $data)
    {
        // Nếu không có mật khẩu mới, giữ lại mật khẩu cũ
        if (isset($data['password']) && $data['password']) {
            $data['password'] = Hash::make($data['password']);
        } else {
            $data['password'] = $this->password;
        }

        // Cập nhật người dùng
        return $this->update($data);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function notifications(): HasMany
    {
        return $this->hasMany(Notification::class);
    }

    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class);
    }

    public function currentCartItems()
    {
        // Giả định người dùng có một giỏ hàng hiện tại
        return $this->carts()->where('status', 'active')->first()->items();
    }


    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }
}
