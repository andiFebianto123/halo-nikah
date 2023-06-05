<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Popup extends Model
{
    use HasFactory;
    protected $table = 'pop_ups';
    protected $fillable = [
        'name', 'img', 'url', 'date_start', 'date_end', 
        'status'
    ];
}
