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
                                <a href="{{ route('user.list') }}">
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
                                <a href="#">
                                    Quản Lý Vocher
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

                @session('status')
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endsession

                <div class="card">
                    <div class="card-header">
                        <h4>User List
                            <a href="{{ route('user.createUser') }}" class="btn btn-primary float-end">Add User</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-stiped table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>DoB</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <th>{{ $user->id }}</th>
                                        <th>{{ $user->full_name }}</th>
                                        <th>{{ $user->email }}</th>
                                        <th>{{ $user->phone }}</th>
                                        <th>{{ $user->address }}</th>
                                        <th>{{ $user->dob }}</th>
                                        <th>{{ $user->role }}</th>


                                        <td>
                                            <a href="{{ route('user.updateUser', ['id' => $user->id]) }}"
                                                class="btn btn-success">Edit</a>
                                            <a href="{{ route('user.readUser', ['id' => $user->id]) }}"
                                                class="btn btn-info">Show</a>
                                            <a href="{{ route('user.deleteUser', ['id' => $user->id]) }}"
                                                class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    <!-- Hiển thị phân trang -->
                    <div class="d-flex justify-content-center">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection