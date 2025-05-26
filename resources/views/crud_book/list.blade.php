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
                            <a href="{{ route('book.createBook') }}" class="btn btn-primary float-end">Add Book</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <!-- Search Bar -->
                        <form action="{{ route('book.list') }}" method="GET" class="mb-3">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control"
                                    placeholder="Search by title, author, or category" value="{{ request('search') }}">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </form>

                        <style>
                            .description-cell,
                            .summary-cell, .title-cell {
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
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Published Date</th>
                                    <!-- <th>Category</th> -->
                                    <th>Publisher</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Summary</th>
                                    <th>Volume Sold</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($books as $book)
                                    <tr>
                                        <th class="title-cell">{{ $book->title }}</th>
                                        <th>{{ $book->author_id }}</th>
                                        <th>{{ $book->published_date }}</th>
                                 
                                        <th>{{ $book->publisher_id }}</th>
                                        <td class="description-cell">{{ $book->description }}</td>
                                        <td>
                                            @if ($book->cover_image)
                                                <img src="{{ asset('uploads/' . $book->cover_image) }}" alt="Cover Image"
                                                    width="100">
                                            @else
                                                No Image
                                            @endif
                                        </td>
                                        <th>{{ $book->price }}</th>
                                        <td class="summary-cell">{{ $book->summary }}</td>
                                        <th>{{ $book->volume_sold }}</th>
                                        <td class="action-cell">
                                            <a href="{{ route('book.updateBook', ['book_id' => $book->book_id]) }}"
                                                class="btn btn-success">
                                                <i class="fas fa-edit"></i> <!-- Edit Icon -->
                                            </a>
                                            <a href="{{ route('book.readBook', ['book_id' => $book->book_id]) }}"
                                                class="btn btn-info">
                                                <i class="fas fa-eye"></i> <!-- Show Icon -->
                                            </a>
                                            <a href="{{ route('book.deleteBook', ['book_id' => $book->book_id]) }}"
                                                class="btn btn-danger">
                                                <i class="fas fa-trash"></i> <!-- Delete Icon -->
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-center">
                            {{ $books->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection