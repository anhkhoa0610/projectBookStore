@extends('dashboard')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Create Author
                            <a href="{{ route('authors.list') }}" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('authors.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="author_name" class="form-label">Author Name</label>
                                <input type="text" id="author_name" name="author_name" class="form-control" maxlength="255"
                                    required>
                                @if ($errors->has('author_name'))
                                    <span class="text-danger">{{ $errors->first('author_name') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="cover_image" class="form-label">Cover Image</label>
                                <input type="file" name="cover_image" class="form-control" accept="image/*">
                                @error('cover_image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="bio" class="form-label">Bio</label>
                                <textarea id="bio" name="bio" class="form-control" rows="4"></textarea>
                                @if ($errors->has('bio'))
                                    <span class="text-danger">{{ $errors->first('bio') }}</span>
                                @endif
                            </div>

                            <div>
                                <button type="submit" class="btn btn-primary">Create Author</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection