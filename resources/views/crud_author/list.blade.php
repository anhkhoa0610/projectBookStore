@extends('dashboard')

@section('content')

    <div class="container">


        <div class="card">
            <div class="card-header">
                <h4>Author List
                    <a href="{{ route('authors.create') }}" class="btn btn-primary float-end">Add Author</a>
                </h4>
            </div>
            <div class="card-body">
                <!-- Search Bar -->
                <form action="{{ route('authors.list') }}" method="GET" class="mb-3">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control"
                            placeholder="Search by Coupon Code, Discount Amount, Valid From, Valid To..."
                            value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>

                <style>
                    .description-cell,
                    .summary-cell {
                        max-width: 200px;
                        /* Set maximum width */
                        max-height: 100px;
                        /* Set maximum height */
                        overflow: auto;
                        /* Enable scrolling for overflow */
                        white-space: pre-wrap;
                        /* Preserve whitespace and wrap text */
                        word-wrap: break-word;
                        /* Break long words */
                    }

                    .action-cell {
                        display: flex;
                        flex-direction: column;
                        /* Display icons in a row */
                        justify-content: center;
                        /* Center align the icons */
                        gap: 10px;
                        /* Add gap between icons */
                    }

                    .action-cell a {
                        display: inline-flex;
                        align-items: center;
                        justify-content: center;
                        text-decoration: none;
                        /* Remove underline from links */
                    }
                </style>
                <table class="table table-stiped table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Author ID</th>
                            <th>Name</th>
                            <th>Bio</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($authors as $author)
                            <tr>
                                <td>{{ $author->author_id }}</td>
                                <td>{{ $author->author_name }}</td>
                                <td>{{ $author->bio }}</td>
                                <td>
                                    <a href="{{ route('authors.edit', $author->author_id) }}"
                                        class="btn btn-success btn-sm">Edit</a>
                                    <form action="{{ route('authors.delete', $author->author_id) }}" method="POST"
                                        style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                    <a href="{{ route('authors.read', $author->author_id) }}"
                                        class="btn btn-info btn-sm">Show</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="d-flex justify-content-center">
                    {{ $authors->links() }}
                </div>
            </div>

        </div>

    </div>

@endsection