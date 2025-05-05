<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

#[Title('Login')]
class Login extends Component
{
    #[Validate('required|string|email|max:64')]
    public $email;
    #[Validate('required|string|min:6')]
    public $password;

    public function login(): void
    {
        // validate new user form data
        $this->validate();

        // login user
        $userCredentials = Auth::attempt([
            'email' => $this->email,
            'password' => $this->password
        ]);

        if ($userCredentials) {
            // session reset
            Session::regenerate();

            // success msg
            session()->flash('status', 'You have logged in.');

            // redirect user
            $this->redirectIntended('/', navigate: true);
        } else {
            // error msg
            session()->flash('status', 'There was an error logging in.');

            // redirect user
            $this->redirectIntended('/', navigate: true);
        }
    }

    // render view
    public function render()
    {
        return view('livewire.login');
    }
}
