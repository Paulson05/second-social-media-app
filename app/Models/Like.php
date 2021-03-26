<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    protected $table  = 'likeable';
    protected $guarded = [];

    public function likeable()
    {

        return $this->morphTo();

    }

    public function user()
    {
        return $this->belongsTo(Users::class,  'user_id');
    }
}
