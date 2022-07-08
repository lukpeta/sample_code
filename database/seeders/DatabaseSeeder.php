<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserRolesAndPermissionsSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(ProvinceSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(CommentSeeder::class);
        $this->call(DescriptionSeeder::class);
        $this->call(PageSeeder::class);
        $this->call(UserCompanySeeder::class);
        $this->call(CompanyPackageSeeder::class);
        $this->call(PackageSeeder::class);
        $this->call(BlogSeeder::class);
    }
}
