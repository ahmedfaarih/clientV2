<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClientCaseResource\Pages;
use App\Filament\Resources\ClientCaseResource\RelationManagers;
use App\Models\ClientCase;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ClientCaseResource extends Resource
{
    protected static ?string $model = ClientCase::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')
                ->label('Client')
                ->options(User::all()->pluck('name', 'id'))
                ->searchable(),
                Forms\Components\TextInput::make('case_no')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('case_detail')
                    ->required()
                    ->columnSpanFull(),
                SpatieMediaLibraryFileUpload::make('attachment')
                ->multiple()
                ->reorderable()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    // ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('case_no')
                    ->searchable(),
                Tables\Columns\TextColumn::make('case_detail')
                ->searchable(),    
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->modifyQueryUsing(function (Builder $query) { 
                if (auth()->user()->hasRole('Super Admin')) { 
                    return;
                }
                if (auth()->user()->hasRole('user')) { 
                    return $query->where('user_id', auth()->id()); 
                } 
            })
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
            'index' => Pages\ListClientCases::route('/'),
            'create' => Pages\CreateClientCase::route('/create'),
            'edit' => Pages\EditClientCase::route('/{record}/edit'),
        ];
    }
}
