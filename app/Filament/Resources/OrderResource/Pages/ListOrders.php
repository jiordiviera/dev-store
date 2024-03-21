<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;

class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            OrderResource\Widgets\OrdersStats::class,
        ];
    }

    public function getTabs(): array
    {
        return [
            null => Tab::make('Tous'),
            'new' => Tab::make('Nouvelles Commandes')->query(fn($query) => $query->where('status', 'new')),
            'processing' => Tab::make('Commandes En Cours')->query(fn($query) => $query->where('status', 'processing')),
            'shipped' => Tab::make('Commandes Payées')->query(fn($query) => $query->where('status', 'shipped')),
            'delivered' => Tab::make('Commandes Livrees')->query(fn($query) => $query->where('status', 'delivered')),
            'canceled' => Tab::make('Commandes Annulées')->query(fn($query) => $query->where('status', 'canceled')),
        ];
    }
}
