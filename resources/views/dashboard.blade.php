<!DOCTYPE html>
<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel 10.48.0 - CRUD book Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="{{ asset('css/styles.css') }}" rel="stylesheet"> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- <script type="text/javascript" src="{{ asset('js/scripts.js') }}"></script> -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>


<body>
    <div class="row">
        <div class="col-md-3">
            <!--Created by- https://bootsnipp.com/ishwarkatwe-->
            <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

            <div class="nav-side-menu">
                <a href="{{ route('index') }}" class="brand">
                    <img class="brand-logo" src="{{ asset('images/logo.png') }}" alt="">
                </a>
                <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

                <div class="menu-list">

                    <ul id="menu-content" class="menu-content collapse out">
                        <li>
                            <a href="{{ route('user.list') }}">
                                Quản Lý User
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('categories.list') }}">
                                Quản Lý Danh Mục
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('authors.list') }}">
                                Quản Lý Tác Giả
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('book.list') }}">
                                Quản Lý Sản Phẩm
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('orders.list') }}">
                                Quản Lý Đơn Hàng
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('reviews.list') }}">
                                </i> Quản Lý Review
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('repo.list') }}">
                                </i> Quản Lý Kho
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('coupon.list') }}">
                                Quản Lý Voucher
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('publisher.list') }}">
                                Quản Lý Nhà Xuất Bản
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9 mt-5 content-container">
            @yield('content')
        </div>
    </div>

</body>

</html>