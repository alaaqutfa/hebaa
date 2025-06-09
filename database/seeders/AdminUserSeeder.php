<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name'       => 'Super Admin',
            'email'      => 'admin@hebaa.org',
            'password'   => Hash::make('admin1234'),
            'is_admin'   => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
