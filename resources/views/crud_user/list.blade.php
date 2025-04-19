@extends('dashboard')
@section('content')

    <style>
        a {
            font-size: 1rem;
        }

        .-table {
            margin: 25px auto;
            width: fit-content;
            text-align: center;
        }

        thead tr th {
            text-align: center;
            width: fit-content;
        }

        tbody tr th {
            width: fit-content;
            white-space: nowrap;

        }

        .paging-bar {
            width: fit-content;
            margin: 15px auto;
        }

        .pagination {
            margin-left: 15px;
            margin-top: -15px;
            padding: 0;
        }

        .pagination li {
            margin: 0;
        }

        .pagination li a,
        .pagination li span {
            margin: 0;
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
                    <th>Role</th>
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
                        <th>
                            @foreach($user->roles as $role)
                                <a href="{{ route('user.role', ['id' => $role->id]) }}">
                                    {{ $role->name }}
                                </a>
                            @endforeach
                        </th>
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
    <div class="paging-bar">
        {{ $users->links() }}

    </div>
@endsection