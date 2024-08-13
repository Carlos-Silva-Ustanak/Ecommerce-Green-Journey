<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class RegisterPage extends Component
{
    #[Title('Cadastro')]

    public $name;
    public $email;
    public $password;

    public function save()
    {
        // Valida os dados da solicitação
        $this->validate([
            'name' => 'required|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);
    
        // Cria o usuário
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);
    
        // Faz o login do usuário
        Auth::login($user);
    
        // Redireciona para a URL pretendida ou para uma URL padrão
        return redirect()->intended('/'); // Ajuste a URL padrão conforme necessário
    }
    
    public function render()
    {
        return view('livewire.auth.register-page');
    }
}
