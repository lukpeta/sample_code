<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('company_packages')->insert([
            'title' => 'OFERTA PAKIETÓW INPOST',
            'description' => 'Wybierz optymalny dla siebie pakiet:',
            'position' => 1,
            'is_enable' => 1
        ]);

    }
}
