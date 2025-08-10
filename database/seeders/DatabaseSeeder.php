<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role as ModelsRole;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'aymen andaloussi',
        //     'email' => 'aymen@gmail.com',
        // ]);


        ModelsRole::insert([
            [
                'name' => 'admin',
                'guard_name' => 'web'
            ],
            [
                'name' => 'user',
                'guard_name' => 'web'
            ]
        ]);

        $admin = User::create([
            'name' => 'aymen andaloussi',
            'email' => 'aymen@gmail.com',
            'password' => Hash::make('aymen@gmail.com')
        ]);

        $admin->assignRole('admin');

    }


}
