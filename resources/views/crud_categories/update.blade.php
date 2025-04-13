@extends('dashboard')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Update User
                        <a href="{{ route('categories.list') }}" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('categories.postUpdateCategory') }}" method="POST">
                        @csrf
                     
                        <input name="category_id" type="hidden" value="{{$category->category_id}}">
                        <div class="form-group mb-3">
                            <input type="text" placeholder=" category Name" id="category" class="form-control" name="category_name"
                                value="{{ $category->category_name}}"
                                required autofocus>
                  
                        </div>

                        <div class="form-group mb-3">
                            <input type="text" placeholder="desc" id="category_desc" class="form-control" name="category_desc"
                                value="{{ $category->category_desc}}"
                                required autofocus>
                        </div>
                    
                        <button data-mdb-button-init data-mdb-ripple-init class="btn btn-dark btn-outline-light btn-lg px-5" type="submit">Update</button>

                        <div class="d-flex justify-content-center text-center mt-4 pt-1">
                            <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                            <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                            <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection