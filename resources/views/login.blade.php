@extends('templates.app')

@section('title', 'Iniciar sesión')

@section('content')
    <div class="bg-blue-100 rounded-md p-8">
        <form action="{{ route('login.attempt') }}" method="POST" autocomplete="off">
            @csrf
            <div class="mb-3">
                <label for="email" class="text-gray-700 font-semibold">Correo:</label>
                <input type="email" name="email" id="email" class="w-full rounded-md px-4 py-2" value="carlosjoser717@gmail.com" placeholder="carlosjoser717@gmail.com">
                @error('email')
                    <div class="text-xs text-red-500">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="password" class="text-gray-700 font-semibold">Contraseña:</label>
                <input type="password" name="password" id="password" class="w-full rounded-md px-4 py-2" value="password" placeholder="password">
                @error('password')
                    <div class="text-xs text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="text-right">
                <button type="submit" class="bg-green-500 text-white font-semibold rounded-md px-5 py-2 hover:bg-green-600">Iniciar sesión</button>
            </div>
        </form>
    </div>
@endsection
