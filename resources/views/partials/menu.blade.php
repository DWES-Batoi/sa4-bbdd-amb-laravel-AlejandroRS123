<nav>
  <ul class="flex space-x-4">
    <li><a class="text-white hover:underline" href="/">Inici</a></li>

    {{-- Opcional: activarem l'enllaç d'equips quan el service estiga creat --}}
    {{-- <li><a class="text-white hover:underline" href="{{ route('equips.index') }}">Listado de equipos</a></li> --}}

    <li><a class="text-white hover:underline" href="{{ route('estadis.index') }}">Listado de estadios</a></li>
    <li><a class="text-white hover:underline" href="{{ route('equips.index') }}">Listado de equipos</a></li>
    <li><a class="text-white hover:underline" href="{{ route('jugadors.index') }}">Listado de jugadores</a></li>
    <li><a class="text-white hover:underline" href="{{ route('partits.index') }}">Listado de partidos</a></li>
  </ul>
</nav>