<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonationCampaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'target_amount',
        'single_amount',
        'allow_full_donation',
        'status',
        'start_date',
        'end_date',
    ];

    // علاقته بالتبرعات
    public function donations()
    {
        return $this->hasMany(Donation::class, 'campaign_id');
    }
}
