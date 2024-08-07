@extends('admin.layouts.app')

@section('content')
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4>Categories List</h4>
                    <h6>Manage your categories</h6>
                </div>
            </div>

            @canany(['create categories'])
                <div class="page-btn">
                    <a href="{{ route('categories.create') }}" class="btn btn-added">
                        <i data-feather="plus-circle" class="me-2"></i>
                        Add New Category
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
                    <table id="categories-table" class="table categories-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>
                                    @canany(['edit categories', 'delete categories'])
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

    <input type="hidden" name="can_edit" value="{{ Auth::user()->can('edit categories') }}">
    <input type="hidden" name="can_delete" value="{{ Auth::user()->can('delete categories') }}">

    <script>
        $(function() {
            let can_edit = $('[name="can_edit"]').val();
            let can_delete = $('[name="can_delete"]').val();

            $('.categories-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    "url": "{{ route('get-categories') }}",
                    "type": "POST",
                    "data": {
                        _token: "{{ csrf_token() }}"
                    }
                },
                columns: [{
                        "data": "id"
                    },
                    {
                        "data": "name"
                    },
                    {
                        "data": "image",
                        "render": function(data, type, row) {
                            return `<img src="{{ url('') }}/${row.image}" alt="${row.name}" style="width: 50px; height: 50px;">`;
                        }
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            var actions = '<div class="edit-delete-action">';

                            if (can_edit) {
                                actions +=
                                    `<a class="me-2 p-2 edit-btn" href="./categories/${row.id}/edit">`;
                                actions += '<i class="fa fa-edit"></i>';
                                actions += '</a>';
                            }

                            if (row.status == 1 && can_delete) {
                                actions +=
                                    '<a class="me-2 p-2 delete-btn" id="restore-category" data-id="' +
                                    row.id + '" href="#">Restore</a>';
                                actions +=
                                    '<a class="me-2 p-2 delete-btn" id="delete-category" data-id="' +
                                    row.id +
                                    '" style="display: none;"><i class="fa fa-trash"></i></a>';
                            } else if (can_delete) {
                                actions +=
                                    '<a class="me-2 p-2 delete-btn" id="delete-category" data-id="' +
                                    row.id + '" href="#"><i class="fa fa-trash"></i></a>';
                                actions +=
                                    '<a class="me-2 p-2 delete-btn" id="restore-category" data-id="' +
                                    row.id + '" style="display: none;">Restore</a>';
                            }
                            actions += '</div>';
                            return actions;
                        }
                    }
                ],
                columnDefs: [{
                    "orderable": false,
                    "targets": 3, // Adjust this index based on the actual number of columns
                    "className": "action-table-data"
                }],
                paging: true,
                pageLength: 10,
                lengthMenu: [10, 25, 50, 100]
            });
        });

        $(document).ready(function() {
            $(document).on('click', '.delete-btn', function(e) {
                e.preventDefault();
                var productId = $(this).data('id');
                var token = "{{ csrf_token() }}";
                var url = "{{ route('categories.destroy', '') }}/" +
                    productId; // Use Laravel helper for URL

                if (confirm('Are you sure you want to delete this Category?')) {
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        data: {
                            "_token": token,
                        },
                        success: function(response) {
                            if (response.status == 'success') {
                                if (response.categoryStatus == 1) {
                                    $('#restore-category[data-id="' + productId + '"]').show();
                                    $('#delete-category[data-id="' + productId + '"]').hide();
                                } else {
                                    $('#restore-category[data-id="' + productId + '"]').hide();
                                    $('#delete-category[data-id="' + productId + '"]').show();
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
        });
    </script>
@endsection
