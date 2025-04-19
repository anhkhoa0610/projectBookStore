@extends('dashboard')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">

            @session('status')
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endsession

            <div class="card">
                <div class="card-header">
                    <h4>Orders list
                        <a href="{{ route('orders.createOrder') }}" class="btn btn-primary float-end">Add new order</a>
                    </h4>
                </div>
                <div class="card-body table-responsive  ">
                    <table class="table table-stiped table-bordered text-center w-100 ">
                        <thead>
                            <tr>
                                <th>order ID</th>
                                <th>user id</th>
                                <th>order date</th>
                                <th>status</th>
                                <th>tracking number</th>
                                <th>carrier</th>
                                <th>coupon id</th>
                                <th>total price</th>
                                <th  >Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <th>{{ $order->order_id }}</th>
                                <th>{{ $order->user_id}}</th>
                                <th>{{ $order->order_date}}</th>
                                <th>{{ $order->status}}</th>
                                <th>{{ $order->tracking_number}}</th>
                                <th>{{ $order->carrier}}</th>
                                <th>{{ $order->coupon_id}}</th>
                                <th>{{ number_format($order->total_price/1000,3)}} đ</th>

                                <td class="d-flex gap-2"  >
                                    <a   href="{{ route('orders.updateOrder', ['order_id' => $order->order_id]) }}" class="btn btn-success" style="height:30%" >Edit</a>
                                    <a  href="{{ route('orders.readOrder', ['order_id' => $order->order_id]) }}" class="btn btn-info" style="height:30%" >Show</a>
                                    <a  href="{{ route('orders.deleteOrder', ['order_id' => $order->order_id]) }}" class="btn btn-danger" style="height:30%" >Delete</a>
                                    <a  href="{{ route('oders.listOrderDetailsById', ['order_id' => $order->order_id]) }}" class="btn btn-info " style="" >details</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection