<!-- Header (Sticky) -->
<header class="bg-white shadow sticky top-0 z-50">
  <div class="container mx-auto px-4 py-4 flex justify-between items-center">
      <h1 class="text-2xl font-bold text-blue-600">MarketPlace</h1>
      <nav class="hidden md:flex space-x-4">
          <a href="#home" class="text-gray-600 hover:text-blue-600">Home</a>
          <a href="#categories" class="text-gray-600 hover:text-blue-600">Categories</a>
          <a href="#products" class="text-gray-600 hover:text-blue-600">Products</a>
      </nav>

      <!-- Desktop: Login/Logout -->
      <div class="hidden md:flex items-center space-x-4">
          @auth
              <span class="text-sm text-gray-700">Hello, {{ Auth::user()->name }}</span>
              <a href="{{ route('logout') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-400"
                 onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  Logout
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                  @csrf
              </form>
          @else
              <a href="{{ route('login') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-400">Login</a>
          @endauth
      </div>

      <!-- Mobile Menu Button -->
      <button id="menu-btn" class="block md:hidden">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
          </svg>
      </button>
  </div>

  <!-- Mobile Menu -->
  <div id="mobile-menu" class="hidden md:hidden bg-gray-100 overflow-hidden transition-all duration-300">
      <nav class="flex flex-col items-center space-y-2 py-4">
          <a href="#home" class="text-gray-600 hover:text-blue-600">Home</a>
          <a href="#categories" class="text-gray-600 hover:text-blue-600">Categories</a>
          <a href="#products" class="text-gray-600 hover:text-blue-600">Products</a>

          <!-- Profil User (Login/Logout) Outside Dropdown -->
          <div class="flex flex-col items-center mt-4 space-y-2">
              @auth
                  <p class="text-sm text-gray-700">Hello, {{ Auth::user()->name }}</p>
                  <a href="{{ route('logout') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-400"
                     onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      Logout
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                      @csrf
                  </form>
              @else
                  <a href="{{ route('login') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-400">Login</a>
              @endauth
          </div>

          {{-- <!-- Dropdown Button -->
          <div class="relative">
              <button id="dropdownButton" class="p-2 rounded-full bg-gray-200 hover:bg-gray-300 focus:outline-none">
                  <!-- Ikon -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M5.75 8.25L12 14.25L18.25 8.25" />
                  </svg>
              </button>

              <!-- Dropdown Menu -->
              <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg z-50 transition-all duration-300 ease-in-out transform scale-95">
                  @auth
                      <p class="px-4 py-2 text-sm text-gray-700">Hello, {{ Auth::user()->name }}</p>
                      <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                         onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                          Logout
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                          @csrf
                      </form>
                  @else
                      <a href="{{ route('login') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Login</a>
                      <a href="{{ route('register') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Register</a>
                  @endauth
              </div>
          </div> --}}
      </nav>
  </div>
</header>
