@extends('layouts.equip')
@section('title', __('Añadir nuevo partido'))

@section('content')
<h1 class="text-2xl font-bold mb-4">{{__("Añadir nuevo partido")}}</h1>

@if ($errors->any())
<div class="bg-red-100 text-red-700 p-2 mb-4">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('partits.store') }}" method="POST" class="space-y-4">
    @csrf

    <div>
        <label for="local_id" class="block font-bold">{{__("Equipo local")}}:</label>
        <select name="local_id" id="local_id" class="border p-2 w-full">
            @foreach ($equips as $equip)
            <option value="{{ $equip->id }}" {{ old('local_id') == $equip->id ? 'selected' : '' }}>
                {{ $equip->nom }}
            </option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="visitant_id" class="block font-bold">{{__("Equipo visitante")}}:</label>
        <select name="visitant_id" id="visitant_id" class="border p-2 w-full">
            @foreach ($equips as $equip)
            <option value="{{ $equip->id }}" {{ old('visitant_id') == $equip->id ? 'selected' : '' }}>
                {{ $equip->nom }}
            </option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="estadi_id" class="block font-bold">{{__("Estadio")}}:</label>
        <select name="estadi_id" id="estadi_id" class="border p-2 w-full">
            @foreach ($estadis as $estadi)
            <option value="{{ $estadi->id }}" {{ old('estadi_id') == $estadi->id ? 'selected' : '' }}>
                {{ $estadi->nom }}
            </option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="data" class="block font-bold">{{__("Fecha")}}:</label>
        <input type="date" name="data" id="data" value="{{ old('data') }}" class="border p-2 w-full">
    </div>

    <div>
        <label for="jornada" class="block font-bold">{{__("Jornada")}}:</label>
        <input type="number" name="jornada" id="jornada" value="{{ old('jornada') }}" class="border p-2 w-full">
    </div>

    <div>
        <label for="gols" class="block font-bold">{{__("Goles")}}:</label>
        <input type="text" name="gols" id="gols" value="{{ old('gols') }}" class="border p-2 w-full">
    </div>

    <button type="submit" class="bg-purple-600 text-white px-4 py-2 rounded">{{__("Añadir")}}</button>
</form>
@endsection