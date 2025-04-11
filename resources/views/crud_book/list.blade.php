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
                    <table class="table table-stiped table-bordered text-center">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Category</th>
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
                                <th>{{ $book->title }}</th>
                                <th>{{ $book->author_id }}</th>
                                <th>{{ $book->category_id }}</th>
                                <th>{{ $book->publisher_id }}</th>
                                <th>{{ $book->description }}</th>
                                <td>
                                        @if ($book->cover_image)
                                            <img src="{{ asset('uploads/' . $book->cover_image) }}" alt="Cover Image" width="100">
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                <th>{{ $book->price }}</th>
                                <th>{{ $book->summary }}</th>
                                <th>{{ $book->volume_sold }}</th>

                               
                                <td style="display:flex; gap:5px;">
                                    <a href="{{ route('book.updateBook', ['book_id' => $book->book_id]) }}" class="btn btn-success">Edit</a>
                                    <a  href="{{ route('book.readBook', ['book_id' => $book->book_id]) }}" class="btn btn-info">Show</a>
                                    <a  href="{{ route('book.deleteBook', ['book_id' => $book->book_id]) }}" class="btn btn-danger">Delete</a>
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