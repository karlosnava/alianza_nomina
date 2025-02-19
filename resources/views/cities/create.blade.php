@extends('templates.app')

@section('title', "Agregar ciudad a " . $country->name)

@section('content')
    <a href="{{ route('countries.show', $country) }}" class="text-xs text-blue-500 hover:text-blue-600"><i class="fas fa-arrow-left"></i> Regresar</a>
    <h1 class="font-bold text-2xl mb-5 mt-3">Agregar ciudad a {{ $country->name }}</h1>

    <form action="{{ route('cities.store', $country) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="text-gray-700 font-semibold">Ciudad:</label>
            <input type="text" name="name" id="name" class="w-full border rounded-md px-4 py-2" placeholder="Ej. Bogotá D.C" required autofocus>
            @error('name')
                <div class="text-xs text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div class="text-right">
            <button type="submit" class="bg-green-500 text-white font-semibold rounded-md px-5 py-2 hover:bg-green-600"><i class="fas fa-plus"></i> Agregar</button>
        </div>
    </form>
@endsection
