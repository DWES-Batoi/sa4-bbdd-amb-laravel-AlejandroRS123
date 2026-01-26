@extends('layouts.equip')
@section('title', __("Listado de estadios"))

@section('content')
<div class="container">
  <h1 class="text-3xl font-bold text-blue-800 mb-6">{{__("Listado de estadios")}}</h1>

  @if (session('success'))
  <div class="bg-green-100 text-green-700 p-2 mb-4">{{ session('success') }}</div>
  @endif

  <p class="mb-4">
    <a href="{{ route('estadis.create') }}" class="button-nou-equip bg-blue-600 text-white px-3 py-2 rounded">
      {{__("Nuevo estadio")}}
    </a>
  </p>

  <div class="grid-cards">
    @foreach($estadis as $estadi)
    <article class="card">
      <header class="card__header">
        <h2 class="card__title">{{ $estadi->nom }}</h2>
        <span class="card__badge">ID: {{ $estadi->id }}</span>
      </header>
      <div class="card__body">
        <p><strong>{{__("Capacidad")}}:</strong> {{ $estadi->capacitat }}</p>
      </div>
      <footer class="card__footer">
        <a class="btn btn--ghost" href="{{ route('estadis.show', $estadi) }}">{{__("Ver")}}</a>
        <a class="btn btn--primary" href="{{ route('estadis.edit', $estadi) }}">{{__("Editar")}}</a>
        <form method="POST" action="{{ route('estadis.destroy', $estadi) }}" class="inline">
          @csrf
          @method('DELETE')
          <button class="btn btn--danger" type="submit">{{__("Eliminar")}}</button>
        </form>
      </footer>
    </article>
    @endforeach
  </div>
</div>
@endsection
