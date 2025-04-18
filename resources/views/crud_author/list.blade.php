@extends('dashboard')

@section('content')

    <div class="container">


        <div class="card">
            <div class="card-header">
                <h4>Author List
                    <a href="{{ route('authors.create') }}" class="btn btn-primary float-end">Add Author</a>
                </h4>
            </div>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Author ID</th>
                            <th>Name</th>
                            <th>Bio</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($authors as $author)
                            <tr>
                                <td>{{ $author->author_id }}</td>
                                <td>{{ $author->author_name }}</td>
                                <td>{{ $author->bio }}</td>
                                <td>
                                    <a href="{{ route('authors.edit', $author->author_id) }}" class="btn btn-success btn-sm">Edit</a>
                                    <form action="{{ route('authors.delete', $author->author_id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                    <a href="{{ route('authors.read', $author->author_id) }}"
                                        class="btn btn-info btn-sm">Show</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    </div>

@endsection