<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

class LoginPage extends Component
{
    #[Title('Login')]

    public $email;
    public $password;

    public function save()
    {
        // Valida os dados da solicitação
        $this->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|min:8|max:255',
        ]);

        // Tenta autenticar o usuário
        if (!Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            // Define a mensagem de erro se a autenticação falhar
            session()->flash('error', 'Credenciais inválidas. Verifique seu e-mail e senha.');

            // Redireciona de volta para a página de login com os dados inseridos
            return redirect()->back()->withInput();
        }

        // Redireciona para a URL pretendida ou para uma URL padrão
        return redirect()->intended('/');
    }

    public function render()
    {
        return view('livewire.auth.login-page');
    }
}
