<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DocumentType;
use App\Models\User;

class UserController extends Controller
{
    public function index() {
        return view('users.index');
    }

    public function create() {
        return view('users.create');
    }

    public function show(User $user) {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function destroy(User $user)
    {
        $user->positions()->detach();
        $user->delete();
        return redirect()->route('users.index')->withSuccess('Empleado eliminado correctamente.');
    }
}
