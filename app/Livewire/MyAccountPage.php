<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MyAccountPage extends Component
{
    public $name;
    public $email;
    public $current_password;
    public $new_password;
    public $new_password_confirmation;

    public function mount()
    {
        $user = Auth::user();
        $this->name = $user->name;
        $this->email = $user->email;
    }

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'current_password' => 'nullable|string|min:8',
        'new_password' => 'nullable|string|min:8|confirmed',
    ];

    public function updateProfile()
    {
        // Validate all fields
        $validatedData = $this->validate();
    
        $user = Auth::user();
        $user->name = $this->name;
        $user->email = $this->email;
    
        // Check if current password is provided and validate it
        if (!empty($this->current_password)) {
            // Verify the current password
            if (!Hash::check($this->current_password, $user->password)) {
                // If current password is incorrect, throw an error
                $this->addError('current_password', 'Senha atual está incorreta.');
                return;
            }
    
            // Check if the new password and confirmation match
            if ($this->new_password !== $this->new_password_confirmation) {
                $this->addError('new_password', 'Senha de confirmação diferente.');
                return;
            }
    
            // Update the password
            $user->password = Hash::make($this->new_password);
    
            // Clear password fields after successful update
            $this->current_password = '';
            $this->new_password = '';
            $this->new_password_confirmation = '';
        }
    
        // Save the user with updated details
        $user->save();
    
        // Flash success message
        session()->flash('message', 'Perfil atualizado com sucesso!.');
    }
    

    public function render()
    {
        return view('livewire.my-account-page');
    }
}
