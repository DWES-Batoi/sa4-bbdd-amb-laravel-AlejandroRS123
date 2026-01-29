@extends('layouts.equip')
@section('title', __("Detalle de equipo"))

@section('content')
<x-equip :equip="$equip" />
@endsection