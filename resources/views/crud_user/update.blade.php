@extends('dashboard')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Update User
                        <a href="{{ route('user.list') }}" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.postUpdateUser') }}" method="POST">
                        @csrf
                     
                        <input name="id" type="hidden" value="{{$user->id}}">
                        <div class="form-group mb-3">
                            <input type="text" placeholder="Name" id="name" class="form-control" name="name"
                                value="{{ $user->name }}"
                                required autofocus>
                            @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div data-mdb-input-init class="form-outline form-white mb-4">
                            <input type="text" placeholder="Email" id="email_address" class="form-control"
                                value="{{ $user->email }}"
                                name="email" required autofocus>
                            @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div data-mdb-input-init class="form-outline form-white mb-4">
                            <input type="password" placeholder="Password" id="password" class="form-control"
                                name="password" required>
                            @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <input type="text" placeholder="age" id="age" class="form-control" name="age"
                                value="{{ $user->age }}"
                                required autofocus>
                            @if ($errors->has('age'))
                            <span class="text-danger">{{ $errors->first('age') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" placeholder="like" id="like" class="form-control" name="like"
                                value="{{ $user->like }}"
                                required autofocus>
                            @if ($errors->has('like'))
                            <span class="text-danger">{{ $errors->first('like') }}</span>
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