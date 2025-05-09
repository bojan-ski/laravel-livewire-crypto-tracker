<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Portfolio;

#[Title('Register')]
class Register extends Component
{
    // form validation and variables
    #[Validate('required|string|email|max:64|unique:users')]
    public $email;
    #[Validate('required|string|min:6|confirmed')]
    public $password;
    #[Validate('required|string|min:6')]
    public $password_confirmation;

    // register new user func
    public function register(): void
    {
        // validate new user form data
        $this->validate();

        try {
            // create new user account
            $newUser = User::create([
                'email' => $this->email,
                'password' => Hash::make($this->password)
            ]);

            // login user
            Auth::login($newUser);

            // create new user portfolios
            Portfolio::create([
                'user_id' => Auth::id()
            ]);

            // success msg
            session()->flash('status', 'Account created.');

            // redirect user
            $this->redirectIntended('/', navigate: true);
        } catch (\Exception $e) {
            // error msg
            session()->flash('status', 'There was an error creating the account.');

            // redirect user
            $this->redirectIntended('/', navigate: true);
        }
    }

    // render view
    public function render(): View
    {
        return view('livewire.register');
    }
}
