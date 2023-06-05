<?php

namespace App\Models;

use App\Models\Kategorie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'detail',
        'kategori_id',
        'vendor_id',
        'terms_and_condition',
        'discounted_price',
        'price',
        'product_image_1',
        'product_image_2',
        'product_image_3',
        'product_image_4',
        'status'
    ];

    function kategori(){
        return $this->belongsTo(Kategorie::class, 'kategori_id', 'id');
    }

    function vendor(){
        return $this->belongsTo(Vendor::class);
    }

}
