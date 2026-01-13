@extends('layouts.equip')
@section('title', 'Partits')

@section('content')
<div class="container">
    <h1 class="text-3xl font-bold text-purple-800 mb-6">Listado de Partidos</h1>
    <p class="mb-4">
        <a href="{{ route('partits.create') }}" class="bg-blue-600 text-white px-3 py-2 rounded">
            Nou Partit
        </a>
    </p>

    <div class="grid-cards">
        @foreach ($partits as $partit)
        <article class="card">
            <header class="card__header">
                <h2 class="card__title">Jornada {{ $partit->jornada }} - {{ $partit->data }}</h2>
                <span class="card__badge">ID: {{ $partit->id }}</span>
            </header>
            <div class="card__body">
                <p><strong>Local:</strong> {{ $partit->local->nom ?? '—' }}</p>
                <p><strong>Visitant:</strong> {{ $partit->visitant->nom ?? '—' }}</p>
                <p><strong>Estadi:</strong> {{ $partit->estadi->nom ?? '—' }}</p>
                <p><strong>Gols:</strong> {{ $partit->gols ?? '—' }}</p>
            </div>
            <footer class="card__footer">
                <a class="btn btn--ghost" href="{{ route('partits.show', $partit) }}">Ver</a>
                <a class="btn btn--primary" href="{{ route('partits.edit', $partit) }}">Editar</a>
                <form method="POST" action="{{ route('partits.destroy', $partit) }}" class="inline">
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