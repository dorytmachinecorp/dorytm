<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@doryt.com'],
            [
                'name' => 'Admin User',
                'password' => bcrypt('password'),
            ]
        );

        $this->call([
            SiteSettingSeeder::class,
            CategorySeeder::class,
            IndustrySeeder::class,
            TestimonialSeeder::class,
            ProductSeeder::class,
            PageSeeder::class,
            ContentElaborationSeeder::class,
            ShieldSeeder::class,
            BlogSeeder::class,
            CertificateDownloadSeeder::class,
            SeoMetadataSeeder::class,
        ]);
    }
}
