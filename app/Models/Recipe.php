<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $table = 'recipes';
    protected $fillable = [
        'name',
        'description',
    ];

    public function ingredients()
    { //define the relationship between table ingredients and recipe
        return $this->hasMany(Ingredient::class, 'recipe_id');
    }
}
