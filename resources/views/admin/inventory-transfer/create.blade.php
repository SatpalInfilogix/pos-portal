@extends('admin.layouts.app')
@section('content')
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4>Inventory Transfer</h4>
                    <h6>Send new items to the store</h6>
                </div>
            </div>
            <ul class="table-top-head">
                <li>
                    <div class="page-btn">
                        <a href="{{ route('inventory-transfer.index') }}" class="btn btn-secondary">
                            <i data-feather="arrow-left" class="me-2"></i>
                            Back to inventory transfer
                        </a>
                    </div>
                </li>
            </ul>
        </div>

        <form action="{{ route('inventory-transfer.store') }}" method="post">
            @csrf
            <div class="card">
                <div class="card-body pb-0">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Select Store</label>
                            <input type="text" name="first_name" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Last Name</label>
                            <input type="text" name="last_name" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Phone Number</label>
                            <input type="text" name="phone_number" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="btn-addproduct mb-4">
                            <button type="submit" class="btn btn-submit">Send Items</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection