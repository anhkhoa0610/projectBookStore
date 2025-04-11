@extends('dashboard')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">

            

            <div class="card">
                <div class="card-header">
                    <h4>View Detail
                    <a href="{{ route('book.list') }}" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-stiped table-bordered text-center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Category</th>
                                <th>Publisher</th>
                                <th>Description</th>
                                <th>Summary</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Volume Sold</th>                              
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>{{ $book->book_id }}</th>
                                <th>{{ $book->title }}</th>
                                <th>{{ $book->author_id }}</th>
                                <th>{{ $book->category_id }}</th>
                                <th>{{ $book->publisher_id }}</th>
                                <th>{{ $book->description }}</th>
                                <th>{{ $book->summary }}</th>
                                <th>{{ $book->price }}</th>
                                <th>
                                    @if ($book->cover_image)
                                        <img src="{{ asset('uploads/' . $book->cover_image) }}" alt="Cover Image" width="100">
                                    @else
                                        No Image
                                    @endif
                                </th>
                                <th>{{ $book->volume_sold }}</th>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection