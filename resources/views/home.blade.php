@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      @foreach($products as $product)
      <div class="card" style="width: 18rem;">
<img class="card-img-top" src="{{asset('download.png')}}" alt="Card image cap">
<div class="card-body">
  <h5 class="card-title">{{$product->name}}</h5>
  <p class="card-text">{{$product->description}}</p>
  <a href="{{route('cart.add',$product->id)}}" class="btn btn-primary">Add to cart</a>
</div>
</div>
@endforeach
        </div>
</div>
@endsection
