@props([
'local',
'visitant',
'estadi',
'data',
'jornada',
'gols' => '—'
])

<div class="partit border rounded-lg shadow-md p-4 bg-blue-gray-800">
    <h2 class="text-xl font-bold text-purple-800">
        {{__("Jornada")}} {{ $jornada }} - {{ $data }}
    </h2>
    <p><strong>{{__("Local")}}:</strong> {{ $local }}</p>
    <p><strong>{{__("Visitante")}}:</strong> {{ $visitant }}</p>
    <p><strong>{{__("Estadio")}}:</strong> {{ $estadi }}</p>
    <p><strong>{{__("Goles")}}:</strong> {{ $gols ?? '—' }}</p>
</div>