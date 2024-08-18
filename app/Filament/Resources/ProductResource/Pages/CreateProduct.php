<?php

namespace App\Filament\Resources\ProductResource\Pages;

use Filament\Actions;
use App\Utils\FileMover;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\ProductResource;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;
}
