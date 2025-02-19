@extends('templates.app')

@section('title', "Cargos")

@section('content')
    <a href="{{ route('countries.index') }}" class="text-xs text-blue-500 hover:text-blue-600"><i class="fas fa-arrow-left"></i> Regresar</a>

    <h1 class="font-bold text-2xl mb-3">Nuevo país</h1>
    <p class="text-xs text-gray-600 mb-5"><i class="fas fa-triangle-exclamation text-orange-500"></i> El parámetro "Bandera" debe ser compatible con <a href="https://flagsapi.com/" class="text-cyan-500" target="_blank">flagsapi.com</a></p>

    <form action="{{ route('countries.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="text-gray-700 font-semibold">Nombre:</label>
            <input type="text" name="name" id="name" class="w-full border rounded-md px-4 py-2" placeholder="Ej. Colombia" required autofocus>
            @error('name')
                <div class="text-xs text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="flag" class="text-gray-700 font-semibold">Bandera:</label>
            <input type="text" name="flag" id="flag" class="w-full border rounded-md px-4 py-2" placeholder="Ej. CO" required>
            @error('flag')
                <div class="text-xs text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div class="text-right">
            <button type="submit" class="bg-orange-500 text-white font-semibold rounded-md px-5 py-2 hover:bg-orange-600"><i class="fas fa-plus"></i> Crear</button>
        </div>
    </form>
@endsection
