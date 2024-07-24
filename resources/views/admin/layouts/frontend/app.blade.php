<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Dreams Pos Admin Template</title>

    <link rel="shortcut icon" type="image/x-icon"
        href="https://dreamspos.dreamstechnologies.com/html/template/assets/img/favicon.png">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap5.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/daterangepicker.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom-style.css') }}">

    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
</head>

<body>
    <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div>

    <div class="main-wrapper">

        <div class="header">

            <div class="header-left active">
                <a href="javascript:void(0)" class="logo logo-normal">
                    <img src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/logo.png" alt>
                </a>
                <a href="javascript:void(0)" class="logo logo-white">
                    <img src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/logo-white.png" alt>
                </a>
                <a href="javascript:void(0)" class="logo-small">
                    <img src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/logo-small.png" alt>
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

                <li class="nav-item nav-searchinputs">
                </li>


                {{-- <li class="nav-item dropdown has-arrow main-drop select-store-dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle nav-link select-store"
                        data-bs-toggle="dropdown">
                        <span class="user-info">
                            <span class="user-letter">
                                <img src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/store/store-01.png"
                                    alt="Store Logo" class="img-fluid">
                            </span>
                            <span class="user-detail">
                                <span class="user-name">Select Store</span>
                            </span>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="javascript:void(0);" class="dropdown-item">
                            <img src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/store/store-01.png"
                                alt="Store Logo" class="img-fluid"> Grocery Alpha
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item">
                            <img src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/store/store-02.png"
                                alt="Store Logo" class="img-fluid"> Grocery Apex
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item">
                            <img src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/store/store-03.png"
                                alt="Store Logo" class="img-fluid"> Grocery Bevy
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item">
                            <img src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/store/store-04.png"
                                alt="Store Logo" class="img-fluid"> Grocery Eden
                        </a>
                    </div>
                </li> 


                <li class="nav-item dropdown has-arrow flag-nav nav-item-box">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="javascript:void(0);"
                        role="button">
                        <img src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/flags/us.png"
                            alt="Language" class="img-fluid">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="javascript:void(0);" class="dropdown-item active">
                            <img src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/flags/us.png"
                                alt height="16"> English
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item">
                            <img src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/flags/fr.png"
                                alt height="16"> French
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item">
                            <img src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/flags/es.png"
                                alt height="16"> Spanish
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item">
                            <img src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/flags/de.png"
                                alt height="16"> German
                        </a>
                    </div>
                </li> 

                <li class="nav-item nav-item-box">
                    <a href="javascript:void(0);" id="btnFullscreen">
                        <i data-feather="maximize"></i>
                    </a>
                </li>--}}
              
                {{-- <li class="nav-item dropdown nav-item-box">
                    <a href="javascript:void(0);" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                        <i data-feather="bell"></i><span class="badge rounded-pill">2</span>
                    </a>
                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header">
                            <span class="notification-title">Notifications</span>
                            <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                        </div>
                        <div class="noti-content">
                            <ul class="notification-list">
                                <li class="notification-message">
                                    <a href="javascript:void(0)">
                                        <div class="media d-flex">
                                            <span class="avatar flex-shrink-0">
                                                <img alt
                                                    src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/profiles/avatar-02.jpg">
                                            </span>
                                            <div class="media-body flex-grow-1">
                                                <p class="noti-details"><span class="noti-title">John Doe</span> added
                                                    new task <span class="noti-title">Patient appointment
                                                        booking</span></p>
                                                <p class="noti-time"><span class="notification-time">4 mins ago</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="javascript:void(0)">
                                        <div class="media d-flex">
                                            <span class="avatar flex-shrink-0">
                                                <img alt
                                                    src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/profiles/avatar-03.jpg">
                                            </span>
                                            <div class="media-body flex-grow-1">
                                                <p class="noti-details"><span class="noti-title">Tarah
                                                        Shropshire</span> changed the task name <span
                                                        class="noti-title">Appointment booking with payment
                                                        gateway</span></p>
                                                <p class="noti-time"><span class="notification-time">6 mins ago</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="javascript:void(0)">
                                        <div class="media d-flex">
                                            <span class="avatar flex-shrink-0">
                                                <img alt
                                                    src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/profiles/avatar-06.jpg">
                                            </span>
                                            <div class="media-body flex-grow-1">
                                                <p class="noti-details"><span class="noti-title">Misty Tison</span>
                                                    added <span class="noti-title">Domenic Houston</span> and <span
                                                        class="noti-title">Claire Mapes</span> to project <span
                                                        class="noti-title">Doctor available module</span></p>
                                                <p class="noti-time"><span class="notification-time">8 mins ago</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="javascript:void(0)">
                                        <div class="media d-flex">
                                            <span class="avatar flex-shrink-0">
                                                <img alt
                                                    src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/profiles/avatar-17.jpg">
                                            </span>
                                            <div class="media-body flex-grow-1">
                                                <p class="noti-details"><span class="noti-title">Rolland Webber</span>
                                                    completed task <span class="noti-title">Patient and Doctor video
                                                        conferencing</span></p>
                                                <p class="noti-time"><span class="notification-time">12 mins
                                                        ago</span></p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="javascript:void(0)">
                                        <div class="media d-flex">
                                            <span class="avatar flex-shrink-0">
                                                <img alt
                                                    src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/profiles/avatar-13.jpg">
                                            </span>
                                            <div class="media-body flex-grow-1">
                                                <p class="noti-details"><span class="noti-title">Bernardo
                                                        Galaviz</span> added new task <span class="noti-title">Private
                                                        chat module</span></p>
                                                <p class="noti-time"><span class="notification-time">2 days ago</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="topnav-dropdown-footer">
                            <a href="javascript:void(0)">View all Notifications</a>
                        </div>
                    </div>
                </li> --}}

                {{-- <li class="nav-item nav-item-box">
                    <a href="javascript:void(0)">
                        <i data-feather="settings"></i>
                    </a>
                </li> --}}
                <li class="nav-item dropdown has-arrow main-drop">
                    <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
                        <span class="user-info">
                            <span class="user-letter">
                                <img src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/profiles/avator1.jpg"
                                    alt class="img-fluid">
                            </span>
                            <span class="user-detail">
                                <span class="user-name">John Smilga</span>
                                <span class="user-role">Super Admin</span>
                            </span>
                        </span>
                    </a>
                    <div class="dropdown-menu menu-drop-user">
                        <div class="profilename">
                            <div class="profileset">
                                <span class="user-img">
                                    <img src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/profiles/avator1.jpg"
                                        alt>
                                    <span class="status online"></span>
                                </span>
                                <div class="profilesets">
                                    <h6>John Smilga</h6>
                                    <h5>Super Admin</h5>
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
                                <img src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/icons/log-out.svg"
                                    class="me-2" alt="img">
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
                    <a class="dropdown-item"
                        href="https://dreamspos.dreamstechnologies.com/html/template/profile.html">My Profile</a>
                    <a class="dropdown-item"
                        href="https://dreamspos.dreamstechnologies.com/html/template/general-settings.html">Settings</a>
                    <a class="dropdown-item"
                        href="https://dreamspos.dreamstechnologies.com/html/template/signin.html">Logout</a>
                </div>
            </div>

        </div>

        <div class="page-wrapper pos-pg-wrapper ms-0">
            @yield('content')
        </div>
    </div>

    @include('partials.payment-completed')
    @include('partials.print-receipt')

    <div class="modal fade modal-default pos-modal" id="products" aria-labelledby="products">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header p-4 d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <h5 class="me-4">Products</h5>
                        <span class="badge bg-info d-inline-block mb-0">Order ID : #666614</span>
                    </div>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body p-4">
                    <form action="https://dreamspos.dreamstechnologies.com/html/template/pos.html">
                        <div class="product-wrap">
                            <div class="product-list d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center flex-fill">
                                    <a href="javascript:void(0);" class="img-bg me-2">
                                        <img src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/products/pos-product-16.png"
                                            alt="Products">
                                    </a>
                                    <div class="info d-flex align-items-center justify-content-between flex-fill">
                                        <div>
                                            <span>PT0005</span>
                                            <h6><a href="javascript:void(0);">Red Nike Laser</a></h6>
                                        </div>
                                        <p>$2000</p>
                                    </div>
                                </div>
                            </div>
                            <div class="product-list d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center flex-fill">
                                    <a href="javascript:void(0);" class="img-bg me-2">
                                        <img src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/products/pos-product-17.png"
                                            alt="Products">
                                    </a>
                                    <div class="info d-flex align-items-center justify-content-between flex-fill">
                                        <div>
                                            <span>PT0235</span>
                                            <h6><a href="javascript:void(0);">Iphone 14</a></h6>
                                        </div>
                                        <p>$3000</p>
                                    </div>
                                </div>
                            </div>
                            <div class="product-list d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center flex-fill">
                                    <a href="javascript:void(0);" class="img-bg me-2">
                                        <img src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/products/pos-product-16.png"
                                            alt="Products">
                                    </a>
                                    <div class="info d-flex align-items-center justify-content-between flex-fill">
                                        <div>
                                            <span>PT0005</span>
                                            <h6><a href="javascript:void(0);">Red Nike Laser</a></h6>
                                        </div>
                                        <p>$2000</p>
                                    </div>
                                </div>
                            </div>
                            <div class="product-list d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center flex-fill">
                                    <a href="javascript:void(0);" class="img-bg me-2">
                                        <img src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/products/pos-product-17.png"
                                            alt="Products">
                                    </a>
                                    <div class="info d-flex align-items-center justify-content-between flex-fill">
                                        <div>
                                            <span>PT0005</span>
                                            <h6><a href="javascript:void(0);">Red Nike Laser</a></h6>
                                        </div>
                                        <p>$2000</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer d-sm-flex justify-content-end">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="create" tabindex="-1" aria-labelledby="create" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="https://dreamspos.dreamstechnologies.com/html/template/pos.html">
                        <div class="row">
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="input-blocks">
                                    <label>Customer Name</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="input-blocks">
                                    <label>Email</label>
                                    <input type="email" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="input-blocks">
                                    <label>Phone</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="input-blocks">
                                    <label>Country</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="input-blocks">
                                    <label>City</label>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="input-blocks">
                                    <label>Address</label>
                                    <input type="text">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer d-sm-flex justify-content-end">
                            <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-submit me-2">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
                                    <select id="my-select" style="width: 100%;" required>
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
                                <input type="number" name="tender_amount" class="form-control" placeholder="Tender Amount">
                            </div>
                            <div class="col-md-6 col-lg-4 item">
                                <input type="number" name="change_amount" class="form-control" placeholder="Change Amount">
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

    <div class="modal fade modal-default pos-modal" id="edit-product" aria-labelledby="edit-product">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header p-4">
                    <h5>Red Nike Laser</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body p-4">
                    <form action="https://dreamspos.dreamstechnologies.com/html/template/pos.html">
                        <div class="row">
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="input-blocks add-product">
                                    <label>Product Name <span>*</span></label>
                                    <input type="text" placeholder="45">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="input-blocks add-product">
                                    <label>Tax Type <span>*</span></label>
                                    <select class="select">
                                        <option>Exclusive</option>
                                        <option>Inclusive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="input-blocks add-product">
                                    <label>Tax <span>*</span></label>
                                    <input type="text" placeholder="% 15">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="input-blocks add-product">
                                    <label>Discount Type <span>*</span></label>
                                    <select class="select">
                                        <option>Percentage</option>
                                        <option>Early payment discounts</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="input-blocks add-product">
                                    <label>Discount <span>*</span></label>
                                    <input type="text" placeholder="15">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="input-blocks add-product">
                                    <label>Sale Unit <span>*</span></label>
                                    <select class="select">
                                        <option>Kilogram</option>
                                        <option>Grams</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer d-sm-flex justify-content-end">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

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

            // Check if product is already in cart
            if (productCard.classList.contains('added-to-cart')) {
                // Remove from cart (simulated)
                productCard.classList.remove('added-to-cart');
                removeFromCart(productId);
                console.log('Product removed from cart:', productId);
            } else {
                // Add to cart (simulated)
                productCard.classList.add('added-to-cart');
                addToCart(productId);
                console.log('Product added to cart:', productId);
            }
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
                    console.log(response);
                    console.log('Product added to cart:', response);
                    if (response.success == true) {
                        // updateCartDisplay();
                        // $(document).find('.producr-list-cart').html(response.data);
                        // $(document).find('.item-count-cart').html(response.count);
                        window.location.reload();
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
                url: '{{ route('remove-from-cart') }}',
                method: 'POST',
                data: {
                    product_id: productId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    console.log('Product removed from cart:', response);
                    window.location.reload();
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

    <script src="{{ asset('assets/js/select2.min.js') }}"></script>

    <script src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalerts.min.js') }}"></script>
    <script src="{{ asset('assets/js/theme-script.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="{{ asset('assets/js/rocket-loader.min.js') }}" defer>
    </script>
</body>
</html>