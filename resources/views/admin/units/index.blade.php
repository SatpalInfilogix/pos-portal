@extends('admin.layouts.app')

@section('content')
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4>Units List</h4>
                    <h6>Manage your units</h6>
                </div>
            </div>

            @canany(['create units'])
                <div class="page-btn">
                    <a href="{{ route('units.create') }}" class="btn btn-added">
                        <i data-feather="plus-circle" class="me-2"></i>
                        Add Unit
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
                    <table id="example" class="table table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>
                                    @canany(['edit units', 'delete units'])
                                        Action
                                    @endcanany
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($units as $key => $unit)
                                <tr data-hide-store="{{ $unit->id }}">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $unit->name }}</td>
                                    @canany(['edit units', 'delete units'])
                                        <td class="action-table-data">
                                            <div class="edit-delete-action">
                                                @canany(['edit units'])
                                                    <a class="me-2 p-2" href="{{ route('units.edit', $unit->id) }}">
                                                        <i data-feather="edit" class="feather-edit"></i>
                                                    </a>
                                                @endcanany
                                                @canany(['delete units'])
                                                    @if($unit->status == 1)
                                                        <a class="me-2 p-2 delete-btn" id="restore-unit" data-id="{{ $unit->id }}" href="#">Restore</a>
                                                        <a class="me-2 p-2 delete-btn" id="delete-unit"  href="#" data-id="{{ $unit->id }}" style="display: none;"><i class="fa fa-trash"></i></a>
                                                    @else 
                                                        <a class="me-2 p-2 delete-btn" id="delete-unit" data-id="{{ $unit->id}}" href="#"><i data-feather="trash-2" class="feather-trash-2"></i></a>
                                                        <a class="me-2 p-2 delete-btn" id="restore-unit" data-id="{{ $unit->id }}" style="display: none;">Restore</a>
                                                    @endif
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
    
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });

        $(document).on('click', '.delete-btn', function(e) {
            e.preventDefault();
            var storeId = $(this).data('id');
            var token = "{{ csrf_token() }}";
            var url = "{{ route('units.destroy', '') }}/" + storeId; // Use Laravel helper for URL

            if (confirm('Are you sure you want to delete this Unit?')) {
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    data: {
                        "_token": token,
                    },
                    success: function(response) {
                        console.log(response.success);
                        if(response.status == 'success') {
                            if(response.unit == 1) {
                                console.log('asd');
                                $('#restore-unit[data-id="' + storeId + '"]').show();
                                $('#delete-unit[data-id="' + storeId + '"]').hide();
                            } else {
                                $('#restore-unit[data-id="' + storeId + '"]').hide();
                                $('#delete-unit[data-id="' + storeId + '"]').show();
                            }
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
