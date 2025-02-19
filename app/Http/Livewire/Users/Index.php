<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

use App\Models\User;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch() {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.users.index', [
            'users' => User::where(DB::raw("first_name || ' ' || middle_name || ' ' || first_surname || ' ' || second_surname"), 'like', "%{$this->search}%")
                ->orWhere('document', 'like', "%{$this->search}%")
                ->orderBy('first_name')->paginate(10),
        ]);
    }
}
