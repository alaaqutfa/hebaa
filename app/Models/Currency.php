<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $fillable = ['code', 'name', 'symbol', 'rate', 'is_default'];

    public static function getDefault()
    {
        return static::where('is_default', true)->first();
    }

    public static function convert($amount)
    {
        $to      = session('currency', 'USD');
        $default = self::getDefault();
        $target  = self::where('code', $to)->first();

        if (! $default || ! $target) {
            return null;
        }

        // من الدولار إلى الهدف
        return $amount * $target->rate;
    }

    public static function format($amount)
    {
        $to       = session('currency', 'USD');
        $currency = self::where('code', $to)->first();
        if (! $currency) {
            return self::convert($amount);
        }

        return number_format(self::convert($amount), 2) . ' ' . $currency->symbol;
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
}
