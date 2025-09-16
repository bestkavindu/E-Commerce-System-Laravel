<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\OrderResource;
use App\Models\Order;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestOrders extends BaseWidget
{
    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(OrderResource::getEloquentQuery())
            ->defaultPaginationPageOption(5)
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('user.name'),
                TextColumn::make('grand_total')->numeric()->money('LKR'),
                TextColumn::make('payment_method')->badge(),
                TextColumn::make('payment_status'),
                SelectColumn::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'processing' => 'Procesing',
                        'completed' => 'Deliverd',
                        'cancelled' => 'Cancelled',
                    ]),
            ])
            ->actions([
                Action::make('View Order')
                    ->url(fn (Order $record): string => OrderResource::getUrl('view', ['record' => $record])),
            ]);

    }
}
