<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class CartController extends Controller
{
    public function add(Product $product)
    {
      //($product);
      // add the product to cart
\Cart::session(auth()->id())->add(array(
    'id' => $product->id,
    'name' => $product->name,
    'price' => $product->price,
    'quantity' => 1,
    'attributes' => array(),
    'associatedModel' => $product
));

return redirect()->route('cart.index');
    }
    public function index(){
    $cartitems = \Cart::session(auth()->id())->getContent();
      return view('cart.index',compact('cartitems'));
    }
    public function destroy($itemid)
    {

      // delete an item on cart
         $cartitems=\Cart::session(auth()->id())->remove($itemid);
           return redirect()->route('cart.index');


    }
    public function update($id)
    {
      \Cart::session(auth()->id())->update($id, array(
        'quantity' => array(
            'relative' => false,
            'value' => request('quantity')
        ),
      ));
      return redirect()->route('cart.index');
    }
    public function checkout()
    {
      return view('cart.checkout' );
    }
}
