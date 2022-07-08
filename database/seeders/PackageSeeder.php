<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $package = new \App\Models\PackageType();
        $package->title = 'Inpost paczkomaty';
        $package->is_enable = true;
        $package->save();

        DB::table('packages')->insert([
            'package_type_id' => $package->id,
            'name' => 'Pakiet 1',
            'price' => 100,
            'quantityA' => 50,
            'quantityB' => 100,
            'quantityC' => 150,
            'sms' => 100,
            'position' => 1,
            'is_enable' => true
        ]);
    }
}
