@extends('layouts.equip')
@section('title', "Detall de Partit")

@section('content')
<x-partit
    :local="$partit->local->nom ?? '—'"
    :visitant="$partit->visitant->nom ?? '—'"
    :estadi="$partit->estadi->nom ?? '—'"
    :data="$partit->data"
    :jornada="$partit->jornada"
    :gols="$partit->gols" />
@endsection