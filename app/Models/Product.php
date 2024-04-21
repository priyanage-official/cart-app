<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'product_name',
        'product_price',
        'product_image',
        'product_description',
        'product_status'
    ];

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
