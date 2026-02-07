@extends('layouts.equip')
@section('title', __("Detalle de estadio"))

@section('content')
  <x-estadi
    :nom="$estadi->nom"
    :capacitat="$estadi->capacitat"
    :equips="$estadi->equips"
  />
@endsection
