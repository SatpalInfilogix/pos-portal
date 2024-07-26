@extends('admin.layouts.app')

@section('content')
<div class="content">
    <div class="page-header">
        <div class="add-item d-flex">
            <div class="page-title">
                <h4>Customers List</h4>
                <h6>Manage your customers</h6>
            </div>
        </div>

        <div class="page-btn">
            <a href="{{ route('customers.create') }}" class="btn btn-added"><i data-feather="plus-circle"
                    class="me-2"></i>Add New customer</a>
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
            <div class="table-responsive p-0 m-0">
                <table id="customers-table" class="table customers-table">
                    <thead>
                        <tr>
                            <th>Sr. No</th>
                            <th>Name</th>
                            <th>Phone Number</th>
                            <th class="no-sort">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- @foreach($customers as $key => $customer)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $customer->customer_name }} </td>
                            <td>{{ $customer->contact_number }} </td>

                            <td class="action-table-data">
                                <div class="edit-delete-action">
                                    <a class="me-2 p-2" href="{{ route('customers.edit', $customer->id) }}">
                                        <i data-feather="edit" class="feather-edit"></i>
                                    </a>
                                    @if($customer->status == 1)
                                        <a class="me-2 p-2 delete-product" id="restore-customer" data-id="{{ $customer->id }}" href="#">Restore</a>
                                        <a class="me-2 p-2 delete-product" id="delete-product" data-id="{{$customer->id}}" style="display: none;"><i data-feather="trash-2" class="feather-trash-2"></i></a>
                                    @else 
                                        <a class="me-2 p-2 delete-product" id="delete-product" data-id="{{$customer->id}}" href="#"><i data-feather="trash-2" class="feather-trash-2"></i></a>
                                        <a class="me-2 p-2 delete-product" id="restore-customer" data-id="{{ $customer->id }}" style="display: none;">Restore</a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        $('.customers-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                "url": "{{ route('get-customers') }}",
                "type": "POST",
                "data": {
                    _token: "{{ csrf_token() }}"
                }
            },
            columns: [
                { "data": "id" },
                { "data": "customer_name" },
                { "data": "contact_number", },
                {
                    data: null,
                    render: function(data, type, row) {
                        var actions = '<div class="edit-delete-action">';
                        actions += `<a class="me-2 p-2 edit-btn" href="./customers/${row.id}/edit">`;
                        actions += '<i class="fa fa-edit"></i>';
                        actions += '</a>';

                        if (row.status == 1) {
                            actions += '<a class="me-2 p-2 delete-btn" id="restore-customer" data-id="' +
                                row.id + '" href="#">Restore</a>';
                            actions += '<a class="me-2 p-2 delete-btn" id="delete-customer" data-id="' + row.id +
                                '" style="display: none;"><i class="fa fa-trash"></i></a>';
                        } else {
                            actions += '<a class="me-2 p-2 delete-btn" id="delete-customer" data-id="' +
                                row.id + '" href="#"><i class="fa fa-trash"></i></a>';
                            actions += '<a class="me-2 p-2 delete-btn" id="restore-customer" data-id="' +
                                row.id + '" style="display: none;">Restore</a>';
                        }
                        actions += '</div>';
                        return actions;
                    }
                }
            ],
            columnDefs: [
                {
                    "orderable": false,
                    "targets": 3,  // Adjust this index based on the actual number of columns
                    "className": "action-table-data"
                }
            ],
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
            var url = "{{ route('customers.destroy','') }}/" + productId; // Use Laravel helper for URL

            if (confirm('Are you sure you want to delete this Customer?')) {
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    data: {
                        "_token": token,
                    },
                    success: function(response) {
                        console.log(response.customerStatus);
                        if (response.status == 'success') {
                            if(response.customerStatus == 1) {
                                $('#restore-customer[data-id="' + productId + '"]').show();
                                $('#delete-customer[data-id="' + productId + '"]').hide();
                            } else {
                                console.log('restore');
                                $('#restore-customer[data-id="' + productId + '"]').hide();
                                $('#delete-customer[data-id="' + productId + '"]').show();
                            }
                            // $('#product-row-' + productId).remove();
                            // alert('Customer deleted successfully');
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