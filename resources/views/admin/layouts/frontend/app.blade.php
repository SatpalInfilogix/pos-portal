<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>POS System</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap5.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/daterangepicker.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom-style.css') }}">
    <link href="{{ asset('assets/css/chosen.min.css') }}" rel="stylesheet" />

    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/chosen.jquery.min.js') }}"></script>

</head>

<body>
    <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div>

    <div class="main-wrapper">

        <div class="header">

            <div class="header-left active">
                <a href="{{ route('backend-dashboard') }}" class="logo logo-normal">
                    <img src="{{ asset('assets/img/logo.png') }}" alt>
                </a>
                <a href="{{ route('backend-dashboard') }}" class="logo logo-white">
                    <img src="{{ asset('assets/img/logo-white.png') }}" alt>
                </a>
                <a href="{{ route('backend-dashboard') }}" class="logo-small">
                    <img src="{{ asset('assets/img/logo-small.png') }}" alt>
                </a>
            </div>

            <a id="mobile_btn" class="mobile_btn d-none" href="#sidebar">
                <span class="bar-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>

            <ul class="nav user-menu">
                <li class="nav-item nav-searchinputs"></li>

                @if (auth()->user()->profile_image)
                    @php
                        $profile_picture = asset(auth()->user()->profile_image);
                    @endphp
                @else
                    @php
                        $profile_picture = asset('assets/img/default-user.png');
                    @endphp
                @endif

                <li class="nav-item dropdown has-arrow main-drop">
                    <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
                        <span class="user-info">
                            <span class="user-letter">
                                <img src="{{ $profile_picture }}" alt="" class="img-fluid">
                            </span>
                            <span class="user-detail">
                                <span class="user-name">{{ auth()->user()->first_name }}
                                    {{ auth()->user()->last_name }}</span>
                                <span class="user-role">{{ auth()->user()->getRoleNames()->first() }}</span>
                            </span>
                        </span>
                    </a>
                    <div class="dropdown-menu menu-drop-user">
                        <div class="profilename">
                            <div class="profileset">
                                <span class="user-img">
                                    <img src="{{ $profile_picture }}" alt>
                                    <span class="status online"></span>
                                </span>
                                <div class="profilesets">
                                    <h6>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h6>
                                    <h5>{{ auth()->user()->getRoleNames()->first() }}</h5>
                                </div>
                            </div>
                            <hr class="m-0">
                            <a class="dropdown-item" href="javascript:void(0)">
                                <i class="me-2" data-feather="user"></i>
                                My Profile
                            </a>
                            <a class="dropdown-item" href="javascript:void(0)">
                                <i class="me-2" data-feather="settings"></i>
                                Settings
                            </a>
                            <hr class="m-0">
                            <a href="{{ route('logout') }}" class="dropdown-item logout pb-0">
                                <img src="{{ asset('assets/img/icons/log-out.svg') }}" class="me-2" alt="">
                                Logout
                            </a>
                        </div>
                    </div>
                </li>
            </ul>


            <div class="dropdown mobile-user-menu">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">My Profile</a>
                    <a class="dropdown-item" href="#">Settings</a>
                    <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                </div>
            </div>

        </div>

        <div class="page-wrapper pos-pg-wrapper ms-0">
            @yield('content')
        </div>
    </div>

    @include('partials.payment-completed')
    @include('partials.print-receipt')

    {{-- Place Order --}}
    <div class="modal fade" id="place-order" tabindex="-1" aria-labelledby="place-order" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">INVOICE ID : <span id="invoice-id">{{ $invoiceId ?? '' }}</span></h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="place-order" method="POST">
                        <div class="row">
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="input-blocks">
                                    <label>Customer Name</label>
                                    <select name="order_customer_id" class="form-control chosen-select" required>
                                        <option></option>
                                        @foreach ($customers as $customer)
                                            <option value="{{ $customer->customer_name }}"
                                                data-customer-id="{{ $customer->id }}"
                                                data-customer-contact = "{{ $customer->contact_number }}"
                                                data-customer-alternate = "{{ $customer->alternate_number }}"
                                                data-customer-billing = "{{ $customer->billing_address }}"
                                                data-customer-shipping = "{{ $customer->shipping_address }}" 
                                                data-shipping-pincode = "{{ $customer->shipping_address_pin_code }}" 
                                                data-billing-pincode = "{{ $customer->billing_address_pin_code }}" 
                                            >{{ $customer->customer_name.' ( '.$customer->contact_number.' )' }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="input-blocks">
                                    <label>Vehicle Number</label>
                                    <input type="text" name="vehicle_number" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="input-blocks">
                                    <label>Contact No.</label>
                                    <input type="text" name="contact_number" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="input-blocks">
                                    <label>Alternate Contact No.</label>
                                    <input type="text" name="alternate_number" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="input-blocks">
                                    <label>Shipping Address</label>
                                    <textarea name="shipping_address" required></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="input-blocks">
                                    <label>Billing Address</label>
                                    <textarea name="billing_address" required></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="input-blocks">
                                    <label>Shipping Pincode</label>
                                    <input type="text" name="shipping_address_pin_code" class="form-control"
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="input-blocks">
                                    <label>Billing Pincode</label>
                                    <input type="text" name="billing_address_pin_code" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="block-section payment-method">
                            <h6>Payment Method</h6>
                            <div class="row d-flex align-items-center justify-content-center methods">
                                <div class="col-md-6 col-lg-4 item">
                                    <div class="default-cover method" data-method="cash">
                                        <img src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/icons/cash-pay.svg"
                                            alt="Payment Method">
                                        <span>Cash</span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 item">
                                    <div class="default-cover method" data-method="debit-card">
                                        <img src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/icons/credit-card.svg"
                                            alt="Payment Method">
                                        <span>Debit Card</span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 item">
                                    <div class="default-cover method" data-method="credit">
                                        <img src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/icons/credit-card.svg"
                                            alt="Payment Method">
                                        <span>credit</span>
                                    </div>
                                </div>
                                <input type="hidden" name="payment-method" id="payment-method">
                            </div>
                        </div>
                        <div class="row" id="method-cash">
                            <div class="col-md-6 col-lg-4 item">
                                <input type="number" name="tender_amount" class="form-control"
                                    placeholder="Tender Amount">
                            </div>
                            <div class="col-md-6 col-lg-4 item">
                                <input type="number" name="change_amount" class="form-control"
                                    placeholder="Change Amount">
                            </div>
                            <div class="col-md-6 col-lg-4 item">

                            </div>
                        </div>
                        <p class="grand-total"> Grand Total :
                            @php
                                $cart = session('cart');
                                $payable = isset($cart['payable']) ? $cart['payable'] : 0;
                            @endphp
                            $ <span class="payable">{{ $payable }}</span>
                        </p>

                        <div class="modal-footer d-sm-flex justify-content-end">
                            <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                            <button class="btn btn-submit me-2">Place</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Place Order End --}}
    @include('partials.order-inventory-return')
    @include('partials.hold-order')

    @include('partials.recent-transactions')
    @include('partials.orders')
    @include('partials.inventory-return')
    @include('partials.gate-pass')
    @include('partials.pos-sidebar')

    <script data-cfasync="false" src="{{ asset('assets/js/email-decode.min.js') }}"></script>

    <script>
        function addToCartAndToggleTick(productId) {
            // Simulate adding to cart (you would typically use Ajax to do this)
            let productImage = document.getElementById(`productImage${productId}`);
            let productCard = productImage.closest('.product-info');

            $('body').addClass('updated-cart');

            // Check if product is already in cart
            if (productCard.classList.contains('added-to-cart')) {
                // Remove from cart (simulated)
                productCard.classList.remove('added-to-cart');
                removeFromCart(productId);
            } else {
                // Add to cart (simulated)
                productCard.classList.add('added-to-cart');
                addToCart(productId);
            }
        }


        function updateCartUI(cartData) {
            let cartHtml = ``;

            if (cartData.count == 0) {
                $(`.cart-indicator`).addClass('d-none');
                cartHtml = `<h3 class="font-bold text-center mt-5">Cart is empty</h3>`;
            } else {
                $(`.cart-indicator`).removeClass('d-none');
                $.each(cartData.products, function(key, product) {
                    cartHtml += `<div class="product-list d-flex align-items-center justify-content-between" id="product_${product.id}">
                        <div class="d-flex align-items-center product-info">
                            <a href="javascript:void(0);" class="img-bg">
                                <img src="${product.image}" alt="Products">
                            </a>
                            <div class="info">
                                <span>${product.code}</span>
                                <h6><a href="javascript:void(0);">${product.name}</a></h6>
                                <p>$${product.price}</p>
                            </div>
                        </div>
                        <div class="qty-item text-center">
                            <a href="javascript:void(0);" class="dec d-flex justify-content-center align-items-center decrease" data-bs-toggle="tooltip" data-id="${product.id}" data-bs-placement="top" title="decrease">
                                <i data-feather="minus-circle" class="feather-14"></i>
                            </a>
                            <input type="text" class="form-control text-center quantity__number" name="qty" value="${product.quantity}">
                            <a href="javascript:void(0);" class="inc d-flex justify-content-center align-items-center increase" data-bs-toggle="tooltip" data-id="${product.id}" data-bs-placement="top" title="increase">
                                <i data-feather="plus-circle" class="feather-14"></i>
                            </a>
                        </div>
                        <div class="d-flex align-items-center action">
                            <a class="btn-icon delete-icon confirm-text" onclick="removeFromCart(${product.id})">
                                <i data-feather="trash-2" class="feather-14"></i>
                            </a>
                        </div>
                    </div>`;
                });
            }

            $('.product-list-cart').html(cartHtml);

            let cart = cartData.formatted_sub_total;
            let amount = '<b>' + cart + '</b>';
            $('.totalAmount').html(amount);
            $('.grandTotal').html(cartData.formatted_grand_total);
            $('.tax').html(`$${cartData.tax}`);
            $('.payable').html(`$${cartData.payable}`);
            $('.count-products').html(cartData.count);

            feather.replace();
        }

        function addToCart(productId) {
            let quantity = 1; // Adjust if needed
            $.ajax({
                url: '{{ route('add-to-cart') }}',
                method: 'POST',
                data: {
                    product_id: productId,
                    quantity: quantity,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success == true) {
                        updateCartUI(response.cart);
                    } else {
                        alert('Error');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error adding to cart:', error);
                }
            });
        }

        // Function to remove product from cart in backend (AJAX request)
        function removeFromCart(productId) {
            $.ajax({
                url: "{{ route('remove-from-cart') }}",
                method: 'POST',
                data: {
                    product_id: productId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        updateCartUI(response.cart);
                    }

                },
                error: function(xhr, status, error) {
                    console.error('Error removing from cart:', error);
                }
            });
        }
    </script>

    <script src="{{ asset('assets/js/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/chart-data.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalerts.min.js') }}"></script>
    <script src="{{ asset('assets/js/theme-script.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="{{ asset('assets/js/rocket-loader.min.js') }}" defer></script>
</body>

</html>
