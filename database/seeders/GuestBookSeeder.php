<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GuestBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('guest_books')->insert([
            [
                'name' => 'Budi Santoso',
                'email' => 'budi@mail.com',
                'phone' => '081234567890',
                'organization' => 'PT Maju Jaya',
                'purpose' => 'Business meeting',
                'message' => 'Looking forward to our cooperation.',
                'visit_date' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Siti Rahma',
                'email' => 'siti@mail.com',
                'phone' => '082198765432',
                'organization' => 'Freelancer',
                'purpose' => 'Product inquiry',
                'message' => 'I want to know more about your services.',
                'visit_date' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
