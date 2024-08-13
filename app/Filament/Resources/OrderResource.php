<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Order;
use App\Models\Product;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Number;
use Filament\Resources\Resource;
use PhpParser\Node\Stmt\Return_;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\ToggleButtons;
use App\Filament\Resources\OrderResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Filament\Resources\OrderResource\RelationManagers\AddressRelationManager;
use Filament\Actions\ActionGroup;
use Filament\Forms\Components\Hidden;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?int $navigationSort = 5;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()
                    ->schema([
                        Section::make('Order Information')
                            ->schema([
                                Select::make('user_id',)
                                    ->label('Customer')
                                    ->relationship('user', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->required(),

                                Select::make('payment_method')
                                    ->options([
                                        'stripe' => 'Stripe',
                                        'cod' => 'Cash On Delivery'
                                    ]),

                                Select::make('payment_status')
                                    ->options([
                                        'pending' => 'Pending',
                                        'paid' => 'Paid',
                                        'failed' => 'Failed'
                                    ]),

                                ToggleButtons::make('status')
                                    ->inline()
                                    ->default('new')
                                    ->options([
                                        'new' => 'New',
                                        'processing' => 'Processing',
                                        'shipped' => 'Shipped',
                                        'delivered' => 'Delivered',
                                        'cancelled' => 'Cancelled'
                                    ])
                                    ->colors([
                                        'new' => 'info',
                                        'processing' => 'warning',
                                        'shipped' => 'success',
                                        'delivered' => 'success',
                                        'cancelled' => 'danger'
                                    ])->icons([
                                        'new' => 'heroicon-m-sparkles',
                                        'processing' => 'heroicon-m-arrow-path',
                                        'shipped' => 'heroicon-m-truck',
                                        'delivered' => 'heroicon-m-check-badge',
                                        'cancelled' => 'heroicon-m-x-circle'
                                    ]),

                                Select::make('currency')->options([
                                    'usd' => 'USD',
                                    'eur' => 'EUR',
                                    'gbp' => 'GBP',
                                    'jpy' => 'JPY',
                                    'cny' => 'CNY',
                                    'aud' => 'AUD',
                                    'brl' => 'BRL'
                                ])->searchable()
                                    ->default('usd')
                                    ->reactive()
                                    
                                    ,

                                Select::make('shipping_method')->options([
                                    'fedex' => 'FedEx',
                                    'correios' => 'Correios'
                                ]),

                                Textarea::make('notes')
                                    ->columnSpanFull()

                            ])->columns(2),


                        Section::make('Order Items')->schema([
                            Repeater::make('items')
                                ->relationship()
                                ->schema([
                                    Select::make('product_id')
                                        ->relationship('product', 'name')
                                        ->searchable()
                                        ->preload()
                                        ->required()
                                        ->distinct()
                                        ->disableOptionsWhenSelectedInSiblingRepeaterItems()
                                        ->columnSpan(4)
                                        ->reactive()
                                        ->afterStateUpdated(fn ($state, Set $set) => $set('unit_amount', Product::find($state)?->price ?? 0))
                                        ->afterStateUpdated(fn ($state, Set $set) => $set('total_amount', Product::find($state)?->price ?? 0)),


                                    TextInput::make('quantity')
                                        ->numeric()
                                        ->required()
                                        ->default(1)
                                        ->minValue(1)
                                        ->columnSpan(2)
                                        ->reactive()
                                        ->afterstateUpdated(fn ($state, Set $set, Get $get) => $set('total_amount', $state * $get('unit_amount'))),


                                    TextInput::make('unit_amount')
                                        ->disabled()
                                        ->dehydrated()
                                        ->numeric()
                                        ->required()
                                        ->columnSpan(3),

                                    TextInput::make('total_amount')
                                        ->numeric()
                                        ->required()
                                        ->columnSpan(3)


                                ])->columns(12),
                                Placeholder::make('grand_total_placeholder')
                                ->label('Grand Total')
                                ->content(function (Get $get, Set $set) {
                            
                                    $total = 0;
                            
                                    if (!$repeaters = $get('items')) {
                                        return $total;
                                    }
                            
                                    foreach ($repeaters as $key => $repeater) {
                                        $total += $get("items.{$key}.total_amount");
                                    }
                            
                                    $currency = $get('currency') ?? 'USD'; // Default to 'USD' if null
                            
                                    $set('grand_total', $total);
                                    return Number::currency($total, $currency);
                                }),
                            

                                Hidden::make('grand_total')->default(0)
                        ])
                    ])->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Customer')
                    ->sortable()
                    ->searchable(),
    
                Tables\Columns\TextColumn::make('payment_method')
                    ->label('Payment Method')
                    ->sortable(),
    
                Tables\Columns\TextColumn::make('payment_status')
                    ->label('Payment Status')
                    ->sortable(),
    
                SelectColumn::make('status')
                ->options([
                    'new' => 'New',
                    'processing' => 'Processing',
                    'shipped' => 'Shipped',
                    'delivered' => 'Delivered',
                    'cancelled' => 'Cancelled'
                ]),
    
    
                Tables\Columns\TextColumn::make('grand_total')
                    ->label('Total Amount')
                    ->sortable()
                    ->formatStateUsing(function ($state, $record) {
                        $currency = $record->currency ?? 'USD'; // Adjust this to match your field
                        return Number::currency($state, $currency);
                    }),

                    TextColumn::make('created_at')
                    ->toggleable(isToggledHiddenByDefault:true)
                    ->sortable()
                    ->dateTime(),

                    TextColumn::make('updated_at')
                    ->toggleable(isToggledHiddenByDefault:true)
                    ->sortable()
                    ->dateTime()

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make()
                ])
               
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            AddressRelationManager::class
        ];
    }


    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): string|array|null
    {
        return static::getModel()::count() > 10  ? 'success' : 'danger';
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
