<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'product_id';
    protected $fillable = [
        'category_id',
        'brand_id',
        'product_name',
        'product_slug',
        'product_desc',
        'product_quantity',
        'product_price',
        'product_discount',
        'product_detail',
        'product_img',
        'product_status'
    ];
    public $timestamps = true;
    function gallery()
    {
        return $this->hasMany('App\Models\Gallery', 'product_id');
    }
    function comment(){
        return $this->hasMany('App\Models\Comment', 'product_id');
    }
}