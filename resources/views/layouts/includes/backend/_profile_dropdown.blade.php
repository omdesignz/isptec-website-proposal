<!-- Profile dropdown -->
<div class="ml-3 relative">
    <div>
      <button @click.away="openProfileDropdown = false" @click="openProfileDropdown = !openProfileDropdown" type="button" class="max-w-xs bg-white rounded-full flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 lg:p-2 lg:rounded-md lg:hover:bg-gray-50" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
        <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-yellow-400">
          <span class="text-xs leading-none text-gray-900 font-bold">{{ auth()->user()->initials }}</span>
        </span>
        {{-- <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt=""> --}}
        <span class="hidden ml-3 text-gray-700 text-sm font-medium lg:block"><span class="sr-only">Open user menu for </span>{{ auth()->user()->name }}</span>
        <!-- Heroicon name: solid/chevron-down -->
        <svg class="hidden flex-shrink-0 ml-1 h-5 w-5 text-gray-400 lg:block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
          <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
        </svg>
      </button>
    </div>

    <!--
      Dropdown menu, show/hide based on menu state.

      Entering: "transition ease-out duration-100"
        From: "transform opacity-0 scale-95"
        To: "transform opacity-100 scale-100"
      Leaving: "transition ease-in duration-75"
        From: "transform opacity-100 scale-100"
        To: "transform opacity-0 scale-95"
    -->
    <div class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-gradient-to-r from-yellow-500 to-yellow-400 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1" 
                x-show="openProfileDropdown"
                x-transition:enter="transition ease-out duration-100"
                x-transition:enter-start="transform opacity-0 scale-95"
                x-transition:enter-end="transform opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="transform opacity-100 scale-100"
                x-transition:leave-end="transform opacity-0 scale-95"
                >
      <!-- Active: "bg-gray-100", Not Active: "" -->
      <a href="{{ route('users.getlang', ['user' => auth()->id(), 'lang' => 'pt']) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-yellow-300" role="menuitem" tabindex="-1" id="user-menu-item-0">Alterar os meus dados</a>
      <a @click="event.preventDefault(); $refs.form.submit();" href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-yellow-300" role="menuitem" tabindex="-1" id="user-menu-item-1">Terminar Sessão</a>
      <form x-ref="form" method="POST" action="{{ route('logout') }}">
        @csrf
    </form>
    </div>
  </div>