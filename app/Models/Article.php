<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // ✅ تحميل العلاقات تلقائياً
    protected $with = ['user', 'categories', 'images', 'comments'];

    // ✅ التحويل التلقائي للحقول الزمنية إلى Carbon
    protected $casts = [
        'published_at' => 'datetime',
        'created_at'   => 'datetime',
        'updated_at'   => 'datetime',
    ];

    // ✅ الحقول القابلة للتعبئة
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'image',
        'content',
        'is_published',
        'published_at',
        'date',
        'featured',
    ];

    // ✅ العلاقات
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function images()
    {
        return $this->hasMany(ArticleImage::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', 1);
    }
}
