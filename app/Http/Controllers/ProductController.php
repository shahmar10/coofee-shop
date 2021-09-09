<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index(){

        $products = Product::with('basket')->get();

        $basket_count = Basket::where('session', Session::get('session'))->count();

        return view('products.index',compact('products','basket_count'));

    }

    public function addToBasket(Request $request){

        $validated = $request->validate([
            'product_id' => 'required|integer',
            'quantity' => 'required|integer',
        ]);

        $product_id = $request->product_id;
        $quantity   = $request->quantity;
        $session    = Session::get('session');

        $basket = new Basket();

        $basket->product_id = $product_id;
        $basket->quantity   = $quantity;
        $basket->session    = $session;
        $basket->save();

        return redirect()->route('product.index')->with('success','Ugurla elave olundu!');

    }
}
