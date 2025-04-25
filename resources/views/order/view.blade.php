@extends('dashboard')

@section('content')
    <style>
        .container {
            width: fit-content;
            margin: 15px auto;
        }

        table {
            min-width: 30vw;
        }

        th {
            padding: 10px;
            text-align: center;
            border: 1px solid black;
        }
    </style>
    <main class="login-form">
        <div class="container">
            <div class="row justify-content-center">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>{{$order->id}}</th>
                            <th>{{$order->address}}</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <div class="container">
        <h3>List of Products</h3>
        <div class="row justify-content-center">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->products as $product)
                        <tr>
                            <th>{{$product->id}}</th>
                            <th>{{$product->name}}</th>
                            <th>{{$product->price}}</th>
                            <th>{{$product->quantity}}</th>
                            <th>{{$product->description}}</th>
                        </tr>
                    @endforeach
                </tbody>
                
            </table>
        </div>


    </div>
@endsection