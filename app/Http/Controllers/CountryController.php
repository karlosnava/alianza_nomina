<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{
    public function index() {
        $countries = Country::orderBy('name')->get();
        return view('countries.index', compact('countries'));
    }

    public function create() {
        return view('countries.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => ['string', 'min:2', 'max:20'],
            'flag' => ['string', 'min:2', 'max:20', 'unique:countries'],
        ]);

        $country = Country::create($request->only(['name', 'flag']));
        return redirect()->route('countries.show', $country);
    }

    public function show(Country $country) {
        return view('countries.show', compact('country'));
    }

    public function edit(Country $country) {
        return view('countries.edit', compact('country'));
    }

    public function update(Request $request, Country $country)
    {
        $request->validate([
            'name' => ['string', 'min:2', 'max:20'],
            'flag' => ['string', 'min:2', 'max:20', 'unique:countries,flag,' . $country->id],
        ]);

        $country->update($request->only(['name', 'flag']));
        return redirect()->route('countries.show', $country)->withSuccess('País actualizado correctamente.');
    }

    public function destroy(Country $country)
    {
        if ($country->users->count() > 0) {
            return redirect()->back()->withError('No puedes eliminar un país si hay empleados en él.');
        }

        foreach ($country->cities as $city) {
            $city->delete();
        }

        $country->delete();
        return redirect()->route('countries.index')->withSuccess('El país y sus ciudades fueron eliminados correctamente.');
    }
}
