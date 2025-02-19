@extends('templates.app')

@section('title', "Página principal")

@section('content')
    @if (auth()->user()->role_id === 1)
        <h1 class="text-3xl font-bold"><i class="fa-solid fa-briefcase text-blue-500"></i> Mis cargos</h1>
        <hr class="my-3">
        @forelse (auth()->user()->positions as $position)
            <div class="border rounded-md px-4 py-2 mb-1">
                <span class="text-green-500 font-semibold">${{ number_format($position->salary) }}</span>
                <div class="font-bold">{{ $position->name }}</div>
            </div>
        @empty
            <div class="text-red-500">No tienes cargos asignados en este momento</div>
        @endforelse

        <hr class="my-3">
        <div class="text-right">
            Total de ingresos al mes: <span class="text-green-500 text-3xl font-bold">${{ number_format(auth()->user()->positions->sum('salary')) }}</span>
        </div>
    @else
        <div class="border rounded-md p-5">
            <h1 class="font-bold text-xl">Bienvenido al sistema de nómina de <a href="https://grupo-alianza.com/" class="text-cyan-500" target="_blank">Grupo Alianza</a></h1>
            <h2 class="text-gray-600">Desarrollado por: <a href="https://github.com/karlosnava" class="text-blue-500" target="_blank"><i class="fab fa-github"></i> Carlos Rodriguez</a></h2>
            <hr class="my-3">
            <div class="font-semibold mb-2"><i class="fas fa-info-circle text-blue-500"></i> El sistema incluye:</div>
            <div>✅ Sesiones, Middlewares, CSRF, Hashing, Error Handling y validaciones.</div>
            <div>✅ Sistema de roles (Empleado, personal de nómina y presidente).</div>
            <div>✅ Creación, edición, eliminación y listado de empleados.</div>
            <div>✅ Creación, edición, eliminación y listado de países.</div>
            <div>✅ Creación, edición, eliminación y listado de ciudades.</div>
            <div>✅ Creación, edición, eliminación y listado de puestos de trabajo.</div>
            <div>✅ Componentes reactivos y paginación.</div>
            <hr class="my-2">
            <div class="font-semibold mb-2"><i class="fas fa-info-circle text-blue-500"></i> Tecnologías utilizadas:</div>
            <div>🛠️ Laravel 8.</div>
            <div>🛠️ SQLite.</div>
            <div>🛠️ Livewire.</div>
            <div>🛠️ Tailwindcss.</div>
            <div>🛠️ Fontawesome.</div>
            <div>🛠️ flagsapi.com</div>
            <hr class="my-2">
            <div class="text-right text-xs text-gray-400"><i class="fas fa-clock"></i> 7 Horas de desarrollo.</div>
        </div>
    @endif
@endsection
