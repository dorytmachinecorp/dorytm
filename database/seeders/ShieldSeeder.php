<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class ShieldSeeder extends Seeder
{
    public function run(): void
    {
        Artisan::call('shield:generate', [
            '--all' => true,
            '--option' => 'permissions',
            '--panel' => 'admin',
            '--no-interaction' => true,
        ]);

        $user = User::where('email', 'admin@doryt.com')->first();
        if ($user) {
            $user->assignRole('super_admin');
        }
    }
}
