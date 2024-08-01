@extends('admin.layouts.app')

@section('content')
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4>Inventory Transfers</h4>
                    <h6>Inventory transfer details</h6>
                </div>
            </div>

            <div class="page-btn">
                <a href="{{ route('inventory-transfer.index') }}" class="btn btn-added">
                    <i data-feather="arrow-left" class="me-2"></i>
                    Back
                </a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6 mb-3">
                        <h5>Store Name</h5>
                        <p>{{ $transferedInventory->store->name }}</p>
                    </div>
                    <div class="col-6 mb-3">
                        <h5>Transfer Date</h5>
                        <p>{{ $transferedInventory->created_at }}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 mb-3">
                        <h5>Products</h5>
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Product Name</td>
                                    <td>Delivered Quantity</td>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($transferedInventory->deliveredItems as $key => $delivered_item)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$delivered_item->product->name}}</td>
                                        <td>{{$delivered_item->quantity}}</td>
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
