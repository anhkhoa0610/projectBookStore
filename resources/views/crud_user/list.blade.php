@extends('dashboard')
@section('content')

<style>
    a {
        font-size: 1rem;
    }

    .-table {
        margin: 25px auto;
        width: fit-content;
    }

    thead tr th {
        text-align: center;
        width: fit-content;
    }

    tbody tr th {
        width: fit-content;
        white-space: nowrap;
        
    }
</style>


    <div class="title mt-2">Danh sách user</div>
    <div class="-table">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Picture</th>
                
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <th>{{ $user->id }}</th>
                        <th>{{ $user->name }}</th>
                        <th>{{ $user->email }}</th>
                        <th><img src="{{ asset('uploads/' . $user->picture) }}" alt="Profile Picture" width="100"></th>
                        <!-- <th>{{ $user->phone }}</th>
                        <th>{{ $user->address }}</th> -->
                        <th>
                            <a href="{{ route('user.readUser', ['id' => $user->id]) }}">View</a>|&nbsp;  
                            <a href="{{ route('user.updateUser', ['id' => $user->id]) }}">Edit</a>|&nbsp;  
                            <a href="{{ route('user.deleteUser', ['id' => $user->id]) }}">Delete</a>&nbsp;
                        </th>
                    </tr>
                @endforeach
            </tbody>
            </tbody>
        </table>
    </div>
@endsection