@extends('admin.layouts.app')

@section('content')
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4>Product List</h4>
                    <h6>Manage your products</h6>
                </div>
            </div>

            @canany(['create product'])
                <div class="page-btn d-flex gap-2">
                    <form id="importForm" action="{{ route('import-products') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <button type="button" class="btn btn-added" id="importButton">
                            <i data-feather="upload" class="me-2"></i>
                            Import Products
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

                    <a href="{{ url('sample-products.csv') }}" class="btn btn-added">
                        <i data-feather="download" class="me-2"></i>
                        Download Sample CSV
                    </a>

                    <a href="{{ route('products.create') }}" class="btn btn-added">
                        <i data-feather="plus-circle" class="me-2"></i>
                        Add New Product
                    </a>
                </div>
            @endcanany
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card table-list-card">
            <div class="card-body">
                <div class="table-responsive p-0 m-0">
                    <table id="products-table" class="table products-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Category</th>
                                <th>Product</th>
                                <th>Manufactured Date</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>
                                    @canany(['edit product', 'delete product'])
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

            $('.products-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('get-products') }}",
                    type: "POST",
                    data: function(d) {
                        d._token = "{{ csrf_token() }}";
                        return d;
                    }
                },
                columns: [
                    {
                        data: null,
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        },
                        title: '#'
                    },
                    { data: "category_name" },
                    { data: "name" },
                    { data: "manufacture_date" },
                    {
                        data: "image",
                        render: function(data, type, row) {
                            const defaultImageUrl = '{{ asset('path/to/default-image.jpg') }}';
                            const imageUrl = data ? '{{ url('') }}' + '/' + data : defaultImageUrl;
                            return `<img src="${imageUrl}" alt="${row.name}" style="width: 50px; height: 50px;">`;
                        }
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            var actions = '<div class="edit-delete-action">';
                            if (row.is_active == 1) {
                                actions +=
                                    `<a class="me-2 p-2 status-btn" id="active" data-id="${row.id}" href="#">Inactive</a>`;
                                actions +=
                                    `<a class="me-2 p-2 status-btn" id="in-active" data-id="${row.id}" style="display: none;">Active</a>`;
                            } else {
                                actions +=
                                    `<a class="me-2 p-2 status-btn" id="in-active" data-id="${row.id}" href="#">Active</a>`;
                                actions +=
                                    `<a class="me-2 p-2 status-btn" id="active" data-id="${row.id}" style="display: none;">Inactive</a>`;
                            }
                            actions += '</div>';
                            return actions;
                        }
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            var actions = '<div class="edit-delete-action">';
                            if (can_edit) {
                                actions +=
                                    `<a class="me-2 p-2 edit-btn" href="./products/${row.id}/edit"><i class="fa fa-edit"></i></a>`;
                            }

                            if (row.status == 1 && can_delete) {
                                actions +=
                                    `<a class="me-2 p-2 delete-btn" id="restore-product" data-id="${row.id}" href="#">Restore</a>`;
                                actions +=
                                    `<a class="me-2 p-2 delete-btn" id="delete-product" data-id="${row.id}" style="display: none;"><i class="fa fa-trash"></i></a>`;
                            } else if (can_delete) {
                                actions +=
                                    `<a class="me-2 p-2 delete-btn" id="delete-product" data-id="${row.id}" href="#"><i class="fa fa-trash"></i></a>`;
                                actions +=
                                    `<a class="me-2 p-2 delete-btn" id="restore-product" data-id="${row.id}" style="display: none;">Restore</a>`;
                            }
                            actions += '</div>';
                            return actions;
                        }
                    }
                ],
                columnDefs: [{
                    orderable: false,
                    targets: 5, // Ensure this index is correct based on your column order
                    className: "action-table-data"
                }],
                paging: true,
                pageLength: 10,
                lengthMenu: [10, 25, 50, 100],
                order: [[0, 'asc']]
            });
        });


        $(document).ready(function() {
            $(document).on('click', '.delete-btn', function(e) {
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
                                    $('#restore-product[data-id="' + productId + '"]').show();
                                    $('#delete-product[data-id="' + productId + '"]').hide();
                                } else {
                                    $('#restore-product[data-id="' + productId + '"]').hide();
                                    $('#delete-product[data-id="' + productId + '"]').show();
                                }
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

            $(document).on('click', '.status-btn', function(e) {
                var productId = $(this).data('id');
                var token = "{{ csrf_token() }}";
                var url = "{{ route('products.status', '') }}/" + productId;
                $.ajax({
                        url: url,
                        type: 'POST',
                        data: {
                            "_token": token,
                        },
                        success: function(response) {
                            console.log(response.status);
                            if (response.status == 'success') {
                                if (response.product == 1) {
                                    $('#active[data-id="' + productId + '"]').show();
                                    $('#in-active[data-id="' + productId + '"]').hide();
                                } else {
                                    $('#active[data-id="' + productId + '"]').hide();
                                    $('#in-active[data-id="' + productId + '"]').show();
                                }
                            } else {
                                alert('Something went wrong. Please try again.');
                            }
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText);
                            alert('Something went wrong. Please try again.');
                        }
                    });
            }) 
        });
    </script>
@endsection
