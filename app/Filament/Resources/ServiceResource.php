<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Models\Service;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use LaraZeus\SpatieTranslatable\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ServiceResource extends Resource
{
    use Translatable;

    protected static ?string $model = Service::class;

    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedWrenchScrewdriver;

    protected static string|\UnitEnum|null $navigationGroup = 'Content';

    protected static ?int $navigationSort = 10;

    public static function getTranslatableLocales(): array
    {
        return ['nl', 'en'];
    }

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Service')
                ->columns(2)
                ->components([
                    TextInput::make('name')
                        ->required()
                        ->maxLength(120)
                        ->columnSpan(2),
                    TextInput::make('slug')
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->maxLength(120)
                        ->helperText('Used in URLs, e.g. /service/bathkitchen. Leave as-is once published.'),
                    TextInput::make('icon')
                        ->required()
                        ->maxLength(60)
                        ->default('hammer')
                        ->helperText('Lucide icon name, e.g. bath, zap, droplets, hammer.'),
                    TextInput::make('base_price')
                        ->label('Starting price (€)')
                        ->numeric()
                        ->required()
                        ->minValue(0),
                    TextInput::make('price_per_m2')
                        ->label('Price per m² (€)')
                        ->numeric()
                        ->required()
                        ->minValue(0)
                        ->helperText('Used by the Smart Project Assistant price estimator.'),
                    Toggle::make('is_active')
                        ->default(true),
                    TextInput::make('sort_order')
                        ->numeric()
                        ->default(0),
                ]),

            Section::make('Copy')
                ->components([
                    Textarea::make('short_description')
                        ->required()
                        ->rows(2)
                        ->maxLength(255)
                        ->helperText('Shown on the services grid card.'),
                    Textarea::make('long_description')
                        ->rows(4)
                        ->helperText('Shown on the service detail page.'),
                    Repeater::make('included')
                        ->label('What\'s included (bullet list)')
                        ->simple(
                            TextInput::make('item')->required()
                        )
                        ->addActionLabel('Add bullet point')
                        ->helperText('Shown as the "What\'s included" checklist on the service detail page.'),
                ]),

            Section::make('Media')
                ->components([
                    SpatieMediaLibraryFileUpload::make('image')
                        ->collection('image')
                        ->image()
                        ->helperText('Hero image for the service card and detail page.'),
                    SpatieMediaLibraryFileUpload::make('gallery')
                        ->collection('gallery')
                        ->image()
                        ->multiple()
                        ->reorderable()
                        ->helperText('Example photos shown on the service detail page gallery.'),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('icon')
                    ->label('')
                    ->icon(fn (Service $record) => $record->icon),
                TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                TextColumn::make('base_price')
                    ->label('From')
                    ->money('EUR')
                    ->sortable(),
                TextColumn::make('price_per_m2')
                    ->label('€/m²')
                    ->money('EUR')
                    ->sortable(),
                IconColumn::make('is_active')
                    ->boolean(),
                TextColumn::make('sort_order')
                    ->label('Order')
                    ->sortable(),
            ])
            ->defaultSort('sort_order')
            ->reorderable('sort_order')
            ->filters([
                //
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->ordered();
    }
}
