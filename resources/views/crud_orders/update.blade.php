@extends('dashboard')

<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<!-- jQuery + Select2 JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function () {
        $('#cuponSelect').select2({
            dropdownCssClass: 'custom-select2-dropdown'
        });
    });
</script>

<style>
    .select2-results__options {
        max-height: 220px;
        overflow-y: auto;
    }
</style>

@section('content')

    <div class="container">

        <div class="row">

            <div class="col-md-12">

                <div class="card">

                    <div class="card-header">
                        <h4>Add New orders
                            <a href="{{ route('orders.list') }}" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('orders.postUpdateOrder') }}" method="POST">
                            @csrf
                            <input name="order_id" type="hidden" value="{{$order->order_id}}">

                            <div class="form-group mb-3" class="form-label">
                                <label for="user_id">user id</label>
                                <input type="number" rows="3" name="user_id" class="form-control"  required value="{{ $order->user_id }}" >
                            </div>

                            <div class="form-group mb-3">
                                <label for="order_date" class="form-label">order date</label>
                                <input type="date" rows="3" name="order_date" class="form-control" required value="{{ $order->order_date }}">
                            </div>

                            <div class="form-group mb-3">
                                <label for="status" class="form-label">Status</label>
                                <textarea name="status" class="form-control" rows="3" required> {{ $order->status }}</textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label for="tracking_number" class="form-label">tracking number</label>
                                <input type="number" name="tracking_number" class="form-control" rows="3" required value="{{ $order->tracking_number }}" >
                            </div>

                            <div class="form-group mb-3">
                                <label for="carrier" class="form-label">carrier</label>
                                <input type="text" name="carrier" class="form-control" rows="3" required value="{{ $order->carrier }}" >
                            </div>

                            <div class="form-group mb-3">
                            <select name="coupon_id" id="cuponSelect" class="form-control">
                                <option value="">none</option>    
                                @foreach ($dataCoupons as $coupon)
                                        <option value="{{ $coupon->id }}">{{ $coupon->coupon_code }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button data-mdb-button-init data-mdb-ripple-init
                                class="btn btn-dark btn-outline-light btn-lg px-5" type="submit">Update</button>
                        </form>
                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection