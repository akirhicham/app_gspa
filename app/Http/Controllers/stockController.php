<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Product;
use Illuminate\Http\Request;

class stockController extends Controller
{
    //
    public function index(){
         // Fetch all stock entries from the database just to be sure if it"s submited or not
         $stockEntries = Stock::all();

         // Fetch all products for the dropdown 
         $products = Product::all();
 
         // Pass the stock produts and products to the view
         return view('add_product', [
             'stockEntries' => $stockEntries,
             'products' => $products,
         ]);
    }

    public function create(Request $request)
    {
             // Validate the form data
             $validatedData = $request->validate([
                'product_id' => 'required|exists:products,id',
                'weight_quantity' => 'required',
                'expiration_date' => 'required|date',
            ]);
    
            // stored a new stock 
            Stock::create($validatedData);
    
            // Redirect to the form with a success 
            return redirect()->route('add_product')->with('success', 'Product added successfully.');
        
    }



    public function getProductsInStock()
    {
        // Fetch the list of products in stock
        $productsInStock = Stock::with('product')->get();
    
        // Return a JSON response
        return response()->json($productsInStock);
    }

   
}
