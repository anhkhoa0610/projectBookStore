@extends('dashboard')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Author Details
                            <a href="{{ route('authors.list') }}" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 text-center">
                            @if ($author->cover_image)
                                <img src="{{ asset('uploads/' . $author->cover_image) }}" alt="Cover Image"
                                    class="img-fluid rounded shadow" style="max-height: 220px;">
                            @else
                                <img src="{{ asset('images/placeholder.png') }}" alt="No Image" class="img-fluid rounded shadow"
                                    style="max-height: 220px;">
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="coupon_code" class="form-label">Author ID</label>
                            <p class="form-control">{{ $author->author_id }}</p>
                        </div>
                        <div class="mb-3">
                            <label for="discount_amount" class="form-label">Author Name</label>
                            <p class="form-control">{{ $author->author_name }}</p>
                        </div>
                        <div class="mb-3">
                            <label for="valid_from" class="form-label">Bio</label>
                            <p class="form-control">{{ $author->bio }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection