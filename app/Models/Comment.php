<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $with = ['user'];

    // تحديد الحقول القابلة للتعبئة (لحماية البيانات)
    protected $fillable = [
        'article_id',
        'user_id',
        'name',
        'email',
        'comment',
    ];

    // العلاقة مع المقال
    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    // العلاقة مع المستخدم (إن وُجد)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
