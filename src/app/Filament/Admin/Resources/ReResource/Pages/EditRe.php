<?php

namespace App\Filament\Admin\Resources\ReResource\Pages;

use App\Filament\Admin\Resources\ReResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRe extends EditRecord
{
    protected static string $resource = ReResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
