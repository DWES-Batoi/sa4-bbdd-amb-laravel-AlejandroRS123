@extends('layouts.equip')
@section('title', __('Partidos'))

@section('content')
<div class="container">
    <h1 class="text-3xl font-bold text-purple-800 mb-6">{{__("Listado de partidos")}}</h1>
    <p class="mb-4">
        <a href="{{ route('partits.create') }}" class="bg-blue-600 text-white px-3 py-2 rounded">
            {{__("Nuevo partido")}}
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
                <p><strong>{{__("Local")}}:</strong> {{ $partit->local->nom ?? '—' }}</p>
                <p><strong>{{__("Visitante")}}:</strong> {{ $partit->visitant->nom ?? '—' }}</p>
                <p><strong>{{__("Estadio")}}:</strong> {{ $partit->estadi->nom ?? '—' }}</p>
                <p><strong>{{__("Goles")}}:</strong> {{ $partit->gols ?? '—' }}</p>
            </div>
            <footer class="card__footer">
                <a class="btn btn--ghost" href="{{ route('partits.show', $partit) }}">{{__("Ver")}}</a>
                <a class="btn btn--primary" href="{{ route('partits.edit', $partit) }}">{{__("Editar")}}</a>
                <form method="POST" action="{{ route('partits.destroy', $partit) }}" class="inline">
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