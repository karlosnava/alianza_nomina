@extends('templates.app')

@section('title', "Lista de usuarios")

@section('content')
    @if (session('success'))
        <div class="bg-green-500 font-semibold text-xs text-white rounded-md p-4 my-4">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif 

    <a href="{{ route('users.index') }}" class="text-xs text-blue-500 hover:text-blue-600"><i class="fas fa-arrow-left"></i> Regresar</a>
    <h1 class="font-bold text-3xl mt-3">
        {{ $user->first_name . " " . $user->middle_name . " " . $user->first_surname . " " . $user->second_surname }}

        @if ($user->id === auth()->user()->id)
            <span class="bg-red-500 text-white text-xs rounded-full px-3">Tú</span>
        @endif
        @if ($user->role_id === 1)
            <span class="bg-blue-500 text-white text-xs rounded-full px-3 py-1"><i class="fas fa-user"></i> Empleado</span>
        @endif
        @if ($user->role_id === 2)
            <span class="bg-green-500 text-white text-xs rounded-full px-3 py-1"><i class="fas fa-dollar"></i> Personal de nómina</span>
        @endif
        @if ($user->role_id === 3)
            <span class="bg-yellow-500 text-white text-xs rounded-full px-3 py-1"><i class="fas fa-crown"></i> Presidente</span>
        @endif
    </h1>
    <div class="text-gray-600 mb-5" title="{{ $user->document_type->name }}">{{ $user->document_type->acronym . " " . $user->document }}</div>

    <div class="grid grid-cols-5 gap-5">
        <div class="col-span-5 lg:col-span-3">
            <div class="border rounded-md px-5 py-3">
                <div>
                    <span class="text-gray-500">Dirección: </span>
                    <span class="text-gray-800">{{ $user->address }}</span>
                </div>
                <div>
                    <span class="text-gray-500">Teléfono: </span>
                    <a href="tel:{{ $user->phone }}" class="text-cyan-500">{{ $user->phone }}</a>
                </div>
                <div>
                    <span class="text-gray-500">Correo: </span>
                    <a href="mailto:{{ $user->email }}" class="text-cyan-500">{{ $user->email }}</a>
                </div>
                <div>
                    <span class="text-gray-500">Jefe inmediato: </span>
                    @if ($user->boss)
                        <a href="{{ route('users.show', $user->boss) }}" class="text-cyan-500">{{ $user->boss->first_name . " " . $user->boss->middle_name . "" . $user->boss->first_surname . " " . $user->boss->second_surname }}</a>
                    @else
                        <span class="text-orange-300"> <i class="fas fa-triangle-exclamation"></i> No definido</span>
                    @endif
                </div>
                <div class="flex items-center">
                    <span class="text-gray-500">Lugar de nacimiento: </span>
                    <a href="{{ route('countries.show', $user->country) }}" class="flex items-center text-cyan-500">
                        <img src="https://flagsapi.com/{{ $user->country->flag }}/shiny/24.png" class="mx-1">
                        {{ $user->city->name. ", " .$user->country->name }}
                    </a>
                </div>
            </div>

            <div class="flex items-center justify-between text-xs my-3">
                <form action="{{ route('users.destroy', $user) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-300 hover:text-red-500"><i class="fas fa-trash"></i> Eliminar empleado</button>
                </form>
                <a href="{{ route('users.edit', $user) }}" class="text-orange-500"><i class="fas fa-pen"></i> Editar información</a>
            </div>
        </div>

        <div class="col-span-5 lg:col-span-2">
            <h3 class="flex items-center justify-between font-bold">
                <div><i class="fa-solid fa-briefcase text-gray-500"></i> Cargos asignados</div>
                <a href="{{ route('positions.create') }}" class="text-blue-500"><i class="fas fa-plus"></i></a>
            </h3>
            <hr class="my-2">
            @livewire('users.positions', ['user' => $user])
        </div>
    </div>
@endsection
