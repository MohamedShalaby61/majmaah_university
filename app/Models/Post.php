<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        "title",
        "body",
        "images",'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'post_id','id');
    }
}
