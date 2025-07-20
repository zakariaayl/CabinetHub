<!-- resources/views/components/navbar.blade.php -->
@php
    function navActive($route) {
        return request()->routeIs($route)
            ? 'bg-white text-blue-700 font-bold shadow-md ring-2 ring-white'
            : 'hover:bg-white/10 transition duration-200';
    }
@endphp

<nav class="sticky top-0 z-50 bg-blue-700 text-white shadow-md">
  <div class="max-w-7xl mx-auto flex items-center justify-between px-4 py-3">

    <!-- Logo -->
    <a href="{{ route('collaborateurs.index') }}" class="flex items-center gap-2 text-lg font-bold">
      <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
        <path d="M12 2 2 7v13h20V7z"/>  <!-- logo placeholder -->
      </svg>
      CabinetHub
    </a>

    <!-- Burger -->
    <button id="burger" class="md:hidden">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
           viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round"
           d="M4 6h16M4 12h16M4 18h16"/></svg>
    </button>

    <!-- Desktop links -->
    <ul class="hidden md:flex md:space-x-6 font-medium">
      <li>
        <a href="{{ route('collaborateurs.index') }}"
           class="flex items-center justify-center gap-2 h-10 px-5 rounded-lg {{ navActive('collaborateurs.index') }}">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
               viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2h-3"/></svg>
          <span>Tableau de bord</span>
        </a>
      </li>

      <li>
        <a href="{{ route('postes.index') }}"
           class="flex items-center justify-center gap-2 h-10 px-5 rounded-lg {{ navActive('postes.*') }}">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
               viewBox="0 0 24 24"><path d="M3 5h6l2 2h10v12H3z"/></svg>
          <span>Fiches de poste</span>
        </a>
      </li>

      <li>
        <a href="#"   {{-- remplace par route('absences.index') quand prête --}}
           class="flex items-center justify-center gap-2 h-10 px-5 rounded-lg
           {{ navActive('absences.*') }}">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
               viewBox="0 0 24 24"><path d="M8 7h8m-8 4h8m-8 4h8M5 3h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2z"/></svg>
          <span>Absences / Congés</span>
        </a>
      </li>

      <li>
        <a href="#"   {{-- remplace par route('documents.index') --}}
           class="flex items-center justify-center gap-2 h-10 px-5 rounded-lg {{ navActive('documents.*') }}">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
               viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16l4-4h8a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2z"/></svg>
          <span>Documents RH</span>
        </a>
      </li>

      <li>
        <a href="#"   {{-- remplace par route('formations.index') --}}
           class="flex items-center justify-center gap-2 h-10 px-5 rounded-lg {{ navActive('formations.*') }}">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
               viewBox="0 0 24 24"><path d="M4 17h16M12 3l8 4-8 4-8-4zM6 21h12"/></svg>
          <span>Formations et Évaluations</span>
        </a>
      </li>
    </ul>
  </div>

  <!-- Mobile drawer -->
  <div id="drawer" class="md:hidden hidden bg-blue-800/95 backdrop-blur p-4 space-y-2">
    <a href="{{ route('collaborateurs.index') }}" class="block {{ navActive('collaborateurs.index') }}">Tableau de bord</a>
    <a href="{{ route('postes.index') }}"           class="block {{ navActive('postes.*') }}">Fiches de poste</a>
    <a href="#"   class="block {{ navActive('absences.*') }}">Absences / Congés</a>
    <a href="#"   class="block {{ navActive('documents.*') }}">Documents RH</a>
    <a href="#"   class="block {{ navActive('formations.*') }}">Formations et Évaluations</a>
  </div>
</nav>

<script>
  document.getElementById('burger').addEventListener('click', () =>
      document.getElementById('drawer').classList.toggle('hidden'));
</script>
