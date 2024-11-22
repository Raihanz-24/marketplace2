<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    // Tentukan tabel yang digunakan
    protected $table = 'products';

    // Tentukan kolom yang dapat diisi
    protected $fillable = [
        'name',
        'description',
        'price',
        'category',
        'image',
    ];

    // Cast tipe data untuk kolom tertentu
    protected $casts = [
        'price' => 'decimal:2',
    ];
}
