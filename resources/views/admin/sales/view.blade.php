@extends('admin.layouts.app')

@section('content')

<div class="content">
    <div class="page-header">
        <div class="add-item d-flex">
            <div class="page-title">
                <h4>Sales Details</h4>
                <h6>Manage your Sales details</h6>
            </div>
        </div>


        <!-- <div class="page-btn import">
                        <a href="#" class="btn btn-added color" data-bs-toggle="modal" data-bs-target="#view-notes"><i
                                data-feather="download" class="me-2"></i>Import Product</a>
                    </div> -->
    </div>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="card table-list-card">
        <div class="card-body">
            <div class="table-responsive dataview">

                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="invoice-title">
                                    <h2>Invoice</h2><h3 class="pull-right">Order # {{ $orders->OrderID  ?? ''}}</h3>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <button onclick="printPDF()" class="btn btn-submit float-end">Print</button>
                                {{-- <a href="{{ route('generate.order.pdf', ['invoice_id' => $orders->OrderID]) }}" class="btn btn-submit float-end">Print</a> --}}
                            </div>
                        <div>
                        <hr>
                        <h3 class="customer-name">{{ $orders->CustomerName ?? 'Guest' }}</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <address>
                                <strong>Billed To:</strong><br>
                                {!! nl2br(e($orders->BillingAddress ?? '')) !!}
                                </address>
                            </div>
                            <div class="col-md-6 text-right">
                                <address>
                                <strong>Shipped To:</strong><br>
                                {!! nl2br(e($orders->ShippingAddress ?? '')) !!}
                                </address>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <address>
                                    <strong>Other Details:</strong><br>
                                    Contact Number : {{ $orders->CustomerPhone ?? '' }}<br>
                                    Payment Status : {{ $orders->PaymentStatus ?? ''}}<br>
                                    Payment Mode : {{ $orders->PaymentMethod ?? ''}}<br>
                                    Card number : {{ $orders->card_digits ?? ''}}<br>
                                </address>
                            </div>
                            <div class="col-md-6 text-right">
                                <address>
                                    <strong>Order Date:</strong><br>
                                    {{ $orders->created_at ?? ''}}<br><br>
                                </address>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong>Order summary</strong></h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-condensed">
                                        <thead>
                                            <tr>
                                                <td><strong>Item</strong></td>
                                                <td class="text-center"><strong>Price</strong></td>
                                                <td class="text-center"><strong>Quantity</strong></td>
                                                <td class="text-right"><strong>Totals</strong></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders->productDetails as $productDetail) 
                                            <tr>
                                                <td>{{ $productDetail->name }}</td>
                                                <td class="text-center">${{ $productDetail->price }}</td>
                                                <td class="text-center">{{ $productDetail->quantity }}</td>
                                                <td class="text-right">${{ $productDetail->product_total_amount }}</td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <td class="thick-line"></td>
                                                <td class="thick-line"></td>
                                                <td class="thick-line text-center"><strong>Sub Total</strong></td>
                                                <td class="thick-line text-right">${{ $subTotal ?? '0' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="no-line"></td>
                                                <td class="no-line"></td>
                                                <td class="no-line text-center"><strong>Discount Amount</strong></td>
                                                <td class="no-line text-right">${{ $orders->DiscountAmount ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="no-line"></td>
                                                <td class="no-line"></td>
                                                <td class="no-line text-center"><strong>Tax Amount</strong></td>
                                                <td class="no-line text-right">${{ $orders->TaxAmount ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="no-line"></td>
                                                <td class="no-line"></td>
                                                <td class="no-line text-center"><strong>Total Amount</strong></td>
                                                <td class="no-line text-right">${{ $orders->TotalAmount ?? '' }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 <script>
        function printPDF() {
            var printWindow = window.open('{{ route('generate.order.pdf', ['invoice_id' => $orders->OrderID]) }}', '_blank');
            printWindow.onload = function () {
                printWindow.print();
            };
        }
    </script>
@endsection