<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    Section::make('Product Information')->schema([
                        TextInput::make('name')
                            ->required()
                            ->live()
                            ->afterStateUpdated(fn(string $operation, $state, Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null)
                            ->maxLength(255),
                        TextInput::make('slug')
                            ->unique(Product::class, ignoreRecord: true)
                            ->disabled()
                            ->dehydrated()
                            ->maxLength(255),
                        MarkdownEditor::make('description')
                            ->required()
                            ->columnSpanFull()
                            ->fileAttachmentsDirectory('product')
                            ->maxLength(65535)
                    ])->columns(2),
                    Section::make('image')->schema([
                        FileUpload::make('image')
                            ->image()
                            ->directory('products')
                            ->multiple()
                            ->maxFiles(5)
                            ->reorderable()
                            ->required(),
                    ])->columns(1)
                ])->columnSpan(2),
                Group::make()->schema([
                    Section::make('Product Details')->schema([
                        TextInput::make('price')
                            ->required()
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(999999.99)
                            ->step(0.01),
                        TextInput::make('stock')
                            ->required()
                            ->integer()
                            ->minValue(0)
                            ->default(0),

                    ])->columns(1),
                    Section::make('Associates')->schema([
                        Select::make('category_id')
                            ->relationship('category', 'name')
                            ->required(),
                        Select::make('brand_id')
                            ->relationship('brand', 'name')
                            ->required(),
                    ])->columns(1),
                    Section::make('status')->schema([
                        Toggle::make('is_active')
                            ->required()
                            ->default(true),
                        Toggle::make('is_featured')
                            ->required()
                            ->default(false),
                        Toggle::make('in_stock')
                            ->required()
                            ->default(true),
                        Toggle::make('in_sale')
                            ->required()
                            ->default(false),
                    ])
                ])->columnSpan(1)
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                ImageColumn::make('image')
                    ->getStateUsing(fn($record) => is_array($record->image) ? $record->image[0] : $record->image)
                    ->circular(),
                TextColumn::make('category.name'),
                TextColumn::make('brand.name'),
                TextColumn::make('price')
                    ->sortable(),
                TextColumn::make('stock')
                    ->sortable(),
                IconColumn::make('is_active')
                    ->boolean(),

            ])
            ->filters([
                //
                SelectFilter::make('category')->relationship('category', 'name'),
                SelectFilter::make('brand')->relationship('brand', 'name'),
            ])
            ->actions([

                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\ViewAction::make(),
                ])
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
