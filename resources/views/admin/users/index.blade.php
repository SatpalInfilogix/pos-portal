@extends('admin.layouts.app')

@section('content')
<div class="content">
    <div class="page-header">
        <div class="add-item d-flex">
            <div class="page-title">
                <h4>User List</h4>
                <h6>Manage your user</h6>
            </div>
        </div>

        <div class="page-btn">
            <a href="{{ route('users.create') }}" class="btn btn-added"><i data-feather="plus-circle"
                    class="me-2"></i>Add New User</a>
        </div>
        <!-- <div class="page-btn import">
                <a href="#" class="btn btn-added color" data-bs-toggle="modal" data-bs-target="#view-notes"><i
                        data-feather="download" class="me-2"></i>Import Product</a>
            </div> -->
    </div>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="card table-list-card">
        <div class="card-body">
            <div class="table-responsive dataview">
                <table class="table dashboard-expired-products">
                    <thead>
                        <tr>
                            <th>Sr. No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Phone Number</th>
                            <th class="no-sort">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $key => $user)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $user->name }} </td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if ($user->roles->isNotEmpty())
                                {{ $user->roles->pluck('name')[0] }}
                                @endif
                            </td>
                            <td>{{ optional($user)->phone_number }}</td>
                            <td class="action-table-data">
                                <div class="edit-delete-action">
                                    <a class="me-2 p-2" href="{{ route('users.edit', $user->id) }}">
                                        <i data-feather="edit" class="feather-edit"></i>
                                    </a>
                                    @if($user->status == 1)
                                        <a class="me-2 p-2 delete-product" id="restore-user" data-id="{{ $user->id }}" href="#">Restore</a>
                                        <a class="me-2 p-2 delete-product" id="delete-user" data-id="{{ $user->id}}" style="display: none;"><i data-feather="trash-2" class="feather-trash-2"></i></a>
                                    @else 
                                        <a class="me-2 p-2 delete-product" id="delete-user" data-id="{{ $user->id}}" href="#"><i data-feather="trash-2" class="feather-trash-2"></i></a>
                                        <a class="me-2 p-2 delete-product" id="restore-user" data-id="{{ $user->id }}" style="display: none;">Restore</a>
                                    @endif
                                    <!-- <a class="p-2 delete-product" data-id="{{$user->id}}">
                                        <i data-feather="trash-2" class="feather-trash-2"></i>
                                    </a> -->
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
    $('.delete-product').click(function(e) {
        e.preventDefault();
        var productId = $(this).data('id');
        var token = "{{ csrf_token() }}";
        var url = "{{ route('users.destroy','') }}/" + productId; // Use Laravel helper for URL

        if (confirm('Are you sure you want to delete this User?')) {
            $.ajax({
                url: url,
                type: 'DELETE',
                data: {
                    "_token": token,
                },
                success: function(response) {
                    if (response.status == 'success') {
                        if(response.user == 1) {
                            $('#restore-user[data-id="' + productId + '"]').show();
                            $('#delete-user[data-id="' + productId + '"]').hide();
                        } else {
                            $('#restore-user[data-id="' + productId + '"]').hide();
                            $('#delete-user[data-id="' + productId + '"]').show();
                        }
                        // $('#product-row-' + productId).remove();
                        // alert('User deleted successfully');
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