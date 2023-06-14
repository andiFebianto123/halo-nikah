<?php

namespace App\Models;
use App\Models\Kategorie;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\City;

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

    function kota(){
        return $this->belongsTo(City::class, 'city', 'id');
    }

    public function kategori(){
        return $this->belongsTo(Kategorie::class, 'kategori_id', 'id');
    }
}
