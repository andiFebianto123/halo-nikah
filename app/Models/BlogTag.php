<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Blog;
use App\Models\Tag;

class BlogTag extends Model
{
    use HasFactory;
    protected $table = 'blog_tags';
    protected $fillable = ['id', 'blog_id', 'tag_id'];

    function blog(){
        return $this->belongsTo(Blog::class);
    }

    function tag(){
        return $this->belongsTo(Tag::class);
    }
}
