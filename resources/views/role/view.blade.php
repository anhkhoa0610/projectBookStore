@extends('dashboard')

@section('content')
    <style>
        .container {
            width: fit-content;
            margin: 15px auto;
        }

        table {
            min-width: 30vw;
        }

        th {
            padding: 10px;
            text-align: center;
            border: 1px solid black;
        }
    </style>
    <main class="login-form">
        <div class="container">
            <div class="row justify-content-center">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>{{$role->id}}</th>
                            <th>{{$role->name}}</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <div class="container">
        <h3>List of users</h3>
        <div class="row justify-content-center">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($role->users as $user)
                        <tr>
                            <th>{{$user->id}}</th>
                            <th>{{$user->name}}</th>
                            <th>{{$user->email}}</th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
@endsection