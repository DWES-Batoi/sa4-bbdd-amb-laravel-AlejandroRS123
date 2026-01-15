<div class="equip border rounded-lg shadow-md p-4 bg-blue-gray-800">
  @if ($equip->escut)
  <img src="{{ asset('storage/' . $equip->escut) }}"
    alt="Escut de {{ $equip->nom }}"
    class="h-12 w-12 object-cover rounded-full mb-2">
  @endif
  <h2 class="text-xl font-bold text-blue-800">{{ $equip->nom }}</h2>
  <p><strong>Estadio:</strong> {{ $equip->estadi->nom }}</p>
  <p><strong>Títulos:</strong> {{ $equip->titols }}</p>
</div>