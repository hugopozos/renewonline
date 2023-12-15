<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmployeeResource\Pages;
use App\Filament\Resources\EmployeeResource\RelationManagers;
use App\Models\Employee;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Radio;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Table;
use App\Models\User;
USE App\Models\Service;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $modelLabel = 'Empleado';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')->label('Usuario')
                    ->options(User::all()->pluck('email', 'id'))
                    ->searchable()
                    ->required(),

                Select::make('service_id')->label('Servicio')
                    ->options(Service::all()->pluck('name', 'id'))
                    ->searchable()
                    ->required(),

                Radio::make('status')->label('Estado')
                    ->options([
                        1 => 'Activo',
                        0 => 'Inactivo',
                    ])
                    ->default(1)
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.email')->label('Nombre')
                    ->icon('heroicon-s-user')
                    ->description(fn (Employee $record): string => $record->user->name),

                TextColumn::make('service.name')->label('Servicio'),
                IconColumn::make('status')
                    ->boolean(),  
                    
                TextColumn::make('created_at')->label('Fecha de creación')
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
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }
}
