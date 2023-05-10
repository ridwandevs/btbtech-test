<?php

namespace App\Filament\Resources\Products\ProductCategoryResource\Pages;

use App\Filament\Resources\Products\ProductCategoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProductCategory extends CreateRecord
{
    protected static string $resource = ProductCategoryResource::class;
}
