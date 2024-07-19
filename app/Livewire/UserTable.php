<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    protected $queryString = ['search'];

    //trigger event listener
    protected $listeners = ['userStore' => 'render'];

    public function render()
    {
        return view('livewire.user-table', [
            // 'users' => User::orderBy('id', 'desc')->paginate(3)
            'users' => User::where('name', 'like', '%'.$this->search.'%')->paginate(3),
        ]);
    }

    //lifecycle updating
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        Session()->flash('success', 'User Berhasil Dihapus');
    }
}
