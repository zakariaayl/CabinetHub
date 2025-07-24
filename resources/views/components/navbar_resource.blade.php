<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
  integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer"
/>

</head>
<body class="">
<nav class="bg-white shadow-md fixed top-0 w-full mb-5 z-50">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center h-16">
      <div class="flex items-center flex-1">
        <div class="flex items-center sm:hidden mr-3">
          <button type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-black bg-white  hover:scale-110 transition duration-300 ease-in-out hover:text-white focus:ring-2 focus:ring-white focus:outline-none focus:ring-inset" aria-controls="mobile-menu" aria-expanded="false">
            <span class="absolute -inset-0.5"></span>
            <span class="sr-only">Open main menu</span>
            <svg class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
          </button>
        </div>
        <div class="flex-shrink-0">
            <form action="/" method="GET">
                <button type="submit" >
   <div class="flex items-center space-x-2">
<i class="fas fa-sitemap text-blue-600 text-xl"></i>
  <span class="text-xl font-bold text-gray-800">CabinetHub</span>
</div>


          </button>
        </form>
        </div>
        <div class="hidden sm:ml-6 sm:block">
          <div class="flex space-x-4">
            <div class="relative inline-block text-left">
<div class="relative inline-block text-left group">
  <button
    class="inline-flex justify-center w-full rounded-md shadow-sm px-4 py-2 bg-white text-sm font-medium text-black hover:bg-black hover:text-white"
    id="menu-button"
    aria-expanded="true"
    aria-haspopup="true"
  >
    Resources
  </button>

  <div
    class="origin-top-right absolute  w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5
    opacity-0 scale-95 invisible group-hover:opacity-100 group-hover:scale-100 group-hover:visible
    transition duration-400 ease-in-out"
    role="menu"
    aria-orientation="vertical"
    aria-labelledby="menu-button"
    id="dropdown-menu"
  >
    <div class="py-0" role="none">
      <a href="{{route('raView')}}" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">Tous les resources</a>
      <a href="{{route('ResourceController.create')}}" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">Ajouter resource</a>
    </div>
  </div>
</div>


            <div class="relative inline-block text-left group">
  <button
    class="inline-flex justify-center w-full rounded-md shadow-sm px-4 py-2 bg-white text-sm font-medium text-black hover:bg-black hover:text-white"
    id="menu-button"
    aria-expanded="true"
    aria-haspopup="true"
  >
    inventaire
  </button>

  <div
    class="origin-top-right absolute w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5
    opacity-0 scale-95 invisible group-hover:opacity-100 group-hover:scale-100 group-hover:visible
    transition duration-400 ease-in-out"
    role="menu"
    aria-orientation="vertical"
    aria-labelledby="menu-button"
    id="dropdown-menu"
  >
    <div class="py-1" role="none">
      <a href="{{route('inventaire.index')}}" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">Tous les inventaires</a>
      <a href="{{route('inventaire.create')}}" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">Ajouter inventaire</a>
    </div>
  </div>
</div>
            <div class="relative inline-block text-left group">
  <button
    class="inline-flex justify-center w-full rounded-md shadow-sm px-4 py-2 bg-white text-sm font-medium text-black hover:bg-black hover:text-white"
    id="menu-button"
    aria-expanded="true"
    aria-haspopup="true"
  >
    demandes achats
  </button>

  <div
    class="origin-top-right absolute w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5
    opacity-0 scale-95 invisible group-hover:opacity-100 group-hover:scale-100 group-hover:visible
    transition duration-400 ease-in-out"
    role="menu"
    aria-orientation="vertical"
    aria-labelledby="menu-button"
    id="dropdown-menu"
  >
    <div class="py-1" role="none">
      <a href="{{route('demande_achat.index')}}" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">Tous les demandes</a>
      <a href="{{route('demande_achat.create')}}" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">Ajouter demande achat</a>
    </div>
  </div>
</div>
             {{-- <a href="#" class="rounded-md px-3 py-2 text-sm text-black font-semibold hover:bg-black hover:scale-110  transition bg-white hover:text-white">Calendar</a>
              <a href="#" class="rounded-md px-3 py-2 text-sm text-black font-semibold hover:bg-black hover:scale-110  transition bg-white hover:text-white">Calendar</a> --}}
          </div>
        </div>
      </div>
      <div class="flex items-center space-x-3 ml-auto">
        <button type="button" class="relative rounded-full bg-gray-800 p-2 text-gray-400 hover:text-white focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-none">
          <span class="absolute -inset-1.5"></span>
          <span class="sr-only">View notifications</span>
          <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
          </svg>
        </button>

        <!-- Profile dropdown -->
        <div class="relative">
          <button type="button" class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
            <span class="absolute -inset-1.5"></span>
            <span class="sr-only">Open user menu</span>
            <img class="size-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
          </button>

          <!-- Dropdown menu -->
          <div class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black/5 focus:outline-none opacity-0 scale-95 transform transition-all duration-100 ease-out" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1">Your Profile</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1">Settings</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1">Sign out</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="sm:hidden hidden" id="mobile-menu">
    <div class="space-y-1 px-2 pt-2 pb-3">
      <div class="relative inline-block text-left group">
  <button
    class="inline-flex justify-center w-full rounded-md shadow-sm px-4 py-2 bg-white text-sm font-medium text-black hover:bg-black hover:text-white"
    id="menu-button"
    aria-expanded="true"
    aria-haspopup="true"
  >
    Resources
  </button>

  <div
    class="origin-top-right absolute mt-1 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5
    opacity-0 scale-95 invisible group-hover:opacity-100 group-hover:scale-100 group-hover:visible
    transition duration-400 ease-in-out"
    role="menu"
    aria-orientation="vertical"
    aria-labelledby="menu-button"
    id="dropdown-menu"
  >
    <div class="py-1" role="none">
      <a href="{{route('ResourceController.index')}}" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">Tous les resources</a>
      <a href="{{route('ResourceController.create')}}" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">Ajouter resource</a>
    </div>
  </div>
</div>


            <div class="relative inline-block text-left group">
  <button
    class="inline-flex justify-center w-full rounded-md shadow-sm px-4 py-2 bg-white text-sm font-medium text-black hover:bg-black hover:text-white"
    id="menu-button"
    aria-expanded="true"
    aria-haspopup="true"
  >
    inventaire
  </button>

  <div
    class="origin-top-right absolute mt-1 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5
    opacity-0 scale-95 invisible group-hover:opacity-100 group-hover:scale-100 group-hover:visible
    transition duration-400 ease-in-out"
    role="menu"
    aria-orientation="vertical"
    aria-labelledby="menu-button"
    id="dropdown-menu"
  >
    <div class="py-1" role="none">
      <a href="{{route('inventaire.index')}}" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">Tous les inventaires</a>
      <a href="{{route('inventaire.create')}}" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">Ajouter inventaire</a>
    </div>
  </div>
</div>
            <div class="relative inline-block text-left group">
  <button
    class="inline-flex justify-center w-full rounded-md shadow-sm px-4 py-2 bg-white text-sm font-medium text-black hover:bg-black hover:text-white"
    id="menu-button"
    aria-expanded="true"
    aria-haspopup="true"
  >
    demandes achats
  </button>

  <div
    class="origin-top-right absolute mt-1 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5
    opacity-0 scale-95 invisible group-hover:opacity-100 group-hover:scale-100 group-hover:visible
    transition duration-400 ease-in-out"
    role="menu"
    aria-orientation="vertical"
    aria-labelledby="menu-button"
    id="dropdown-menu"
  >
    <div class="py-1" role="none">
      <a href="{{route('demande_achat.index')}}" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">Tous les demandes</a>
      <a href="{{route('demande_achat.create')}}" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">Ajouter demande achat</a>
    </div>
  </div>
</div>
    </div>
  </div>
</nav>

<script>
document.getElementById('user-menu-button').addEventListener('click', function() {
    const dropdown = this.nextElementSibling;
    const isVisible = !dropdown.classList.contains('opacity-0');

    if (isVisible) {
        dropdown.classList.add('opacity-0', 'scale-95');
        dropdown.classList.remove('opacity-100', 'scale-100');
    } else {
        dropdown.classList.remove('opacity-0', 'scale-95');
        dropdown.classList.add('opacity-100', 'scale-100');
    }
});
document.addEventListener('click', function(event) {
    const dropdown = document.querySelector('.absolute.right-0.z-10');
    const button = document.getElementById('user-menu-button');

    if (!button.contains(event.target) && !dropdown.contains(event.target)) {
        dropdown.classList.add('opacity-0', 'scale-95');
        dropdown.classList.remove('opacity-100', 'scale-100');
    }
});
document.querySelector('[aria-controls="mobile-menu"]').addEventListener('click', function() {
    const mobileMenu = document.getElementById('mobile-menu');
    const isHidden = mobileMenu.classList.contains('hidden');

    if (isHidden) {
        mobileMenu.classList.remove('hidden');
    } else {
        mobileMenu.classList.add('hidden');
    }
});
</script>
</body>
</html>
