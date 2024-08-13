<?php

namespace App\Livewire\Auth;

use Illuminate\Auth\Events\PasswordReset;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Url;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\Cast\String_;
use Illuminate\Support\Facades\Password;

#[Title('Reset Password')]
class ResetPasswordPage extends Component
{
    public $token;
    #[Url]
    public $email;
    public $password;
    public $password_confirmation;


    public function mount($token){
        $this->token=$token;

    }

    public function save(){
        // Validate the request data
        $this->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $status  = Password::reset([
            'email' => $this->email,
            'password' => $this->password,
            'password_confirmation' => $this->password_confirmation,
            'token' => $this->token
        ],
     function ($user,string $password) {
        $password = $this->password;
        $user->forceFill([
            'password' => Hash::make($password)
        ])->setRememberToken(Str::random(60));   
        $user->save();
        event(new PasswordReset($user));
    });
    return $status === Password::PASSWORD_RESET?redirect('/login'):session()->flash('error', 'Something went wrong');
    }
    public function render()
    {
        return view('livewire.auth.reset-password-page');
    }
}
