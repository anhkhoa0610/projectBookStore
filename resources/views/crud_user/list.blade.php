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
                    <h4>User List
                        <a href="{{ route('user.createUser') }}" class="btn btn-primary float-end">Add Category</a>
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
                                    <a href="{{ route('user.updateUser', ['id' => $user->id]) }}" class="btn btn-success">Edit</a>
                                    <a  href="{{ route('user.readUser', ['id' => $user->id]) }}" class="btn btn-info">Show</a>
                                    <a  href="{{ route('user.deleteUser', ['id' => $user->id]) }}" class="btn btn-danger">Delete</a>
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