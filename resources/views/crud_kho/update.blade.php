@extends('dashboard')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Update Repo
                        <a href="{{ route('repo.list') }}" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('repo.postUpdateRepo') }}" method="POST">
                        @csrf
                     
                        <input name="id" type="hidden" value="{{$repo->id}}">
                        <div class="form-group mb-3">
                            <input type="text" placeholder="bookName" id="bookName" class="form-control" name="bookName"
                                value="{{ $repo->bookName }}"
                                required autofocus>
                            @if ($errors->has('bookName'))
                            <span class="text-danger">{{ $errors->first('bookName') }}</span>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <input type="text" placeholder="warehouseLocation" id="warehouseLocation" class="form-control" name="warehouseLocation"
                                value="{{ $repo->warehouseLocation }}"
                                required autofocus>
                            @if ($errors->has('warehouseLocation'))
                            <span class="text-danger">{{ $errors->first('warehouseLocation') }}</span>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <input type="text" placeholder="quantityAvailable" id="quantityAvailable" class="form-control" name="quantityAvailable"
                                value="{{ $repo->quantityAvailable }}"
                                required autofocus>
                            @if ($errors->has('quantityAvailable'))
                            <span class="text-danger">{{ $errors->first('quantityAvailable') }}</span>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <input type="date" placeholder="lastUpdated" id="lastUpdated" class="form-control" name="lastUpdated"
                                value="{{ $repo->lastUpdated }}"
                                required autofocus>
                            @if ($errors->has('lastUpdated'))
                            <span class="text-danger">{{ $errors->first('lastUpdated') }}</span>
                            @endif
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