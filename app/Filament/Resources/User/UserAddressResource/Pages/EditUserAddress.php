<?php

namespace App\Filament\Resources\User\UserAddressResource\Pages;

use App\Filament\Resources\User\UserAddressResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUserAddress extends EditRecord
{
    protected static string $resource = UserAddressResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
