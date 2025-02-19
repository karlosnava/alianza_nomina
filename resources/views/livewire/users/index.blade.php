<div>
    <div class="mb-3">
        <input type="text" wire:model="search" class="w-full border rounded-md px-4 py-2" placeholder="Inicia una búsqueda... (Nombres o documento)" autofocus>
        <div class="text-gray-600 text-xs my-2">Mostrando {{ $users->count() }} resultados.</div>
    </div>

    @foreach ($users as $user)
        <div class="">
            <a href="{{ route('users.show', $user) }}" class="block border px-4 py-2 mb-2 rounded-md hover:bg-gray-50">
                <div class="flex items-center justify-between">
                    <div class="text-xs text-blue-500">
                        <i class="fas fa-briefcase"></i>
                        {{ $user->positions->count() }} cargos
                    </div>

                    <div class="text-xs">
                        @if ($user->id === auth()->user()->id)
                            <span class="bg-red-500 text-white rounded-full px-3">Tú</span>
                        @endif
                        @if ($user->role_id === 1)
                            <span class="bg-blue-500 text-white rounded-full px-3"><i class="fas fa-user"></i> Empleado</span>
                        @endif
                        @if ($user->role_id === 2)
                            <span class="bg-green-500 text-white rounded-full px-3"><i class="fas fa-dollar"></i> Personal de nómina</span>
                        @endif
                        @if ($user->role_id === 3)
                            <span class="bg-yellow-500 text-white rounded-full px-3"><i class="fas fa-crown"></i> Presidente</span>
                        @endif
                    </div>
                </div>
                <div>{{ $user->first_name . " " . $user->middle_name . " " . $user->first_surname . " " . $user->second_surname }}</div>
                <div class="text-xs text-gray-500">
                    [{{ $user->document_type->acronym }}] {{ $user->document }}
                </div>
            </a>
        </div>
    @endforeach

    {{ $users->links() }}
</div>
