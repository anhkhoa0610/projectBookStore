@extends('dashboard')
@section('content')
  <div class="title mt-2">Login Screen</div>
  <form action="{{ route('user.authUser') }}" method="POST">
    @csrf
    <div class="mb-3 mt-3">
    <label for="email" class="form-label">Email:</label>
    <input type="text" class="form-control" id="email" placeholder="Enter email" name="email">
    @if ($errors->has('email'))
    <span class="text-danger">{{ $errors->first('email') }}</span>
  @endif
    </div>
    <div class="mb-3">
    <label for="pwd" class="form-label">Password:</label>
    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
    @if ($errors->has('password'))
    <span class="text-danger">{{ $errors->first('password') }}</span>
  @endif
    </div>
    <div class="form-check mb-3">
    <label class="form-check-label">
      <input class="form-check-input" type="checkbox" name="remember"> Remember me
    </label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection