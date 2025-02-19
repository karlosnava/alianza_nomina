@extends('templates.app')

@section('title', $country->name)

@section('content')
    <a href="{{ route('countries.index') }}" class="text-xs text-blue-500 hover:text-blue-600"><i class="fas fa-arrow-left"></i> Regresar</a>
    <h1 class="flex items-center font-bold text-3xl mb-5 mt-3">
        <img src="https://flagsapi.com/{{ $country->flag }}/shiny/64.png" class="mr-2">
        {{ $country->name }}
        <a href="{{ route('countries.edit', $country) }}" class="bg-orange-500 text-white text-xs rounded-full px-3 py-1 ml-4 hover:bg-orange-600"><i class="fas fa-pen"></i> Editar</a>
    </h1>

    @if (session('success'))
        <div class="bg-green-500 font-semibold text-xs text-white rounded-md p-4 my-4">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif
    
    @if (session('error'))
        <div class="bg-red-500 font-semibold text-xs text-white rounded-md p-4 my-4">
            <i class="fas fa-times-circle"></i> {{ session('error') }}
        </div>
    @endif 

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
        <div>
            <h3>
                <i class="fa-solid fa-city text-pink-500"></i> Ciudades ({{ $country->cities->count() }})
                <a href="{{ route('cities.create', $country) }}" class="bg-green-500 text-white text-xs rounded-full px-2 py-1 ml-2 hover:bg-green-600"><i class="fas fa-plus"></i> Agregar</a>
            </h3>

            <div class="my-3">
                <div class="sticky top-5">
                    @forelse ($country->cities as $city)
                        <div class="flex items-center justify-between border rounded-md px-3 py-2 mb-2">
                            <span>{{ $city->name }} <a href="{{ route('cities.edit', [$country, $city]) }}" class="text-orange-500 text-xs ml-1"><i class="fas fa-pen"></i></a></span>
                            <div>
                                <form action="{{ route('cities.destroy', [$country, $city]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-300 text-xs hover:text-red-500"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <div class="text-red-500 text-xs rounded-md">
                            <i class="fa-solid fa-times"></i> No hay ciudades creadas en este país.
                        </div>
                    @endforelse
                </div>
            </div>

            <hr class="my-4">
            <form action="{{ route('countries.destroy', $country) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-xs text-red-300 hover:text-red-500"><i class="fas fa-trash"></i> Eliminar país</button>
            </form>
        </div>

        <div>
            <h3 class="font-semibold text-gray-600">Empleados de esta nacionalidad</h3>
            <hr class="my-3">

            @forelse ($country->users as $user)
                <a href="{{ route('users.show', $user) }}" class="block border rounded-md mb-1 px-4 py-2 hover:bg-gray-50">
                    {{ $user->first_name . " " . $user->middle_name . " " . $user->first_surname . " " . $user->second_surname }}
                </a>
            @empty
                <div class="bg-blue-50 text-blue-500 text-xs text-center rounded-md p-3">
                    <i class="fa-solid fa-user-xmark"></i> No hay empleados con esta nacionalidad.
                </div>
            @endforelse
        </div>
    </div>
@endsection
