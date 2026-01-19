@extends('layouts.equip')
@section('title', __('Jugadores'))

@section('content')
<div class="container">
    <h1 class="text-3xl font-bold text-green-800 mb-6">{{__("Listado de Jugadores")}}</h1>
    <p class="mb-4">
        <a href="{{ route('jugadors.create') }}" class="bg-blue-600 text-white px-3 py-2 rounded">
            {{__("Nuevo jugador")}}
        </a>
    </p>

    <div class="grid-cards">
        @foreach ($jugadors as $jugador)
        <article class="card">
            <header class="card__header">
                <h2 class="card__title">{{ $jugador->nom }}</h2>
                <span class="card__badge">ID: {{ $jugador->id }}</span>
            </header>
            <div class="card__body">
                <p><strong>{{__("Equipo")}}:</strong> {{ $jugador->equip->nom ?? '—' }}</p>
                <p><strong>{{__("Dorsal")}}:</strong> {{ $jugador->dorsal }}</p>
                <p><strong>{{__("Fecha de nacimiento")}}:</strong> {{ $jugador->data_naixement }}</p>
            </div>
            <footer class="card__footer">
                <a class="btn btn--ghost" href="{{ route('jugadors.show', $jugador) }}">{{__("Ver")}}</a>
                <a class="btn btn--primary" href="{{ route('jugadors.edit', $jugador) }}">{{__("Editar")}}</a>
                <form method="POST" action="{{ route('jugadors.destroy', $jugador) }}" class="inline">
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