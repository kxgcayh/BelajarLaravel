<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'user_id'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'id');
    }

    protected $dates = [
        'attended_at', 'returned_at'
    ];

    const CREATED_AT = 'attended_at';
    const UPDATED_AT = 'returned_at';
}
