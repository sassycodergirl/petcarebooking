<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@furry.test'],
            [
                'name' => 'Furry Admin',
                'password' => Hash::make('Furr$Admin%CMS25'),
                'is_admin' => true,
            ]
        );
    }
}
