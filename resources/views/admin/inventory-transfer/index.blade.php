@extends('admin.layouts.app')

@section('content')
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4>Inventory Transfers</h4>
                    <h6>Manage Inventory Transfers</h6>
                </div>
            </div>

            <div class="page-btn">
                <a href="{{ route('inventory-transfer.create') }}" class="btn btn-added">
                    <i data-feather="truck" class="me-2"></i>
                    Transfer new items
                </a>
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
                    <table id="inventory-transfer" class="table inventory-transfer">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Store</th>
                                <th>Store Contact</th>
                                <th>Vehicle Number</th>
                                <th>Date & Time</th>
                                <th>Action</th>
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
    $('.inventory-transfer').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                "url": "{{ route('get-transfer-stock-inventory') }}",
                "type": "POST",
                "data": {
                    _token: "{{ csrf_token() }}"
                }
            },
            columns: [
                { "data": "id" },
                { "data": "store_name" },
                { "data": "store_contact" },
                { "data": "vehicle_number" },
                {
                    "data": "created_at",
                    "render": function(data, type, row) {
                        return formatDate(data);
                    }
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        var actions = '<div class="edit-delete-action">';
                        actions += `<a class="me-2 p-2 edit-btn" href="{{ route('inventory-transfer.show','') }}/${data.id}">`;
                        actions += '<i class="fa fa-eye"></i>';
                        actions += '</a>';
                        actions += '</div>';
                        return actions;
                    }
                }
            ],
            columnDefs: [
                {
                    "orderable": false,
                    "targets": 5, // Adjust target index if necessary
                    "className": "action-table-data"
                } // Disable sorting on 'Action' column
            ],
            paging: true,
            pageLength: 10,
            lengthMenu: [10, 25, 50, 100]
        });
    });
    </script>
@endsection
