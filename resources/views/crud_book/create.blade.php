@extends('dashboard')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Create New Book
                        <a href="{{ route('book.list') }}" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('book.postBook') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="summary" class="form-label">Summary</label>
                            <textarea name="summary" class="form-control" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="author_id" class="form-label">Author ID</label>
                            <input type="number" name="author_id" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category ID</label>
                            <input type="number" name="category_id" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="publisher_id" class="form-label">Publisher ID</label>
                            <input type="number" name="publisher_id" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="5" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" step="0.01" name="price" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="cover_image" class="form-label">Cover Image</label>
                            <input type="file" name="cover_image" class="form-control" accept="image/*">
                        </div>
                        <div class="mb-3">
                            <label for="volume_sold" class="form-label">Volume Sold</label>
                            <input type="number" name="volume_sold" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Create Book</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection