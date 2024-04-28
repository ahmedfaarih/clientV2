<?php

namespace App\Filament\Resources\CaseUpdateResource\Pages;

use App\Filament\Resources\CaseUpdateResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCaseUpdates extends ListRecords
{
    protected static string $resource = CaseUpdateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
