@props([
'local',
'visitant',
'estadi',
'data',
'jornada',
'gols' => '—'
])

<div class="partit border rounded-lg shadow-md p-4 bg-white">
    <h2 class="text-xl font-bold text-purple-800">
        Jornada {{ $jornada }} - {{ $data }}
    </h2>
    <p><strong>Local:</strong> {{ $local }}</p>
    <p><strong>Visitant:</strong> {{ $visitant }}</p>
    <p><strong>Estadi:</strong> {{ $estadi }}</p>
    <p><strong>Gols:</strong> {{ $gols ?? '—' }}</p>
</div>