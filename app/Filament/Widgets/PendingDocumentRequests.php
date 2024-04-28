<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\DocumentRequestResource\Pages\EditDocumentRequest;
use App\Models\DocumentRequest;
use App\Models\User;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Model;

class PendingDocumentRequests extends BaseWidget
{
    public function table(Table $table): Table
    {
        $user = auth()->user();

        return $table
            ->query(
                DocumentRequest::query()
                ->where('status' , 'pending')
                ->whereIn('user_id', function ($query) use ($user) {
                    $query->select('id')
                        ->from((new User())->getTable())
                        ->where('user_id', $user->id);
                })
                ->latest()
                ->limit(5)
            )
            ->columns([
            TextColumn::make('detail')->label('Document request detail')
            ->numeric()
            ->sortable(),
            TextColumn::make('status')->label('Status')
            ->numeric()
            ->sortable(),     
            TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->recordUrl(
                fn (Model $record): string => EditDocumentRequest::getUrl([$record->id]),
            );
    }
}
