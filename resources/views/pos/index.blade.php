@extends('admin.layouts.frontend.app')
@section('content')
<style>
    .product {
        border: 1px solid #ccc;
        margin-bottom: 10px;
        padding: 10px;
        position: relative;
    }

    .product img {
        max-width: 100px;
        max-height: 100px;
    }

    .added-to-cart::after {
        content: "\2713";
        position: absolute;
        top: 5px;
        right: 5px;
        background-color: green;
        color: white;
        padding-top: 3px;
        border-radius: 50%;
        padding-bottom: 1px;
        padding-right: 8px;
        padding-left: 8px;
    }
	.default-cover.method {
		display: flex;
		align-items: center;
		gap: 5px;
		border: 1px solid;
		padding: 10px 70px;
		cursor: pointer;
		border-radius: 5px;
	}
    .default-cover.method.active{
        border-color: #ff9f43;
    }
	.row.d-flex.align-items-center.justify-content-center.methods {
		margin-top: 15px;
	}
	
	.default-cover.method:hover{
		border-color: #ff9f43;
	}
	
	.default-cover.method:hover img {
		filter: invert(75%) sepia(66%) saturate(1955%) hue-rotate(327deg) brightness(103%) contrast(102%) !important;
	}
    .default-cover.method.active img {
		filter: invert(75%) sepia(66%) saturate(1955%) hue-rotate(327deg) brightness(103%) contrast(102%) !important;
	}
    [name="vehicle_number"] {
        text-transform: uppercase;
    }
</style>
<div class="content pos-design p-0">
    <div class="d-sm-flex justify-content-between">
        <div class="btn-row d-sm-flex align-items-center">
            <a href="javascript:void(0);" class="btn btn-secondary mb-xs-3" data-bs-toggle="modal" data-bs-target="#orders">
                <span class="me-1 d-flex align-items-center">
                    <i data-feather="shopping-cart" class="feather-16"></i>
                </span>
                View Orders
            </a>
            <a href="javascript:void(0);" class="btn btn-info">
                <span class="me-1 d-flex align-items-center">
                    <i data-feather="rotate-cw" class="feather-16"></i>
                    </span>
                    Reset
            </a>
            <a href="javascript:void(0);" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#recents">
                <span class="me-1 d-flex align-items-center">
                    <i data-feather="refresh-ccw" class="feather-16"></i>
                </span>
                Transaction
            </a>
        </div>
        <div class="btn-row d-sm-flex">
            <!-- <a href="javascript:void(0);" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#inventory-return-modal">
                <span class="me-1 d-flex align-items-center">
                    <i data-feather="refresh-ccw" class="feather-16"></i>
                </span>
                Inventory Return
            </a> -->
        </div>
    </div>
    <div class="row align-items-start pos-wrapper">
        <div class="col-md-12 col-lg-8">
            <div class="pos-categories tabs_wrapper">
                <h5>Categories</h5>
                <p>Select From Below Categories</p>
                <ul class="tabs owl-carousel pos-category">
                    <li id="all">
                        <a href="javascript:void(0);">
                            <img src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/categories/category-01.png"
                                alt="Categories">
                        </a>
                        <h6><a href="javascript:void(0);">All Categories</a></h6>
                        <span>80 Items</span>
                    </li>
                    @foreach($categories as $category)
                    <li id="{{ $category->name }}">
                        <a href="javascript:void(0);">
                            <img src="{{ asset($category->image)}}" alt="Categories">
                        </a>
                        <h6><a href="javascript:void(0);">{{ $category->name }}</a></h6>
                        <span>{{$category->count}} Items</span>
                    </li>
                    @endforeach
                </ul>
                <div class="pos-products">
                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="mb-3">Products</h5>
                    </div>
                    <div class="tabs_container">
                        <div class="tab_content active" data-tab="all">
                            <div class="row">
                                @foreach($products as $product)
                                
                                @php
                                    $cartProducts = session('cart.products', []); // Retrieve the 'products' array from session or default to an empty array
                                    $cartProductIds = [];
                                    foreach ($cartProducts as $cart_product) {
                                        $cartProductIds[] = $cart_product['id']; // Push each product ID into the $productIds array
                                    }
                                @endphp

                                <div class="col-sm-2 col-md-6 col-lg-3 col-xl-3">
                                    <div @class(["product-info default-cover card", "added-to-cart" => in_array($product->id, $cartProductIds)]) onclick="addToCartAndToggleTick('{{ $product->id }}')">
                                        <div class="img-bg">
                                            <img  class="img-bg" id="productImage{{ $product->id }}" src="{{ asset($product->image) }}" alt="Product Image">
                                         
                                        </div>
                                        <h6 class="cat-name"><a
                                                href="javascript:void(0);">{{ $product->categoryName }}</a></h6>
                                        <h6 class="product-name"><a href="javascript:void(0);">{{ $product->name }}</a>
                                        </h6>
                                        <div class="d-flex align-items-center justify-content-between price">
                                            <span>30 Pcs</span>
                                            <p>${{ number_format(optional($product)->price, 2) }}</p>
                                        </div>
                                        <div class="input-group mt-2">
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input type="hidden" id="quantity{{ $product->id }}" class="form-control"
                                                value="1" min="1">
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-4 ps-0">
            <aside class="product-order-list">
                {{-- <div class="head d-flex align-items-center justify-content-between w-100">
                    <div class>
                        <h5>Order List</h5>
                        <span>Invoice ID : <span id="invoice-id">{{ $invoiceId }}</span></span>
                    </div>
                </div> --}}
            
                <div class="product-added block-section">
                    <div class="head-text d-flex align-items-center justify-content-between">
                        <h6 class="d-flex align-items-center mb-0">Product Added<span
                                class="count">@if(session('cart')) {{ session('cart')['count'] }} @else 0 @endif</span></h6>
                        <a href="javascript:void(0);"
                            class="d-flex align-items-center text-danger"><span class="me-1"><i
                                    data-feather="x" class="feather-16"></i></span>Clear all</a>
                    </div>
                    <!-- Cart product list-->
                    <div class="product-wrap">
                    <div class="producr-list-cart">
                        @if (session('cart') && isset(session('cart')['products']))
                            @foreach (session('cart')['products'] as $key => $product)
                            <div class="product-list d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center product-info" data-bs-toggle="modal"
                                    data-bs-target="#products">
                                    <a href="javascript:void(0);" class="img-bg">
                                        <img src="{{ $product['image'] }}"
                                            alt="Products">
                                    </a>
                                    <div class="info">
                                        <span>PT0005</span>
                                        <h6><a href="javascript:void(0);">{{ $product['name'] }}</a></h6>
                                        <p>${{ $product['price'] }}</p>
                                    </div>
                                </div>
                                <div class="qty-item text-center">
                                    <a href="javascript:void(0);" class="dec d-flex justify-content-center align-items-center decrease decrease-button"data-bs-toggle="tooltip" data-id = "{{ $product['id'] }}" data-bs-placement="top" title="minus"><i
                                            data-feather="minus-circle" class="feather-14"></i></a>
                                    <input type="text" class="form-control text-center quantity__number" name="qty" value="{{ $product['quantity']}}">
                                    <a href="javascript:void(0);" class="inc d-flex justify-content-center align-items-center increase" data-bs-toggle="tooltip" data-id = "{{ $product['id'] }}" data-bs-placement="top" title="plus"><i
                                            data-feather="plus-circle" class="feather-14"></i></a>
                                </div>
                                <div class="d-flex align-items-center action">
                                    <!-- <a class="btn-icon edit-icon me-2" href="#"
                                        data-bs-toggle="modal" data-bs-target="#edit-product">
                                        <i data-feather="edit" class="feather-14"></i>
                                    </a> -->
                                    <a class="btn-icon delete-icon" onclick="removeFromCart('{{ $product['id'] }}')">
                                        <i data-feather="trash-2" class="feather-14"></i>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <h3 class="font-bold text-center mt-5">{{__('Cart is empty')}}</h3>
                        @endif
                    </div>
                    </div>
                    <!--- end cart Product list-->
                </div>
                <div class="block-section">
                    <div class="order-total">
                        <table class="table table-responsive table-borderless">
                            <tr>
                                <td>Discount</td>
                                <td class="">
                                    @php
                                        $discountValue = '';
                                        if(session()->has('cart') && array_key_exists('discount_percentage', session('cart'))) {
                                            $discountValue = session('cart')['discount_percentage'];
                                        }
                                    @endphp
                                    <select class="select discount-option" id="discountSelect">
                                        <option selected disabled>Select Discount</option>
                                        @foreach($discounts as $key =>$discount)
                                            <option value="{{ $discount->discount }}" @selected($discount->discount == $discountValue)>{{$discount->discount}} %</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Gross Sale Amount</td>
                                <td class="text-end totalAmount">@if(session('cart')) {{ session('cart')['formatted_sub_total'] }} @else 0 @endif</td>
                            </tr>
                            <tr>
                                <td class="danger discountPercentage">Total Discount</td>
                                @php
                                    $cart = session('cart');
                                @endphp
                                @if(is_array($cart) && isset($cart['sub_total']))
                                    <td class="danger text-end discountAmount"> $ {{ isset($cart['discount']['discount_amount']) ? $cart['discount']['discount_amount'] : '0' }} </td>
                                @else 
                                    <td class="danger text-end discountAmount">0 </td>
                                @endif
                            </tr>
                            <tr>
                                <td>Net Sales Amount</td>
                                    <td class="text-end grandTotal">@if(session('cart')) {{ session('cart')['formatted_grand_total'] }} @else 0 @endif</td>
                            </tr>
                            <tr>
                                <td>Tax (GCT 15%)</td>
                                <td class="text-end tax"> 
                                    @php
                                        $cart = session('cart');
                                        $tax = isset($cart['tax']) ? $cart['tax'] : 0;
                                    @endphp
                                        $ {{ $tax }}
                                    </td>
                            </tr>
                            <tr>
                                <td>Total Payable</td>
                                <td class="text-end payable"> 
                                    @php
                                        $cart = session('cart');
                                        $payable = isset($cart['payable']) ? $cart['payable'] : 0;
                                    @endphp
                                    $ {{ $payable }}
                                </td>
                            </tr>
                            <!-- <tr>
                                <td>Total</td>
                                <td class="text-end grandTotal"> @if(session('cart')) {{ session('cart')['formatted_grand_total'] }} @else 0 @endif</td>
                            </tr> -->
                        </table>
                    </div>
                </div>
                <div class="d-grid btn-block">
                    <a class="btn btn-secondary" href="javascript:void(0);">
                        Grand Total :  
                                    @php
                                        $cart = session('cart');
                                        $payable = isset($cart['payable']) ? $cart['payable'] : 0;
                                    @endphp
                                    $ <span class="payable">{{ $payable }}</span>
                    </a>
                </div>
                <div class="d-grid btn-block">
                    <a class="btn btn-secondary" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#place-order">
                        Place Order
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

     $(function() {
        $('#discountSelect').on('change', function() {
            var discount = this.value;
            console.log(discount);
            $.ajax({
                    url: '{{ route('discount') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        discount: discount,
                    },
                    success: function(response) {
                        console.log(response.cart);
                        if (response.success == true) {
                            let grandTotal = response.cart.formatted_grand_total;
                            let discountAmount = response.cart.discount_amount;
                            $('.discountAmount').html(discountAmount);
                            $('.grandTotal').html(grandTotal);
                            $('.tax').html(response.cart.tax);
                            $('.payable').html(response.cart.payable);
                            // $('.totalAmount').html(amount);
                            // $('.discountPercentage').html('Total Discount (' + discount + ')');
                        } else {
                            $('.error-message').html(response.message);
                        }
                    },
                });
        });
    });
    // function generateCartData() {
    //     var cartStr = '<div class="producr-list-cart">';
    //     @if (session('cart') && isset(session('cart')['products']))
    //         @foreach (session('cart')['products'] as $key => $product)
    //             cartStr += '<div class="product-list d-flex align-items-center justify-content-between">' +
    //                             '<div class="d-flex align-items-center product-info" data-bs-toggle="modal" data-bs-target="#products">' +
    //                                 '<a href="javascript:void(0);" class="img-bg">' +
    //                                     '<img src="{{ $product['image'] }}" alt="Products">' +
    //                                 '</a>' +
    //                                 '<div class="info">' +
    //                                     '<span>PT0005</span>' +
    //                                     '<h6><a href="javascript:void(0);">{{ $product['name'] }}</a></h6>' +
    //                                     '<p>${{ $product['price'] }}</p>' +
    //                                 '</div>' +
    //                             '</div>' +
    //                             '<div class="qty-item text-center">' +
    //                                 '<a href="javascript:void(0);" class="dec d-flex justify-content-center align-items-center decrease" data-bs-toggle="tooltip" data-id="{{ $product['id'] }}" data-bs-placement="top" title="minus">-</a>' +
    //                                 '<input type="text" class="form-control text-center quantity__number" name="qty" value="{{ $product['quantity'] }}">' +
    //                                 '<a href="javascript:void(0);" class="inc d-flex justify-content-center align-items-center increase" data-bs-toggle="tooltip" data-id="{{ $product['id'] }}" data-bs-placement="top" title="plus">+</a>' +
    //                             '</div>' +
    //                             '<div class="d-flex align-items-center action">' +
    //                                 '<a class="btn-icon delete-icon confirm-text" onclick="removeFromCart({{ $product['id'] }})">' +
    //                                     '<i data-feather="trash-2" class="feather-14"></i>' +
    //                                 '</a>' +
    //                             '</div>' +
    //                         '</div>';
    //         @endforeach
    //     @else
    //         cartStr += '<h3 class="font-bold text-center mt-5">{{__('Cart is empty')}}</h3>';
    //     @endif
    //     cartStr += '</div>';
    //     return cartStr;
    // }


    $(document).on('click', '.close-cart', function() {
        alert('as');
        if ($('body').hasClass('producr-list-cart_active')) {
            $('body').removeClass('producr-list-cart_active');
        }
        $('.producr-list-cart').removeClass('active');
    });

    function updateQuantity(productId, quantity, element) {
        let cartEndpoint = "{{ route('remove-from-cart') }}";
        if (quantity > 0) {
            cartEndpoint = "{{ route('update-cart') }}";
        }

        $.ajax({
            url: cartEndpoint,
            method: "POST",
            data: {
                _token: '{{ csrf_token() }}',
                product_id: productId,
                qty: quantity
            },
            success: function(response) {
                if (response.success) {
                    if (quantity > 0) {
                        console.log(response.cart.formatted_grand_total);
                        let cart = response.cart.formatted_sub_total;
                        let amount = '<b>' + cart + '</b>';
                        $('.totalAmount').html(amount);
                        $('.grandTotal').html(response.cart.formatted_grand_total);
                        $('.tax').html(response.cart.tax);
                        $('.payable').html(response.cart.payable);
                        $('.discount-option').html(response.discountOptions);
                    } else {
                        window.location.reload();
                    }
                }
            }
        });
    }

    $(document).on('click','.increase',function() {
        var productId = $(this).attr("data-id");
        var quantityInput = $(this).parent().find('.quantity__number');
        var currentValue = parseInt(quantityInput.val());
        var qty = currentValue;
        updateQuantity(productId, qty);
    });

    $(document).on('click','.decrease',function() {
        var productId = $(this).attr("data-id");
        console.log(productId);
        var quantityInput = $(this).parent().find('.quantity__number');
        var currentValue = parseInt(quantityInput.val());
        var qty = currentValue;
        updateQuantity(productId, qty);
    });
    // Select payment method
    $(document).on('click','div.default-cover.method',function(){
        var payment_method = $(this).data('method');
        $('div.default-cover.method').removeClass('active');
        $(this).addClass('active');
        $('#payment-method').val(payment_method);
        if(payment_method == 'cash'){
            $('#method-cash').css('display','flex');
            $('[name="tender_amount"]').attr('required','');
        }else{
            $('#method-cash').hide();
            $('[name="tender_amount"]').removeAttr('required');
        }
    });

    $(document).ready(function() {
        $('[name="order_customer_id"]').chosen({
            placeholder_text_single: 'Enter Name',
            allow_single_deselect: true,
            no_results_text: 'No results matched <a class="btn btn-info add-new-customer" href="#">Add New</a>'
        });
    });
    // Add new customer in dropdown
    $(document).on('click','a.add-new-customer',function(e){
        e.preventDefault();
        var newOption = $('.chosen-search-input').val(); 
        if (newOption) {
            var newOptionElement = new Option(newOption, newOption, true, true);
            $('[name="order_customer_id"]').append(newOptionElement);

            $('[name="order_customer_id"]').trigger('chosen:updated');

            $('[name="order_customer_id"]').val(newOption).trigger('chosen:updated');

            $('#new-option-input').val('');
            $('#place-order').find('form').trigger('reset'); 
        } else {
            alert('Please enter a valid option.');
        }
    });
    $(document).on('click','.chosen-results .active-result',function(){

        var contact_number = $('[name="order_customer_id"]').find(':selected').data('customer-contact'); 
        var alternate_number = $('[name="order_customer_id"]').find(':selected').data('customer-alternate'); 
        var shipping_address = $('[name="order_customer_id"]').find(':selected').data('customer-shipping'); 
        var billing_address = $('[name="order_customer_id"]').find(':selected').data('customer-billing'); 
        $('[name="contact_number"]').val(contact_number);
        $('[name="alternate_number"]').val(alternate_number);
        $('[name="shipping_address"]').val(shipping_address);
        $('[name="billing_address"]').val(billing_address);
        
    });

    $(document).on('submit','form#place-order',function(event){
        event.preventDefault(); 
        var payment_method = $('#payment-method').val();
        if(payment_method == ''){
            alert('Please Select Payment Method');
            return false;
        }
        let customer_name = $('[name="order_customer_id"]').find(':selected').val();
        let vehicle_number = $('[name="vehicle_number"]').val();
        let contact_number = $('[name="contact_number"]').val();
        let alternate_number = $('[name="alternate_number"]').val();
        let shipping_address = $('[name="shipping_address"]').val();
        let billing_address = $('[name="billing_address"]').val();
        let tender_amount = $('[name="tender_amount"]').val();
        let change_amount = $('[name="change_amount"]').val();
        $.ajax({
            url : "{{ url('admin/pos-sale-submission') }}",
            type : 'POST',
            data : {
                _token: '{{ csrf_token() }}',
                customer_name : customer_name,
                vehicle_number : vehicle_number,
                contact_number : contact_number,
                alternate_number : alternate_number,
                shipping_address : shipping_address,
                billing_address : billing_address,
                payment_method : payment_method,
                tender_amount : tender_amount,
                change_amount : change_amount,
            },success : function(resp){
                
                if (resp.success) {
                    Swal.fire({
                        title: "Order Placed!",
                        text: "Your Order Placed "+resp.orderId,
                        icon: "success",
                        timer: 1000
                    });
                    $('#invoice-id').text(resp.orderId);
                    const newWindow = window.open(resp.pdfUrl, '_blank', 'noopener,noreferrer');
                    if (newWindow) {
                        setTimeout(() => {
                            window.focus();
                        }, 100);
                    }
                    $('[name="order_customer_id"]').val('').trigger('chosen:updated');                    
                    $("#place-order").modal("hide");
                    $('#place-order').find('form').trigger('reset'); 
                }
            }
        });
    });
    $(document).on('keyup','[name="tender_amount"]',function(){
        var tender_amount = $(this).val();
        var payable = parseInt($('span.payable:first').text());

        console.log(tender_amount,payable)

        if(tender_amount > payable){
            var total_change = tender_amount-payable;
            console.log('amt',total_change)
            $('[name="change_amount"]').val(total_change);
        }else{
            $('[name="change_amount"]').val(0);
        }   
    });
    $(document).on('keyup','[name="searchPaidOrder"]',function(){
        var invoice_number = $(this).val().toUpperCase();
        $('div.default-cover').hide();
        $('[data-invoice-id="'+invoice_number+'"]').show();
        if(invoice_number == ''){
            $('div.default-cover').show();
        }
    });
</script>
@endsection