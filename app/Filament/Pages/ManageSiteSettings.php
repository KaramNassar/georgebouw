<?php

namespace App\Filament\Pages;

use App\Models\SiteSetting;
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class ManageSiteSettings extends Page implements HasSchemas
{
    use InteractsWithSchemas;

    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static string|\UnitEnum|null $navigationGroup = 'Settings';

    protected static ?string $navigationLabel = 'Site settings';

    protected static ?string $title = 'Site settings';

    protected string $view = 'filament.pages.manage-site-settings';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill(SiteSetting::current()->only([
            'whatsapp_number',
            'contact_email',
            'website_url',
            'tiktok_url',
            'instagram_url',
            'default_locale',
        ]));
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Contact & social')
                    ->columns(2)
                    ->components([
                        TextInput::make('whatsapp_number')
                            ->label('WhatsApp number')
                            ->helperText('International format, e.g. +31684954212')
                            ->required(),
                        TextInput::make('contact_email')
                            ->email()
                            ->required(),
                        TextInput::make('website_url')
                            ->url(),
                        TextInput::make('tiktok_url')
                            ->label('TikTok URL')
                            ->url(),
                        TextInput::make('instagram_url')
                            ->label('Instagram URL')
                            ->url(),
                        TextInput::make('default_locale')
                            ->label('Default locale')
                            ->helperText('nl or en')
                            ->required()
                            ->maxLength(5),
                    ]),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        SiteSetting::current()->update($data);

        Notification::make()
            ->title('Settings saved')
            ->success()
            ->send();
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('save')
                ->label('Save')
                ->action('save'),
        ];
    }
}
