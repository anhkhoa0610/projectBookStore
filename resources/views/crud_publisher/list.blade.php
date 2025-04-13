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
                    <h4>Book List
                        <a href="{{ route('publisher.createPublisher') }}" class="btn btn-primary float-end">Add Publisher</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-stiped table-bordered text-center">
                        <thead>
                            <tr>
                                <th>Publisher Name</th>
                                <th>Contact Info</th>
                                <th style="max-width: 70px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($publishers as $publisher)
                            <tr>
                                <th>{{ $publisher->publisher_name }}</th>
                                <th>{{ $publisher->contact_info }}</th>

                               
                                <td style="display:flex; gap:5px; max-width: 70px;">
                                    <a href="{{ route('publisher.updatePublisher', ['publisher_id' => $publisher->publisher_id]) }}" class="btn btn-success">Edit</a>
                                    <a  href="{{ route('publisher.readPublisher', ['publisher_id' => $publisher->publisher_id]) }}" class="btn btn-info">Show</a>
                                    <a  href="{{ route('publisher.deletePublisher', ['publisher_id' => $publisher->publisher_id]) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-center">
                        {{ $publishers->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection