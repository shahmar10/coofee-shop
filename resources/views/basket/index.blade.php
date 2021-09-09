@extends('layout.layout')

@section('content')

    <br>
    <div class="alert alert-primary">
        <a href="{{route('product.index')}}">Back</a>
    </div>
    @if (session('success'))
        {{ session('success') }}
    @endif
    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Product name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $product->product->name }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->product->price }} AZN</td>
                <td>
                    <form action="{{ route('basket.delete',$product->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    @if($products->count()>0)
        <div class="alert alert-secondary">
            Cost: {{ $payment }} AZN
            <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-sm btn-success">Purchase</button>
        </div>
    @endif
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Complete order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('order') }}" method="post">
                    @csrf
                    <div class="modal-body">
                            <div class="form-group">
                                <label for="adress" class="col-form-label">Adress :</label>
                                <input type="text" name="adress" class="form-control" id="adress">
                            </div>
                            <div class="form-group">
                                <label for="contant" class="col-form-label">Contact :</label>
                                <input type="text" name="contact" class="form-control" id="contant">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Order</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
