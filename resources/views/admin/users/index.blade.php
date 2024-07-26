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

            <div class="page-btn">
                <a href="{{ route('users.create') }}" class="btn btn-added">
                    <i data-feather="plus-circle" class="me-2"></i>
                    Add New User
                </a>
            </div>
            <!-- <div class="page-btn import">
                                                        <a href="#" class="btn btn-added color" data-bs-toggle="modal" data-bs-target="#view-notes"><i
                                                                data-feather="download" class="me-2"></i>Import Product</a>
                                                    </div> -->
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

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
                                <th class="no-sort">Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>
        $(function() {
            $('.users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    "url": "{{ route('get-users') }}",
                    "type": "POST",
                    "data": {
                        _token: "{{ csrf_token() }}"
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
                            actions +=
                            `<a class="me-2 p-2 edit-btn" href="./users/${row.id}/edit">`;
                            actions += '<i class="fa fa-edit"></i>';
                            actions += '</a>';

                            if (row.status == 1) {
                                actions +=
                                    '<a class="me-2 p-2 delete-btn" id="restore-user" data-id="' +
                                    row.id + '" href="#">Restore</a>';
                                actions +=
                                    '<a class="me-2 p-2 delete-btn" id="delete-user" data-id="' +row.id +
                                    '" style="display: none;"><i class="fa fa-trash"></i></a>';
                            } else {
                                actions +=
                                    '<a class="me-2 p-2 delete-btn" id="delete-user" data-id="' +row.id +
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
        })
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
