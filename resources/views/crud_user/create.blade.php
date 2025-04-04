@extends('dashboard')
@section('content')

<div class="title mt-2">Register Screen</div>
<form action="{{ route('user.postUser') }}" method="POST" onsubmit="return validatePasswords()">
    @csrf
    <div class="mb-3 mt-3">
        <label for="user" class="form-label">Username:</label>
        <input type="text" class="form-control" id="user" placeholder="Enter username" name="name">
        @if ($errors->has('name'))
        <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif
    </div>

    

    <!-- <div class="mb-3 mt-3">
        <label for="phone" class="form-label">Phone:</label>
        <input type="text" class="form-control" id="phone" placeholder="Enter phone" name="phone">
        @if ($errors->has('phone'))
        <span class="text-danger">{{ $errors->first('phone') }}</span>
        @endif
    </div>
    <div class="mb-3 mt-3">
        <label for="address" class="form-label">Address:</label>
        <input type="text" class="form-control" id="address" placeholder="Enter address" name="address">
        @if ($errors->has('address'))
        <span class="text-danger">{{ $errors->first('address') }}</span>
        @endif
    </div> -->


    <div class="mb-3">
        <label for="mail" class="form-label">Email</label>
        <input type="email" class="form-control" id="mail" placeholder="Enter email" name="email">
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
            errorSpan.style.display = 'block';
            return false; // Prevent form submission
        }

        errorSpan.style.display = 'none';
        return true; // Allow form submission
    }
</script>

@endsection