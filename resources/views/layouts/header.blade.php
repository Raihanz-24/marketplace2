<header class="bg-gray-800 text-white py-4">
    <div class="container mx-auto flex justify-between items-center">
        <a href="{{ route('home') }}" class="text-2xl font-bold">Marketplace</a>
        <nav>
            <ul class="flex space-x-4">
                <li><a href="{{ route('home') }}" class="hover:text-blue-400">Home</a></li>
                <li><a href="{{ route('login') }}" class="hover:text-blue-400">Login</a></li>
                <li><a href="{{ route('register') }}" class="hover:text-blue-400">Register</a></li>
            </ul>
        </nav>
    </div>
</header>
