<header class="flex z-50 sticky top-0 w-full bg-white text-sm py-3 dark:bg-gray-800 shadow-md">
    <nav class="max-w-[85rem] w-full mx-auto px-4 md:px-6 lg:px-8 flex items-center justify-between">
        <!-- Logo Placeholder -->
        <a href="/"  class="flex-none text-xl font-semibold text-green-600 dark:text-green-400"
            aria-label="Marca">
            <span class="font-bold">Logo</span>
        </a>

        <!-- Navbar Links for Larger Screens -->
        <div class="hidden md:flex space-x-6">
            <a href="/" 
                class="text-gray-700 dark:text-gray-200 hover:text-green-600 dark:hover:text-green-400">Início</a>
            <a href="{{ url('categories')}}"
                class="text-gray-700 dark:text-gray-200 hover:text-green-600 dark:hover:text-green-400">Categorias</a>
            <a href="{{url('products')}}"
                class="text-gray-700 dark:text-gray-200 hover:text-green-600 dark:hover:text-green-400">Produtos</a>
            <a href="{{url('about')}}"
                class="text-gray-700 dark:text-gray-200 hover:text-green-600 dark:hover:text-green-400">Sobre</a>
        </div>

        <!-- Dark/Light Mode Toggle Button -->
        <div class="flex items-center space-x-3">
            <button id="theme-toggle-button"
                class="p-2 bg-gray-200 text-gray-900 dark:bg-gray-800 dark:text-gray-100 rounded">
                <svg id="sun-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
                </svg>
                <svg id="moon-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="size-6 hidden">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z" />
                </svg>
            </button>
        </div>

        <!-- Mobile Menu Toggle Button -->
        <button id="mobile-menu-toggle" class="md:hidden flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 6h18M3 12h18m-9 6h9" />
            </svg>
        </button>

        <!-- Cart and User Buttons -->
        <div class="flex items-center space-x-4">
            <a 
                class="font-medium flex items-center py-3 {{ request()->is('cart') ? 'text-green-600 font-bold dark:text-green-400' : 'text-gray-500 hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-500' }}"
                href="/cart">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="flex-shrink-0 w-5 h-5 mr-1">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                </svg>
                <span class="mr-1"></span>
                <span
                    class="py-0.5 px-1.5 rounded-full text-xs font-medium bg-green-50 border border-green-200 text-green-600">{{ $total_count }}</span>
            </a>

            <!-- Conditional User Button / Login Button -->
            @auth
                <div class="relative group">
                    <button type="button"
                        class="flex items-center text-green-600 hover:text-green-500 dark:text-green-400 dark:hover:text-green-300 font-medium">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 12c2.7 0 5 2.3 5 5v3h-2v-3a3 3 0 0 0-6 0v3H7v-3c0-2.7 2.3-5 5-5zm0 0a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                        </svg>
                    </button>
                    <div
                        class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out">
                        <ul class="py-1 text-sm">
                            <li>
                                <a  href="my-account"
                                    class="block px-4 py-2 text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700">Perfil</a>
                            </li>
                            <li>
                                <a  href="{{ url('my-orders') }}"
                                    class="block px-4 py-2 text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700">Pedidos</a>
                            </li>
                            <li>
                                <form method="POST" action="/logout">
                                    @csrf
                                    <button type="submit"
                                        class="block w-full px-4 py-2 text-left text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700">Sair</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            @else
                <a href="/login" class="text-gray-700 dark:text-gray-200 hover:text-green-600 dark:hover:text-green-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 12c2.7 0 5 2.3 5 5v3h-2v-3a3 3 0 0 0-6 0v3H7v-3c0-2.7 2.3-5 5-5zm0 0a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                    </svg>
                    
                </a>
            @endauth
        </div>
    </nav>

    <!-- Sidebar for Mobile -->
    <div id="mobile-sidebar" class="fixed inset-0 z-40 hidden">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="absolute left-0 top-0 w-64 h-full bg-white dark:bg-gray-800 p-4">
            <button id="close-sidebar" class="text-gray-700 dark:text-gray-200 absolute top-4 right-4">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <ul class="space-y-4">
                <li>
                    <a href="{{url('/')}}" class="block text-gray-700 dark:text-gray-200">Início</a>
                </li>
                <li>
                    <a href="{{url('categories')}}" class="block text-gray-700 dark:text-gray-200">Categorias</a>
                </li>
                <li>
                    <a href="{{url('products')}}" class="block text-gray-700 dark:text-gray-200">Produtos</a>
                </li>
                <li>
                    <a href="{{url('about')}}" class="block text-gray-700 dark:text-gray-200">Sobre</a>
                </li>
                @auth
                    <li>
                        <a  href="{{url('my-account')}}" class="block text-gray-700 dark:text-gray-200">Perfil</a>
                    </li>
                    <li>
                        <a  href="{{ url('my-orders') }}"
                            class="block text-gray-700 dark:text-gray-200">Pedidos</a>
                    </li>
                    <li>
                        <form method="POST" action="/logout">
                            @csrf
                            <button type="submit" class="block w-full text-gray-700 dark:text-gray-200">Sair</button>
                        </form>
                    </li>
                @else
                    <li>
                        <a href="{{url('login')}}" class="block text-gray-700 dark:text-gray-200">Entrar</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</header>

<script></script>
