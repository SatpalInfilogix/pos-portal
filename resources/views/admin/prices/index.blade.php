@extends('admin.layouts.app')

@section('content')
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4>Price List</h4>
                    <h6>Manage your price</h6>
                </div>
            </div>

            @canany(['create prices'])
                <div class="page-btn d-flex gap-2">
                    <form id="importForm" action="{{ route('import-price-master') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <button type="button" class="btn btn-added" id="importButton">
                            <i data-feather="upload" class="me-2"></i>
                            Import Price Master
                        </button>
                        <input type="file" id="fileInput" name="file" accept=".csv" style="display:none;">
                    </form>

                    <script>
                        $(document).ready(function() {
                            $('#importButton').on('click', function() {
                                $('#fileInput').click();
                            });

                            $('#fileInput').on('change', function(event) {
                                var file = $(this).prop('files')[0];
                                if (file && file.type === 'text/csv') {
                                    $('#importForm').submit();
                                } else {
                                    alert('Please select a valid CSV file.');
                                }
                            });
                        });
                    </script>

                    <a href="{{ route('export-products-quantites') }}" class="btn btn-added">
                        <i data-feather="download" class="me-2"></i>
                        Download Quantites Sameple CSV
                    </a>

                    {{-- <a href="{{ url('download-price-master') }}" class="btn btn-added">
                        <i data-feather="download" class="me-2"></i>
                        Download Price Sample CSV
                    </a> --}}
                    <a href="{{ route('export-products') }}" class="btn btn-added">
                        <i data-feather="download" class="me-2"></i>
                        Download Price Sample CSV
                    </a>
                    
                    <a href="{{ route('prices.create') }}" class="btn btn-added">
                        <i data-feather="plus-circle" class="me-2"></i>
                        Add New Price
                    </a>
                </div>
            @endcanany
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                <ul>
                    @foreach(session('error') as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card table-list-card">
            <div class="card-body">
                <div class="table-responsive p-0 m-0">
                    <table id="prices-table" class="table prices-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product Code</th>
                                <th>Product</th>
                                <th>Available Quantity</th>
                                <th>Price</th>
                                <th>Manufactured Date</th>
                                <th>
                                    @canany(['edit prices', 'delete prices'])
                                        Action
                                    @endcanany
                                </th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" name="can_edit" value="{{ Auth::user()->can('edit product') }}">
    <input type="hidden" name="can_delete" value="{{ Auth::user()->can('delete product') }}">


    <script>
        $(function() {
            let can_edit = $('[name="can_edit"]').val();
            let can_delete = $('[name="can_delete"]').val();

            $('.prices-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('get-prices') }}",
                    type: "POST",
                    data: function(d) {
                        d._token = "{{ csrf_token() }}";
                        return d;
                    }
                },
                columns: [{
                        data: null,
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        },
                        title: '#'
                    },
                    {
                        data: "product_code"
                    }, // Ensure this matches the key from the backend
                    {
                        data: "product_name"
                    },
                    {
                        data: "quantity"
                    },
                    {
                        data: "price",
                        render: function(data, type, row) {
                            let price = 0;
                            if(data){
                                price = data;
                            }
                            return `$${parseFloat(price).toFixed(2)}`;
                        }
                    },
                    { data: "manufacture_date" },
                    {
                        data: null,
                        render: function(data, type, row) {
                            var actions = '<div class="edit-delete-action">';
                            if (can_edit) {
                                actions +=
                                    `<a class="me-2 p-2 edit-btn" href="./prices/${row.id}/edit"><i class="fa fa-edit"></i></a>`;
                            }

                            if (row.status == 1 && can_delete) {
                                actions +=
                                    `<a class="me-2 p-2 delete-btn" id="restore-price" data-id="${row.id}" href="#">Restore</a>`;
                                actions +=
                                    `<a class="me-2 p-2 delete-btn" id="delete-price" data-id="${row.id}" style="display: none;"><i class="fa fa-trash"></i></a>`;
                            } else if (can_delete) {
                                actions +=
                                    `<a class="me-2 p-2 delete-btn" id="delete-price" data-id="${row.id}" href="#"><i class="fa fa-trash"></i></a>`;
                                actions +=
                                    `<a class="me-2 p-2 delete-btn" id="restore-price" data-id="${row.id}" style="display: none;">Restore</a>`;
                            }
                            actions += '</div>';
                            return actions;
                        }
                    }
                ],
                columnDefs: [{
                    orderable: false,
                    targets: 6, // Adjust based on the actual number of columns
                    className: "action-table-data"
                }],
                paging: true,
                pageLength: 10, // Adjusted to match the lengthMenu
                lengthMenu: [10, 25, 50, 100],
                order: [
                    [1, 'asc']
                ] // Optional: Default ordering by the product_code column
            });
        });

        $(document).ready(function() {
            $(document).on('click', '.delete-btn', function(e) {
                e.preventDefault();
                var productId = $(this).data('id');
                var token = "{{ csrf_token() }}";
                var url = "{{ route('prices.destroy', '') }}/" + productId;

                if (confirm('Are you sure you want to delete this price record?')) {
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        data: {
                            "_token": token,
                        },
                        success: function(response) {
                            if (response.status == 'success') {
                                if (response.price == 1) {
                                    $('#restore-price[data-id="' + productId + '"]').show();
                                    $('#delete-price[data-id="' + productId + '"]').hide();
                                } else {
                                    $('#restore-price[data-id="' + productId + '"]').hide();
                                    $('#delete-price[data-id="' + productId + '"]').show();
                                }
                                // $('#product-row-' + productId).remove();
                                // alert('rtecord deleted successfully');
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
