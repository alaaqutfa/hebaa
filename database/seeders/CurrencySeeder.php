<?php
namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Currency::truncate();

        Currency::insert([
            [
                'code'       => 'USD',
                'name'       => 'US Dollar',
                'symbol'     => '$',
                'rate'       => 1.00000000,
                'is_default' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'       => 'EUR',
                'name'       => 'Euro',
                'symbol'     => '€',
                'rate'       => 0.93,
                'is_default' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'       => 'SAR',
                'name'       => 'Saudi Riyal',
                'symbol'     => '﷼',
                'rate'       => 3.75, // 1 USD = 3.75 SAR
                'is_default' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'       => 'AED',
                'name'       => 'UAE Dirham',
                'symbol'     => 'د.إ',
                'rate'       => 3.67,
                'is_default' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'       => 'IQD',
                'name'       => 'Iraqi Dinar',
                'symbol'     => 'د.ع',
                'rate'       => 1300,
                'is_default' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
