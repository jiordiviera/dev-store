<?php

namespace App\Filament\Resources\OrderResource\Widgets;

use App\Models\Order;
use Illuminate\Support\Number;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class OrdersStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Nouvelles Commandes', Order::query()->where('status', 'new')->count()),
            Stat::make('Commandes En Cours', Order::query()->where('status', 'processing')->count()),
            Stat::make('Commandes Payées', Order::query()->where('status', 'shipped')->count()),
            Stat::make('Prix moyen', Number::currency(Order::query()->sum('grand_total'), 'XAF')),
            Stat::make('Prix moyen', Number::currency(Order::query()->sum('grand_total'), 'XAF')),
        ];
    }
}
