@extends('dashboard')
@section('content')
<div class="title mt-2">Update Screen</div>
<form action="{{ route('user.postUpdateUser') }}" method="POST" onsubmit="return validatePasswords()" enctype="multipart/form-data">
    @csrf
    <input name="id" type="hidden" value="{{$user->id}}">
    <div class="mb-3 mt-3">
        <label for="name" class="form-label">Username:</label>
        <input type="text" class="form-control" id="name" placeholder="Enter email" name="name" value="{{ $user->name }}">
        @if ($errors->has('name'))
        <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif
    </div>
    
    <div class="mb-3">
        <label for="like" class="form-label">Like:</label>
        <input type="number" class="form-control" id="like" placeholder="Enter like" name="like" value="{{ $user->like }}">
        @if ($errors->has('like'))
        <span class="text-danger">{{ $errors->first('like') }}</span>
        @endif
    </div>

    <div class="mb-3">
        <label for="github" class="form-label">Github:</label>
        <input type="text" class="form-control" id="github" placeholder="Enter github" name="github" value="{{ $user->github }}">
        @if ($errors->has('email'))
        <span class="text-danger">{{ $errors->first('email') }}</span>
        @endif
    </div>

    
    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{ $user->email }}">
        @if ($errors->has('email'))
        <span class="text-danger">{{ $errors->first('email') }}</span>
        @endif
    </div>

    <div class="mb-3">
    <label for="profile_picture" class="form-label">Profile Picture:</label>
    <input type="file" class="form-control" id="profile_picture" name="picture">
    @if ($user->profile_picture)
        <div class="mt-2">
            <img src="{{ asset('uploads/' . $user->picture) }}" alt="Profile Picture" width="100">
        </div>
    @endif
    @if ($errors->has('picture'))
        <span class="text-danger">{{ $errors->first('picture') }}</span>
    @endif
</div>

    <div class="mb-3">
        <label for="pwd" class="form-label">Password:</label>
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
        @if ($errors->has('password'))
        <span class="text-danger">{{ $errors->first('password') }}</span>
        @endif
    </div>
    <div class="mb-3">
        <label for="repwd" class="form-label">Retype Password:</label>
        <input type="password" class="form-control" id="repwd" placeholder="Retype password" name="repswd">
        <span id="password-error" class="text-danger" style="display: none;">Passwords do not match.</span>
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<script>
    function validatePasswords() {
        const password = document.getElementById('pwd').value;
        const retypePassword = document.getElementById('repwd').value;
        const errorSpan = document.getElementById('password-error');

        if (password !== retypePassword) {
            errorSpan.style.display = 'block'; // Show error message
            return false; // Prevent form submission
        }

        errorSpan.style.display = 'none'; // Hide error message
        return true; // Allow form submission
    }
</script>

@endsection