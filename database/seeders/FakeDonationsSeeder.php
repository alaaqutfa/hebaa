<?php
namespace Database\Seeders;

use App\Models\Donation;
use App\Models\DonationCampaign;
use App\Models\Transaction;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FakeDonationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // تعطيل التحقق من المفاتيح الخارجية مؤقتاً
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('donation_campaigns')->truncate();
        DB::table('donations')->truncate();
        DB::table('transactions')->truncate();

        // إعادة التحقق
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // إنشاء 5 حملات
        DonationCampaign::factory()->count(15)->create()->each(function ($campaign) {
            // لكل حملة، أنشئ 10 تبرعات
            Donation::factory()->count(10)->create([
                'campaign_id' => $campaign->id,
                'status'      => 'paid',
            ])->each(function ($donation) {
                // لكل تبرع، أنشئ معاملة
                Transaction::create([
                    'donation_id'    => $donation->id,
                    'reference_id'   => Str::uuid(),
                    'payment_status' => 'success',
                    'paid_at'        => now(),
                    'created_at'     => now(),
                    'updated_at'     => now(),
                ]);
            });
        });

    }
}
