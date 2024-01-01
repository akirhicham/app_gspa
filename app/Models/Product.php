<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'products';
    protected $fillable = [
        'sku',
        'name',
        'description',
    ];

    public function ingredients()
    {
        //define the relationship between table ingredients and products
        return $this->hasMany(Ingredient::class, 'product_id');
    }

  
}
