<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;
use App\Models\BlogTag;
use App\Models\User;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blogs';
    protected $fillable = [
        'id',
        'title',
        'slug',
        'image',
        'content',
        'user_id',
        'date',
    ];

    function user(){
        return $this->belongsTo(User::class);
    }

    function tags(){
        return $this->belongsToMany(Tag::class, BlogTag::class, 'blog_id', 'tag_id');
    }
}
