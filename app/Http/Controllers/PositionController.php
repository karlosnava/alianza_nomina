<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Position;

class PositionController extends Controller
{
    public function index() {
        $positions = Position::orderBy('name')->get();
        return view('positions.index', compact('positions'));
    }

    public function create() {
        return view('positions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'   => ['string', 'unique:positions'],
            'salary' => ['integer'],
        ]);

        Position::create($request->only(['name', 'salary']));
        return redirect()->route('positions.index')->withSuccess('Cargo creado correctamente.');
    }

    public function show(Position $position) {
        return view('positions.show', compact('position'));
    }

    public function edit(Position $position) {
        return view('positions.edit', compact('position'));
    }

    public function update(Request $request, Position $position)
    {
        $request->validate([
            'name'   => ['string', 'unique:positions,name,' . $position->id],
            'salary' => ['integer'],
        ]);

        $position->update($request->only(['name', 'salary']));
        return redirect()->route('positions.show', $position)->withSuccess('Puesto actualizado correctamente.');
    }

    public function destroy(Position $position) {
        if ($position->users->count() > 0) {
            return redirect()->back()->withError('No puedes eliminar el puesto si hay empleados en él.');
        }
        
        $position->delete();
        return redirect()->route('positions.index')->withSuccess('Puesto eliminado correctamente.');
    }
}
