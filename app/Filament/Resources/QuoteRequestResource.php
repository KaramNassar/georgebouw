<?php

namespace App\Filament\Resources;

use App\Models\QuoteRequest;
use App\Filament\Resources\QuoteRequestResource\Pages;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class QuoteRequestResource extends Resource
{
    protected static ?string $model = QuoteRequest::class;

    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedCalculator;

    protected static string|\UnitEnum|null $navigationGroup = 'Leads';

    protected static ?string $navigationLabel = 'Quote requests';

    protected static ?int $navigationSort = 10;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::query()->where('status', 'new')->count() ?: null;
    }

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Submitted by customer')
                ->description('This data comes from the Smart Project Assistant wizard on the website.')
                ->columns(2)
                ->components([
                    TextInput::make('name')->disabled(),
                    TextInput::make('email')->disabled(),
                    TextInput::make('phone')->disabled(),
                    TextInput::make('locale')->disabled(),
                    TagsInput::make('scope')->disabled()->label('Requested services (slugs)'),
                    TextInput::make('property_type')->disabled(),
                    TextInput::make('size_m2')->disabled()->suffix('m²'),
                    TextInput::make('urgency')->disabled(),
                    TextInput::make('material')->disabled(),
                    TextInput::make('budget_bracket')->disabled(),
                    TextInput::make('estimate_low')->disabled()->prefix('€'),
                    TextInput::make('estimate_high')->disabled()->prefix('€'),
                    SpatieMediaLibraryFileUpload::make('photos')
                        ->collection('photos')
                        ->image()
                        ->multiple()
                        ->disabled()
                        ->columnSpan(2),
                ]),

            Section::make('Follow-up')
                ->columns(2)
                ->components([
                    Select::make('status')
                        ->options([
                            'new' => 'New',
                            'contacted' => 'Contacted',
                            'quoted' => 'Quoted',
                            'won' => 'Won',
                            'lost' => 'Lost',
                        ])
                        ->required(),
                    Textarea::make('notes')
                        ->rows(4)
                        ->columnSpan(2),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('created_at')
                    ->label('Received')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
                TextColumn::make('name')->searchable()->default('—'),
                TextColumn::make('phone')->searchable()->default('—'),
                TextColumn::make('property_type'),
                TextColumn::make('size_m2')->suffix(' m²'),
                TextColumn::make('estimate_low')
                    ->label('Estimate')
                    ->formatStateUsing(fn (QuoteRequest $record) => $record->estimate_low && $record->estimate_high
                        ? '€ '.number_format($record->estimate_low, 0, ',', '.').' – € '.number_format($record->estimate_high, 0, ',', '.')
                        : '—'),
                TextColumn::make('status')->badge(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'new' => 'New',
                        'contacted' => 'Contacted',
                        'quoted' => 'Quoted',
                        'won' => 'Won',
                        'lost' => 'Lost',
                    ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListQuoteRequests::route('/'),
            'edit' => Pages\EditQuoteRequest::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->ordered();
    }
}
