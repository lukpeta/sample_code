<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\Models\User();
        $user->is_enable = true;
        $user->name = 'Łukasz';
        $user->email = 'lukasz.peta@icloud.com';
        $user->phone = '661545459';
        $user->street = '3 Maja';
        $user->building_number = '51';
        $user->city = 'Rumia';
        $user->postal_code = '84-230';
        $user->shipping_default_inpost_parcel = 'RUM001';
        $user->revicer_default_inpost_parcel = 'RUM001';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = Hash::make('passw');
        $user->is_company = true;
        $user->slug = Str::slug('lukasz.peta', '-');
        $user->save();

        DB::table('user_company_settings')->insert([
            'user_id' => $user->id,
            'settings' => json_encode([
                'package_price_1' => 100,
                'package_price_2' => 200,
                'package_price_3' => 300,
                'sms' => 500,
                'ofert_type' => 2,
                'discount_value1' => 1,
                'discount_value2' => 2,
                'discount_value3' => 3,
                'discount_value4' => 4,
                'discount_value5' => 5,
                'company_name' => 'Peta Studio',
                'street' => '3 Maja',
                'city' => 'Rumia',
                'building_number' => '51',
                'postal_code' => '84-230',
                'nip' => '5882124183',
                'phone' => '661545459',
                'email' => 'trifek@icloud.com',
                'show_map' => 1,
                'lat' => '54.56777865413057',
                'lng' => '18.398677622613956',
                'description' => 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum '
            ]),
        ]);
    }
}
