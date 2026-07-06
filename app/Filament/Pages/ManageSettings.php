<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Cache;

class ManageSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string|\UnitEnum|null $navigationGroup = 'Settings';

    protected static ?int $navigationSort = 100;

    protected static ?string $title = 'Site Settings';

    protected string $view = 'filament.pages.manage-settings';

    public ?array $data = [];

    public function mount(): void
    {
        $settings = Setting::all()->keyBy(function ($setting) {
            return $setting->group.'_'.$setting->key;
        })->map(fn ($setting) => $setting->value)->toArray();

        $this->form->fill($settings);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Tabs::make('Settings')
                    ->tabs([
                        Tabs\Tab::make('Appearance')
                            ->schema([
                                ColorPicker::make('general_primary_color')
                                    ->label('Site Primary Color')
                                    ->default('#27a74a'),
                                ColorPicker::make('general_bg_main')
                                    ->label('Main Background Color')
                                    ->default('#ffffff'),
                                ColorPicker::make('general_bg_alt')
                                    ->label('Alternate Background Color (Sections/Cards)')
                                    ->default('#f3f4f6'),
                                ColorPicker::make('general_text_main')
                                    ->label('Main Text Color')
                                    ->default('#0f2043'),
                                ColorPicker::make('general_text_muted')
                                    ->label('Muted Text Color')
                                    ->default('#6b7280'),
                            ])->columns(2),
                        Tabs\Tab::make('General')
                            ->schema([
                                TextInput::make('general_site_name')
                                    ->label('Site Name')
                                    ->default('DO-RYT Machine Corp')
                                    ->required(),
                                Textarea::make('general_site_description')
                                    ->label('Site Description')
                                    ->rows(3),
                                FileUpload::make('general_site_logo')
                                    ->label('Site Logo')
                                    ->image()
                                    ->disk('public')
                                    ->directory('settings'),
                                FileUpload::make('general_favicon')
                                    ->label('Favicon')
                                    ->image()
                                    ->disk('public')
                                    ->directory('settings'),
                            ]),
                        Tabs\Tab::make('SEO')
                            ->schema([
                                TextInput::make('seo_meta_title_suffix')
                                    ->label('Meta Title Suffix (e.g. | DO-RYT)')
                                    ->default('| DO-RYT Machine Corp'),
                                Textarea::make('seo_meta_description')
                                    ->label('Default Meta Description')
                                    ->rows(3),
                                TextInput::make('seo_meta_keywords')
                                    ->label('Meta Keywords (comma separated)'),
                                FileUpload::make('seo_og_image')
                                    ->label('Default Open Graph Image (Social Share)')
                                    ->image()
                                    ->disk('public')
                                    ->directory('settings'),
                            ]),
                        Tabs\Tab::make('Contact')
                            ->schema([
                                TextInput::make('contact_email')
                                    ->label('Primary Email')
                                    ->email(),
                                TextInput::make('contact_phone')
                                    ->label('Sales Phone Number'),
                                TextInput::make('contact_whatsapp')
                                    ->label('WhatsApp Number'),
                                Textarea::make('contact_address')
                                    ->label('Office Address')
                                    ->rows(3),
                            ]),
                        Tabs\Tab::make('Social')
                            ->schema([
                                TextInput::make('social_linkedin')
                                    ->label('LinkedIn URL')
                                    ->url(),
                                TextInput::make('social_facebook')
                                    ->label('Facebook URL')
                                    ->url(),
                                TextInput::make('social_twitter')
                                    ->label('Twitter / X URL')
                                    ->url(),
                                TextInput::make('social_youtube')
                                    ->label('YouTube URL')
                                    ->url(),
                                TextInput::make('social_instagram')
                                    ->label('Instagram URL')
                                    ->url(),
                            ]),
                    ])
                    ->columnSpanFull(),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        foreach ($data as $key => $value) {
            // Key is in format group_key
            $parts = explode('_', $key, 2);
            if (count($parts) === 2) {
                Setting::updateOrCreate(
                    ['group' => $parts[0], 'key' => $parts[1]],
                    ['value' => $value]
                );
            }
        }

        // Clear settings cache
        Cache::forget('app_settings');

        Notification::make()
            ->title('Settings saved successfully')
            ->success()
            ->send();
    }
}
