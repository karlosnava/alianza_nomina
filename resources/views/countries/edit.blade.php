@extends('templates.app')

@section('title', "Editar país " . $country->name)

@section('content')
    <a href="{{ route('countries.show', $country) }}" class="text-xs text-blue-500 hover:text-blue-600"><i class="fas fa-arrow-left"></i> Regresar</a>
    <h1 class="font-bold text-2xl mb-5 mt-3">Editar país - {{ $country->name }}</h1>
    <p class="text-xs text-gray-600 mb-5"><i class="fas fa-triangle-exclamation text-orange-500"></i> El parámetro "Bandera" debe ser compatible con <a href="https://flagsapi.com/" class="text-cyan-500" target="_blank">flagsapi.com</a></p>

    <form action="{{ route('countries.update', $country) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="text-gray-700 font-semibold">País:</label>
            <input type="text" name="name" id="name" value="{{ old('name', $country->name) }}" class="w-full border rounded-md px-4 py-2" placeholder="Ej. Asistente de desarrollo" required autofocus>
            @error('name')
                <div class="text-xs text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="flag" class="text-gray-700 font-semibold">Bandera:</label>
            <input type="text" name="flag" id="flag" value="{{ old('flag', $country->flag) }}" class="w-full border rounded-md px-4 py-2" placeholder="(Sin coma ni puntos)" required>
            @error('flag')
                <div class="text-xs text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div class="text-right">
            <button type="submit" class="bg-orange-500 text-white font-semibold rounded-md px-5 py-2 hover:bg-orange-600"><i class="fas fa-sync"></i> Actualizar</button>
        </div>
    </form>
@endsection
