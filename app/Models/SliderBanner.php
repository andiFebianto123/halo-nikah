<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SliderBanner extends Model
{
    use HasFactory;
    protected $table = 'slider_banners';
    protected $fillable = [
        'title',
        'sub_title',
        'img',
        'price',
        'order',
        'button_text',
        'url',
        'status',
    ];
}
