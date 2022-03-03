<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post_Images extends Model
{
    use HasFactory;

    protected $fillable=['url','post_id'];
    protected $dates = ['created_at', 'updated_at']; 

    public function post()
    {
        return $this->belongsTo(Post::class,'post_id');
    }
}
