<?php

namespace App\Filament\Resources\User\UserAddressResource\Pages;

use App\Filament\Resources\User\UserAddressResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUserAddresses extends ListRecords
{
    protected static string $resource = UserAddressResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
