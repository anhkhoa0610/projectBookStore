@extends('dashboard')

@section('content')
<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card  text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <div class="mb-md-5 mt-md-4 pb-5">
                            <form action="{{ route(repo.postRepo') }}" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="bookName" id="bookName" class="form-control" name="bookName"
                                        required autofocus>
                                    @if ($errors->has('bookName'))
                                    <span class="text-danger">{{ $errors->first('bookName') }}</span>
                                    @endif
                                </div>
                                <div data-mdb-input-init class="form-outline form-white mb-4">
                                    <input type="text" placeholder="warehouseLocation" id="warehouseLocation" class="form-control" name="warehouseLocation" required
                                        autofocus>
                                    @if ($errors->has('warehouseLocation'))
                                    <span class="text-danger">{{ $errors->first('warehouseLocation') }}</span>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <input type="text" placeholder="quantityAvailable" id="quantityAvailable" class="form-control" name="quantityAvailable"
                                        required autofocus>
                                    @if ($errors->has('quantityAvailable'))
                                    <span class="text-danger">{{ $errors->first('quantityAvailable') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="date" placeholder="lastUpdated" id="lastUpdated" class="form-control" name="lastUpdated"
                                        required autofocus>
                                    @if ($errors->has('lastUpdated'))
                                    <span class="text-danger">{{ $errors->first('lastUpdated') }}</span>
                                    @endif
                                </div>
                                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-dark btn-outline-light btn-lg px-5" type="submit">Create</button>

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
    </div>
</section>
@endsection