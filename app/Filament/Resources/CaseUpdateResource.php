<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CaseUpdateResource\Pages;
use App\Filament\Resources\CaseUpdateResource\RelationManagers;
use App\Models\CaseUpdate;
use App\Models\ClientCase;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CaseUpdateResource extends Resource
{
    protected static ?string $model = CaseUpdate::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('client_case_id')
                ->label('Case')
                ->options(ClientCase::all()->pluck('case_no', 'id'))
                ->searchable(),
                Forms\Components\Textarea::make('case_update')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('clientCase.case_no')
                    ->numeric()
                    ->sortable(), 
                
                Tables\Columns\TextColumn::make('clientCase.user.name')->label('Client')
                    ->numeric()
                    ->sortable(), 
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCaseUpdates::route('/'),
            'create' => Pages\CreateCaseUpdate::route('/create'),
            'edit' => Pages\EditCaseUpdate::route('/{record}/edit'),
        ];
    }
}
