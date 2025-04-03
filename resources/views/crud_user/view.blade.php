@extends ('dashboard')
@section('content')
<style>
    p {
        font-weight: bolder;
        font-size: 1rem;
    }
</style>
    <div class="view-info">
        <div class="title">Detail Screen</div>
        <div class="row mt-4">
            <div class="col-md-6">
                <p>Username : </p>
                <p>Email: </p>
                <p>Phone: </p>
                <p>Address: </p>
            </div>
            <div class="col-md-6">
                <p>{{$user->name}}</p>
                <p>{{$user->email}}</p>
                <p>{{ $user->phone }}</p>
                <p>{{ $user->address }}</p>
            </div>
        </div>
    </div>

@endsection