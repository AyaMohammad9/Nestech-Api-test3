<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable=['content','post_id','auther_id'];
    protected $dates = ['created_at', 'updated_at']; 

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function auther(){
        return $this->belongsTo(User::class);
    }
}
