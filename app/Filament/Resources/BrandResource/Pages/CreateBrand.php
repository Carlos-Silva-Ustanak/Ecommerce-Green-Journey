<?php
namespace App\Filament\Resources\BrandResource\Pages;

use App\Models\Brand;
use App\Utils\FileMover;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Filament\Resources\BrandResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBrand extends CreateRecord
{
    protected static string $resource = BrandResource::class;

 
}
