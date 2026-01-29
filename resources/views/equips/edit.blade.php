@extends('layouts.equip')
@section('title', __("Editar equipo"))
@section('content')
<form action="{{ route('equips.update', $equip) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf
    @method('PUT')
    <div>
        <label class="block text-sm font-medium">{{__("Nombre")}}:</label>
        <input type="text" name="nom" value="{{ old('nom', $equip->nom) }}" class="w-full border rounded p-2">
        @error('nom') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
    </div>
    <div>
        <label class="block text-sm font-medium">{{__("Ciudad")}}:</label>
        <input type="text" name="ciudad" value="{{ old('ciudad', $equip->ciudad) }}" class="w-full border rounded p-2">
        @error('ciudad') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
    </div>
    <div>
        <label class="block text-sm font-medium">{{__("Estadio")}}:</label>
        <select name="estadi_id" class="w-full border rounded p-2">
            @foreach($estadis as $estadi)
            <option value="{{ $estadi->id }}" @selected(old('estadi_id', $equip->estadi_id) == $estadi->id)>
                {{ $estadi->nom }}
            </option>
            @endforeach
        </select>
        @error('estadi_id') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
    </div>
    <div>
        <label class="block text-sm font-medium">{{__("Títulos")}}:</label>
        <input type="number" name="titols" value="{{ old('titols', $equip->titols) }}" class="w-full border rounded p-2">
        @error('titols') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
    </div>
    @if($equip->escut)
    <div class="flex items-center gap-3">
        <img src="{{ asset('storage/' . $equip->escut) }}" class="h-12 w-12 object-cover rounded-full" alt="Escut">
        <p class="text-sm text-gray-600">{{__("Escudo actual")}}:</p>
    </div>
    @endif
    <div>
        <label class="block text-sm font-medium">{{__("Nuevo escudo (opcional)")}}:</label>
        <input type="file" name="escut" class="w-full border rounded p-2">
        @error('escut') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
    </div>
    <button class="px-4 py-2 bg-blue-600 text-white rounded">{{__("Guardar")}}</button>
</form>
@endsection