<?php

namespace App\View\Components\client;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class header extends Component
{
    public $username;
    /**
     * Create a new component instance.
     */
    public function __construct($username = null)
    {
        $this->username = Auth::check() ? Auth::user()->name : null;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.client.header', ['username' => $this->username,]);
    }
}
