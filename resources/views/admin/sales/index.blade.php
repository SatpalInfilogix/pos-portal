@extends('admin.layouts.app')

@section('content')
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4>Sales Detail</h4>
                    <h6>Manage your sales detail</h6>
                </div>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Store</label>
                <select name="store" id="sales-store" class="form-control">
                    <option value="">select store</option>
                    @foreach ($stores as $store)
                        <option value="{{ $store->id }}" @selected($store->id == auth()->user()->store_id)>{{ $store->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="card table-list-card">
            <div class="card-body">
                <div class="table-responsive p-0 m-0">
                    <table id="sales-table" class="table sales-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Order ID</th>
                                <th>Price</th>
                                <th>Customer Name</th>
                                <th>Customer Address</th>
                                <th>Transit Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            let salesTable = $('.sales-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('get-sales') }}",
                    type: "POST",
                    data: function(d) {
                        d._token = "{{ csrf_token() }}";
                        d.store_id = $('[name="store"]').val();
                        return d;
                    }
                },
                columns: [{
                        data: "id"
                    },
                    {
                        data: "OrderId"
                    },
                    {
                        data: "TotalAmount"
                    },
                    {
                        data: "CustomerName"
                    },
                    {
                        data: "ShippingAddress"
                    },
                    {
                        data: "transit_status"
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            var actions = '<div class="edit-delete-action">';
                            actions +=
                                `<a class="me-2 p-2 btn-secondary-light" href="./sales/${row.OrderId}">`;
                            actions += '<i class="fa fa-eye"></i>';
                            actions += '</a>';
                            actions += '</div>';
                            return actions;
                        }
                    }
                ],
                columnDefs: [{
                    orderable: false,
                    targets: 6 // Index for the actions column
                }],
                paging: true,
                pageLength: 10,
                lengthMenu: [10, 25, 50, 100]
            });


            $(document).on('change', '[name="store"]', function() {
                salesTable.ajax.reload();
            });
        });
    </script>
@endsection
