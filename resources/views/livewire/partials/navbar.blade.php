<header class="flex z-50 sticky top-0 w-full bg-white text-sm py-3 dark:bg-gray-800 shadow-md">
    <nav class="max-w-[85rem] w-full mx-auto px-4 md:px-6 lg:px-8 flex items-center justify-between">
        <!-- Logo Placeholder -->
        <a href="/" wire:navigate class="flex-none text-xl font-semibold text-green-600 dark:text-green-400" aria-label="Marca">
            <span class="font-bold">Logo</span>
        </a>

        <!-- Mobile Menu Toggle Button -->
        <div class="md:hidden">
            <button type="button" class="hs-collapse-toggle flex justify-center items-center w-9 h-9 text-sm font-semibold rounded-lg border border-gray-200 text-gray-800 hover:bg-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-collapse="#navbar-collapse-with-animation" aria-controls="navbar-collapse-with-animation" aria-label="Toggle navigation">
                <svg class="hs-collapse-open:hidden flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="3" y1="6" x2="21" y2="6" />
                    <line x1="3" y1="12" x2="21" y2="12" />
                    <line x1="3" y1="18" x2="21" y2="18" />
                </svg>
                <svg class="hs-collapse-open:block hidden flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 6L6 18" />
                    <path d="M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Navbar Links -->
        <div id="navbar-collapse-with-animation" class="hs-collapse hidden md:flex items-center w-full md:w-auto">
            <div class="flex flex-col md:flex-row md:items-center md:gap-x-7">
                <a wire:navigate class="font-medium py-3 {{ request()->is('/') ? 'text-green-600 font-bold dark:text-green-400' : 'text-gray-500 hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-500' }}" href="/">Início</a>
                <a wire:navigate class="font-medium py-3 {{ request()->is('categories') ? 'text-green-600 font-bold dark:text-green-400' : 'text-gray-500 hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-500' }}" href="/categories">Categorias</a>
                <a wire:navigate class="font-medium py-3 {{ request()->is('products') ? 'text-green-600 font-bold dark:text-green-400' : 'text-gray-500 hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-500' }}" href="/products">Produtos</a>
                <a wire:navigate class="font-medium flex items-center py-3 {{ request()->is('cart') ? 'text-green-600 font-bold dark:text-green-400' : 'text-gray-500 hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-500' }}" href="/cart">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="flex-shrink-0 w-5 h-5 mr-1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                    </svg>
                    <span class="mr-1">Carrinho</span>
                    <span class="py-0.5 px-1.5 rounded-full text-xs font-medium bg-green-50 border border-green-200 text-green-600">{{$total_count}}</span>
                </a>    
                @guest
                <div class="pt-3 md:pt-0">
                    <a wire:navigate class="py-2.5 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-green-600 text-white hover:bg-green-700" href="/login">
                        <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                            <circle cx="12" cy="7" r="4" />
                        </svg>
                        Entrar
                    </a>
                </div>
                @endguest
            </div>
        </div>

        <!-- Dark/Light Mode Toggle Button -->
        <div class="flex items-center space-x-3">
            <button id="theme-toggle-button" class="p-2 bg-gray-200 text-gray-900 dark:bg-gray-800 dark:text-gray-100 rounded">
                <svg id="sun-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
                </svg>
                <svg id="moon-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 hidden">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z" />
                </svg>
            </button>
        </div>
    </nav>

    <!-- Dropdown Menu Outside the Navbar -->
    @auth
    <div class="relative flex items-center justify-end px-4 md:px-6 lg:px-8">
        <div class="relative group">
            <button type="button" class="flex items-center text-green-600 hover:text-green-500 dark:text-green-400 dark:hover:text-green-300 font-medium">
            
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                  </svg>
                  
            </button>
            <div class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out">
                <ul class="py-1 text-sm">
                    <li>
                        <a wire:navigate href="my-account" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700">Perfil</a>
                    </li>
                    <li>
                        <a wire:navigate href="{{url("my-orders")}}" wire:navigate class="block px-4 py-2 text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700">Pedidos</a>
                    </li>
                    <li>
                        <form method="POST" action="/logout">
                            @csrf
                            <button type="submit" class="block w-full px-4 py-2 text-left text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700">Sair</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    @endauth
</header>

<script>
    // Theme toggle button
    document.getElementById('theme-toggle-button').addEventListener('click', () => {
        document.documentElement.classList.toggle('dark');
        document.getElementById('sun-icon').classList.toggle('hidden');
        document.getElementById('moon-icon').classList.toggle('hidden');
    });

    // Mobile menu toggle
    document.querySelectorAll('.hs-collapse-toggle').forEach(button => {
        button.addEventListener('click', () => {
            const target = document.querySelector(button.getAttribute('data-hs-collapse'));
            target.classList.toggle('hidden');
        });
    });
</script>

