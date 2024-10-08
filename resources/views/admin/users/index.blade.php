@extends('admin.layouts.app')

@section('content')
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4>User List</h4>
                    <h6>Manage your users</h6>
                </div>
            </div>

            @canany(['create users'])
                <div class="page-btn">
                    <a href="{{ route('users.create') }}" class="btn btn-added">
                        <i data-feather="plus-circle" class="me-2"></i>
                        Add New User
                    </a>
                </div>
            @endcanany
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Store</label>
                @hasanyrole('Super Admin')
                <select name="store" id="users-store" class="form-control" >
                    <option value="">select store</option>
                    @foreach ($stores as $store)
                        <option value="{{ $store->id }}" @selected($store->id == auth()->user()->store_id)>{{ $store->name }}</option>
                    @endforeach
                </select>
                @endhasanyrole
            </div>
        </div>
        <div class="card table-list-card">
            <div class="card-body">
                <div class="table-responsive p-0 m-0">
                    <table id="users-table" class="table users-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Phone Number</th>
                                <th>
                                    @canany(['edit users', 'delete users'])
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

    <input type="hidden" name="can_edit" value="{{ Auth::user()->can('edit users') }}">
    <input type="hidden" name="can_delete" value="{{ Auth::user()->can('delete users') }}">
@endsection


@section('script')
    <script>
        $(function() {
            let can_edit = $('[name="can_edit"]').val();
            let can_delete = $('[name="can_delete"]').val();

            let usersTable = $('.users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    "url": "{{ route('get-users') }}",
                    "type": "POST",
                    "data": function(d) {
                        d._token = "{{ csrf_token() }}";
                        d.store_id = $('[name="store"]').val();
                        return d;
                    }
                },
                columns: [{
                        "data": "id"
                    },
                    {
                        "data": "first_name"
                    },
                    {
                        "data": "last_name"
                    },
                    {
                        "data": "email"
                    },
                    {
                        "data": "role"
                    },
                    {
                        "data": "phone_number"
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            var actions = '<div class="edit-delete-action">';
                            if (can_edit) {
                                actions +=
                                    `<a class="me-2 p-2 edit-btn" href="./users/${row.id}/edit">`;
                                actions += '<i class="fa fa-edit"></i>';
                                actions += '</a>';
                            }

                            if (row.status == 1 && can_delete) {
                                actions +=
                                    '<a class="me-2 p-2 delete-btn" id="restore-user" data-id="' +
                                    row.id + '" href="#">Restore</a>';
                                actions +=
                                    '<a class="me-2 p-2 delete-btn" id="delete-user" data-id="' +
                                    row.id +
                                    '" style="display: none;"><i class="fa fa-trash"></i></a>';
                            } else if(can_delete) {
                                actions +=
                                    '<a class="me-2 p-2 delete-btn" id="delete-user" data-id="' +
                                    row.id +
                                    '" href="#"><i class="fa fa-trash"></i></a>';
                                actions +=
                                    '<a class="me-2 p-2 delete-btn" id="restore-user" data-id="' +
                                    row.id + '" style="display: none;">Restore</a>';
                            }

                            actions += '</div>';
                            return actions;
                        }
                    }
                ],
                columnDefs: [{
                        "orderable": false,
                        "targets": 6,
                        "className": "action-table-data"
                    } // Disable sorting on 'Action' column
                ],
                paging: true,
                pageLength: 10,
                lengthMenu: [10, 25, 50, 100]
            });
            $(document).on('change', '#users-store', function() {
                usersTable.ajax.reload();
            });
        });


    </script>

    <script>
        $(document).ready(function() {
            $(document).on('click', '.delete-btn', function(e) {
                e.preventDefault();
                var productId = $(this).data('id');
                var token = "{{ csrf_token() }}";
                var url = "{{ route('users.destroy', '') }}/" + productId; // Use Laravel helper for URL

                if (confirm('Are you sure you want to delete this User?')) {
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        data: {
                            "_token": token,
                        },
                        success: function(response) {
                            if (response.status == 'success') {
                                if (response.user == 1) {
                                    $('#restore-user[data-id="' + productId + '"]').show();
                                    $('#delete-user[data-id="' + productId + '"]').hide();
                                } else {
                                    $('#restore-user[data-id="' + productId + '"]').hide();
                                    $('#delete-user[data-id="' + productId + '"]').show();
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
