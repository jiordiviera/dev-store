<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\OrderResource;
use App\Models\Order;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestOrders extends BaseWidget
{

    protected int|string|array $columnSpan = 'full';
    protected static ?int $sort = 2;

    public function table(Table $table): Table
    {
        return $table
            ->query(
                OrderResource::getEloquentQuery()
            )
            ->defaultPaginationPageOption(5)
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID Commande')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->searchable(),

                Tables\Columns\TextColumn::make('grand_total')
                    ->money('XAF'),

                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'new' => 'info',
                        'processing' => 'warning',
                        'delivered', 'shipped' => 'success',
                        'cancelled' => 'danger',
                    })
                    ->icon(fn(string $state): string => match ($state) {
                        'new' => 'heroicon-m-sparkles',
                        'processing' => 'heroicon-m-arrow-path',
                        'shipped' => 'heroicon-m-truck',
                        'delivered' => 'heroicon-o-check-badge',
                        'cancelled' => 'heroicon-o-x-circle',
                    })
                    ->sortable(),
                Tables\Columns\TextColumn::make('payment_method')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('payment_status')
                    ->sortable()
                    ->badge()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Date de commande')
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: true),

            ])
        ->actions([
            Tables\Actions\Action::make('Voir la commande')
            ->url(fn (Order $record): string => OrderResource::getUrl('view', ['record' => $record->id]))
            ->icon('heroicon-m-eye')
        ]);
    }
}
