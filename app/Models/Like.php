<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    protected $table  = 'Likeable';


    public function likeable()
    {

        return $this->morphTo();

    }

    public function user()
    {
        $this->belongsTo('App\Models\Users',  'user_id');
    }
}
