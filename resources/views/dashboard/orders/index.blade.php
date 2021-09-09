<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

@if (session('success'))
    {{ session('success') }}
@endif
<table class="table">
    <thead>
    <tr>
        <th>#</th>
        <th>Adress</th>
        <th>Contact</th>
        <th>Different type of coofee count</th>
        <th>Delivered</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($orders as $order)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $order->adress }}</td>
            <td>{{ $order->contact }}</td>
            <td>{{ count($order->orders) }}</td>
            <td>@if($order->delivered_at !== null) {{ $order->delivered_at }} @else Not Delivered @endif</td>
            <td>
                <a href="{{ route('orders.show',$order->id) }}">Look Order</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>

</body>
</html>
