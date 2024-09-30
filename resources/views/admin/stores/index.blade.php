@extends('admin.layouts.app')

@section('content')
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4>Stores List</h4>
                    <h6>Manage your stores</h6>
                </div>
            </div>

            @canany(['create stores'])
                <div class="page-btn">
                    <a href="{{ route('stores.create') }}" class="btn btn-added">
                        <i data-feather="plus-circle" class="me-2"></i>
                        Add Store
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
                    <table id="users-table" class="table users-table ">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Store Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Location</th>
                                <th>
                                    @canany(['edit stores', 'delete stores'])
                                        Action
                                    @endcanany
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stores as $key => $store)
                                <tr data-hide-store="{{ $store->id }}">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $store->name }}</td>
                                    <td>{{ $store->email }}</td>
                                    <td>{{ $store->contact_number }}</td>
                                    <td>{{ $store->location }}</td>
                                    @canany(['edit stores', 'delete stores'])
                                        <td class="action-table-data">
                                            <div class="edit-delete-action">
                                                @canany(['edit stores'])
                                                    <a class="me-2 p-2" href="{{ route('stores.edit', $store->id) }}">
                                                        <i data-feather="edit" class="feather-edit"></i>
                                                    </a>
                                                @endcanany
                                                {{-- @canany(['delete stores'])
                                                    <a class="me-2 p-2 delete-btn" href="#" data-id="{{ $store->id }}">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                @endcanany --}}
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
            $('#users-table').DataTable();
        });
        $(document).on('click', '.delete-btn', function(e) {
            e.preventDefault();
            var storeId = $(this).data('id');
            var token = "{{ csrf_token() }}";
            var url = "{{ route('stores.destroy', '') }}/" + storeId; // Use Laravel helper for URL

            if (confirm('Are you sure you want to delete this Store?')) {
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    data: {
                        "_token": token,
                    },
                    success: function(response) {
                        if (response.success) {
                            $('[data-hide-store="' + storeId + '"]').hide();
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
