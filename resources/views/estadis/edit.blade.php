@extends('layouts.equip')
@section('title', __("Editar estadio"))
@section('content')
<form action="{{ route('estadis.update', $estadi) }}" method="POST" class="space-y-4">
    @csrf
    @method('PUT')
    <div>
        <label class="block text-sm font-medium">{{__("Nombre")}}:</label>
        <input type="text" name="nom" value="{{ old('nom', $estadi->nom) }}" class="w-full border rounded p-2">
        @error('nom') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
    </div>
    <div>
        <label class="block text-sm font-medium">{{__("Capacidad")}}:</label>
        <input type="number" name="capacitat" value="{{ old('capacitat', $estadi->capacitat) }}" class="w-full border rounded p-2">
        @error('capacitat') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
    </div>
    <button class="px-4 py-2 bg-blue-600 text-white rounded">{{__("Guardar")}}</button>
</form>
@endsection