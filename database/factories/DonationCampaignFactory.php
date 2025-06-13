<?php
namespace Database\Factories;

use App\Models\DonationCampaign;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DonationCampaign>
 */
class DonationCampaignFactory extends Factory
{
    protected $model = DonationCampaign::class;

    public function definition(): array
    {
        return [
            'title'               => $this->faker->sentence(3),
            'description'         => $this->faker->paragraph(3),
            'image'               => null,
            'target_amount'       => $this->faker->numberBetween(500, 5000),
            'single_amount'       => $this->faker->numberBetween(50, 200),
            'allow_full_donation' => $this->faker->boolean(),
            'status'              => $this->faker->randomElement(['active', 'inactive']),
            'start_date'          => now()->subDays(rand(1, 10)),
            'end_date'            => now()->addDays(rand(1, 10)),
        ];
    }
}
