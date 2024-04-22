<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AllowedUsersTableSeeder extends Seeder
{
    public function run()
    {
        // Inserting mock data into the allowed_users table
        DB::table('allowed_users')->insert([
            [
                'name' => 'Musharraf Azhar',
                'NIC_or_passport' => '123456789101',
            ],
            [
                'name' => 'Tharanga Peiris',
                'NIC_or_passport' => '987654321122',
            ]


        ]);
    }
}
