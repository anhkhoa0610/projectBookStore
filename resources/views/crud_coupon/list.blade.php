@extends('dashboard')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <!--Created by- https://bootsnipp.com/ishwarkatwe-->
                <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

                <div class="nav-side-menu">
                    <div class="brand">Quản Lý</div>
                    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

                    <div class="menu-list">

                        <ul id="menu-content" class="menu-content collapse out">
                            <li>
                                <a href="#">
                                    Quản Lý User
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Quản Lý Danh Mục
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Quản Lý Tác Giả
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Quản Lý Sản Phẩm
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Quản Lý Đơn Hàng
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    </i> Quản Lý Review
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    </i> Quản Lý Kho
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('coupon.list') }}">
                                    Quản Lý Coupon
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Quản Lý Nhà Xuất Bản
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h4>Coupon List
                            <a href="{{ route('coupon.create') }}" class="btn btn-primary float-end">Add Coupon</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Coupon Code</th>
                                    <th>Discount Amount</th>
                                    <th>Valid From</th>
                                    <th>Valid To</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($coupons as $coupon)
                                    <tr>
                                        <td>{{ $coupon->id }}</td>
                                        <td>{{ $coupon->coupon_code }}</td>
                                        <td>{{ $coupon->discount_amount }}</td>
                                        <td>{{ $coupon->valid_from }}</td>
                                        <td>{{ $coupon->valid_to }}</td>
                                        <td>
                                            <a href="{{ route('coupon.edit', $coupon->id) }}"
                                                class="btn btn-success btn-sm">Edit</a>
                                            <form action="{{ route('coupon.delete', $coupon->id) }}" method="POST"
                                                style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                            <a href="{{ route('coupon.read', ['id' => $coupon->id]) }}"
                                                class="btn btn-info btn-sm">Show</a>
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