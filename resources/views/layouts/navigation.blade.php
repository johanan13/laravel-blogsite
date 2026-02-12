<nav class="bg-white dark:bg-gray-800 shadow-md">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-4">
            <a href="/" class="text-xl font-bold text-gray-800 dark:text-gray-200">Blogsite</a>
            <div>
                @guest
                    {{-- Show Login link only when on Home page --}}
                    @if (request()->is('/'))
                        <a href="/login" class="text-gray-500 dark:text-gray-300 hover:text-gray-800 dark:hover:text-gray-200 px-3 py-2">Login </a>
                    @endif

                    {{-- If user is on login or register page --}}
                    @if (request()->is('login') || request()->is('register'))
                        <a href="/" class="text-gray-500 dark:text-gray-300 hover:text-gray-800 dark:hover:text-gray-200 px-3 py-2"> Home </a>
                    @endif
                @endguest
                @auth
                    <form action="/logout" method="POST" class="inline">
                        @csrf
                        <button type="submit" onclick="return confirm('Are you sure you want to log out?')" class="text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-gray-200 px-3 py-2">Logout</button>
                    </form>
                @endauth
            </div>
        </div>
    </div>
</nav>