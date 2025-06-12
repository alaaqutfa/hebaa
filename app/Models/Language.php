<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Language extends Model
{

    protected $fillable = ['name', 'code', 'direction', 'is_active'];

    public function isRtl(): bool
    {
        return $this->direction === 'rtl';
    }

    public function isLtr(): bool
    {
        return $this->direction === 'ltr';
    }

    public function translations(): HasMany
    {
        return $this->hasMany(Translation::class, 'locale', 'code');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
}
