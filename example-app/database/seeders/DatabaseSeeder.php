<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Bassket;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        //добавить 
        User::factory()->create([
            'name' => 'zzz',
            'email' => 'zzz@z.com',
            'password' => Hash::make('123')
        ]);
        /*
        Bassket::factory()
        ->count(20)
        ->create();
        */
    }
}
