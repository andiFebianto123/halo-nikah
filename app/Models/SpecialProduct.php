<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SpecialProduct extends Model
{
    use HasFactory;
    protected $table = 'special_products';
    protected $fillable = [
        'product_id',
        'type',
        'is_permanently',
        'date_start',
        'date_end',
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
