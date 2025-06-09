<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendingUser extends Model
{

    protected $table = 'pending_users';

    protected $fillable = [
        'name',
        'last_name',
        'email',
        'phone',
        'password',
        'token',
    ];

    public $timestamps = true;
}
