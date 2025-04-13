<!-- @extends('dashboard') -->

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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Age</th>
                                <th>Like</th>
                                <th style="max-with:70px;" >Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <th>{{ $user->id }}</th>
                                <th>{{ $user->name }}</th>
                                <th>{{ $user->email }}</th>
                                <th>{{ $user->age }}</th>
                                <th>{{ $user->like }}</th>

                               
                                <td style="display:flex, gap:5px, max-with:70px;" >
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