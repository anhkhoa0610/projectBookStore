
@extends('dashboard')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">

            

            <div class="card">
                <div class="card-header">
                    <h4>Read User
                    <a href="{{ route('user.list') }}" class="btn btn-danger float-end">Back</a>
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
                               
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>{{ $messi->id }}</th>
                                <th>{{ $messi->full_name }}</th>
                                <th>{{ $messi->email }}</th>
                                <th>{{ $messi->phone }}</th>
                                <th>{{ $messi->address }}</th>                 
                                <th>{{ $messi->dob }}</th>                 
                                <th>{{ $messi->role }}</th>                 
                            </tr>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection