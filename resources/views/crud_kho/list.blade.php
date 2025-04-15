@extends('dashboard')

@section('content')



@session('status')
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endsession

<div class="card">
    <div class="card-header">
        <h4>Repo List
            <a href="{{ route('repo.createRepo') }}" class="btn btn-primary float-end">Add Repo</a>
        </h4>
    </div>
    <div class="card-body">
        <table class="table table-stiped table-bordered text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>BookName</th>
                    <th>Warehouse Location</th>
                    <th>Quantity Available</th>
                    <th>Last Updated</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($repos as $repo)
                <tr>
                    <th>{{ $repo->id }}</th>
                    <th>{{ $repo->bookName }}</th>
                    <th>{{ $repo->warehouseLocation}}</th>
                    <th>{{ $repo->quantityAvailable}}</th>
                    <th>{{ $repo->lastUpdated }}</th>


                    <td>
                        <a href="{{ route('repo.updateRepo', ['id' => $repo->id]) }}" class="btn btn-success">Edit</a>
                        <a href="{{ route('repo.readRepo', ['id' => $repo->id]) }}" class="btn btn-info">Show</a>
                        <a href="{{ route('repo.deleteRepo', ['id' => $repo->id]) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
        {{$repos->links()}}


        @endsection