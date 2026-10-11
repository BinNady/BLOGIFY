<header class="bg-white shadow-md sticky top-0 z-50">
    <nav class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        
        <!-- Logo -->
        <a href="/" class="text-3xl font-normal tracking-wide logo-title">
            BLOGIFY
        </a>

        <!-- Burger Button (Mobile) -->
        <button id="menu-btn" 
                class="lg:hidden block text-gray-700 focus:outline-none text-3xl">
            ☰
        </button>

        <!-- Nav Links (Desktop) -->
        <ul class="hidden lg:flex items-center space-x-6 text-gray-700 font-medium">
            <li>
                <a href="{{ route('posts.index') }}" class="hover:text-blue-600 transition-colors">Home</a>
            </li>
            @auth
                <li>
                    <a href="{{ route('posts.create') }}" class="hover:text-blue-600 transition-colors">Create Post</a>
                </li>

                <!-- Profile Dropdown -->
                <li class="relative group">
                    <button class="flex items-center space-x-2 text-gray-700 hover:text-blue-600">
                        👤 {{ Auth::user()->name }}
                        <svg class="w-4 h-4 transform group-hover:rotate-180 transition-transform" 
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <!-- Dropdown Menu -->
                    <div class="absolute right-0 mt-2 w-40 bg-white border rounded-lg shadow-lg opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-all">
                        <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-50">Profile</a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-red-500 hover:bg-red-50">Logout</button>
                        </form>
                    </div>
                </li>
            @endauth

            @guest
                <li>
                    <a href="{{ route('login') }}" class="hover:text-blue-600 transition-colors">Login</a>
                </li>
                <li>
                    <a href="{{ route('register') }}" class="hover:text-blue-600 transition-colors">Register</a>
                </li>
            @endguest
        </ul>
    </nav>

    <!-- Mobile Menu (Slide Drawer) -->
    <div id="mobile-menu" 
         class="fixed top-0 right-0 h-full w-64 bg-white shadow-lg transform translate-x-full transition-transform duration-300 z-50">
        <div class="p-6 flex flex-col space-y-6 text-gray-700 font-medium">
            <button id="close-menu" class="self-end text-2xl">✕</button>
            
            <a href="{{ route('posts.index') }}" class="hover:text-blue-600">Home</a>
            @auth
                <a href="{{ route('posts.create') }}" class="hover:text-blue-600">Create Post</a>
                <a href="{{ route('profile.show') }}" class="hover:text-blue-600">Profile</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="hover:text-red-500">Logout</button>
                </form>
            @endauth

            @guest
                <a href="{{ route('login') }}" class="hover:text-blue-600">Login</a>
                <a href="{{ route('register') }}" class="hover:text-blue-600">Register</a>
            @endguest
        </div>
    </div>
</header>

<script>
    const menuBtn = document.getElementById('menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    const closeMenu = document.getElementById('close-menu');

    menuBtn.addEventListener('click', () => {
        mobileMenu.classList.remove('translate-x-full');
        mobileMenu.classList.add('translate-x-0');
    });

    closeMenu.addEventListener('click', () => {
        mobileMenu.classList.add('translate-x-full');
        mobileMenu.classList.remove('translate-x-0');
    });
</script>
