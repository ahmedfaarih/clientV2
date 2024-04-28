<?php

namespace App\Filament\Resources\CaseUpdateResource\Pages;

use App\Filament\Resources\CaseUpdateResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCaseUpdate extends EditRecord
{
    protected static string $resource = CaseUpdateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
