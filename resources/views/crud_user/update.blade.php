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
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('user.postUpdateUser') }}" method="POST">
                        @csrf
                        <input name="id" type="hidden" value="{{ $user->id }}">

                        <div class="form-group mb-3">
                            <input type="text" placeholder="Full Name" id="full_name" class="form-control" name="full_name"
                                value="{{ $user->full_name }}" required autofocus>
                            @if ($errors->has('full_name'))
                                <span class="text-danger">{{ $errors->first('full_name') }}</span>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <input type="text" placeholder="Email" id="email_address" class="form-control"
                                value="{{ $user->email }}" name="email" required autofocus>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <input type="password" placeholder="Password" id="password" class="form-control"
                                name="password" autocomplete="new-password" required>
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <input type="text" placeholder="Phone Number" id="phone" class="form-control" name="phone"
                                value="{{ $user->phone }}" required autofocus>
                            @if ($errors->has('phone'))
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <input type="text" placeholder="Address" id="address" class="form-control" name="address"
                                value="{{ $user->address }}" required autofocus>
                            @if ($errors->has('address'))
                                <span class="text-danger">{{ $errors->first('address') }}</span>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <input type="date" placeholder="Date of Birth" id="dob" class="form-control" name="dob"
                                value="{{ $user->dob }}" required autofocus>
                            @if ($errors->has('dob'))
                                <span class="text-danger">{{ $errors->first('dob') }}</span>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <input type="text" placeholder="Role (e.g., Admin, User)" id="role" class="form-control" name="role"
                                value="{{ $user->role }}" required autofocus>
                            @if ($errors->has('role'))
                                <span class="text-danger">{{ $errors->first('role') }}</span>
                            @endif
                        </div>

                        <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg px-5" type="submit">
                            <i class="fas fa-save"></i> Update
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection