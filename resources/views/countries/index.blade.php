@extends('templates.app')

@section('title', "Países")

@section('content')
    <h1 class="font-bold text-2xl mb-5">Países <a href="{{ route('countries.create') }}" class="bg-orange-500 text-white text-xs rounded-full px-3 py-1 ml-2 hover:bg-orange-600"><i class="fas fa-plus"></i> Nuevo</a></h1>

    @if (session('success'))
        <div class="bg-green-500 font-semibold text-xs text-white rounded-md p-4 my-4">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif 

    @forelse ($countries as $country)
        <a href="{{ route('countries.show', $country) }}" class="block border rounded-md mb-2 px-4 py-2 hover:bg-gray-50">
            <div class="flex items-center font-semibold">
                <img src="https://flagsapi.com/{{ $country->flag }}/shiny/24.png" class="mr-2">
                {{ $country->name }}
            </div>
        </a>
    @empty
        <div class="text-red-500 text-center">No hay países creados.</div>
    @endforelse
@endsection
