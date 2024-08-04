<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
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

        User::factory()->create([
            'name' => 'Faraz Ahmad',
            'email' => 'fraz123@gmail.com',
            'password'=> Hash::make('Code786@'),
            'role'=>0,
            'ref_code'=>Str::random(10),
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        $this->call([
            CategorySeeder::class,
            PackageSeeder::class,
        ]);


    }
}
