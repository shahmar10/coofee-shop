<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BasketController extends Controller
{
    public function index()
    {
        $products = Basket::where('session', Session::get('session'))->with('product')->get();

        $payment = 0;

        foreach ($products as $product) {
            $payment += ($product->quantity*$product->product->price);
        }

        return view('basket.index',compact('products','payment'));
    }

    public function destroy($id)
    {
        $product = Basket::findOrFail($id);

        if ( $product->session == Session::get('session') ) {
            $product->delete();
        }

        return redirect()->back()->with('success','Successfully deleted');
    }


}
