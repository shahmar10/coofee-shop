@extends('layout.layout')

@section('content')

<br>
<div class="alert alert-primary">
    <a href="{{route('basket.index')}}">Cart ({{ $basket_count ?? 0 }})</a>
</div>
@if (session('success'))
    {{ session('success') }}
@endif
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Product name</th>
            <th>Price</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }} AZN</td>
                <td>
                    @if ( count($product->basket)<1 )
                        <form action="{{ route('product.addToBasket') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="number" name="quantity" required>
                            <button type="submit" class="btn btn-sm btn-success">Add</button>
                        </form>
                    @else
                        In cart
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
