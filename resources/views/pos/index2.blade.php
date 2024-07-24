@extends('admin.layouts.frontend.app')
@section('content')
<style>
        .product-info {
            position: relative; /* Ensure relative positioning for checkmark positioning */
        }
        .checkmark {
            position: absolute;
            top: 10px; /* Adjust top positioning as needed */
            right: 10px; /* Adjust right positioning as needed */
            display: none; /* Hide checkmark by default */
            background-color: #00cc00; /* Green background color */
            color: white; /* White text color */
            padding: 5px;
            border-radius: 50%; /* Rounded border for circle */
        }
    </style>
<div class="content pos-design p-0">
    <div class="btn-row d-sm-flex align-items-center">
        <a href="javascript:void(0);" class="btn btn-secondary mb-xs-3" data-bs-toggle="modal"
            data-bs-target="#orders"><span class="me-1 d-flex align-items-center"><i
                    data-feather="shopping-cart" class="feather-16"></i></span>View Orders</a>
        <a href="javascript:void(0);" class="btn btn-info"><span
                class="me-1 d-flex align-items-center"><i data-feather="rotate-cw"
                    class="feather-16"></i></span>Reset</a>
        <a href="javascript:void(0);" class="btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#recents"><span class="me-1 d-flex align-items-center"><i
                    data-feather="refresh-ccw" class="feather-16"></i></span>Transaction</a>
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
                        <div class="col-sm-2 col-md-6 col-lg-3 col-xl-3">
                            <div class="product-info default-cover card" onclick="saveProduct('{{ $product->id }}')">
                                <div class="img-bg">
                                    <img id="productImage{{ $product->id }}" src="{{ asset($product->image) }}" alt="Product Image">
                                    <span class="checkmark" id="checkmark{{ $product->id }}"><i data-feather="check" class="feather-16"></i></span>
                                </div>
                                <h6 class="cat-name"><a href="javascript:void(0);">{{ $product->categoryName }}</a></h6>
                                <h6 class="product-name"><a href="javascript:void(0);">{{ $product->name }}</a></h6>
                                <div class="d-flex align-items-center justify-content-between price">
                                    <span>30 Pcs</span>
                                    <p>${{ number_format(optional($product)->price, 2) }}</p>
                                </div>
                                <input type="hidden" id="quantity{{ $product->id }}" class="form-control" value="1" min="1">
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
                <div class="head d-flex align-items-center justify-content-between w-100">
                    <div class>
                        <h5>Order List</h5>
                        <span>Transaction ID : #65565</span>
                    </div>
                    <div class>
                        <a class="confirm-text" href="javascript:void(0);"><i data-feather="trash-2"
                                class="feather-16 text-danger"></i></a>
                        <a href="javascript:void(0);" class="text-default"><i
                                data-feather="more-vertical" class="feather-16"></i></a>
                    </div>
                </div>
                <div class="customer-info block-section">
                    <h6>Customer Information</h6>
                    <div class="input-block d-flex align-items-center">
                        <div class="flex-grow-1">
                            <select class="select">
                                <option>Walk in Customer</option>
                                <option>John</option>
                                <option>Smith</option>
                                <option>Ana</option>
                                <option>Elza</option>
                            </select>
                        </div>
                        <a href="#" class="btn btn-primary btn-icon" data-bs-toggle="modal"
                            data-bs-target="#create"><i data-feather="user-plus"
                                class="feather-16"></i></a>
                    </div>
                    <div class="input-block">
                        <select class="select">
                            <option>Select Products</option>
                            <option>IPhone 14 64GB</option>
                            <option>MacBook Pro</option>
                            <option>Rolex Tribute V3</option>
                            <option>Red Nike Angelo</option>
                            <option>Airpod 2</option>
                            <option>Oldest</option>
                        </select>
                    </div>
                </div>
                <div class="product-added block-section">
                    <div class="head-text d-flex align-items-center justify-content-between">
                        <h6 class="d-flex align-items-center mb-0">Product Added<span
                                class="count">2</span></h6>
                        <a href="javascript:void(0);"
                            class="d-flex align-items-center text-danger"><span class="me-1"><i
                                    data-feather="x" class="feather-16"></i></span>Clear all</a>
                    </div>
                    <div class="product-wrap">
                        <div class="product-list d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center product-info" data-bs-toggle="modal"
                                data-bs-target="#products">
                                <a href="javascript:void(0);" class="img-bg">
                                    <img src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/products/pos-product-16.png"
                                        alt="Products">
                                </a>
                                <div class="info">
                                    <span>PT0005</span>
                                    <h6><a href="javascript:void(0);">Red Nike Laser</a></h6>
                                    <p>$2000</p>
                                </div>
                            </div>
                            <div class="qty-item text-center">
                                <a href="javascript:void(0);"
                                    class="dec d-flex justify-content-center align-items-center"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="minus"><i
                                        data-feather="minus-circle" class="feather-14"></i></a>
                                <input type="text" class="form-control text-center" name="qty"
                                    value="4">
                                <a href="javascript:void(0);"
                                    class="inc d-flex justify-content-center align-items-center"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="plus"><i
                                        data-feather="plus-circle" class="feather-14"></i></a>
                            </div>
                            <div class="d-flex align-items-center action">
                                <a class="btn-icon edit-icon me-2" href="#"
                                    data-bs-toggle="modal" data-bs-target="#edit-product">
                                    <i data-feather="edit" class="feather-14"></i>
                                </a>
                                <a class="btn-icon delete-icon confirm-text" href="javascript:void(0);">
                                    <i data-feather="trash-2" class="feather-14"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-list d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center product-info" data-bs-toggle="modal"
                                data-bs-target="#products">
                                <a href="javascript:void(0);" class="img-bg">
                                    <img src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/products/pos-product-17.png"
                                        alt="Products">
                                </a>
                                <div class="info">
                                    <span>PT0235</span>
                                    <h6><a href="javascript:void(0);">Iphone 14</a></h6>
                                    <p>$3000</p>
                                </div>
                            </div>
                            <div class="qty-item text-center">
                                <a href="javascript:void(0);"
                                    class="dec d-flex justify-content-center align-items-center"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="minus"><i
                                        data-feather="minus-circle" class="feather-14"></i></a>
                                <input type="text" class="form-control text-center" name="qty"
                                    value="3">
                                <a href="javascript:void(0);"
                                    class="inc d-flex justify-content-center align-items-center"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="plus"><i
                                        data-feather="plus-circle" class="feather-14"></i></a>
                            </div>
                            <div class="d-flex align-items-center action">
                                <a class="btn-icon edit-icon me-2" href="#"
                                    data-bs-toggle="modal" data-bs-target="#edit-product">
                                    <i data-feather="edit" class="feather-14"></i>
                                </a>
                                <a class="btn-icon delete-icon confirm-text" href="javascript:void(0);">
                                    <i data-feather="trash-2" class="feather-14"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-list d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center product-info" data-bs-toggle="modal"
                                data-bs-target="#products">
                                <a href="javascript:void(0);" class="img-bg">
                                    <img src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/products/pos-product-16.png"
                                        alt="Products">
                                </a>
                                <div class="info">
                                    <span>PT0005</span>
                                    <h6><a href="javascript:void(0);">Red Nike Laser</a></h6>
                                    <p>$2000</p>
                                </div>
                            </div>
                            <div class="qty-item text-center">
                                <a href="javascript:void(0);"
                                    class="dec d-flex justify-content-center align-items-center"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="minus"><i
                                        data-feather="minus-circle" class="feather-14"></i></a>
                                <input type="text" class="form-control text-center" name="qty"
                                    value="1">
                                <a href="javascript:void(0);"
                                    class="inc d-flex justify-content-center align-items-center"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="plus"><i
                                        data-feather="plus-circle" class="feather-14"></i></a>
                            </div>
                            <div class="d-flex align-items-center action">
                                <a class="btn-icon edit-icon me-2" href="#"
                                    data-bs-toggle="modal" data-bs-target="#edit-product">
                                    <i data-feather="edit" class="feather-14"></i>
                                </a>
                                <a class="btn-icon delete-icon confirm-text" href="javascript:void(0);">
                                    <i data-feather="trash-2" class="feather-14"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-list d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center product-info" data-bs-toggle="modal"
                                data-bs-target="#products">
                                <a href="javascript:void(0);" class="img-bg">
                                    <img src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/products/pos-product-17.png"
                                        alt="Products">
                                </a>
                                <div class="info">
                                    <span>PT0005</span>
                                    <h6><a href="javascript:void(0);">Red Nike Laser</a></h6>
                                    <p>$2000</p>
                                </div>
                            </div>
                            <div class="qty-item text-center">
                                <a href="javascript:void(0);"
                                    class="dec d-flex justify-content-center align-items-center"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="minus"><i
                                        data-feather="minus-circle" class="feather-14"></i></a>
                                <input type="text" class="form-control text-center" name="qty"
                                    value="1">
                                <a href="javascript:void(0);"
                                    class="inc d-flex justify-content-center align-items-center"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="plus"><i
                                        data-feather="plus-circle" class="feather-14"></i></a>
                            </div>
                            <div class="d-flex align-items-center action">
                                <a class="btn-icon edit-icon me-2" href="#"
                                    data-bs-toggle="modal" data-bs-target="#edit-product">
                                    <i data-feather="edit" class="feather-14"></i>
                                </a>
                                <a class="btn-icon delete-icon confirm-text" href="javascript:void(0);">
                                    <i data-feather="trash-2" class="feather-14"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-section">
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
                                <td class="text-end">$60,454</td>
                            </tr>
                            <tr>
                                <td>Tax (GST 5%)</td>
                                <td class="text-end">$40.21</td>
                            </tr>
                            <tr>
                                <td>Shipping</td>
                                <td class="text-end">$40.21</td>
                            </tr>
                            <tr>
                                <td>Sub Total</td>
                                <td class="text-end">$60,454</td>
                            </tr>
                            <tr>
                                <td class="danger">Discount (10%)</td>
                                <td class="danger text-end">$15.21</td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td class="text-end">$64,024.5</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="block-section payment-method">
                    <h6>Payment Method</h6>
                    <div class="row d-flex align-items-center justify-content-center methods">
                        <div class="col-md-6 col-lg-4 item">
                            <div class="default-cover">
                                <a href="javascript:void(0);">
                                    <img src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/icons/cash-pay.svg"
                                        alt="Payment Method">
                                    <span>Cash</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 item">
                            <div class="default-cover">
                                <a href="javascript:void(0);">
                                    <img src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/icons/credit-card.svg"
                                        alt="Payment Method">
                                    <span>Debit Card</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 item">
                            <div class="default-cover">
                                <a href="javascript:void(0);">
                                    <img src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/icons/qr-scan.svg"
                                        alt="Payment Method">
                                    <span>Scan</span>
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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

    <script>
         function saveProduct(productId) {
        var checkmark = document.getElementById('checkmark' + productId);
        var quantityInput = document.getElementById('quantity' + productId);
        var quantity = parseInt(quantityInput.value);

        // Simulate toggle state
        if (checkmark.style.display === 'none') {
            // Perform save action (you can replace this with actual save logic)
            console.log('Saving product: ' + productId);
            checkmark.style.display = 'inline-block';
            // Add logic to save product (possibly via AJAX to backend)
        } else {
            // Perform unsave action (you can replace this with actual unsave logic)
            console.log('Removing from saved: ' + productId);
            checkmark.style.display = 'none';
            // Add logic to remove product from saved items (possibly via AJAX to backend)
        }

        // Example AJAX request to store product ID and quantity in session
        $.ajax({
            url: '{{ route('add-to-cart') }}', // Adjust the URL to your Laravel route
            method: 'POST',
            data: {
                product_id: productId,
                quantity: quantity,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                console.log('Product added to cart:', response);
                // Optionally show a success message or update UI
            },
            error: function(xhr, status, error) {
                console.error('Error adding product to cart:', error);
                // Handle error scenario if needed
            }
        });
    }
    // function addToCartAndShowTick(productId) {
    //     var quantity = document.getElementById('quantity' + productId).value;

    //     // AJAX request to store product ID and quantity in session
    //     $.ajax({
    //         url: '{{ route('add-to-cart') }}', // Adjust the URL to your Laravel route
    //         method: 'POST',
    //         data: {
    //             product_id: productId,
    //             quantity: quantity,
    //             _token: '{{ csrf_token() }}'
    //         },
    //         success: function(response) {
    //             console.log('Product added to cart:', response);
    //             // Optionally show a success message or update UI
    //         },
    //         error: function(xhr, status, error) {
    //             console.error('Error adding product to cart:', error);
    //             // Handle error scenario if needed
    //         }
    //     });
    // }
</script>
@endsection