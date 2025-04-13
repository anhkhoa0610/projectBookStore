@extends('dashboard')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Create New Publisher
                        <a href="{{ route('publisher.list') }}" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('publisher.postPublisher') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Publisher name</label>
                            <input type="text" id="name" name="publisher_name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="contact" class="form-label">Contact Info</label>
                            <input type="text" id="contact" name="contact_info" class="form-control" required>
                        </div>


                        
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Create Publisher</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection