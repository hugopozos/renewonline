<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Hash;
use Filament\Infolists\Components\TextEntry;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $modelLabel = 'Cliente';
    

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->label('Nombre completo')
                    ->required()
                    ->autofocus(),

                TextInput::make('email')->label('Correo electrónico')
                    ->email()
                    ->required(),

                TextInput::make('phone')->label('Teléfono')
                    ->required(),

                TextInput::make('address')->label('Dirección')
                    ->required(),

                TextInput::make('city')->label('Ciudad')
                    ->required(),

                TextInput::make('state')->label('Estado')  
                    ->required(),  

                TextInput::make('country')->label('País')
                    ->required(),

                TextInput::make('password')->label('Contraseña')
                    ->password()
                    ->autocomplete('new-password')
                    ->dehydrateStateUsing(fn (string $state): string => Hash::make($state))
                    ->dehydrated(fn (?string $state): bool => filled($state))
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Nombre')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('email')->label('Correo')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('phone')->label('Teléfono'),
                TextColumn::make('address')->label('Dirección'),
                TextColumn::make('city')->label('Ciudad'),
                TextColumn::make('state')->label('Estado'),
                TextColumn::make('created_at')->label('Fecha de creación')
                    ->sortable()
                    ->dateTime(),

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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
