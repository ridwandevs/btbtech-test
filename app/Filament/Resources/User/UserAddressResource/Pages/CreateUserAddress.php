<?php

namespace App\Filament\Resources\User\UserAddressResource\Pages;

use App\Filament\Resources\User\UserAddressResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUserAddress extends CreateRecord
{
    protected static string $resource = UserAddressResource::class;
}
