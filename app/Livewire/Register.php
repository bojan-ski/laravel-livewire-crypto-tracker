<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

#[Title('Register')]
class Register extends Component
{
    #[Validate('required|string|email|max:64|unique:users')]
    public $email;
    #[Validate('required|string|min:6|confirmed')]
    public $password;
    #[Validate('required|string|min:6')]
    public $password_confirmation;

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

            // success msg
            session()->flash('status', 'Account created.');

            // redirect user
            $this->redirectIntended('/', navigate: true);
        } catch (\Exception $e) {
            dd($e);
            // error msg
            session()->flash('status', 'There was an error creating the account.');
        }
    }

    // render view
    public function render()
    {
        return view('livewire.register');
    }
}
