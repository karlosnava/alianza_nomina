@extends('templates.app')

@section('title', "Cargos")

@section('content')
    <h1 class="font-bold text-2xl mb-5"><i class="fa-solid fa-briefcase text-blue-500"></i> Cargos <a href="{{ route('positions.create') }}" class="bg-blue-500 text-white text-xs rounded-full px-3 py-1 ml-2 hover:bg-blue-600"><i class="fas fa-plus"></i> Nuevo</a></h1>

    @if (session('success'))
        <div class="bg-green-500 font-semibold text-xs text-white rounded-md p-4 my-4">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif 

    @forelse ($positions as $position)
        <a href="{{ route('positions.show', $position) }}" class="block border rounded-md mb-2 px-4 py-2 hover:bg-gray-50">
            <span class="text-green-500 text-xs mr-3"><i class="fa-solid fa-dollar-sign"></i> {{ number_format($position->salary) }}</span>
            <div class="font-semibold">{{ $position->name }} <span class="text-gray-300 mx-2">|</span> <span class="text-blue-500 text-xs mr-3"><i class="fa-solid fa-users"></i> {{ number_format($position->users->count()) }}</span></div>
        </a>
    @empty
        <div class="text-red-500 text-center">No hay cargos creados.</div>
    @endforelse
@endsection
