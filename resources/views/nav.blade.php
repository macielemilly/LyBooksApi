
<nav class="fixed top-0 left-0 z-50 w-screen navs">
  <div class="px-3 py-3 lg:px-5 lg:pl-3">
    <div class="flex items-center justify-between">
      <div class="flex items-center justify-start rtl:justify-end">
        <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
               <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
            </svg>
         </button>
        <a href="https://flowbite.com" class="itens_logo flex ms-2 md:me-24">
          <img src="{{ asset('assets/images/lybooks.png') }}" class="lybooks me-3" alt="FlowBite Logo" />
          <span style="color:white; font-weight: 400 ;" class="self-center text-xl  sm:text-2xl whitespace-nowrap">LyBooks</span>
        </a>
      </div>
      <div class="relative inline-block text-left">
  <div style="margin-right:20px">
    <button type="button" class="drop inline-flex w-full justify-center gap-x-1.5 rounded-md px-3 py-2 text-sm font-semibold text-gray-900 shadow-xs ring-gray-300 ring-inset hover:bg-gray-50" id="menu-button" aria-expanded="true" aria-haspopup="true">
    {{ auth()->user()->name }}
      <svg class="-mr-1 size-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
        <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
      </svg>
    </button>
  </div>

  <div class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white ring-1 shadow-lg ring-black/5 focus:outline-hidden hidden" id="dropdown-menu" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
    <div class="py-1" role="none">
      <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="menu-item-0">Account settings</a>
      <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="menu-item-1">Support</a>
      <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="menu-item-2">License</a>
      <form method="POST" action="{{ route('logout') }}" role="none">
      @csrf
        <button type="submit" class="block w-full px-4 py-2 text-left text-sm text-gray-700" role="menuitem" tabindex="-1" id="menu-item-3">Sair</button>
      </form>
    </div>
  </div>
</div>
    </div>
  </div>
</nav>

<aside id="logo-sidebar" class="side fixed top-0 left-0 z-40 w-80 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0" aria-label="Sidebar">
   <div class=" side h-full px-5 pb-4 overflow-y-auto ">
      <ul class="space-y-2 font-medium">
         <li>
            <a href="{{route('dashboard')}}" class=" links_nav flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
               <img src="{{ asset('assets/images/home.png') }}" alt="">
               <span class="ms-3">Início</span>
            </a>
         </li>
         <li>
            <a href="{{route('dashboard')}}" class="links_nav flex items-center p-2 text-gray-900 rounded-lg  hover:bg-gray-100 group">
            <img src="{{ asset('assets/images/nav_livro.png') }}" alt="">
               <span class="flex-1 ms-3 whitespace-nowrap">Livros</span>
               <span class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full ">3</span>
            </a>
         </li>
         <li>
            <a href="{{route('editoras.index')}}" class="links_nav flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
            <img src="{{ asset('assets/images/nav_editoras.png') }}" alt="">
               <span class="flex-1 ms-3 whitespace-nowrap">Editoras</span>
            </a>
         </li>
         <li>
            <a href="{{route('authors.index')}}" class="links_nav flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
            <img src="{{ asset('assets/images/nav_autores.png') }}" alt="">
               <span class="flex-1 ms-3 whitespace-nowrap">Autores</span>
            </a>
         </li>
         <li>
            <a href="{{route('languages.index')}}" class="links_nav flex items-center p-2 text-gray-900 rounded-lg  hover:bg-gray-100  group">
            <img src="{{ asset('assets/images/nav_idioma.png') }}" alt="">
               <span class="flex-1 ms-3 whitespace-nowrap">Linguagens</span>
            </a>
         </li>
         <li>
            <a href="{{route('generos.index')}}" class="links_nav flex items-center p-2 text-gray-900 rounded-lg  hover:bg-gray-100 group">
            <img src="{{ asset('assets/images/nav_teatro.png') }}" alt="">
               <span class="flex-1 ms-3 whitespace-nowrap">Gêneros</span>
            </a>
         </li>
         <li>
            <a href="{{route('alugueis.index')}}" class="links_nav flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
            <img src="{{ asset('assets/images/troca.png') }}" alt="">
               <span class="flex-1 ms-3 whitespace-nowrap">Alugados</span>
            </a>
         </li>
      </ul>
   </div>
</aside>

<script>
  // Seleciona o botão e o menu dropdown
  const menuButton = document.getElementById('menu-button');
  const dropdownMenu = document.getElementById('dropdown-menu');

  // Evento para abrir e fechar o menu
  menuButton.addEventListener('click', function(event) {
    event.stopPropagation();
    // Alterna a classe 'hidden' para mostrar/ocultar o menu
    dropdownMenu.classList.toggle('hidden');
    
    // Atualiza o atributo 'aria-expanded' para true ou false
    const isExpanded = dropdownMenu.classList.contains('hidden');
    menuButton.setAttribute('aria-expanded', !isExpanded);
  });

  // Fechar o menu se clicar fora dele
  window.addEventListener('click', function(event) {
    if (!menuButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
      dropdownMenu.classList.add('hidden');
      menuButton.setAttribute('aria-expanded', 'false');
    }
  });
</script>