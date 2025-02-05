<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
/*
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);*/
        //use Illuminate\Support\Facades\DB;
        //use Illuminate\Support\Str;
        for ($i = 1; $i <= 10; $i++){
            DB::table('to_dos')->insert([
                'title'=>'ззадание -'.Str::random(10),
                'priority'=>0,
                'complete'=>false,
            ]);
        };
    }
}
