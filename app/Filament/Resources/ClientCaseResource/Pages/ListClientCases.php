<?php

namespace App\Filament\Resources\ClientCaseResource\Pages;

use App\Filament\Resources\ClientCaseResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListClientCases extends ListRecords
{
    protected static string $resource = ClientCaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
