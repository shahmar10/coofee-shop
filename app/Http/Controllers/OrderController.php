<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function order(Request $request)
    {
        $validated = $request->validate([
            'contact' => 'required',
            'adress' => 'required',
        ]);

        $products = Basket::where('session', Session::get('session'))->with('product')->get();

        foreach ($products as $product){
            $order = new Order();

            $order->session     = Session::get('session');
            $order->product_id  = $product->product_id;
            $order->quantity    = $product->quantity;
            $order->save();

            Basket::findOrFail($product->id)->delete();
        }

        //Detail
        $detail = new OrderDetail();

        $detail->session = Session::get('session');
        $detail->adress  = $request->adress;
        $detail->contact = $request->contact;
        $detail->save();

        Session::forget('session');

        return redirect()->route('product.index')->with('success','Ordered successfully');

    }
}
