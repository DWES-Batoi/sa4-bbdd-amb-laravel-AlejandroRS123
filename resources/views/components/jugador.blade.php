@props([
'nom',
'equip',
'dorsal',
'data_naixement',
'foto' => null
])

<div class="jugador border rounded-lg shadow-md p-4 bg-white">
    <h2 class="text-xl font-bold text-green-800">{{ $nom }}</h2>
    <p><strong>Equip:</strong> {{ $equip }}</p>
    <p><strong>Dorsal:</strong> {{ $dorsal }}</p>
    <p><strong>Data naixement:</strong> {{ $data_naixement }}</p>
    @if($foto)
    <img src="{{ $foto }}" alt="Foto de {{ $nom }}" class="mt-2 w-32 h-32 object-cover rounded">
    @endif
</div>