<?php

namespace App\Filament\Resources\ClientCaseResource\Pages;

use App\Filament\Resources\ClientCaseResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditClientCase extends EditRecord
{
    protected static string $resource = ClientCaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
