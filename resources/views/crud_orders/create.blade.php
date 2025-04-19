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
                        <form action="{{ route('orders.postOrder') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3" class="form-label">
                                <label for="user_id">user id</label>
                                <input type="number" rows="3" name="user_id" class="form-control" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="order_date" class="form-label">order date</label>
                                <input type="date" rows="3" name="order_date" class="form-control" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="status" class="form-label">Status</label>
                                <textarea name="status" class="form-control" rows="3" required></textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label for="tracking_number" class="form-label">tracking number</label>
                                <input type="number" name="tracking_number" class="form-control" rows="3" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="carrier" class="form-label">carrier</label>
                                <input type="text" name="carrier" class="form-control" rows="3" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="coupon_id"> coupon code</label>
                               
                                <select name="coupon_id" id="cuponSelect" class="form-control">
                                <option value="">none</option>    
                                @foreach ($dataCoupons as $coupon)
                                        <option value="{{ $coupon->id }}">{{ $coupon->coupon_code }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button data-mdb-button-init data-mdb-ripple-init
                                class="btn btn-dark btn-outline-light btn-lg px-5" type="submit">Create</button>
                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection