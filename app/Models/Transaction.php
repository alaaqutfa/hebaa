<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    protected $with     = ['donation'];
    protected $fillable = [
        'donation_id',
        'reference_id',
        'payment_status',
        'paid_at',
    ];

    protected $casts = [
        'paid_at'    => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // العلاقة مع التبرع
    public function donation(): BelongsTo
    {
        return $this->belongsTo(Donation::class);
    }

    // وسم الحالة (اختياري لعرض ودي)
    public function getStatusLabel(): string
    {
        return match ($this->payment_status) {
            'paid' => 'مدفوع',
            'pending' => 'قيد الانتظار',
            'failed' => 'فشل',
            default => 'غير معروف',
        };
    }
}
