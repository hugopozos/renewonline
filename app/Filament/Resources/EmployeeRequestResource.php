<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmployeeRequestResource\Pages;
use App\Filament\Resources\EmployeeRequestResource\RelationManagers;
use App\Models\EmployeeRequest;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
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
use App\Models\Service;
use App\Models\Employee;
use Filament\Tables\Actions\Action;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EmployeeRequestResource extends Resource
{
    protected static ?string $model = EmployeeRequest::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard';

    protected static ?string $modelLabel = 'Solicitudes de empleo';


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
                        'pendiente' => 'Pendiente',
                    ])
                    ->default('pendiente')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.email')->label('Usuario'),
                TextColumn::make('service.name')->label('Servicio'),
                TextColumn::make('status')->label('Estado')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pendiente' => 'gray',
                        'aprobado' => 'success',
                        'rechazado' => 'danger',
                    }),
                
                TextColumn::make('created_at')->label('Fecha de creación')
                    ->dateTime(),

            ])
            ->filters([
                //
            ])
            ->actions([
                //Tables\Actions\EditAction::make(),

                Action::make('aprobar')
                    ->requiresConfirmation()
                    ->button()
                    ->icon('heroicon-o-check-circle')
                    ->fillForm(fn (EmployeeRequest $record): array => [
                        'status' => $record->status
                    ])
                    ->form([
                        Select::make('status')->label('Estado')
                            ->options([
                                'aprobado' => 'Aprobado',
                                'rechazado' => 'Rechazado',
                            ])
                            ->default('aprobado')
                            ->required(),
                    ])
                    ->action(function (array $data, EmployeeRequest $record): void {
                        $record->fill($data);
                        $record->save();

                        if($record->status == 'aprobado'){
                            Employee::create([
                                'user_id' => $record->user_id,
                                'service_id' => $record->service_id,
                                'status' => 1,
                            ]);
                        }
                        
                    }),
                
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
            'index' => Pages\ListEmployeeRequests::route('/'),
            'create' => Pages\CreateEmployeeRequest::route('/create'),
            'edit' => Pages\EditEmployeeRequest::route('/{record}/edit'),
        ];
    }
}
