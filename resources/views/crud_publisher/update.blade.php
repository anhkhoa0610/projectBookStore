@extends('dashboard')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Update Publisher
                        <a href="{{ route('publisher.list') }}" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('publisher.postUpdatePublisher', ['publisher_id' => $publisher->publisher_id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Publisher Name</label>
                            <input type="text" id="name" name="publisher_name" class="form-control" value="{{ $publisher->publisher_name }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="info" class="form-label">Contact Info</label>
                            <input type="text" id="info" name="contact_info" class="form-control" value="{{ $publisher->contact_info }}" required>
                        </div>



    
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update Publisher</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection