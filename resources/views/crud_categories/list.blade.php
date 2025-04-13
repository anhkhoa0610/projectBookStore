<!-- @extends('dashboard') -->

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">

            @session('status')
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endsession

            <div class="card">
                <div class="card-header">
                    <h4>categories List
                        <a href="{{ route('categories.createCategory') }}" class="btn btn-primary float-end">Add Category</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-stiped table-bordered text-center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>desc</th>
                                <th style="max-with:70px;" >Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <th>{{ $category->category_id }}</th>
                                <th>{{ $category->category_name }}</th>
                                <th>{{ $category->category_desc}}</th>
                             

                               
                                <td td style="display:flex, gap:5px, max-with:70px;" >
                                    <a href="{{ route('categories.updateCategory', ['category_id' => $category->category_id]) }}" class="btn btn-success">Edit</a>
                                    <a  href="{{ route('categories.readCategory', ['category_id' => $category->category_id]) }}" class="btn btn-info">Show</a>
                                    <a  href="{{ route('categories.deleteCategory', ['category_id' => $category->category_id]) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection