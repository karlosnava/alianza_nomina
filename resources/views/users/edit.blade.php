@extends('templates.app')

@section('title', "Editar usuario")

@section('content')
    <a href="{{ route('users.show', $user) }}" class="text-xs text-blue-500 hover:text-blue-600"><i class="fas fa-arrow-left"></i> Regresar</a>
    <h1 class="font-bold text-2xl mb-5 mt-3">Editar usuario</h1>

    @livewire('users.edit', ['user' => $user])
@endsection
