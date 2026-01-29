@extends('layouts.equip')
@section('title', __("Editar jugador"))
@section('content')
<form action="{{ route('jugadors.update', $jugador) }}" method="POST" class="space-y-4">
    @csrf
    @method('PUT')

    <div>
        <label class="block text-sm font-medium">{{__("Nombre")}}:</label>
        <input type="text" name="nom" value="{{ old('nom', $jugador->nom) }}" class="w-full border rounded p-2">
        @error('nom') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium">{{__("Equipo")}}:</label>
        <select name="equip_id" class="w-full border rounded p-2">
            @foreach($equips as $equip)
            <option value="{{ $equip->id }}" @selected(old('equip_id', $jugador->equip_id) == $equip->id)>
                {{ $equip->nom }}
            </option>
            @endforeach
        </select>
        @error('equip_id') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium">{{__("Dorsal")}}:</label>
        <input type="number" name="dorsal" value="{{ old('dorsal', $jugador->dorsal) }}" class="w-full border rounded p-2">
        @error('dorsal') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium">{{__("Fecha de nacimiento")}}:</label>
        <input type="date" name="data_naixement" value="{{ old('data_naixement', $jugador->data_naixement) }}" class="w-full border rounded p-2">
        @error('data_naixement') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
    </div>

     <div>
        <label class="block text-sm font-medium">{{__("Nueva foto (opcional)")}}:</label>
        <input type="file" name="foto" class="w-full border rounded p-2">
        @error('foto') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
    </div>

    <button class="px-4 py-2 bg-blue-600 text-white rounded">{{__("Guardar")}}</button>
</form>
@endsection