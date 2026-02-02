@extends('layouts.equip')
@section('title', __("Editar partido"))
@section('content')
<form action="{{ route('partits.update', $partit) }}" method="POST" class="space-y-4">
    @csrf
    @method('PUT')
    <div>
        <label class="block text-sm font-medium">{{__("Equipo local")}}:</label>
        <select name="local_id" class="w-full border rounded p-2">
            @foreach($equips as $equip)
            <option value="{{ $equip->id }}" @selected(old('local_id', $partit->local_id) == $equip->id)>
                {{ $equip->nom }}
            </option>
            @endforeach
        </select>
        @error('local_id') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
    </div>
    <div>
        <label class="block text-sm font-medium">{{__("Equipo visitante")}}:</label>
        <select name="visitant_id" class="w-full border rounded p-2">
            @foreach($equips as $equip)
            <option value="{{ $equip->id }}" @selected(old('visitant_id', $partit->visitant_id) == $equip->id)>
                {{ $equip->nom }}
            </option>
            @endforeach
        </select>
        @error('visitant_id') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
    </div>
    <div>
        <label class="block text-sm font-medium">{{__("Estadio")}}:</label>
        <select name="estadi_id" class="w-full border rounded p-2">
            @foreach($estadis as $estadi)
            <option value="{{ $estadi->id }}" @selected(old('estadi_id', $partit->estadi_id) == $estadi->id)>
                {{ $estadi->nom }}
            </option>
            @endforeach
        </select>
        @error('estadi_id') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
    </div>
    <div>
        <label class="block text-sm font-medium">{{__("Fecha")}}:</label>
        <input type="date" name="data" value="{{ old('data', $partit->data) }}" class="w-full border rounded p-2">
        @error('data') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
    </div>
    <div>
        <label class="block text-sm font-medium">{{__("Jornada")}}:</label>
        <input type="number" name="jornada" value="{{ old('jornada', $partit->jornada) }}" class="w-full border rounded p-2">
        @error('jornada') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
    </div>
    <div>
        <label class="block text-sm font-medium">{{__("Goles")}}:</label>
        <input type="text" name="gols" value="{{ old('gols', $partit->gols) }}" class="w-full border rounded p-2" placeholder="Ej: 2-1">
        @error('gols') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
    </div>
    <button class="px-4 py-2 bg-blue-600 text-white rounded">{{__("Guardar")}}</button>
</form>
@endsection