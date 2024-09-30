@extends('admin.layouts.app')

@section('content')
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4>Roles List</h4>
                    <h6>Manage your rols</h6>
                </div>
            </div>

            <div class="page-btn">
                @can('create roles & permissions')
                    <a href="{{ route('roles.create') }}" class="btn btn-added">
                        <i data-feather="plus-circle" class="me-2"></i>
                        Add Role
                    </a>
                @endcan
            </div>
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card table-list-card">
            <div class="card-body">
                <div class="table-responsive p-0 m-0">
                    <table id="example" class="table table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Role</th>
                                @canany(['edit roles & permissions', 'delete roles & permissions'])
                                <th>Action</th>
                                @endcanany
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $key => $role)
                                <tr data-hide-store="{{ $role->id }}">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $role->name }}</td>
                                    @canany(['edit roles & permissions', 'delete roles & permissions'])
                                        <td class="action-table-data">
                                            <div class="edit-delete-action">
                                                @can('edit roles & permissions')
                                                <a class="me-2 p-2" href="{{ route('roles.edit', $role->id) }}">
                                                    <i data-feather="edit" class="feather-edit"></i>
                                                </a>
                                                @endcan

                                                @can('delete roles & permissions')
                                                <a class="me-2 p-2 delete-btn" id="role-row-{{ $role->id }}" data-id="{{ $role->id }}" href="#"><i data-feather="trash-2" class="feather-trash-2"></i></a>
                                                @endcan
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
    
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });

        $(document).on('click', '.delete-btn', function(e) {
            e.preventDefault();
            var roleId = $(this).data('id');
            var token = "{{ csrf_token() }}";
            var url = "{{ route('roles.destroy', '') }}/" + roleId; // Use Laravel helper for URL

            if (confirm('Are you sure you want to delete this Role?')) {
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    data: {
                        "_token": token,
                    },
                    success: function(response) {
                        if (response.success) {
                           window.location.reload();
                        }
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                        alert('Something went wrong. Please try again.');
                    }
                });
            }
        });
    </script>
@endsection
