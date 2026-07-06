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
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
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
                        Tabs\Tab::make('General')
                            ->schema([
                                Section::make('Site Identity')
                                    ->description('Basic information about your organization.')
                                    ->schema([
                                        Grid::make(2)->schema([
                                            TextInput::make('general_site_name')
                                                ->label('Site Name')
                                                ->default('DO-RYT Machine Corp')
                                                ->required(),
                                            Textarea::make('general_site_description')
                                                ->label('Site Description')
                                                ->rows(3),
                                        ]),
                                    ]),

                                Section::make('Website Branding')
                                    ->description('Upload logos for different parts of the main website.')
                                    ->schema([
                                        Grid::make(3)->schema([
                                            FileUpload::make('general_site_logo')
                                                ->label('Site Header Logo')
                                                ->helperText('Shown in the main navigation header. Transparent background recommended.')
                                                ->image()
                                                ->disk('public')
                                                ->directory('settings')
                                                ->imagePreviewHeight('80'),
                                            FileUpload::make('general_footer_logo')
                                                ->label('Footer Logo')
                                                ->helperText('Shown in the dark footer area. Light-colored logo recommended.')
                                                ->image()
                                                ->disk('public')
                                                ->directory('settings')
                                                ->imagePreviewHeight('80'),
                                            FileUpload::make('general_preloader')
                                                ->label('Preloader Logo')
                                                ->helperText('Shown briefly on the initial page load screen.')
                                                ->image()
                                                ->disk('public')
                                                ->directory('settings')
                                                ->imagePreviewHeight('80'),
                                        ]),
                                    ]),

                                Section::make('Admin Portal Branding')
                                    ->description('Separate logos for the admin panel theme settings.')
                                    ->schema([
                                        Grid::make(2)->schema([
                                            FileUpload::make('general_admin_logo_light')
                                                ->label('Admin Logo (Light Mode)')
                                                ->helperText('Displayed in the admin sidebar when using the Light theme.')
                                                ->image()
                                                ->disk('public')
                                                ->directory('settings')
                                                ->imagePreviewHeight('80'),
                                            FileUpload::make('general_admin_logo_dark')
                                                ->label('Admin Logo (Dark Mode)')
                                                ->helperText('Displayed in the admin sidebar when using the Dark theme.')
                                                ->image()
                                                ->disk('public')
                                                ->directory('settings')
                                                ->imagePreviewHeight('80'),
                                        ]),
                                    ]),

                                Section::make('Tab & Device Icons')
                                    ->description('Icons displayed in browsers and saved device shortcuts.')
                                    ->schema([
                                        Grid::make(2)->schema([
                                            FileUpload::make('general_favicon')
                                                ->label('Browser Favicon')
                                                ->helperText('Displayed in browser tabs. 32x32px PNG or ICO format.')
                                                ->image()
                                                ->disk('public')
                                                ->directory('settings')
                                                ->imagePreviewHeight('60'),
                                            FileUpload::make('general_appicon')
                                                ->label('Mobile App Icon')
                                                ->helperText('Used when saving the website as a shortcut on mobile devices. 180x180px PNG.')
                                                ->image()
                                                ->disk('public')
                                                ->directory('settings')
                                                ->imagePreviewHeight('60'),
                                        ]),
                                    ]),
                            ]),

                        Tabs\Tab::make('Appearance')
                            ->schema([
                                Section::make('Color Palette')
                                    ->description('Customize the visual design theme of the public website.')
                                    ->schema([
                                        Grid::make(3)->schema([
                                            ColorPicker::make('general_primary_color')
                                                ->label('Brand Primary Color')
                                                ->helperText('Used for links, primary buttons, and highlight details.')
                                                ->default('#27a74a'),
                                            ColorPicker::make('general_bg_main')
                                                ->label('Main Page Background')
                                                ->helperText('Default body background color.')
                                                ->default('#ffffff'),
                                            ColorPicker::make('general_bg_alt')
                                                ->label('Section Background')
                                                ->helperText('Alternate background for section cards.')
                                                ->default('#f3f4f6'),
                                            ColorPicker::make('general_text_main')
                                                ->label('Main Text Color')
                                                ->helperText('Color of headings and primary reading text.')
                                                ->default('#0f2043'),
                                            ColorPicker::make('general_text_muted')
                                                ->label('Muted Text Color')
                                                ->helperText('Color of description labels and minor metadata.')
                                                ->default('#6b7280'),
                                        ]),
                                    ]),
                            ]),

                        Tabs\Tab::make('SEO')
                            ->schema([
                                Section::make('Search & Social Settings')
                                    ->description('Default meta information and social share preview settings.')
                                    ->schema([
                                        Grid::make(2)->schema([
                                            Grid::make(1)->schema([
                                                TextInput::make('seo_meta_title_suffix')
                                                    ->label('Meta Title Suffix')
                                                    ->helperText('Appended to individual page titles (e.g. "| Company Name")')
                                                    ->default('| DO-RYT Machine Corp'),
                                                Textarea::make('seo_meta_description')
                                                    ->label('Default Meta Description')
                                                    ->helperText('Fallback search description for pages without unique content.')
                                                    ->rows(4),
                                                TextInput::make('seo_meta_keywords')
                                                    ->label('Default Meta Keywords')
                                                    ->helperText('Comma-separated keywords list.'),
                                            ])->columnSpan(1),

                                            Grid::make(1)->schema([
                                                FileUpload::make('seo_og_image')
                                                    ->label('Social Share Image (OG Image)')
                                                    ->helperText('Default image shown when sharing website links on social networks. Recommended: 1200x630px.')
                                                    ->image()
                                                    ->disk('public')
                                                    ->directory('settings')
                                                    ->imagePreviewHeight('150'),
                                            ])->columnSpan(1),
                                        ]),
                                    ]),
                            ]),

                        Tabs\Tab::make('Contact')
                            ->schema([
                                Section::make('Contact details')
                                    ->description('Displayed in the headers, footers, and contact templates.')
                                    ->schema([
                                        Grid::make(2)->schema([
                                            TextInput::make('contact_email')
                                                ->label('Primary Sales Email')
                                                ->email()
                                                ->required(),
                                            TextInput::make('contact_phone')
                                                ->label('Primary Phone Number')
                                                ->required(),
                                            TextInput::make('contact_whatsapp')
                                                ->label('WhatsApp Business Number')
                                                ->helperText('Include country code without special characters (e.g. 15551234567)'),
                                            Textarea::make('contact_address')
                                                ->label('Corporate Headquarters Address')
                                                ->rows(3)
                                                ->columnSpanFull(),
                                        ]),
                                    ]),
                            ]),

                        Tabs\Tab::make('Social Channels')
                            ->schema([
                                Section::make('Social Media Profile Connections')
                                    ->description('URLs to your company accounts (links will render dynamically in the footer).')
                                    ->schema([
                                        Grid::make(2)->schema([
                                            TextInput::make('social_linkedin')
                                                ->label('LinkedIn Page URL')
                                                ->url(),
                                            TextInput::make('social_facebook')
                                                ->label('Facebook Page URL')
                                                ->url(),
                                            TextInput::make('social_twitter')
                                                ->label('X (formerly Twitter) URL')
                                                ->url(),
                                            TextInput::make('social_youtube')
                                                ->label('YouTube Channel URL')
                                                ->url(),
                                            TextInput::make('social_instagram')
                                                ->label('Instagram Profile URL')
                                                ->url(),
                                        ]),
                                    ]),
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
