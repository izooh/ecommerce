@extends('layouts.app')
@section('content')
<h2>Your Cart Items</h2>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($cartitems as $cartitem)
    <tr>
      <td>{{$cartitem->name}}</td>
      <td>
       {{Cart::session(auth()->id())->get($cartitem->id)->getPriceSum()}}
      </td>
      <td>
        <form action="{{route('cart.update',$cartitem->id)}}">
          <input type="number" name="quantity" value="{{$cartitem->quantity}}">
          <input type="submit" value="save">
      </form>
      </td>
      <td><a href="{{route('cart.destroy',$cartitem->id)}}">Delete</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
<h3>Total Price KSH.{{Cart::session(auth()->id())->getTotal()}}</h3>
<a class="btn btn-primary" href="{{route('cart.checkout')}}" role="button">Proceed to Checkout</a>

@endsection
