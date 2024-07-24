@extends('admin.layouts.frontend.app')
@section('content')
<style>
    aside.product-order-list .head{
        padding: 0;
    }
</style>
<div class="content pos-design p-0">
    <div class="row align-items-start pos-wrapper">
        <div class="col-md-6 col-lg-4 mt-4">
            <div class="mx-4">
                <h4 class="mb-3">Customer Details</h4>
              
                <div class="row mt-2">
                    <div class="col-5">
                        <h6>Customer Name</h6>
                    </div>
                    <div class="col-7">
                        <p>{{ $invoice->CustomerName }}</p>
                        <input type="hidden" name="customer_id" value="{{ $invoice->id }}">
                    </div>
                </div>

                @if($invoice->CustomerEmail)
                    <div class="row mt-2">
                        <div class="col-5">
                            <h6>Customer Email</h6>
                        </div>
                        <div class="col-7">
                            <p>{{ $invoice->CustomerEmail }}</p>
                        </div>
                    </div>
                @endif

                <div class="row mt-2">
                    <div class="col-5">
                        <h6>Mobile Number</h6>
                    </div>
                    <div class="col-7">
                        <p>{{ $invoice->CustomerPhone }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 mt-4">
            <div class="mx-4">
                <h4 class="mb-3">Order Details</h4>
                
                <h5>Shipping Address</h5>
                <p class="mt-2">{!! nl2br($invoice->ShippingAddress) !!}</p>

                <h5>Billing Address</h5>
                <p class="mt-2">{!! nl2br($invoice->BillingAddress) !!}</p>

                <div class="row mt-2">
                    <div class="col-5">
                        <h6>Payment Method</h6>
                    </div>
                    <div class="col-7">
                        <p>{{ $invoice->PaymentMethod }}</p>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-5">
                        <h6>Tax Paid</h6>
                    </div>
                    <div class="col-7">
                        <p>${{ number_format($invoice->TaxAmount, 2, '.') }}</p>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-5">
                        <h6>Order Total</h6>
                    </div>
                    <div class="col-7">
                        <p>${{ number_format($invoice->TotalAmount, 2, '.') }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-4 ps-0">
            <aside class="product-order-list">
                <div class="head d-flex align-items-center justify-content-between w-100">
                    <div class>
                        <h5>Order List</h5>
                        <span>Transaction ID : #{{ $invoice->OrderID }}</span>
                    </div>
                </div>
               
                <div class="product-added block-section">
                    <div class="head-text d-flex align-items-center justify-content-between">
                        <h6 class="d-flex align-items-center mb-0">Product Added
                            <span class="count">{{ count($orderProducts) }}</span></h6>
                    </div>
                    <!-- Cart product list-->
                    <div class="product-wrap">
                    @foreach ($orderProducts as $key => $product)
                    
                        <div class="product-list d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center product-info">
                                <a href="javascript:void(0);" class="img-bg">
                                    <img src="{{ $product->image }}"
                                        alt="Products">
                                </a>
                                <div class="info">
                                    <span>PT0005</span>
                                    <h6><a href="javascript:void(0);">{{ $product->name }}</a></h6>
                                    <p>${{ $product->price }}</p>
                                </div>
                            </div>
                            <div class="qty-item text-center">
                                <a href="javascript:void(0);" class="dec d-flex justify-content-center align-items-center decrease" data-bs-toggle="tooltip" data-id = "{{ $product['id'] }}" data-bs-placement="top" title="minus">
                                    <i data-feather="minus-circle" class="feather-14"></i>
                                </a>
                                <input type="text" class="form-control text-center quantity__number" name="qty" value="{{ $product->quantity}}" max="{{ $product->quantity}}" data-product-id="{{ $product->product_id }}">
                                <a href="javascript:void(0);" class="inc d-flex justify-content-center align-items-center increase" data-bs-toggle="tooltip" data-id = "{{ $product['id'] }}" data-bs-placement="top" title="plus">
                                    <i data-feather="plus-circle" class="feather-14"></i>
                                </a>
                            </div>
                            <div class="d-flex align-items-center action">
                                <a href="javascript:void(0)" class="btn-icon delete-icon">
                                    <i data-feather="trash-2" class="feather-14"></i>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!--- end cart Product list-->
                </div>
               {{-- <div class="block-section">
                    <div class="selling-info">
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="input-block">
                                    <label>Order Tax</label>
                                    <select class="select">
                                        <option>GST 5%</option>
                                        <option>GST 10%</option>
                                        <option>GST 15%</option>
                                        <option>GST 20%</option>
                                        <option>GST 25%</option>
                                        <option>GST 30%</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="input-block">
                                    <label>Shipping</label>
                                    <select class="select">
                                        <option>15</option>
                                        <option>20</option>
                                        <option>25</option>
                                        <option>30</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="input-block">
                                    <label>Discount</label>
                                    <select class="select">
                                        <option>10%</option>
                                        <option>10%</option>
                                        <option>15%</option>
                                        <option>20%</option>
                                        <option>25%</option>
                                        <option>30%</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="order-total">
                        <table class="table table-responsive table-borderless">
                            <tr>
                                <td>Sub Total</td>
                                <td class="text-end totalAmount">@if(session('cart')) {{ session('cart')['formatted_sub_total'] }} @else 0 @endif</td>
                            </tr>
                            <tr>
                                <td>Tax (GST 5%)</td>
                                <td class="text-end">$00.00</td>
                            </tr>
                            <tr>
                                <td>Shipping</td>
                                <td class="text-end">$00.00</td>
                            </tr>
                            <tr>
                                <td class="danger">Discount (10%)</td>
                                <td class="danger text-end">$00.00</td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td class="text-end totalAmount">{{ number_format($invoice->TotalAmount, 2, '.') }}</td>
                            </tr>
                        </table>
                    </div>
                </div> --}}
                <div class="block-section payment-method">
                    <h6>Payment Method</h6>
                    <div class="row d-flex align-items-center justify-content-center methods">
                        <div class="col-md-6 col-lg-4 item">
                            <div class="default-cover" data-method="cash">
                                <a href="javascript:void(0);">
                                    <img src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/icons/cash-pay.svg"
                                        alt="Payment Method">
                                    <span>Cash</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 item">
                            <div class="default-cover" data-method="debit-card">
                                <a href="javascript:void(0);">
                                    <img src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/icons/credit-card.svg"
                                        alt="Payment Method">
                                    <span>Debit Card</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 item">
                            <div class="default-cover active" data-method="credit">
                                <a href="javascript:void(0);">
                                    <img src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/icons/credit-card.svg"
                                    alt="Payment Method">
                                    <span>Credit</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-grid btn-block">
                    <a class="btn btn-secondary" href="javascript:void(0);">
                        Grand Total : $64,024.5
                    </a>
                </div>
                <div class="d-grid btn-block">
                    {{-- <a class="btn btn-secondary" href="#" id="return-stock">
                        Return Stock
                    </a> --}}
                    <a class="btn btn-secondary" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#order-inventory-return">
                        Return Stock
                    </a>
                </div>
                <div class="btn-row d-sm-flex align-items-center justify-content-between">
                    <a href="javascript:void(0);" class="btn btn-info btn-icon flex-fill"
                        data-bs-toggle="modal" data-bs-target="#hold-order"><span
                            class="me-1 d-flex align-items-center"><i data-feather="pause"
                                class="feather-16"></i></span>Hold</a>
                    <a href="javascript:void(0);" class="btn btn-danger btn-icon flex-fill"><span
                            class="me-1 d-flex align-items-center"><i data-feather="trash-2"
                                class="feather-16"></i></span>Void</a>
                    <a href="javascript:void(0);" class="btn btn-success btn-icon flex-fill"
                        data-bs-toggle="modal" data-bs-target="#payment-completed"><span
                            class="me-1 d-flex align-items-center"><i data-feather="credit-card"
                                class="feather-16"></i></span>Payment</a>
                </div>
            </aside>
        </div>
    </div>
</div>

<script>
    $(function(){
        $('.delete-icon').click(function(){
            $(this).parents('.product-list').remove();
        })
    });

    $(document).on('submit','form#return-stock',function(event){
        event.preventDefault();
        var payment_method  = $('.default-cover.active').data('method');
        var vehicle_number = $('[name="vehicle_numbers"]').val();
        var contact_number = $('[name="contact_numbers"]').val();
        var from_location = $('[name="from_location"]').val();
        var to_location = $('[name="to_location"]').val();
        var products = [];
        var customer_id = $('[name="customer_id"]').val();
        var invoiceId = '{{ $invoice->OrderID }}';
        $('input[name="qty"]').each(function() {
            var quantity = $(this).val();
            var product_id = $(this).data('product-id');
            products.push({ "product_id" : product_id, "quantity" : quantity });
        });
        $.ajax({
            url: '{{ route("inventory-return-order") }}',
            method: 'POST',
            data: { 
                invoiceId,
                payment_method,
                products,
                vehicle_number,
                contact_number,
                from_location,
                to_location,
                customer_id,
                _token: '{{ csrf_token() }}'
            },
            success:function(response){
                if(response.success){
                    Swal.fire({
                        title: "Order Returned!",
                        text: "Your Order Returned "+response.return_invoice_id,
                        icon: "success",
                        timer: 1000
                    });
                    $("#order-inventory-return").modal("hide");
                    $('#order-inventory-return').find('form').trigger('reset'); 
                    const newWindow = window.open(response.inventory_pdf_url, '_blank', 'noopener,noreferrer');
                    if (newWindow) {
                        setTimeout(() => {
                            window.focus();
                        }, 100);
                    }
                }else if(response.error){
                    Swal.fire({
                        title: "Already Returned!",
                        text: "Your Order Already Returned Invoice : "+response.invoice_id,
                        icon: "warning",
                    });
                    $("#order-inventory-return").modal("hide");
                    $('#order-inventory-return').find('form').trigger('reset'); 
                }
            }
        });
    });
</script>
@endsection