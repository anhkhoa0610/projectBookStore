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
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" maxlength="100" required>
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="summary" class="form-label">Summary</label>
                            <textarea name="summary" class="form-control" rows="3" maxlength="500" required></textarea>
                            @error('summary')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="author_id" class="form-label">Author ID</label>
                            <input type="number" name="author_id" class="form-control" required>
                            @error('author_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category ID</label>
                            <input type="number" name="category_id" class="form-control" required>
                            @error('category_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="publisher_id" class="form-label">Publisher ID</label>
                            <input type="number" name="publisher_id" class="form-control" required>
                            @error('publisher_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="5" maxlength="255" required></textarea>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" step="0.01" name="price" class="form-control" required maxlength="10">
                            @error('price')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="cover_image" class="form-label">Cover Image</label>
                            <input type="file" name="cover_image" class="form-control" accept="image/*">
                            @error('cover_image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="volume_sold" class="form-label">Volume Sold</label>
                            <input type="number" name="volume_sold" class="form-control" required>
                            @error('volume_sold')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
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