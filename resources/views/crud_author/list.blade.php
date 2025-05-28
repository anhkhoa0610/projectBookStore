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
                <!-- Search Bar -->
                <form action="{{ route('authors.list') }}" method="GET" class="mb-3">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control"
                            placeholder="Search by Author Name, Hometown"
                            value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>

                <style>
                    .name-cell,
                    .id-cell,
                    .bio-cell {
                        max-width: 300px;
                        max-height: 100px;
                        overflow: auto;
                        /* Cho phép cuộn */
                        white-space: pre-wrap;
                        overflow-wrap: break-word;
                    }

                    .action-cell {
                        display: flex;
                        flex-direction: column;
                        gap: 8px;
                        align-items: center;
                        justify-content: center;
                    }

                    .action-cell a,
                    .action-cell button {
                        min-width: 60px;
                        padding: 4px 8px;
                    }

                    /* Responsive design */
                    @media (max-width: 768px) {

                        .name-cell,
                        .id-cell,
                        .bio-cell {
                            max-width: 150px;
                        }

                        .action-cell {
                            flex-direction: row;
                            flex-wrap: wrap;
                            gap: 4px;
                        }

                        .action-cell a,
                        .action-cell button {
                            min-width: 50px;
                            font-size: 0.8rem;
                        }
                    }
                </style>
                <table class="table table-striped table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Author ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Birth Date</th>
                            <th>Hometown</th>
                            <th>Bio</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($authors as $author)
                            <tr>
                                <td class="id-cell">{{ $author->author_id }}</td>
                                <td class="name-cell">{{ $author->author_name }}</td>
                                <td>
                                    @if ($author->cover_image)
                                        <img src="{{ asset('images/' . $author->cover_image) }}" alt="Cover Image"
                                            class="img-fluid rounded shadow" style="max-height: 100px;">
                                    @else
                                        <img src="{{ asset('images/placeholder.png') }}" alt="No Image"
                                            class="img-fluid rounded shadow" style="max-height: 100px;">
                                    @endif
                                </td>
                                <td class="">{{ $author->birth_date }}</td>
                                <td class="">{{ $author->hometown }}</td>
                                <td class="bio-cell">{{ $author->bio }}</td>
                                <td class="action-cell">
                                    <a href="{{ route('authors.edit', $author->author_id) }}"
                                        class="btn btn-success btn-sm">Edit</a>
                                    <form action="{{ route('authors.delete', $author->author_id) }}" method="POST"
                                        style="display: inline-block;">
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

                <div class="d-flex justify-content-center">
                    {{ $authors->links() }}
                </div>
            </div>

        </div>

    </div>

@endsection