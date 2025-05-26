@extends('dashboard')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">

            

            <div class="card">
                <div class="card-header">
                    <h4>View Detail
                    <a href="{{ route('publisher.list') }}" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-stiped table-bordered text-center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Contact Info</th>
                                <th>Address</th>                        
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>{{ $publisher->publisher_id }}</th>
                                <th>{{ $publisher->publisher_name }}</th>
                                <th>{{ $publisher->contact_info }}</th>
                                <th>{{ $publisher->address }}</th>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection