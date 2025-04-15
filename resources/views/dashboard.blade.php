<!DOCTYPE html>
<html>

<head>
    <title>Laravel 10.48.0 - CRUD book Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/scripts.js') }}"></script>
    <style>

    </style>
</head>
<style>
    .nav-side-menu {
        overflow: auto;
        font-family: verdana;
        font-size: 12px;
        font-weight: 200;
        background-color: #2e353d;
        position: fixed;
        top: 0;
        width: 300px;
        height: 100%;
        color: #e1ffff;
    }

    .nav-side-menu .brand {
        background-color: #23282e;
        line-height: 50px;
        display: block;
        text-align: center;
        font-size: 14px;
    }

    .nav-side-menu .toggle-btn {
        display: none;
    }

    .nav-side-menu ul,
    .nav-side-menu li {
        list-style: none;
        padding: 0px;
        margin: 0px;
        line-height: 35px;
        cursor: pointer;
        /*    
    .collapsed{
       .arrow:before{
                 font-family: FontAwesome;
                 content: "\f053";
                 display: inline-block;
                 padding-left:10px;
                 padding-right: 10px;
                 vertical-align: middle;
                 float:right;
            }
     }
*/
    }

    .nav-side-menu ul :not(collapsed) .arrow:before,
    .nav-side-menu li :not(collapsed) .arrow:before {
        font-family: FontAwesome;
        content: "\f078";
        display: inline-block;
        padding-left: 10px;
        padding-right: 10px;
        vertical-align: middle;
        float: right;
    }

    .nav-side-menu ul .active,
    .nav-side-menu li .active {
        border-left: 3px solid #d19b3d;
        background-color: #4f5b69;
    }

    .nav-side-menu ul .sub-menu li.active,
    .nav-side-menu li .sub-menu li.active {
        color: #d19b3d;
    }

    .nav-side-menu ul .sub-menu li.active a,
    .nav-side-menu li .sub-menu li.active a {
        color: #d19b3d;
    }

    .nav-side-menu ul .sub-menu li,
    .nav-side-menu li .sub-menu li {
        background-color: #181c20;
        border: none;
        line-height: 28px;
        border-bottom: 1px solid #23282e;
        margin-left: 0px;
    }

    .nav-side-menu ul .sub-menu li:hover,
    .nav-side-menu li .sub-menu li:hover {
        background-color: #020203;
    }

    .nav-side-menu ul .sub-menu li:before,
    .nav-side-menu li .sub-menu li:before {
        font-family: FontAwesome;
        content: "\f105";
        display: inline-block;
        padding-left: 10px;
        padding-right: 10px;
        vertical-align: middle;
    }

    .nav-side-menu li {
        padding-left: 0px;
        border-left: 3px solid #2e353d;
        border-bottom: 1px solid #23282e;
        text-align: center;
        padding: 10px;
    }

    .nav-side-menu li a {
        text-decoration: none;
        color: #e1ffff;
        text-align: center;
    }


    .nav-side-menu li:hover {
        border-left: 3px solid #d19b3d;
        background-color: #4f5b69;
        -webkit-transition: all 1s ease;
        -moz-transition: all 1s ease;
        -o-transition: all 1s ease;
        -ms-transition: all 1s ease;
        transition: all 1s ease;
    }

    @media (max-width: 767px) {
        .nav-side-menu {
            position: relative;
            width: 100%;
            margin-bottom: 10px;
        }

        .nav-side-menu .toggle-btn {
            display: block;
            cursor: pointer;
            position: absolute;
            right: 10px;
            top: 10px;
            z-index: 10 !important;
            padding: 3px;
            background-color: #ffffff;
            color: #000;
            width: 40px;
            text-align: center;
        }

        .brand {
            text-align: left !important;
            font-size: 22px;
            padding-left: 20px;
            line-height: 50px !important;
        }
    }

    @media (min-width: 767px) {
        .nav-side-menu .menu-list .menu-content {
            display: block;
        }
    }

    body {
        margin: 0px;
        padding: 0px;
    }

    .content-container {
        overflow-x: auto; /* Enable horizontal scrolling if content overflows */
        overflow-y: auto;
        zoom: 1; /* Default zoom level */
        -webkit-transform: scale(1); /* Ensure scaling works in WebKit browsers */
        -webkit-transform-origin: 0 0; /* Set scaling origin */
    }

    @media (max-width: 768px) {
        .content-container {
            padding: 10px; /* Add padding for smaller screens */
        }
    }

    @media (min-width: 768px) {
        .content-container {
            padding: 20px; /* Add padding for larger screens */
        }
    }
</style>

<body>
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
                            <a href="{{ route('categories.list') }}">
                                Quản Lý Danh Mục
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Quản Lý Tác Giả
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('book.list') }}">
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
                            <a href="{{ route('repo.list') }}">
                                </i> Quản Lý Kho
                            </a>
                        </li>
                        <li>
                            <a href="#">
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