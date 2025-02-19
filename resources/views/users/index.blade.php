@extends('templates.app')

@section('title', "Lista de usuarios")

@section('content')
    <h1 class="font-bold text-2xl mb-5"><i class="fas fa-users text-green-500"></i> Usuarios <a href="{{ route('users.create') }}" class="bg-green-500 text-white text-xs rounded-full px-3 py-1 ml-2 hover:bg-green-600"><i class="fas fa-plus"></i> Nuevo</a></h1>

    @if (session('success'))
        <div class="bg-green-500 font-semibold text-xs text-white rounded-md p-4 my-4">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif 

    @livewire('users.index')
@endsection
