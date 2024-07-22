<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class UserEdit extends Component
{
    use WithFileUploads;

    public $user_id;
    public $name;
    public $email;
    public $photo;
    public $photo_old;

    public function mount($user)
    {
        $this->user_id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->photo_old = $user->photo;

    }

    public function render()
    {
        return view('livewire.user-edit');
    }


    public function update()
    {
        $this->validate([
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users,email,' . $this->user_id,
            'photo' => 'nullable|image|max:2048',
        ]);

        $user = User::find($this->user_id);

        if ($this->photo) {
            $photoPath = $this->photo->store('photos', 'public');
            $user->photo = $photoPath;
        }

        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'photo' => $user->photo,
        ]);

        // User::where('id', $this->user_id)->update([
        //     'name' => $this->name,
        //     'email' => $this->email,
        //     'photo' => $photoPath,
        // ]);

        $this->name = NULL;
        $this->email = NULL;
        $this->photo = NULL;

        redirect()->route('users.home')->with('success', 'User Berhasil di Update');
    }
}
