<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Kolom ID otomatis
            $table->string('name'); // Nama produk
            $table->text('description')->nullable(); // Deskripsi produk, bisa null
            $table->decimal('price', 10, 2); // Harga produk dengan 2 desimal
            $table->string('category'); // Kategori produk
            $table->string('image')->nullable(); // Nama file gambar produk, bisa null
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
