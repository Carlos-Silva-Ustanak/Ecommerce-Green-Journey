<?php

namespace App\Livewire\Auth;

use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Esqueceu a Senha')]
class ForgotPasswordPage extends Component
{
    public $email;

    public function save(){
        $this->validate([
            'email' => 'required|email|exists:users,email|max:255'
        ]);

        $status = Password::sendResetLink(['email' => $this->email]);

        if($status == Password::RESET_LINK_SENT){
            session()->flash('success', 'O link para redefinir a senha foi enviado para o seu e-mail');
            $this->email = '';
        } else {
            session()->flash('error', 'Falha ao enviar o link para redefinir a senha. Verifique o e-mail fornecido.');
        }
    }

    public function render()
    {
        return view('livewire.auth.forgot-password-page');
    }
}
