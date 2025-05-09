<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class Logout extends Component
{
    // logout user func
    public function logout()
    {
        // logout user
        Auth::logout();

        // invalidate session
        session()->invalidate();

        // regenerate the csrf token
        session()->regenerateToken();

        // success msg
        session()->flash('status', 'You have logged out.');

        // redirect user
        $this->redirectIntended('/', navigate: true);
    }

    public function render(): View
    {
        return view('livewire.logout');
    }
}
