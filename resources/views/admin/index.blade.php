@extends('admin.layouts.app')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-xl-3 col-sm-6 col-12">
                <a href="{{ route('users.index') }}">
                    <div class="dash-count">
                        <div class="dash-counts">
                            <h4>{{ $totalCustomers }}</h4>
                            <h5>Customers</h5>
                        </div>
                        <div class="dash-imgs">
                            <i data-feather="user"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <a href="{{ route('products.index') }}">
                    <div class="dash-count das1">
                        <div class="dash-counts">
                            <h4>{{ $totalProducts }}</h4>
                            <h5>Products</h5>
                        </div>
                        <div class="dash-imgs">
                            <i data-feather="box"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <a href="{{ route('sales.index') }}">
                    <div class="dash-count das2">
                        <div class="dash-counts">
                            <h4>{{ $totalInventoryReturn }}</h4>
                            <h5>Stock Return</h5>
                        </div>
                        <div class="dash-imgs">
                            <i data-feather="file"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <a href="">
                    <div class="dash-count das3">
                        <div class="dash-counts">
                            <h4>{{ $totalSaleInvoices }}</h4>
                            <h5>Sales Invoice</h5>
                        </div>
                        <div class="dash-imgs">
                            <i data-feather="file"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-8 col-sm-12 col-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Sales 2023-2024</h5>
                        <div class="graph-sets">
                            <div class="dropdown dropdown-wraper">
                                <button class="btn btn-light btn-sm dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    2024
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item">2024</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item">2023</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item">2022</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item">2021</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="sales_charts"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-12 col-12 d-flex">
                <div class="card flex-fill default-cover mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0">Sales records</h4>
                    </div>
                    <div class="card-body">
                        <div class="dash-widget dash1 w-100">
                            <div class="dash-widgetimg">
                                <span><img
                                        src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/icons/dash2.svg"
                                        alt="img"></span>
                            </div>
                            <div class="dash-widgetcontent">
                                <h5>$<span class="counters" data-count="4385.00">$4,385.00</span></h5>
                                <h6>Total Sales Due</h6>
                            </div>
                        </div>
                        <div class="dash-widget dash2 w-100">
                            <div class="dash-widgetimg">
                                <span><img
                                        src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/icons/dash3.svg"
                                        alt="img"></span>
                            </div>
                            <div class="dash-widgetcontent">
                                <h5>$<span class="counters" data-count="385656.50">$385,656.50</span></h5>
                                <h6>Total Sale Amount</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Recent Products</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive dataview">
                    <table class="table dashboard-expired-products">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>SKU</th>
                                <th>Manufactured Date</th>
                                <th class="no-sort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td><a href="{{ route('products.edit',$product->id) }}">{{ $product->name }}</a></td>
                                    <td>{{ $product->product_code ?? '' }}</td>
                                    <td>{{ $product->manufacture_date }}</td>
                                    <td class="action-table-data">
                                        <div class="edit-delete-action">
                                            <a class="me-2 p-2" href="{{ route('products.edit',$product->id) }}">
                                                <i data-feather="edit" class="feather-edit"></i>
                                            </a>
                                            <a class="p-2 delete-products" id="delete-products" data-id="{{ $product->id}}" href="#">
                                                <i data-feather="trash-2" class="feather-trash-2"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.delete-products').click(function(e) {
                e.preventDefault();
                var productId = $(this).data('id');
                var token = "{{ csrf_token() }}";
                var url = "{{route('products.destroy','')}}/" + productId;
        
                if (confirm('Are you sure you want to delete this product?')) {
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        data: {
                            "_token": token,
                        },
                        success: function(response) {
                            if(response.status == 'success') {
                                if(response.product == 1) {
                                    $('#restore-products[data-id="' + productId + '"]').show();
                                    $('#delete-products[data-id="' + productId + '"]').hide();
                                } else {
                                    $('#restore-products[data-id="' + productId + '"]').hide();
                                    $('#delete-products[data-id="' + productId + '"]').show();
                                }
                                // $('#product-row-' + productId).remove();
                                // alert('Product deleted successfully');
                                // window.location.reload();
                            } else {
                                alert('Something went wrong. Please try again.');
                            }
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText);
                            alert('Something went wrong. Please try again.');
                        }
                    });
                }
            });
        });
        </script>
@endsection
