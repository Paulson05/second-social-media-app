<?php

namespace App\Models;
use App\Models\Users;
use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'statuses';
    protected $fillable = [
        'body',
        'user_id'
    ];
    public  function user(){
        return $this->belongsTo(Users::class, 'user_id');
    }
    public function scopeNotReply($query)
    {
        return $query->whereNull('parent_id');
    }

    public function replies()
    {
        return $this->hasMany('App\Models\Status',  'parent_id');
    }
}
