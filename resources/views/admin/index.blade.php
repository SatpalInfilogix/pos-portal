@extends('admin.layouts.app')

@section('content')
    <div class="content">
        <?php
        $authUser = auth()->user()->getRoleNames()->first();
        $amountDuringLogin = $userActivity->amount_during_login ?? null;
        ?>
        <div class="row">
            @if ($authUser == 'Super Admin')
                <div class="col-md-4 mb-3">
                    <label class="form-label">Select Store</label>
                    <select name="store" id="store" class="form-control">
                        <option value="" selected disabled>Select Store</option>
                        @foreach ($stores as $store)
                            <option value="{{ $store->id }}">{{ $store->name }}</option>
                        @endforeach
                    </select>
                </div>
            @endif
            <div class="col-md-4 mb-3">
                <label class="form-label">Start Date</label>
                <input type="text" id="start_date" class="form-control" placeholder="Select Start Date">
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label">End Date</label>
                <input type="text" id="end_date" class="form-control" placeholder="Select End Date">
            </div>
        </div>

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
                        <div id="sales_charts" data-href="{{ route('chart.details') }}"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-12 col-12 d-flex">
                <div class="card flex-fill default-cover mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0">Sales records</h4>
                    </div>
                    <div class="card-body">
                        {{-- <div class="dash-widget dash1 w-100">
                            <div class="dash-widgetimg">
                                <span><img
                                        src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/icons/dash2.svg"
                                        alt="img"></span>
                            </div>
                            <div class="dash-widgetcontent">
                                <h5><span class="counters totalSaleInvoice" data-count="{{ $totalSaleInvoices }}">{{ $totalSaleInvoices }}</span></h5>
                                <h6>Sales Invoice</h6>
                            </div>
                        </div> --}}
                        <div class="dash-widget dash2 w-100">
                            <div class="dash-widgetimg">
                                <span><img
                                        src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/icons/dash3.svg"
                                        alt="img"></span>
                            </div>
                            <div class="dash-widgetcontent">
                                <h5>$<span class="counters totalSaleAmount"
                                        data-count="{{ $totalSaleAmount }}">${{ $totalSaleAmount }}</span></h5>
                                <h6>Total Sale Amount</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Low Stock Products</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive p-0 m-0">
                    <table id="low-stock-products" class="table table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>SKU</th>
                                <th>Manufactured Date</th>
                                @canany(['edit product', 'delete product'])
                                    <th>Status</th>
                                    <th>Action</th>
                                @endcanany
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td><a href="{{ route('products.edit', $product->id) }}">{{ $product->name }}</a></td>
                                    <td>{{ $product->product_code ?? '' }}</td>
                                    <td>{{ $product->manufacture_date }}</td>
                                    @canany(['edit product', 'delete product'])
                                        <td>
                                            @if ($product->is_active == 1)
                                                <a class="btn btn-added me-2 p-2 status-btn active-btn" id="active"
                                                    data-type = "Active" data-id="${row.id}" href="#">Inactive</a>
                                                <a class="btn btn-added me-2 p-2 status-btn active-btn" id="in-active"
                                                    data-type = "Inactive" data-id="${row.id}"
                                                    style="display: none;">Active</a>
                                            @else
                                                <a class="btn btn-added me-2 p-2 status-btn active-btn" id="in-active"
                                                    data-type = "Inactive" data-id="${row.id}" href="#">Active</a>
                                                <a class="btn btn-added me-2 p-2 status-btn active-btn" id="active"
                                                    data-type = "Active" data-id="${row.id}"
                                                    style="display: none;">Inactive</a>
                                            @endif
                                        </td>

                                        <td class="action-table-data">
                                            <div class="edit-delete-action">
                                                @canany(['edit product'])
                                                    <a class="me-2 p-2" href="{{ route('products.edit', $product->id) }}">
                                                        <i data-feather="edit" class="feather-edit"></i>
                                                    </a>
                                                @endcanany
                                                @canany(['delete product'])
                                                    <a class="p-2 delete-products" id="delete-products"
                                                        data-id="{{ $product->id }}" href="#">
                                                        <i data-feather="trash-2" class="feather-trash-2"></i>
                                                    </a>
                                                @endcanany
                                            </div>
                                        </td>
                                    @endcanany
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tender-modal" tabindex="-1" aria-labelledby="tender-modal-label" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header p-4">
                    <h5 class="modal-title" id="tender-modal-label">Today Tender Amount</h5>
                </div>
                <div class="modal-body p-4">
                    <form id="tenderFormLogin">
                        <div class="row">
                            <div class="col-12">
                                <input name="collect_tender_amount" type="number"
                                    placeholder="Please enter tender amount" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Submit & Continue</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#low-stock-products').DataTable();
        });

        $(document).ready(function() {
            $('.delete-products').click(function(e) {
                e.preventDefault();
                var productId = $(this).data('id');
                var token = "{{ csrf_token() }}";
                var url = "{{ route('products.destroy', '') }}/" + productId;

                if (confirm('Are you sure you want to delete this product?')) {
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        data: {
                            "_token": token,
                        },
                        success: function(response) {
                            if (response.status == 'success') {
                                if (response.product == 1) {
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

            function showModalForRoles() {
                var userRole = "{{ $authUser }}";
                var amountDuringLogin = @json($amountDuringLogin);

                if ((userRole === 'Manager' || userRole === 'Sales Person') && amountDuringLogin === null) {
                    $('#tender-modal').modal({
                        backdrop: 'static',
                        keyboard: false
                    }).modal('show');
                }
            }

            showModalForRoles();

            $('#tenderFormLogin').validate({
                rules: {
                    collect_tender_amount: {
                        required: true,
                        number: true,
                        min: 0
                    }
                },
                messages: {
                    collect_tender_amount: 'Please Enter a valid Tender Amount'
                },
                errorClass: 'error-message',
                submitHandler: function(form) {
                    var tenderAmount = $(form).find('input[name="collect_tender_amount"]').val();
                    var token = "{{ csrf_token() }}";
                    $.ajax({
                        url: '{{ route('submit-tender') }}',
                        method: 'POST',
                        data: {
                            "_token": token,
                            tender_amount: tenderAmount
                        },
                        success: function(response) {
                            $('#tender-modal').modal('hide');
                        },
                        error: function(xhr, status, error) {
                            console.log('Error:', error);
                        }
                    });
                }
            });

            function updateDashboard() {
                var storeId = $('#store').val();
                var startDate = $('#start_date').val();
                var endDate = $('#end_date').val();

                $.ajax({
                    url: "{{ route('backend-dashboard') }}",
                    type: 'GET',
                    data: {
                        store_id: storeId,
                        start_date: startDate,
                        end_date: endDate
                    },
                    success: function(response) {
                        console.log(response); // For debugging purposes

                        // Update the dashboard elements with the new data
                        $('.dash-counts').eq(0).find('h4').text(response.totalCustomers);
                        $('.dash-counts').eq(1).find('h4').text(response.totalProducts);
                        $('.dash-counts').eq(2).find('h4').text(response.totalInventoryReturn);
                        $('.dash-counts').eq(3).find('h4').text(response.totalSaleInvoices);
                        $('.totalSaleAmount').text(response.totalSaleAmount);
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                        alert('An error occurred while fetching data.');
                    }
                });
            }

            // Initial chart update if needed
            @if (Auth::user()->hasRole('Super Admin'))
                updateDashboard();
            @else
                updateDashboard(); // Adjust as needed if non-admin
            @endif

            // Event handlers
            $('#store, #start_date, #end_date').change(function() {
                updateDashboard();
            });

            var chart;

            function updateChart(storeId) {
                var chartDetailsUrl = $('#sales_charts').data('href');
                var startDate = $('#start_date').val();
                var endDate = $('#end_date').val();

                $.ajax({
                    url: chartDetailsUrl,
                    type: 'GET',
                    data: {
                        store_id: storeId,
                        start_date: startDate,
                        end_date: endDate
                    },
                    success: function(resp) {
                        var options = {
                            series: [{
                                name: "Total Sales",
                                data: resp.sales
                            }],
                            chart: {
                                height: 350,
                                type: 'line',
                                zoom: {
                                    enabled: false
                                }
                            },
                            dataLabels: {
                                enabled: false
                            },
                            stroke: {
                                curve: 'smooth'
                            },
                            grid: {
                                row: {
                                    colors: ['#f3f3f3', 'transparent'], // Row colors
                                    opacity: 0.5
                                },
                            },
                            xaxis: {
                                categories: resp.months
                            }
                        };

                        if (chart) {
                            chart.updateOptions(options);
                        } else {
                            chart = new ApexCharts(document.querySelector("#sales_charts"), options);
                            chart.render();
                        }
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                        alert('An error occurred while fetching data.');
                    }
                });
            }

            var startDate = $('#start_date').val();
            var endDate = $('#end_date').val();
            @if (Auth::user()->hasRole('Super Admin'))
                var storeId = $('#store').val();
                updateChart(storeId, startDate, endDate);

                $('#store').change(function() {
                    storeId = $(this).val();
                    startDate = $('#start_date').val();
                    endDate = $('#end_date').val();
                    updateChart(storeId, startDate, endDate);
                });

                $('#start_date, #end_date').change(function() {
                    storeId = $('#store').val();
                    startDate = $('#start_date').val();
                    endDate = $('#end_date').val();
                    updateChart(storeId, startDate, endDate);
                });
            @else
                // For other roles (non-Super Admin), storeId is assigned automatically
                updateChart(null, startDate, endDate);

                $('#start_date, #end_date').change(function() {
                    startDate = $('#start_date').val();
                    endDate = $('#end_date').val();
                    updateChart(null, startDate, endDate);
                });
            @endif

            $('#start_date').datepicker({
                autoclose: true,
                orientation: 'bottom'
            }).on('changeDate', function(e) {
                var startDate = e.date;
                $('#end_date').datepicker('setDate', null);
                $('#end_date').datepicker('setStartDate', startDate);
            });

            $('#end_date').datepicker({
                autoclose: true,
                orientation: 'bottom'
            });

            $(document).on('click', '.status-btn', function(e) {
                var productId = $(this).data('id');
                var token = "{{ csrf_token() }}";
                var actionText = $(this).data('type');

                Swal.fire({
                    title: 'Are you sure?',
                    text: `Do you want to ${actionText} this product?`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: `Yes, ${actionText} it!`,
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('products.status', '') }}/" + productId,
                            type: 'POST',
                            data: {
                                "_token": token,
                            },
                            success: function(response) {
                                if (response.status == 'success') {
                                    if (response.product == 1) {
                                        $('#active[data-id="' + productId + '"]')
                                            .show();
                                        $('#in-active[data-id="' + productId + '"]')
                                            .hide();
                                    } else {
                                        $('#active[data-id="' + productId + '"]')
                                            .hide();
                                        $('#in-active[data-id="' + productId + '"]')
                                            .show();
                                    }
                                } else {
                                    Swal.fire('Error!',
                                        'Something went wrong. Please try again.',
                                        'error');
                                }
                            },
                        });
                    }
                });
            });
        });
    </script>
@endsection
