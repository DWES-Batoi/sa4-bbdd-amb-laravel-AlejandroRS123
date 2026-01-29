<nav>
  <ul class="flex space-x-4">
    <li><a class="text-white hover:underline" href="/">{{__("Inicio")}}</a></li>

    <li><a class="text-white hover:underline" href="{{ route('estadis.index') }}">{{__("Listado de estadios")}}</a></li>
    <li><a class="text-white hover:underline" href="{{ route('equips.index') }}">{{__("Listado de equipos")}}</a></li>
    <li><a class="text-white hover:underline" href="{{ route('jugadors.index') }}">{{__("Listado de jugadores")}}</a></li>
    <li><a class="text-white hover:underline" href="{{ route('partits.index') }}">{{__("Listado de partidos")}}</a></li>
  </ul>
</nav>