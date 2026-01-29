@extends('layouts.equip')
@section('title', __("Detalle de jugador"))

@section('content')
<x-jugador
    :nom="$jugador->nom"
    :equip="$jugador->equip->nom ?? '—'"
    :dorsal="$jugador->dorsal"
    :data_naixement="$jugador->data_naixement"
    :foto="$jugador->foto" />
@endsection