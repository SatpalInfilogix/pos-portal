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
                        <p>{{ \Carbon\Carbon::parse($transferedInventory->created_at)->format('d F Y h:i:s A') }}</p>
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
                                    <td>Received Quantity</td>
                                </tr>
                            </thead>
                            @php
                                $totalDelivered = 0;    
                            @endphp
                            <tbody>
                               @foreach ($transferedInventory->deliveredItems as $key => $delivered_item)
                                    @php
                                        $totalDelivered += $delivered_item->quantity;    
                                    @endphp
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$delivered_item->product->name}}</td>
                                        <td>{{$delivered_item->quantity}}</td>
                                        <td><input type="number" name="rec-qauntity" class="form-control" data-product-id="{{ $delivered_item->product->id }}" data-delivered-qty="{{ $delivered_item->quantity }}" value="{{ $delivered_item->quantity }}"></td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td><b>Total</b></td>
                                    <td>{{ $totalDelivered }}</td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="page-btn">
                    <a href="#" class="btn btn-default" id="update-status">
                        Update Status
                    </a>
                </div>
            </div>
        </div>
        
    </div>
    <script>
        $(document).on('keyup','[name="rec-qauntity"]',function(){
            var deliveredQty = $(this).data('delivered-qty');
            var receivedQty = $(this).val();
            if(receivedQty > deliveredQty){
                $(this).val(deliveredQty);
            }
            if(receivedQty < 0){
                $(this).val(0);
            }
        });
        $(document).on('click','#update-status',function(e){
            e.preventDefault();
            var productData = [];
            let totalDelivered = 0;
            let totalReceived = 0;
            $('[name="rec-qauntity"]').each(function() {
                var product_id = $(this).data('product-id');
                var deliveredQty = $(this).data('delivered-qty');
                totalDelivered += deliveredQty;
                var receivedQty = $(this).val();
                totalReceived += parseInt(receivedQty);
                productData.push({ deliveredQty : deliveredQty, receivedQty : receivedQty, product_id : product_id }); 
            });
            var token = "{{ csrf_token() }}";
            $.ajax({
                url: "{{ route('update.received.inventory','') }}/"+"{{ $transferedInventory->id }}",
                type: 'POST',
                data: {
                    "_token": token,
                    productData : productData,
                    totalDelivered,
                    totalReceived
                },
                success: function(response) {
                    if(response.success){
                        $('.card-body').prepend('<div class="alert alert-success">Updated Successfully</div>');
                    }
                },
                error: function(xhr) {
                    console.log(xhr);
                }
            });
        });
    </script>
@endsection
