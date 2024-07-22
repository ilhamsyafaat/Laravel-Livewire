<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class UserCreate extends Component
{
    use WithFileUploads;
    
    public $name;
    public $email;
    public $password;
    public $photo;

    public function render()
    {
        return view('livewire.user-create');
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'photo' => 'nullable|image|max:2048',
        ]);

        $photoPath = $this->photo->store('photos', 'public');

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'photo' => $photoPath,
        ]);

        $this->name = NULL;
        $this->email = NULL;
        $this->password = NULL;
        $this->photo = NULL;
 
        Session()->flash('success', 'User Berhasil Dibuat');

        //event
        $this->dispatch('userStore');
    }
}
