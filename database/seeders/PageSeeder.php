<?php

namespace Database\Seeders;

use App\Models\Page;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::factory()->count(500)->create();

        $faker = Factory::create();

        DB::table('pages')->insert([
            'title' => 'Polityka Cookies',
            'description' => 'Polityka Cookies',
            'keywords' => 'Polityka Cookies',
            'visibility_date_from' => now(),
            'visibility_date_to' => now()->addYear(20),
            'is_enable' => true,
            'is_system' => true,
            'content' => $faker->text($maxNbChars = 30000),
            'slug' => Str::slug('Polityka Cookies', '-'),
        ]);

        DB::table('pages')->insert([
            'title' => 'Polityka prywatności',
            'description' => 'Polityka prywatności',
            'keywords' => 'Polityka prywatności',
            'visibility_date_from' => now(),
            'visibility_date_to' => now()->addYear(20),
            'is_enable' => true,
            'is_system' => true,
            'content' => $faker->text($maxNbChars = 30000),
            'slug' => Str::slug('Polityka prywatności', '-'),
        ]);

        DB::table('pages')->insert([
            'title' => 'Regulamin',
            'description' => 'Regulamin',
            'keywords' => 'Regulamin',
            'visibility_date_from' => now(),
            'visibility_date_to' => now()->addYear(20),
            'is_enable' => true,
            'is_system' => true,
            'content' => $faker->text($maxNbChars = 30000),
            'slug' => Str::slug('Regulamin', '-'),
        ]);

    }
}
