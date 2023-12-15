<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceRequestResource\Pages;
use App\Filament\Resources\ServiceRequestResource\RelationManagers;
use App\Models\ServiceRequest;
use App\Models\User;
use App\Models\Service;
use App\Models\Employee;
use Filament\Forms;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ServiceRequestResource extends Resource
{
    protected static ?string $model = ServiceRequest::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?string $modelLabel = 'Solicitudes de servicio';


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

                Select::make('employee_id')->label('Empleado')
                    ->options(Employee::all()->pluck('user.email', 'id'))
                    ->searchable()
                    ->required(),

                Radio::make('status')->label('Estado')
                    ->options([
                        'pendiente' => 'Pendiente',
                        'en proceso' => 'En proceso',
                        'finalizado' => 'Finalizado',
                        'reportado' => 'Reportado',
                    ])
                    ->default(1)
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.email')->label('Usuario'),
                TextColumn::make('user.address')->label('Dirección'),
                TextColumn::make('user.city')->label('Residencia')
                    ->description(fn (ServiceRequest $record): string => $record->user->country),

                TextColumn::make('service.name')->label('Servicio'),
                TextColumn::make('employee.user.name')->label('Empleado'),
                TextColumn::make('status')->label('Estado')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pendiente' => 'gray',
                        'en proceso' => 'warning',
                        'finalizado' => 'success',
                        'reportado' => 'danger',
                    }),

                TextColumn::make('created_at')->label('Solicitado el')
                    ->dateTime(),
                
                TextColumn::make('updated_at')->label('Ultima vez actualizado')
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
            'index' => Pages\ListServiceRequests::route('/'),
            'create' => Pages\CreateServiceRequest::route('/create'),
            'edit' => Pages\EditServiceRequest::route('/{record}/edit'),
        ];
    }
}
