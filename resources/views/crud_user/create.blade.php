@extends('dashboard')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Create User
                            <a href="{{ route('user.list') }}" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('user.postUser') }}" method="POST">
                            @csrf
                               
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Full Name" id="full_name" class="form-control" name="full_name"
                                       required autofocus>
                                @if ($errors->has('full_name'))
                                    <span class="text-danger">{{ $errors->first('full_name') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Email" id="email" class="form-control" name="email" required
                                    autofocus>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <input type="password" placeholder="Confirm Password" id="confirm_password" class="form-control" name="password_confirmation" required>
                                @if ($errors->has('password_confirmation'))
                                    <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <input type="text" placeholder="Phone Number" id="phone" class="form-control" name="phone"
                                       required autofocus>
                                @if ($errors->has('phone'))
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Address" id="address" class="form-control" name="address"
                                       required autofocus>
                                @if ($errors->has('address'))
                                    <span class="text-danger">{{ $errors->first('address') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="date" placeholder="Date of Birth" id="dob" class="form-control" name="dob"
                                       required autofocus>
                                @if ($errors->has('dob'))
                                    <span class="text-danger">{{ $errors->first('dob') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Role" id="role" class="form-control" name="role"
                                       required autofocus>
                                @if ($errors->has('role'))
                                    <span class="text-danger">{{ $errors->first('role') }}</span>
                                @endif
                            </div>
                                   
                            <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg px-5" type="submit">
                                <i class="fas fa-user-plus"></i> Create
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection