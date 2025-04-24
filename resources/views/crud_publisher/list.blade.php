@extends('dashboard')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">

            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>Publisher List
                        <a href="{{ route('publisher.createPublisher') }}" class="btn btn-primary float-end">Add Publisher</a>
                    </h4>
                </div>
                <div class="card-body">

                    <!-- Search Bar -->
                    <form action="{{ route('publisher.list') }}" method="GET" class="mb-3">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search by publisher name or contact info" value="{{ request('search') }}">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </form>

                    <style>
                        .action-cell {
                            display: flex;
                            justify-content: center; /* Center align the icons */
                            gap: 10px; /* Add gap between icons */
                        }

                        .action-cell a {
                            display: inline-flex;
                            align-items: center;
                            justify-content: center;
                            text-decoration: none; /* Remove underline from links */
                        }
                    </style>

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
                                <td class="action-cell">
                                    <a href="{{ route('publisher.updatePublisher', ['publisher_id' => $publisher->publisher_id]) }}" class="btn btn-success">
                                        <i class="fas fa-edit"></i> <!-- Edit Icon -->
                                    </a>
                                    <a href="{{ route('publisher.readPublisher', ['publisher_id' => $publisher->publisher_id]) }}" class="btn btn-info">
                                        <i class="fas fa-eye"></i> <!-- Show Icon -->
                                    </a>
                                    <a href="{{ route('publisher.deletePublisher', ['publisher_id' => $publisher->publisher_id]) }}" class="btn btn-danger">
                                        <i class="fas fa-trash"></i> <!-- Delete Icon -->
                                    </a>
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