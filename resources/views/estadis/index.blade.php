@extends('layouts.equip')
@section('title', __("Listado de estadios"))

@section('content')
<h1 class="text-3xl font-bold text-blue-800 mb-6">{{__("Listado de estadios")}}</h1>

@if (session('success'))
<div class="bg-green-100 text-green-700 p-2 mb-4">{{ session('success') }}</div>
@endif

<p class="mb-4">
  <a href="{{ route('estadis.create') }}" class="bg-blue-600 text-white px-3 py-2 rounded">
    {{__("Nuevo estadio")}}
  </a>
</p>

<table class="w-full border-collapse border border-gray-300">
  <thead class="bg-gray-200">
    <tr>
      <th class="border border-gray-300 bg-blue-500 p-2">{{__("Nombre")}}</th>
      <th class="border border-gray-300 bg-blue-500 p-2">{{__("Capacidad")}}</th>
    </tr>
  </thead>
  <tbody>
    @foreach($estadis as $estadi)
    <tr class="hover:bg-gray-100">
      <td class="border border-gray-300 p-2">
        <a href="{{ route('estadis.show', $estadi->id) }}" class="text-blue-700 hover:underline">
          {{ $estadi->nom }}
        </a>
      </td>
      <td class="border border-gray-300 p-2">{{ $estadi->capacitat }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection