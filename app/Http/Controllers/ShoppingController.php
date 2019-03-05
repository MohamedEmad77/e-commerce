<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

use Cart;

use Session;

class ShoppingController extends Controller
{
    public function add_to_cart(Request $request){

        $product = Product::find($request->product);
        $cart = Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $request->quantity,
            'price' =>$product->price
        ]);
        Session::flash('success', 'Product added to cart.');    
        Cart::associate($cart->rowId, 'App\Product');

        return redirect()->route('cart');
    }

    public function cart(){
        //Cart::destroy();
        return view('cart');
    }

    public function cart_delete($id){
        Cart::remove($id);
        return redirect()->back();
    }

    public function inc($id, $qty){
        Cart::update($id, $qty = $qty + 1);
        return redirect()->back();
    }

    public function reduce($id, $qty){
        Cart::update($id, $qty = $qty -1);
        return redirect()->back();
    }



    public function rapid_add($id)
    {
        $pdt = Product::find($id);
        $cartItem = Cart::add([
            'id' => $pdt->id,
            'name' => $pdt->name,
            'qty' => 1,
            'price' => $pdt->price
        ]);
        Cart::associate($cartItem->rowId, 'App\Product');
        Session::flash('success', 'Product added to cart.');
        return redirect()->back();
    }



}
