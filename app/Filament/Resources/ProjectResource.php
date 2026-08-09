<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Models\Project;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use LaraZeus\SpatieTranslatable\Resources\Concerns\Translatable;

class ProjectResource extends Resource
{
    use Translatable;

    protected static ?string $model = Project::class;

    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedPhoto;

    protected static string|\UnitEnum|null $navigationGroup = 'Content';

    protected static ?int $navigationSort = 20;

    public static function getTranslatableLocales(): array
    {
        return ['nl', 'en'];
    }

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Project')
                ->columns(2)
                ->components([
                    TextInput::make('title')
                        ->required()
                        ->maxLength(150)
                        ->columnSpan(2),
                    Select::make('category_id')
                        ->relationship('category', 'name')
                        ->searchable()
                        ->preload()
                        ->required(),
                    TextInput::make('location')
                        ->maxLength(120),
                    TextInput::make('duration')
                        ->maxLength(60)
                        ->helperText('e.g. "3 weeks"'),
                    TextInput::make('video_url')
                        ->label('Video URL (optional)')
                        ->url()
                        ->maxLength(255)
                        ->columnSpan(2),
                    Toggle::make('is_featured'),
                    Toggle::make('is_active')->default(true),
                    TextInput::make('sort_order')
                        ->numeric()
                        ->default(0),
                ]),

            Section::make('Copy')
                ->components([
                    Textarea::make('scope_summary')
                        ->rows(2)
                        ->maxLength(255)
                        ->helperText('Short "scope of work" line shown on the portfolio card.'),
                    Textarea::make('overview')
                        ->rows(4)
                        ->helperText('Shown on the project detail page.'),
                    Repeater::make('deliverables')
                        ->label('Deliverables (bullet list)')
                        ->simple(
                            TextInput::make('item')->required()
                        )
                        ->addActionLabel('Add bullet point'),
                ]),

            Section::make('Media')
                ->components([
                    SpatieMediaLibraryFileUpload::make('image')
                        ->collection('image')
                        ->image()
                        ->maxSize(10240)
                        ->helperText('Hero / card image, also used as the before/after "before" frame.'),
                    SpatieMediaLibraryFileUpload::make('gallery')
                        ->collection('gallery')
                        ->image()
                        ->multiple()
                        ->reorderable()
                        ->maxSize(10240)
                        ->helperText('Project photo album.'),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                TextColumn::make('category.name')
                    ->badge(),
                TextColumn::make('location'),
                TextColumn::make('duration'),
                IconColumn::make('is_featured')->boolean(),
                IconColumn::make('is_active')->boolean(),
                TextColumn::make('sort_order')->label('Order')->sortable(),
            ])
            ->defaultSort('sort_order')
            ->reorderable('sort_order')
            ->filters([
                SelectFilter::make('category_id')
                    ->relationship('category', 'name'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->ordered();
    }
}
