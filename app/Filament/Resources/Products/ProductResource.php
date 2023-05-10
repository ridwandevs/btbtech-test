<?php

namespace App\Filament\Resources\Products;

use App\Filament\Resources\Products\ProductResource\Pages;
use App\Filament\Resources\Products\ProductResource\RelationManagers;
use App\Models\Products\Product;
use App\Models\Products\ProductCategory;
use Closure;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('product_category_id')->options(ProductCategory::all()->pluck('category_name', 'id'))
                    ->required(),
                Forms\Components\TextInput::make('product_title')
                    ->reactive()
                    ->afterStateUpdated(function (Closure $set, $state) {
                        $set('slug', Str::slug($state));
                    })
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('prodcut_decsription')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('product_price')->numeric()
                ->mask(fn (TextInput\Mask $mask) => $mask
                    ->numeric()
                    ->decimalPlaces(2) // Set the number of digits after the decimal point.
                    ->decimalSeparator(',') // Add a separator for decimal numbers.
                    ->integer() // Disallow decimal numbers.
                    ->mapToDecimalSeparator([',']) // Map additional characters to the decimal separator.
                    ->minValue(1) // Set the minimum value that the number can be.
                    ->maxValue(100) // Set the maximum value that the number can be.
                    ->normalizeZeros() // Append or remove zeros at the end of the number.
                    ->padFractionalZeros() // Pad zeros at the end of the number to always maintain the maximum number of decimal places.
                    ->thousandsSeparator(','), // Add a separator for thousands.  
                )->required(),
                Forms\Components\TextInput::make('product_stock')->numeric()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('product_category_id'),
                Tables\Columns\TextColumn::make('product_title'),
                Tables\Columns\TextColumn::make('slug'),
                Tables\Columns\TextColumn::make('prodcut_decsription'),
                Tables\Columns\TextColumn::make('product_price'),
                Tables\Columns\TextColumn::make('product_stock'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
