<!-- resources/views/home.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome to the Marketplace') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Produk Section -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach ($products as $product)
                    <div class="bg-white border rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow">
                        <img src="{{ asset('storage/products/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-64 object-cover">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-gray-900">{{ $product->name }}</h3>
                            <p class="text-sm text-gray-600 mt-2">{{ $product->description }}</p>
                            <div class="flex justify-between items-center mt-4">
                                <span class="text-xl font-bold text-green-600">{{ 'Rp' . number_format($product->price, 0, ',', '.') }}</span>
                                @auth
                                    <a href="{{ route('buy', $product->id) }}" class="text-white bg-blue-500 px-4 py-2 rounded-lg hover:bg-blue-600 transition">Beli</a>
                                @else
                                    <a href="{{ route('login') }}" class="text-white bg-blue-500 px-4 py-2 rounded-lg hover:bg-blue-600 transition">Login to Buy</a>
                                @endauth
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    
</x-app-layout>
