<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory ,SoftDeletes; 

    protected $fillable = [
        'id',
        'en_content',
        'ar_content',
        'category_id',
        'auther_id'  
    ];

    protected $dates = ['created_at', 'updated_at']; 

    public function auther()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function images( )
    { 
        return $this->hasMany(Post_Images::class);
    }
}
