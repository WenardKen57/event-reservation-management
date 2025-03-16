<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('package')->insert([
            'package_name' => 'Package A', 
            'event_type' => 'birthday',
            'price' => 14000,
            'description' => 'Description',

        ]);
    }
}
