<div>
    <div class="mb-3">
        <select name="position_id" wire:model="position_id" id="position_id" class="w-full border rounded-md px-4 py-2">
            <option value="0" selected disabled>Agregar nuevo cargo...</option>
            @forelse ($positions as $position)
                <option value="{{ $position->id }}">{{ $position->name }} (${{ number_format($position->salary) }})</option>                
            @empty
            @endforelse
        </select>
        @error('name')
            <div class="text-xs text-red-500">{{ $message }}</div>
        @enderror

        @if ($positions->count() > 0 && $position_id > 0)
            <div class="text-right text-xs my-2">
                <button wire:click="add_position" class="bg-blue-500 text-white font-semibold rounded-md px-3 py-1"><i class="fas fa-plus"></i> Agregar</button>
            </div>
        @endif
    </div>

    @forelse ($user_positions as $_position)
        <div class="border rounded-md mb-1 px-4 py-2">
            <div class="flex items-center justify-between">
                <span class="text-green-500 text-xs font-semibold">${{ number_format($_position->salary) }}</span>
                <span wire:click="delete_position({{ $_position->id }})" class="text-red-300 cursor-pointer hover:text-red-500"><i class="fas fa-times"></i></span>
            </div>
            <div class="font-bold">{{ $_position->name }}</div>
        </div>
    @empty
        <div class="text-red-500 text-xs text-center"><i class="fas fa-times"></i> El empleado no tiene cargos asignados...</div>
    @endforelse

    <hr class="my-3">
    <div class="bg-green-50 text-green-500 rounded-md px-4 py-2">
        <div class="font-semibold">Total nómina al mes:</div>
        <div class="text-3xl font-bold">$ {{ number_format($total_pay) }}</div>
    </div>
</div>
