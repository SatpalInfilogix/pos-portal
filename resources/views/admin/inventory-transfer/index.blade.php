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
                                <th>Return Invoice ID</th>
                                <th>Invoice ID</th>
                                <th>Vehicle Number</th>
                                <th>Contact Number</th>
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
            $('.inventory-transfer').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    "url": "{{ route('get-return-stock-inventory') }}",
                    "type": "POST",
                    "data": {
                        _token: "{{ csrf_token() }}"
                    }
                },
                columns: [{
                        "data": "id"
                    },
                    {
                        "data": "return_invoice_id"
                    },
                    {
                        "data": "order_id"
                    },
                    {
                        "data": "vehicle_number"
                    },
                    {
                        "data": "contact_number"
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            var actions = '<div class="edit-invoice">';
                            actions +=
                            `<a class="me-2 p-2 edit-btn" href="./users/${row.return_invoice_id}/edit">`;
                            actions += '<i class="fa fa-edit"></i>';
                            actions += '</a>';
                            actions += '</div>';
                            return actions;
                        }
                    }
                ],
                columnDefs: [{
                        "orderable": false,
                        "targets": 5,
                        "className": "action-table-data"
                    } // Disable sorting on 'Action' column
                ],
                paging: true,
                pageLength: 10,
                lengthMenu: [10, 25, 50, 100]
            });
        })
    </script>
@endsection
