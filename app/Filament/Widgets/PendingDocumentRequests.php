<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\DocumentRequestResource\Pages\EditDocumentRequest;
use App\Filament\Resources\DocumentRequestResource\Pages\UploadDocumentRequest;
use App\Models\DocumentRequest;
use App\Models\User;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class PendingDocumentRequests extends BaseWidget
{
    public function table(Table $table): Table
    {
        $user = auth()->user();

        return $table
            ->query(
                // DocumentRequest::query()
                // ->where('status' , 'pending')
                // ->whereIn('user_id', function ($query) use ($user) {
                //     $query->select('id')
                //         ->from((new User())->getTable())
                //         ->where('user_id', $user->id);
                // })
                // ->latest()
                // ->limit(5)

                DocumentRequest::query()
            ->where('status', 'pending')
            ->where('user_id', $user->id)  // This directly filters DocumentRequests based on the logged-in user ID
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
            ->recordUrl(fn (Model $record): string => UploadDocumentRequest::getUrl([$record->id]));
    }

    public static function canView(): bool
    {
        $user = Auth::user();
        return $user && $user->hasRole('user');
    }
}
