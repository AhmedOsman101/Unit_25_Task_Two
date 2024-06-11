<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RequestResource\Pages;
use App\Models\RequestModel;
use App\Models\Service;
use App\Models\User;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class RequestResource extends Resource {
    protected static ?string $model = RequestModel::class;
    protected static ?string $modelLabel = 'Request';
    protected static ?string $navigationIcon = 'heroicon-o-inbox-arrow-down';

    public static function form(Form $form): Form {

        // Fetch all users
        $users = User::all()->pluck('name', 'id')->toArray();

        // Fetch all services
        $services = Service::all()->pluck('name', 'id')->toArray();

        return $form
            ->schema([
                Textarea::make('description')
                    ->maxLength(255)
                    ->required()
                    ->disabled(fn ($record) => $record && $record->status !== 'pending'),
                Select::make('status') // Add a select input for category
                    ->label('Request Status') // Set label
                    ->options([
                        'pending' => 'Pending',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                    ]) // the admin can only toggle between completed and pending status
                    ->disabled(fn ($record) => $record && $record->status !== 'pending'),

                Select::make('user_id') // Add a select input for user
                    ->label('User') // Set label
                    ->options($users) // Set options fetched from category model
                    ->required()
                    ->disabled(fn ($record) => $record && $record->status !== 'pending'), // Make it required if necessary
                Select::make('service_id') // Add a select input for service
                    ->label('Service') // Set label
                    ->options($services) // Set options fetched from service model
                    ->required()
                    ->disabled(fn ($record) => $record && $record->status !== 'pending'), // Make it required if necessary

            ]);
    }

    public static function table(Table $table): Table {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('description')
                    ->limit(45)
                    ->tooltip(function (TextColumn $column): ?string {
                        $state = $column->getState();
                        if (strlen($state) <= $column->getCharacterLimit()) return null;
                        // Only render the tooltip if the column content exceeds the length limit.
                        return $state;
                    }),
                TextColumn::make('user.name')->sortable(),
                TextColumn::make('service.name')->sortable(),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'completed' => 'success',
                        'cancelled' => 'danger',
                    })
                    ->sortable()
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

    public static function getRelations(): array {
        return [
            //
        ];
    }

    public static function getPages(): array {
        return [
            'index' => Pages\ListRequests::route('/'),
            'create' => Pages\CreateRequest::route('/create'),
            'edit' => Pages\EditRequest::route('/{record}/edit'),
        ];
    }
}
