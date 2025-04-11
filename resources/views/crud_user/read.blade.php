
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Age</th>
                                <th>Like</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>{{ $messi->id }}</th>
                                <th>{{ $messi->name }}</th>
                                <th>{{ $messi->email }}</th>
                                <th>{{ $messi->age }}</th>
                                <th>{{ $messi->like }}</th>                 
                            </tr>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection