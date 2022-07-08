<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('provinces')->insert([
            'name' => 'dolnośląskie',
            'is_enable' => 1]);

        DB::table('provinces')->insert([
            'name' => 'kujawsko-pomorskie',
            'is_enable' => 1]);


        DB::table('provinces')->insert([
            'name' => 'lubelskie',
            'is_enable' => 1]);


        DB::table('provinces')->insert([
            'name' => 'lubuskie',
            'is_enable' => 1]);


        DB::table('provinces')->insert([
            'name' => 'łódzkie',
            'is_enable' => 1]);


        DB::table('provinces')->insert([
            'name' => 'małopolskie',
            'is_enable' => 1]);


        DB::table('provinces')->insert([
            'name' => 'mazowieckie',
            'is_enable' => 1]);


        DB::table('provinces')->insert([
            'name' => 'opolskie',
            'is_enable' => 1]);


        DB::table('provinces')->insert([
            'name' => 'podkarpackie',
            'is_enable' => 1]);


        DB::table('provinces')->insert([
            'name' => 'podlaskie',
            'is_enable' => 1]);


        DB::table('provinces')->insert([
            'name' => 'pomorskie',
            'is_enable' => 1]);


        DB::table('provinces')->insert([
            'name' => 'śląskie',
            'is_enable' => 1]);


        DB::table('provinces')->insert([
            'name' => 'świętokrzyskie',
            'is_enable' => 1]);


        DB::table('provinces')->insert([
            'name' => 'warmińsko-mazurskie',
            'is_enable' => 1]);


        DB::table('provinces')->insert([
            'name' => 'wielkopolskie',
            'is_enable' => 1]);


        DB::table('provinces')->insert([
            'name' => 'zachodniopomorskie',
            'is_enable' => 1]);


        DB::table('provinces')->insert([
            'name' => 'inne',
            'is_enable' => 1]);
    }
}
