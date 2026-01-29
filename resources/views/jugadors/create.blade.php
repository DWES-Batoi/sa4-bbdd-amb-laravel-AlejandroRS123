@extends('layouts.equip')
@section('title', __('Añadir nuevo jugador'))

@section('content')
<h1 class="text-2xl font-bold mb-4">{{__("Añadir nuevo jugador")}}</h1>

@if ($errors->any())
<div class="bg-red-100 text-red-700 p-2 mb-4">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('jugadors.store') }}" method="POST" class="space-y-4" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="nom" class="block font-bold">{{__("Nombre")}}:</label>
        <input type="text" name="nom" id="nom" value="{{ old('nom') }}" class="border p-2 w-full">
    </div>

    <div>
        <label for="equip_id" class="block font-bold">{{__("Equipo")}}:</label>
        <select name="equip_id" id="equip_id" class="border p-2 w-full">
            @foreach ($equips as $equip)
            <option value="{{ $equip->id }}" {{ old('equip_id') == $equip->id ? 'selected' : '' }}>
                {{ $equip->nom }}
            </option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="dorsal" class="block font-bold">{{__("Dorsal")}}:</label>
        <input type="number" name="dorsal" id="dorsal" value="{{ old('dorsal') }}" class="border p-2 w-full">
    </div>

    <div>
        <label for="data_naixement" class="block font-bold">{{__("Fecha de nacimiento")}}:</label>
        <input type="date" name="data_naixement" id="data_naixement" value="{{ old('data_naixement') }}" class="border p-2 w-full">
    </div>

    <div>
        <label for="foto" class="block font-bold">{{__("Foto")}}:</label>
        <input type="file" name="foto" id="foto" class="border p-2 w-full">
    </div>

    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">{{__("Añadir")}}</button>
</form>
@endsection