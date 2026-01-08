@extends('layouts.app')
@section('title', 'Jugadors')

@section('content')
<div class="container">
    <h1 class="text-3xl font-bold text-green-800 mb-6">Listado de Jugadores</h1>
    <p class="mb-4">
        <a href="{{ route('jugadors.create') }}" class="bg-blue-600 text-white px-3 py-2 rounded">
            Nou Jugador
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
                <p><strong>Equip:</strong> {{ $jugador->equip->nom ?? '—' }}</p>
                <p><strong>Dorsal:</strong> {{ $jugador->dorsal }}</p>
                <p><strong>Data naixement:</strong> {{ $jugador->data_naixement }}</p>
            </div>
            <footer class="card__footer">
                <a class="btn btn--ghost" href="{{ route('jugadors.show', $jugador) }}">Ver</a>
                <a class="btn btn--primary" href="{{ route('jugadors.edit', $jugador) }}">Editar</a>
                <form method="POST" action="{{ route('jugadors.destroy', $jugador) }}" class="inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn--danger" type="submit">Eliminar</button>
                </form>
            </footer>
        </article>
        @endforeach
    </div>
</div>
@endsection