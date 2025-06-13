<?php
namespace Database\Factories;

use App\Models\Donation;
use Illuminate\Database\Eloquent\Factories\Factory;

class DonationFactory extends Factory
{
    protected $model = Donation::class;

    public function definition(): array
    {
        return [
            'user_id'        => 1, // أو قم بتعديلها حسب بيانات المستخدمين
            'amount'         => $this->faker->randomFloat(2, 10, 300),
            'message'        => $this->faker->sentence(),
            'status'         => 'paid',
            'payment_method' => 'manual',
            'transaction_id' => null,
        ];
    }
}
