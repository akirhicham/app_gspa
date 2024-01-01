<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Recipe;
use Illuminate\Http\Request;

class recipeController extends Controller
{
    public function get_recipe()
    {
        // Fetch products in stock
        $productsInStock = Stock::with('product')->get();

        // Fetch all recipes from the database
        $allRecipes = Recipe::with('ingredients')->get();

        // Logic to determine  recipes based on available products and recipes
        $getRecipes = $this->filterGet_recipe($allRecipes, $productsInStock);

        // Return the possible recipes as JSON response
        return response()->json($getRecipes);
    }




     // get recipes based on  products in stock
     private function filterGet_recipe($recipes, $productsInStock)
     {
         // Array to store  recipes
         $getRecipes = [];
 
         foreach ($recipes as $recipe) {
             // Check if all ingredients for the recipe are available in stock
             $missingIngredients = $this->getMissingIngredients($recipe, $productsInStock);
 
             if (empty($missingIngredients)) {
                 // All ingredients are in stock
                 $getRecipes[] = [
                     'recipe' => $recipe,
                     'status' => 'Available',
                 ];
             } else {
                 // Some ingredients are missing, add the recipe with missing ingredients
                 $getRecipes[] = [
                     'recipe' => $recipe,
                     'status' => 'Missing',
                     'missing_ingredients' => $missingIngredients,
                 ];
             }
         }
 
         return $getRecipes;
     }
 
     // Missing ingredients for a recipe
     private function getMissingIngredients($recipe, $productsInStock)
     {
         $missingIngredients = [];
 
         foreach ($recipe->ingredients as $ingredient) {
             $productInStock = $productsInStock->where('product_id', $ingredient->product_id)->first();
 
             if (!$productInStock || $productInStock->weight_quantity < $ingredient->weight_quantity) {
                 // Ingredient is missing / not enough 
                 $missingIngredients[] = [
                     'product_id' => $ingredient->product_id,
                     'quantity_required' => $ingredient->weight_quantity,
                 ];
             }
         }
 
         return $missingIngredients;
     }






     public function validateRecipe(Request $request)
     {
         // Test recipe id
         $request->validate([
             'recipe_id' => 'required|exists:recipes,id',
         ]);
 
         // Fetch the recipe with its ingredients
         $recipe = Recipe::with('ingredients')->find($request->input('recipe_id'));
 
         if (!$recipe) {
             return response()->json(['error' => 'Recipe not found'], 404);
         }
 
         // Reduce the stocks of products used in the recipe
         $result = $this->reduceStocks($recipe);
 
         if ($result['success']) {
             return response()->json(['message' => 'Recipe validated successfully']);
         } else {
             return response()->json(['error' => 'Validation failed', 'missing_ingredients' => $result['missing_ingredients']], 422);
         }
     }
 
     // Reduce the stocks of products used in a recipe
     private function reduceStocks($recipe)
     {
         $missingIngredients = [];
 
         foreach ($recipe->ingredients as $ingredient) {
             $productInStock = Stock::where('product_id', $ingredient->product_id)->first();
 
             // Check if the ingredient is missing or not enough in stock
             if (!$productInStock || $productInStock->weight_quantity < $ingredient->weight_quantity) {
                 $missingIngredients[] = [
                     'product_id' => $ingredient->product_id,
                     'quantity_required' => $ingredient->weight_quantity,
                 ];
             } else {
                 // Update the stock quantity
                 $productInStock->decrement('weight_quantity', $ingredient->weight_quantity);
                 $productInStock->save();
             }
         }
 
         // return success
         $success = empty($missingIngredients);
 
         return ['success' => $success, 'missing_ingredients' => $missingIngredients];
     }
     

}
