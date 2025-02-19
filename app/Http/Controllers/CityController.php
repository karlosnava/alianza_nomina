<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\City;

class CityController extends Controller
{
    public function create(Country $country) {
        return view('cities.create', compact('country'));
    }
    
    public function edit(Country $country, City $city) {
        return view('cities.edit', compact('country', 'city'));
    }
    
    public function update(Request $request, Country $country, City $city) {
        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:50']
        ]);

        if (City::where('name', 'like', "%{$request->name}%")->where('country_id', $country->id)->where('id', '<>', $city->id)->exists()) {
            return redirect()->route('countries.show', $country)->withError('Ya existe una ciudad con ese nombre.');
        }

        $city->update($request->only('name'));
        return redirect()->route('countries.show', $country)->withSuccess('Ciudad actualizada correctamente.');
    }
    
    public function store(Request $request, Country $country) {
        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:50']
        ]);

        if (City::where('name', 'like', "%{$request->name}%")->where('country_id', $country->id)->exists()) {
            return redirect()->route('countries.show', $country)->withError('Ya existe una ciudad con ese nombre.');
        }

        City::create([
            'name'       => $request->name,
            'country_id' => $country->id
        ]);

        return redirect()->route('countries.show', $country)->withSuccess('Ciudad creada correctamente.');
    }

    public function destroy(Request $request, Country $country, City $city) {
        if ($city->users->count() > 0) {
            return redirect()->back()->withError('No puedes eliminar una ciudad si hay empleados en ella.');
        }
        
        $city->delete();
        return redirect()->route('countries.show', $country)->withSuccess('Ciudad eliminada correctamente.');
    }
}
