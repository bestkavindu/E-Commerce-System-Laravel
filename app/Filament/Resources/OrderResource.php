<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use App\Models\Product;
use BcMath\Number;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Number as SupportNumber;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    Section::make('Order Information')->schema([
                        Select::make('user_id')
                            ->label('User')
                            ->relationship('user', 'name')
                            ->required()
                            ->preload(),
                        Select::make('payment_method')
                            ->options([
                                'strip' => 'Stripe',
                                'cod' => 'Cash on Deleivery'
                            ])
                            ->required(),
                        Select::make('payment_status')
                            ->options([
                                'pending' => 'Pending',
                                'paid' => 'Paid',
                                'faild' => ' Faild'
                            ])
                            ->default('pending')
                            ->required(),
                        ToggleButtons::make('status')
                            ->inline()
                            ->default('pending')
                            ->required()
                            ->options([
                                'pending' => 'Pending',
                                'processing' => 'Procesing',
                                'completed' => 'Deliverd',
                                'cancelled' => 'Cancelled'
                            ])
                            ->colors([
                                'pending' => 'info',
                                'processing' => 'success',
                                'completed' => 'success',
                                'cancelled' => 'danger'
                            ]),
                        Select::make('currency')
                            ->required()
                            ->options([
                                'lkr' => 'LKR',
                                'usd' => 'USD'
                            ])
                            ->default('lkr'),
                        Select::make('shipment_method')
                            ->required()
                            ->options([
                                'fedex' => 'FedEx',
                                'postal' => ' Postal'
                            ]),
                        Textarea::make('notes')
                            ->columnSpanFull()
                    ])->columns(2),
                    Section::make('Orders Item')
                        ->schema([
                            Repeater::make('items')
                                ->relationship()
                                ->schema([
                                    Select::make('product_id')
                                        ->relationship('product', 'name')
                                        ->searchable()
                                        ->preload()
                                        ->distinct()
                                        ->disableOptionsWhenSelectedInSiblingRepeaterItems()
                                        ->columnSpan(3)
                                        ->reactive()
                                        ->afterStateUpdated(fn($state, Set $set) => $set('unit_amount', Product::find($state)?->price ?? 0))
                                        ->afterStateUpdated(fn($state, Set $set) => $set('total_amount', Product::find($state)?->price ?? 0)),
                                    TextInput::make('quantity')
                                        ->default(1)
                                        ->minValue(1)
                                        ->numeric()
                                        ->columnSpan(3)
                                        ->reactive()
                                        ->afterStateUpdated(fn($state, Set $set, Get $get) => $set('total_amount', $state * $get('unit_amount'))),
                                    TextInput::make('unit_amount')
                                        ->numeric()
                                        ->required()
                                        ->disabled()
                                        ->dehydrated()
                                        ->columnSpan(3),
                                    TextInput::make('total_amount')
                                        ->numeric()
                                        ->required()
                                        ->disabled()
                                        ->dehydrated()
                                        ->columnSpan(3),
                                ])->columns(12),
                            Placeholder::make('grand_total')
                                ->label('Grand Total')
                                ->content(function (Get $get, Set $set) {
                                    $total = 0;
                                    if (!$repeaters = $get('items')) {
                                        return $total;
                                    }
                                    foreach ($repeaters as $key => $repeaters) {
                                        $total += $get("items.{$key}.total_amount");
                                    }
                                    $set('grand_total', $total);
                                    return SupportNumber::currency($total, 'LKR');
                                }),
                            Hidden::make('grand_total')
                                ->default(0)



                        ])
                ])->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name'),
                TextColumn::make('grand_total')->numeric()->money('LKR'),
                TextColumn::make('payment_method'),
                TextColumn::make('payment_status'),
                SelectColumn::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'processing' => 'Procesing',
                        'completed' => 'Deliverd',
                        'cancelled' => 'Cancelled'
                    ]),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'view' => Pages\ViewOrder::route('/{record}'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
