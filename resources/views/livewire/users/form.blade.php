<div class="grid grid-cols-1 lg:grid-cols-2 gap-5 mb-5">
    <div>
        <label for="first_name" class="text-gray-700 font-semibold">Primer nombre:</label>
        <input type="text" name="first_name" wire:model="first_name" value="{{ old('first_name', $first_name) }}" id="first_name" class="w-full border rounded-md px-4 py-2" placeholder="Carlos" required autofocus>
        @error('first_name')
            <div class="text-xs text-red-500">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="middle_name" class="text-gray-700 font-semibold">Segundo nombre:</label>
        <input type="text" name="middle_name" wire:model="middle_name" value="{{ old('middle_name', $middle_name) }}" id="middle_name" class="w-full border rounded-md px-4 py-2" placeholder="José">
        @error('middle_name')
            <div class="text-xs text-red-500">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-5 mb-5">
    <div>
        <label for="first_surname" class="text-gray-700 font-semibold">Primer apellido:</label>
        <input type="text" name="first_surname" wire:model="first_surname" value="{{ old('first_surname', $first_surname) }}" id="first_surname" class="w-full border rounded-md px-4 py-2" placeholder="Rodriguez" required>
        @error('first_surname')
            <div class="text-xs text-red-500">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="second_surname" class="text-gray-700 font-semibold">Segundo apellido:</label>
        <input type="text" name="second_surname" wire:model="second_surname" value="{{ old('second_surname', $second_surname) }}" id="second_surname" class="w-full border rounded-md px-4 py-2" placeholder="Navarro">
        @error('second_surname')
            <div class="text-xs text-red-500">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-5 mb-5">
    <div>
        <label for="document_type_id" class="text-gray-700 font-semibold">Tipo de documento:</label>
        <select name="document_type_id" wire:model="document_type_id" id="document_type_id" class="w-full border rounded-md px-4 py-2">
            <option value="0" selected disabled>Seleccione un tipo de documento...</option>
            @foreach ($document_types as $document_type)
                <option value="{{ $document_type->id }}" @selected({{ old('document_type_id', $document_type_id) === $document_type->id }})>[{{ $document_type->acronym }}] {{ $document_type->name }}</option>
            @endforeach
        </select>
        @error('document_type_id')
            <div class="text-xs text-red-500">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="document" class="text-gray-700 font-semibold">Documento:</label>
        <input type="text" name="document" wire:model="document" value="{{ old('document', $document) }}" id="document" class="w-full border rounded-md px-4 py-2" placeholder="12345678" required>
        @error('document')
            <div class="text-xs text-red-500">{{ $message }}</div>
        @enderror
    </div>
</div>

@if (!isset($user->role_id) || $user->role_id <= 2)
    <div class="mb-5" wire:ignore>
        <label for="boss_id" class="text-gray-700 font-semibold">Jefe inmediato:</label>
        <select name="boss_id" id="boss_id" wire:model="boss_id" class="w-full border rounded-md px-4 py-2">
            <option value="0" selected>Seleccione un jefe inmediato...</option>
            @foreach ($bosses as $boss)
                <option value="{{ $boss->id }}" @selected({{ old('boss_id', $boss_id) === $boss->id }})>
                    {{ $boss->first_name . " " . $boss->middle_name . " " . $boss->first_surname . " " . $boss->second_surname }}
                </option>
            @endforeach
        </select>
        @error('boss_id')
            <div class="text-xs text-red-500">{{ $message }}</div>
        @enderror
    </div>
@endif

<div class="grid grid-cols-1 lg:grid-cols-2 gap-5 mb-5">
    <div>
        <label for="address" class="text-gray-700 font-semibold">Dirección:</label>
        <input type="text" name="address" wire:model="address" value="{{ old('address', $address) }}" id="address" class="w-full border rounded-md px-4 py-2" placeholder="Calle 122 #1-1" required>
        @error('address')
            <div class="text-xs text-red-500">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="phone" class="text-gray-700 font-semibold">Teléfono:</label>
        <input type="text" name="phone" wire:model="phone" value="{{ old('phone', $phone) }}" id="phone" class="w-full border rounded-md px-4 py-2" placeholder="3165390655">
        @error('phone')
            <div class="text-xs text-red-500">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-5 mb-5">
    <div>
        <label for="country_id" class="text-gray-700 font-semibold">País de nacimiento:</label>
        <select name="country_id" wire:model="country_id" value="{{ old('country_id', $country_id) }}" id="country_id" class="w-full border rounded-md px-4 py-2">
            <option value="0" selected>Seleccione un país...</option>
            @foreach ($countries as $country)
                <option value="{{ $country->id }}">{{ $country->name  }}</option>
            @endforeach
        </select>
        @error('country_id')
            <div class="text-xs text-red-500">{{ $message }}</div>
        @enderror
    </div>
    
    <div>
        <label for="city_id" class="text-gray-700 font-semibold">Ciudad:</label>
        @if ($cities)
            <select name="city_id" wire:model="city_id" id="city_id" class="w-full border rounded-md px-4 py-2">
                <option value="0" selected>Seleccione una ciudad...</option>
                @forelse ($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->name  }}</option>
                @empty
                @endforelse
            </select>
            @error('city_id')
                <div class="text-xs text-red-500">{{ $message }}</div>
            @enderror
        @else
            <div>
                <small class="text-orange-300">Seleccione un país para ver sus ciudades...</small>
            </div>
        @endif
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-5 mb-5">
    <div>
        <label for="email" class="text-gray-700 font-semibold">Correo:</label>
        <input type="text" name="email" wire:model="email" value="{{ old('email', $email) }}" id="email" class="w-full border rounded-md px-4 py-2" placeholder="carlosjoser717@gmail.com">
        @error('email')
            <div class="text-xs text-red-500">{{ $message }}</div>
        @enderror
    </div>
    
    <div>
        <label for="password" class="text-gray-700 font-semibold">Contraseña:</label>
        <input type="text" name="password" wire:model="password" value="{{ old('password', $password) }}" id="password" class="w-full border rounded-md px-4 py-2" value="password" placeholder="password">
        @error('password')
            <div class="text-xs text-red-500">{{ $message }}</div>
        @enderror
    </div>
</div>