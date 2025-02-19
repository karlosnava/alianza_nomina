@extends('templates.app')

@section('title', "Cargos")

@section('content')
    <a href="{{ route('positions.show', $position) }}" class="text-xs text-blue-500 hover:text-blue-600"><i class="fas fa-arrow-left"></i> Regresar</a>
    <h1 class="font-bold text-2xl mb-5 mt-3">Editar cargo - {{ $position->name }}</h1>

    <form action="{{ route('positions.update', $position) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="text-gray-700 font-semibold">Puesto:</label>
            <input type="text" name="name" id="name" value="{{ old('name', $position->name) }}" class="w-full border rounded-md px-4 py-2" placeholder="Ej. Asistente de desarrollo" required autofocus>
            @error('name')
                <div class="text-xs text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="salary" class="text-gray-700 font-semibold">Salario:</label>
            <input type="text" name="salary" id="salary" value="{{ old('salary', $position->salary) }}" class="w-full border rounded-md px-4 py-2" placeholder="(Sin coma ni puntos)" required>
            @error('salary')
                <div class="text-xs text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div class="text-right">
            <button type="submit" class="bg-blue-500 text-white font-semibold rounded-md px-5 py-2 hover:bg-blue-600"><i class="fas fa-sync"></i> Actualizar</button>
        </div>
    </form>
@endsection
