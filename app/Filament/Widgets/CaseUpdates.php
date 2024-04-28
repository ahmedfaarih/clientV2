<?php

namespace App\Filament\Widgets;

use App\Models\CaseUpdate;
use App\Models\ClientCase;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Resources\CustomerResource\Pages;
use App\Filament\Resources\DocumentRequestResource\Pages\EditDocumentRequest;
use Illuminate\Support\Facades\Auth;

class CaseUpdates extends BaseWidget
{
    public function table(Table $table): Table
    {
        $user = auth()->user();

        return $table
            ->query(
                 CaseUpdate::query()
                ->whereIn('client_case_id', function ($query) use ($user) {
                    $query->select('id')
                        ->from((new ClientCase())->getTable())
                        ->where('user_id', $user->id);
                })
                ->latest()
                ->limit(5)
            )
            ->columns([
                TextColumn::make('clientCase.case_no')
                    ->numeric()
                    ->sortable(), 
                
                TextColumn::make('clientCase.user.name')->label('Client')
                    ->numeric()
                    ->sortable(), 
                TextColumn::make('case_update')->label('Latest update')
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
            ]);
            

    }

    public static function canView(): bool
    {
        $user = Auth::user();
        return $user && $user->hasRole('user');
    }
}
