<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RangePrice extends Model
{
    use HasFactory;
    protected $table = 'range_prices';
    protected $fillable = ['ket', 'min', 'max'];
}
