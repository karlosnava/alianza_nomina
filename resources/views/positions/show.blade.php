@extends('templates.app')

@section('title', $position->name)

@section('content')
    <a href="{{ route('positions.index') }}" class="text-xs text-blue-500 hover:text-blue-600"><i class="fas fa-arrow-left"></i> Regresar</a>
    <h1 class="font-bold text-2xl mb-5 mt-3">{{ $position->name }} <a href="{{ route('positions.edit', $position) }}" class="bg-orange-500 text-white text-xs rounded-full px-3 py-1 ml-2 hover:bg-orange-600"><i class="fas fa-pen"></i> Editar</a></h1>

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

    <div class="grid grid-cols-5 gap-5">
        <div class="col-span-5 md:col-span-2">
            <div class="bg-green-50 rounded-md p-5 sticky top-5">
                <div class="text-gray-500">Salario del cargo:</div>
                <span class="text-green-500 font-bold">${{ number_format($position->salary) }}</span>

                <hr class="my-3">
                <div class="text-gray-500">Total en nómina:</div>
                <h3 class="text-3xl text-green-500 font-bold">
                    - ${{ number_format($position->users->count() * $position->salary) }}
                </h3>
            </div>

            <div class="text-xs text-right my-3">
                <form action="{{ route('positions.destroy', $position) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-300 hover:text-red-500"><i class="fas fa-trash"></i> Eliminar puesto</button>
                </form>
            </div>
        </div>

        <div class="col-span-5 md:col-span-3">
            <h3 class="font-semibold text-gray-600">Empleados asignados a este cargo</h3>
            <hr class="my-3">
            @forelse ($position->users as $user)
                <a href="{{ route('users.show', $user) }}" class="block border rounded-md mb-1 px-4 py-2 hover:bg-gray-50">
                    {{ $user->first_name . " " . $user->middle_name . " " . $user->first_surname . " " . $user->second_surname }}
                </a>
            @empty
                <div class="bg-blue-50 text-blue-500 font-semibold rounded-md px-4 py-2">
                    <i class="fa-solid fa-user-xmark"></i> No hay empleados en este cargo.
                </div>                
            @endforelse
        </div>
    </div>
@endsection
