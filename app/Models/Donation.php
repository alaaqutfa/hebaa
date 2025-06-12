<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Donation extends Model
{
    protected $fillable = [
        'user_id',
        'amount',
        'message',
        'status',
        'payment_method',
        'transaction_id',
    ];

    protected $casts = [
        'amount'     => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // العلاقة مع المستخدم
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // العلاقة مع المعاملات (transaction)
    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    // عرض حالة التبرع بشكل ودي
    public function getStatusLabel(): string
    {
        return match ($this->status) {
            'paid' => 'مدفوع',
            'pending' => 'قيد الانتظار',
            'failed' => 'فشل',
            default => 'غير معروف',
        };
    }
}
