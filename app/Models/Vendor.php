<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    protected $table = 'vendors';
    protected $fillable = [
        'name',
        'image_profile',
        'image_banner',
        'service',
        'province',
        'city',
        'address',
        'email',
        'phone',
        'rate',
        'sm_instagram',
        'sm_whatsapp',
        'sm_facebook',
        'sm_twitter',
        'youtube_url_1',
        'youtube_url_2',
        'youtube_url_3',
        'youtube_url_4',
        'status'
    ];
}
