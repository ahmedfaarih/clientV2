<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DocumentRequestResource\Pages;
use App\Filament\Resources\DocumentRequestResource\RelationManagers;
use App\Models\DocumentRequest;
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
use Illuminate\Support\Facades\Auth;

class DocumentRequestResource extends Resource
{
    protected static ?string $model = DocumentRequest::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Select::make('user_id')
            ->label('Client')
            ->options(User::all()->pluck('name', 'id'))
            ->searchable(),
            Forms\Components\TextInput::make('detail')
                ->required()
                ->maxLength(255),
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
            Tables\Columns\TextColumn::make('detail')
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
            'index' => Pages\ListDocumentRequests::route('/'),
            'create' => Pages\CreateDocumentRequest::route('/create'),
            'edit' => Pages\EditDocumentRequest::route('/{record}/edit'),
            'upload' => Pages\UploadDocumentRequest::route('/{record}/upload'),
        ];
    }
}
