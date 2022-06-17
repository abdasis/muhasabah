<?php

namespace Database\Seeders;

use App\Models\ChartOfAccountCategory;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'Abd. Asis',
            'email' => 'admin@demoapp.com',
            'password' => bcrypt('rahasia123'),
            'remember_token' => Str::random(10),
        ]);

        $this->call([
            ContactSeeder::class,
            ChartOfAccountCategorySeeder::class,
            ChartOfAccountSeeder::class,
            ProductCategorySeeder::class,
            ProductSeeder::class,
        ]);

    }
}
