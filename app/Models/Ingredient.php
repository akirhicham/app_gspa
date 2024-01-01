<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ingredient extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'ingredients';
    protected $fillable = [
        'recipe_id',
        'product_id',
        'weight_quantity',
    ];



     //in this next two functions the relatrionship of table ingredients and the two table (recipe, prodcuts) will be defined
    public function recipe()
    {
        return $this->belongsTo(Recipe::class, 'recipe_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
