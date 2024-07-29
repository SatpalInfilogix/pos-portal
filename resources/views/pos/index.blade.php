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

        .default-cover.method.active {
            border-color: #ff9f43;
        }

        .row.d-flex.align-items-center.justify-content-center.methods {
            margin-top: 15px;
        }

        .default-cover.method:hover {
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
    @php
        $cart = session('cart');
    @endphp
    <div class="content pos-design p-0">
        <div class="d-sm-flex justify-content-between">
            <div class="btn-row d-sm-flex align-items-center">
                <a href="javascript:void(0);" class="btn btn-secondary mb-xs-3" data-bs-toggle="modal" data-bs-target="#orders">
                    <span class="me-1 d-flex align-items-center">
                        <i data-feather="shopping-cart" class="feather-16"></i>
                    </span>
                    View Orders
                </a>
                <a href="javascript:void(0);" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#recent-transactions">
                    <span class="me-1 d-flex align-items-center">
                        <i data-feather="refresh-ccw" class="feather-16"></i>
                    </span>
                    Recent Transactions
                </a>
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
                                <img src="{{ asset('assets/img/category-icon.png') }}" alt="Categories">
                            </a>
                            <h6><a href="javascript:void(0);">All Categories</a></h6>
                            <span>{{ $totalProducts }} Items</span>
                        </li>
                        @foreach ($categories as $category)
                            <li id="{{ $category->name }}">
                                <a href="javascript:void(0);">
                                    <img src="{{ asset($category->image) }}" alt="Categories">
                                </a>
                                <h6><a href="javascript:void(0);">{{ $category->name }}</a></h6>
                                <span>{{ $category->products_count }} Items</span>
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
                                    @foreach ($products as $product)
                                        @php
                                            $cartProducts = session('cart.products', []); // Retrieve the 'products' array from session or default to an empty array
                                            $cartProductIds = [];
                                            foreach ($cartProducts as $cart_product) {
                                                $cartProductIds[] = $cart_product['id']; // Push each product ID into the $productIds array
                                            }
                                        @endphp

                                        <div class="col-sm-2 col-md-6 col-lg-3 col-xl-3">
                                            <div id="product-check_{{ $product->id }}" @class([
                                                'product-info default-cover card', 'products-' . $product->id,
                                                'added-to-cart' => in_array($product->id, $cartProductIds),
                                            ])
                                                onclick="addToCartAndToggleTick('{{ $product->id }}')">
                                                <div class="img-bg">
                                                    <img class="img-bg" id="productImage{{ $product->id }}"
                                                        src="{{ asset($product->image) }}" alt="Product Image">

                                                </div>
                                                <h6 class="cat-name"><a
                                                        href="javascript:void(0);">{{ $product->categoryName }}</a></h6>
                                                <h6 class="product-name"><a
                                                        href="javascript:void(0);">{{ $product->name }}</a>
                                                </h6>
                                                <div class="d-flex align-items-center justify-content-between price">
                                                    <span>30 Pcs</span>
                                                    <p>${{ number_format(optional($product)->price, 2) }}</p>
                                                </div>
                                                <div class="input-group mt-2">
                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                    <input type="hidden" id="quantity{{ $product->id }}"
                                                        class="form-control" value="1" min="1">
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
                <aside class="product-order-list" data-max-discount="{{ $discount->discount ?? '' }}">
                    @php
                        $isCartEmpty = true;
                    @endphp

                    @if (session('cart') && isset(session('cart')['products']) && session('cart')['count'] > 0)
                        @php
                            $isCartEmpty = false;
                        @endphp
                    @endif

                    <div class="product-added block-section">
                        <div class="head-text d-flex align-items-center justify-content-between">
                            <h6 class="d-flex align-items-center mb-0">Product Added
                                <span class="count count-products">
                                    @if (session('cart'))
                                        {{ session('cart')['count'] }}
                                    @else
                                        0
                                    @endif
                                </span>
                            </h6>

                            <a href="javascript:void(0);" @class([
                                'd-flex align-items-center text-danger cart-indicator empty-cart',
                                'd-none' => $isCartEmpty,
                            ])>
                                <span class="me-1">
                                    <i data-feather="x" class="feather-16"></i>
                                </span>
                                Clear all
                            </a>
                        </div>
                        <!-- Cart product list-->
                        <div class="product-wrap">
                            <div class="product-list-cart">
                                @if (session('cart') && isset(session('cart')['products']) && session('cart')['count'] > 0)
                                    @foreach (session('cart')['products'] as $key => $product)
                                        <div class="product-list d-flex align-items-center justify-content-between"
                                            id="product_{{ $product['id'] }}">
                                            <div class="d-flex align-items-center product-info">
                                                <a href="javascript:void(0);" class="img-bg">
                                                    <img src="{{ $product['image'] }}" alt="Products">
                                                </a>
                                                <div class="info">
                                                    <span>{{ $product['code'] }}</span>
                                                    <h6><a href="javascript:void(0);">{{ $product['name'] }}</a></h6>
                                                    <p>${{ $product['price'] }}</p>
                                                </div>
                                            </div>
                                            <div class="qty-item text-center">
                                                <a href="javascript:void(0);"
                                                    class="dec d-flex justify-content-center align-items-center decrease decrease-button"
                                                    data-bs-toggle="tooltip" data-id = "{{ $product['id'] }}"
                                                    data-bs-placement="top" title="minus">
                                                    <i data-feather="minus-circle" class="feather-14"></i>
                                                </a>
                                                <input type="text" class="form-control text-center quantity__number"
                                                    name="qty" value="{{ $product['quantity'] }}">
                                                <a href="javascript:void(0);"
                                                    class="inc d-flex justify-content-center align-items-center increase"
                                                    data-bs-toggle="tooltip" data-id = "{{ $product['id'] }}"
                                                    data-bs-placement="top" title="plus">
                                                    <i data-feather="plus-circle" class="feather-14"></i>
                                                </a>
                                            </div>
                                            <div class="d-flex align-items-center action">
                                                <a class="btn-icon delete-icon"
                                                    onclick="removeFromCart('{{ $product['id'] }}')">
                                                    <i data-feather="trash-2" class="feather-14"></i>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <h3 class="font-bold text-center mt-5">{{ __('Cart is empty') }}</h3>
                                @endif
                            </div>
                        </div>
                        <!--- end cart Product list-->
                    </div>
                    <div @class(['block-section cart-indicator', 'd-none' => $isCartEmpty])>
                        <div class="order-total">
                            <table class="table table-responsive table-borderless">
                                <tr>
                                    <td>Discount</td>
                                    <td class="">
                                        <?php
                                        $discountValue = '';
                                        if (session()->has('cart') && array_key_exists('discount_percentage', session('cart'))) {
                                            $discountValue = session('cart')['discount_percentage'];
                                        }
                                        ?>
                                        <input type="number" class="form-control discountSelect" name="discount" id="discountSelect"
                                            min="0" data-max="{{ $discount->discount ?? '' }}"
                                            value="{{ $discountValue }}">
                                        <div class="text-danger" id="discountError"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Gross Sale Amount</td>
                                    <td class="text-end totalAmount">
                                        @if (session('cart'))
                                            {{ session('cart')['formatted_sub_total'] }}
                                        @else
                                            0
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="danger discountPercentage">Total Discount</td>
                                    @if (is_array($cart) && isset($cart['sub_total']))
                                        <td class="danger text-end discountAmount">
                                            ${{ isset($cart['discount']['discount_amount']) ? $cart['discount']['discount_amount'] : '0' }}
                                        </td>
                                    @else
                                        <td class="danger text-end discountAmount">0 </td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Net Sales Amount</td>
                                    <td class="text-end grandTotal">
                                        @if (session('cart'))
                                            {{ session('cart')['formatted_grand_total'] }}
                                        @else
                                            0
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tax (GCT 15%)</td>
                                    <td class="text-end tax">
                                        @php
                                            $tax = isset($cart['tax']) ? $cart['tax'] : 0;
                                        @endphp
                                        ${{ number_format($tax, 2) }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Total Payable</td>
                                    <td class="text-end payable">
                                        @php
                                            $payable = isset($cart['payable']) ? $cart['payable'] : 0;
                                        @endphp
                                        ${{ number_format($payable, 2) }}
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div @class(['cart-indicator', 'd-none' => $isCartEmpty])>
                        {{-- <div class="d-grid btn-block">
                            <a class="btn btn-secondary" href="javascript:void(0);">
                                Grand Total :
                                @php
                                    $payable = isset($cart['payable']) ? $cart['payable'] : 0;
                                @endphp
                                <span class="payable">${{ number_format($payable, 2) }}</span>
                            </a>
                        </div> --}}
                        <div class="d-grid btn-block">
                            <a class="btn btn-secondary" href="javascript:void(0);" data-bs-toggle="modal"
                                data-bs-target="#place-order">
                                Place Order
                            </a>
                        </div>
                        <div class="btn-row d-sm-flex align-items-center justify-content-between">
                            <a href="javascript:void(0);" class="btn btn-info btn-icon flex-fill" data-bs-toggle="modal"
                                data-bs-target="#hold-order">
                                <span class="me-1 d-flex align-items-center">
                                    <i data-feather="pause" class="feather-16"></i>
                                </span>
                                Hold
                            </a>
                            <a href="javascript:void(0);" class="btn btn-danger btn-icon flex-fill">
                                <span class="me-1 d-flex align-items-center">
                                    <i data-feather="trash-2" class="feather-16"></i>
                                </span>
                                Void
                            </a>
                            <a href="javascript:void(0);" class="btn btn-success btn-icon flex-fill"
                                data-bs-toggle="modal" data-bs-target="#payment-completed">
                                <span class="me-1 d-flex align-items-center">
                                    <i data-feather="credit-card" class="feather-16"></i>
                                </span>
                                Payment
                            </a>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>

    
    @include('partials.place-order')
    @include('partials.order-inventory-return')
    @include('partials.hold-order')

    @include('partials.recent-transactions')
    @include('partials.orders')


    <script>
        $(document).ready(function() {
            $('#discountSelect').on('input', function() {
                var discountValue = $(this).val();
                var maxDiscount = parseFloat($(this).data('max'));
                // Clear previous error message
                $('#discountError').text('');

                // Validate discount value
                if (isNaN(discountValue)) {
                    $('#discountError').text('Discount must be a number.');
                } else if (discountValue < 0 || discountValue > maxDiscount) {
                    $('#discountError').text('Maximum discount can be ' + maxDiscount + '.');
                    // Limit discountValue to maxDiscount
                    discountValue = Math.min(maxDiscount, discountValue);
                    // Update the input field value
                    $(this).val(discountValue);
                }
            });
        });
        $(function() {
            $('#discountSelect').on('keyup', function() {
                var discountValue = $(this).val();
                $.ajax({
                    url: '{{ route('discount') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        discount: discountValue,
                    },
                    success: function(response) {
                        if (response.success == true) {
                            let grandTotal = response.cart.formatted_grand_total;
                            $('.grandTotal').html(grandTotal);

                            let discountAmount = response.cart.discount_amount;
                            let formatedDiscountAmount = '$' + discountAmount.toFixed(2);
                            $('.discountAmount').html(formatedDiscountAmount);

                            let tax = response.cart.tax;
                            let formatedTax = '$' + tax.toFixed(2);
                            $('.tax').html(formatedTax);

                            let payable = response.cart.payable;
                            let formatedPayable = '$' + payable.toFixed(2);
                            $('.payable').html(formatedPayable);
                        } else {
                            $('#discountError').html(response.message);
                            $('.error-message').html(response.message);
                        }
                    },
                });
            });
        });

        function emptyCart()
        {
            $.ajax({
                url: "{{ route('clear-cart') }}",
                method: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {
                    let cartHtml = ``;
                    if (response.success) {
                        $(`.cart-indicator`).addClass('d-none');
                        cartHtml = `<h3 class="font-bold text-center mt-5">Cart is empty</h3>`;
                    }
                    $('.count-products').html(0);
                    $('.product-list-cart').html(cartHtml);
                    $('.product-info').removeClass('added-to-cart');
                    $('.discountSelect').val(' ');
                }
            });
        }

        $(document).on('click', '.empty-cart', function() {
            emptyCart();
        });

        function updateQuantity(productId, quantity) {
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
                            let cart = response.cart.formatted_sub_total;
                            let amount = '<b>' + cart + '</b>';
                            $('.totalAmount').html(amount);
                            $('.grandTotal').html(response.cart.formatted_grand_total);
                            $('.tax').html(response.cart.tax);
                            $('.payable').html(response.cart.payable);
                            $('.discount-option').html(response.discountOptions);
                            $('.count-products').html(response.cart.count);

                            let discountAmount = response.cart.discount_amount;
                            let formatedDiscountAmount = '$' + discountAmount.toFixed(2);
                            $('.discountAmount').html(formatedDiscountAmount);
                        } else {
                            window.location.reload();
                        }
                    }
                }
            });
        }

        $(document).on('click', '.increase', function() {
            var productId = $(this).attr("data-id");
            var quantityInput = $(this).parent().find('.quantity__number');
            var currentValue = parseInt(quantityInput.val());
            var qty = currentValue;

            if ($('body').hasClass('updated-cart')) {
                qty = currentValue + 1;
            }

            $(this).parent().find('.quantity__number').val(qty);
            updateQuantity(productId, qty);
        });

        $(document).on('click', '.decrease', function() {
            var productId = $(this).attr("data-id");
            var quantityInput = $(this).parent().find('.quantity__number');
            var currentValue = parseInt(quantityInput.val());
            var qty = currentValue;

            if ($('body').hasClass('updated-cart')) {
                qty = currentValue - 1;
            }

            $(this).parent().find('.quantity__number').val(qty);
            updateQuantity(productId, qty);
        });

        // Select payment method
        $(document).on('click', 'div.default-cover.method', function() {
            var payment_method = $(this).data('method');
            $('div.default-cover.method').removeClass('active');
            $(this).addClass('active');
            $('#payment-method').val(payment_method);
            if (payment_method == 'cash') {
                $('#method-cash').css('display', 'flex');
                $('[name="tender_amount"]').attr('required', '');
            } else {
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
        $(document).on('click', 'a.add-new-customer', function(e) {
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
                //alert('Please enter a valid option.');
            }
        });

        $(document).on('keyup', '[name="tender_amount"]', function() {
            var tender_amount = $(this).val();
            var payable = parseInt($('span.payable:first').text().replace("$", ""));

            if (tender_amount > payable) {
                var total_change = tender_amount - payable;
                $('[name="order_change_amount"]').val(total_change);
            } else {
                $('[name="order_change_amount"]').val(0);
            }
        });


        $(document).on('click', '.increase', function() {
            var productId = $(this).attr("data-id");
            var quantityInput = $(this).parent().find('.quantity__number');
            var currentValue = parseInt(quantityInput.val());
            var qty = currentValue;
            updateQuantity(productId, qty);
        });

        $(document).on('click', '.decrease', function() {
            var productId = $(this).attr("data-id");
            console.log(productId);
            var quantityInput = $(this).parent().find('.quantity__number');
            var currentValue = parseInt(quantityInput.val());
            var qty = currentValue;
            updateQuantity(productId, qty);
        });

        // Select payment method
        $(document).on('click', 'div.default-cover.method', function() {
            var payment_method = $(this).data('method');
            $('div.default-cover.method').removeClass('active');
            $(this).addClass('active');
            $('#payment-method').val(payment_method);
            if (payment_method == 'cash') {
                $('#method-cash').css('display', 'flex');
                $('[name="tender_amount"]').attr('required', '');
            } else {
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
        $(document).on('click', 'a.add-new-customer', function(e) {
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
                //alert('Please enter a valid option.');
            }
        });

        $(document).on('click', '.chosen-results .active-result', function() {
            var contact_number = $('[name="order_customer_id"]').find(':selected').data('customer-contact');
            var alternate_number = $('[name="order_customer_id"]').find(':selected').data('customer-alternate');
            var shipping_address = $('[name="order_customer_id"]').find(':selected').data('customer-shipping');
            var billing_address = $('[name="order_customer_id"]').find(':selected').data('customer-billing');
            var shipping_pincode = $('[name="order_customer_id"]').find(':selected').data('shipping-pincode');
            var billing_pincode = $('[name="order_customer_id"]').find(':selected').data('billing-pincode');
            $('[name="contact_number"]').val(contact_number);
            $('[name="alternate_number"]').val(alternate_number);
            $('[name="shipping_address"]').val(shipping_address);
            $('[name="billing_address"]').val(billing_address);
            $('[name="shipping_address_pin_code"]').val(shipping_pincode);
            $('[name="billing_address_pin_code"]').val(billing_pincode);
        });

        $(document).on('submit', 'form#place-order', function(event) {
            event.preventDefault();
            var payment_method = $('#payment-method').val();
            if (payment_method == '') {
                alert('Please Select Payment Method');
                return false;
            }
            let customer_name = $('[name="order_customer_id"]').find(':selected').val();
            let vehicle_number = $('[name="vehicle_number"]').val();
            let contact_number = $('[name="contact_number"]').val();
            let alternate_number = $('[name="alternate_number"]').val();
            let shipping_address = $('[name="shipping_address"]').val();
            let billing_address = $('[name="billing_address"]').val();
            let shipping_address_pin_code = $('[name="shipping_address_pin_code"]').val();
            let billing_address_pin_code = $('[name="billing_address_pin_code"]').val();
            let tender_amount = $('[name="tender_amount"]').val();
            let change_amount = $('[name="change_amount"]').val();
            $.ajax({
                url: "{{ url('admin/pos-sale-submission') }}",
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    customer_name: customer_name,
                    vehicle_number: vehicle_number,
                    contact_number: contact_number,
                    alternate_number: alternate_number,
                    shipping_address: shipping_address,
                    billing_address: billing_address,
                    payment_method: payment_method,
                    tender_amount: tender_amount,
                    change_amount: change_amount,
                    shipping_address_pin_code: shipping_address_pin_code,
                    billing_address_pin_code: billing_address_pin_code,
                },
                success: function(resp) {
                    if (resp.success) {
                        Swal.fire({
                            title: "Order Placed!",
                            text: "Your Order Placed " + resp.orderId,
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
        
        $(document).on('keyup', '[name="tender_amount"]', function() {
            var tender_amount = $(this).val();
            var payable = parseInt($('span.payable:first').text());

            if (tender_amount > payable) {
                var total_change = tender_amount - payable;
                $('[name="change_amount"]').val(total_change);
            } else {
                $('[name="change_amount"]').val(0);
            }
        });

        $(document).on('keyup', 'input[name="searchOrder"]', function() {
            var invoice_number = $(this).val().toUpperCase();
            $('div.search-order-box').hide();
            $('[data-invoice-id="' + invoice_number + '"]').show();
            if (!invoice_number) {
                $('div.search-order-box').show();
            }
        });

        $(document).on('click', '#order-on-hold', function(event) {
            event.preventDefault();
            $.ajax({
                url: "{{ route('hold.order') }}",
                type: 'GET',
                success : function(response){
                    if(response.success){
                        
                        $("#hold-order").modal("hide");
                        Swal.fire({
                            position: "top-end",
                            icon: "success",
                            title: `Your Order ${response.orderId} On Hold`,
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                }
            });    
        });
    </script>
@endsection
