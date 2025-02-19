<?php

namespace App\Http\Livewire\Users;

use App\Models\Position;
use Livewire\Component;
use App\Models\User;

class Positions extends Component
{
    public $user, $user_positions = [], $position_id = 0, $total_pay;

    public function mount(User $user) {
        $this->user = $user;
    }
    
    public function add_position() {
        if ((INT) $this->position_id > 0) {
            $this->user->positions()->attach($this->position_id);
            $this->reset(['user_positions', 'position_id']);
            return $this->render();
        }
    }

    public function delete_position($position_id) {
        $this->user->positions()->detach($position_id);
        return $this->render();
    }
    
    public function render()
    {
        $userId = $this->user->id;
        $positions = Position::whereDoesntHave('users', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->orderBy('name')->get();
        $this->user_positions = $this->user->positions()->get();
        $this->total_pay = $this->user->positions()->sum('salary');

        return view('livewire.users.positions', compact('positions'));
    }
}
