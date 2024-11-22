<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Product;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ProductResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProductResource\RelationManagers;


class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            // Input Nama Produk
            TextInput::make('name')
                ->label('Nama Produk')
                ->required()
                ->maxLength(255),

            // Textarea untuk Deskripsi
            Textarea::make('description')
                ->label('Deskripsi Produk')
                ->rows(5)
                ->maxLength(65535),

            // Input Harga
            TextInput::make('price')
                ->label('Harga Produk')
                ->numeric()
                ->required()
                ->prefix('Rp') // Menambahkan simbol Rupiah
                ->rule('min:0'),

            // Dropdown Kategori
            Select::make('category')
                ->label('Kategori')
                ->required()
                ->options([
                    'elektronik' => 'Elektronik',
                    'pakaian'    => 'Pakaian',
                    'makanan'    => 'Makanan',
                    'lainnya'    => 'Lainnya',
                ]),

                FileUpload::make('image')
                ->label('Gambar Produk')
                ->image() // Pastikan tipe file adalah gambar
                ->directory('product-images') // Folder penyimpanan gambar
                ->maxSize(2024) // Maksimal ukuran file 1MB
                // ->enableDownload(); // Memungkinkan unduhan file yang diunggah
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            // Kolom Gambar Produk
            ImageColumn::make('image')
                ->label('Gambar')
                ->size(50)
                ->circular(), // Membuat gambar berbentuk lingkaran

            // Kolom Nama Produk
            TextColumn::make('name')
                ->label('Nama Produk')
                ->searchable()
                ->sortable(),

            // Kolom Harga Produk
            TextColumn::make('price')
                ->label('Harga')
                ->money('idr', true) // Format harga ke Rupiah
                ->sortable(),

            // Kolom Kategori Produk
            BadgeColumn::make('category')
                ->label('Kategori')
                ->sortable()
                ->colors([
                    'success' => 'elektronik',
                    'warning' => 'pakaian',
                    'primary' => 'makanan',
                    'secondary' => 'lainnya',
                ]),

            // Kolom Tanggal Dibuat
            TextColumn::make('created_at')
                ->label('Dibuat Pada')
                ->dateTime('d M Y H:i')
                ->sortable(),
        ])
        ->filters([
            // Filter Berdasarkan Kategori
            Tables\Filters\SelectFilter::make('category')
                ->label('Kategori')
                ->options([
                    'elektronik' => 'Elektronik',
                    'pakaian'    => 'Pakaian',
                    'makanan'    => 'Makanan',
                    'lainnya'    => 'Lainnya',
                ]),
        ])
       
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
