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
            <div class="left-side">
                <!-- Button on the left -->
                <a href="{{  route('sales.print') }}" class="btn btn-primary">Download Sales PDF</a>
                <button class="btn btn-primary" id="report-download">Download Item Wise Report</button>
                <button class="btn btn-primary" id="pdf-download">Download Sales Report</button>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            @hasanyrole('Super Admin')
            <div class="col-md-3 mb-3">
                <label class="form-label">Store</label>
                <select name="store" id="sales-store" class="form-control" >
                    <option value="">select store</option>
                    @foreach ($stores as $store)
                        <option value="{{ $store->id }}" @selected($store->id == auth()->user()->store_id)>{{ $store->name }}</option>
                    @endforeach
                </select>
            </div>
            @else
            <input type="hidden" id="sales-store" value="{{ auth()->user()->store_id }}">
            @endhasanyrole
            <div class="col-md-3 mb-3">
                <label class="form-label">Start Date</label>
                <input type="text" id="start_date" name="start_date" class="form-control"  placeholder="Select Start Date">
            </div>
            <div class="col-md-3 mb-3">
                <label class="form-label">End Date</label>
                <input type="text" id="end_date" name="end_date" class="form-control"  placeholder="Select End Date">
            </div>
            <div class="col-md-3 mb-3">
                <label class="form-label">Yearly</label>
                <select name="yearly" id="yearly" class="form-control" >
                    <option value="" selected disabled>select Yearly</option>
                    <option value="Yearly">Yearly</option>
                    <option value="Quatrely">Quatrely</option>
                    <option value="Half Yearly">Half Yearly</option>
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
                                {{-- <th>Transit Status</th> --}}
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
        $(document).ready(function() {
            $('#yearly').change(function() {
                $('#start_date').val('');
                $('#end_date').val('');
            });

            $('#start_date').datepicker({
                autoclose: true,
                orientation: 'bottom'
            }).on('changeDate', function(e) {
                var startDate = e.date;
                $('#end_date').datepicker('setDate', null);
                $('#end_date').datepicker('setStartDate', startDate);
            });

            $('#end_date').datepicker({
                autoclose: true,
                orientation: 'bottom'
            });

            $('#pdf-download').on('click', function() {
                var startDate = $('#start_date').val();
                var endDate = $('#end_date').val();
                var yearly = $('#yearly').val();
                var storeId = $('#sales-store').val();

                var url = '{{ route('sales-details-download') }}' + 
                        '?start_date=' + encodeURIComponent(startDate) + 
                        '&end_date=' + encodeURIComponent(endDate) + 
                        '&yearly=' + encodeURIComponent(yearly) + 
                        '&store_id=' + encodeURIComponent(storeId);

                // Open a new tab with the generated URL
                window.open(url, '_blank');
            });

            $('#report-download').on('click', function() {
                var startDate = $('#start_date').val();
                var endDate = $('#end_date').val();
                var yearly = $('#yearly').val();
                var storeId = $('#sales-store').val();

                var url = '{{ route('item-wise-report-download') }}' +
                        '?start_date=' + encodeURIComponent(startDate) +
                        '&end_date=' + encodeURIComponent(endDate) +
                        '&yearly=' + encodeURIComponent(yearly) +
                        '&store_id=' + encodeURIComponent(storeId);

                // Open a new tab with the generated URL
                window.open(url, '_blank');
            });
        });

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
                        d.start_date = $('[name="start_date"]').val();
                        d.end_date = $('[name="end_date"]').val();
                        d.yearly = $('[name="yearly"]').val();
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
                    // {
                    //     data: "transit_status"
                    // },
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
                    targets: 5 // Index for the actions column
                }],
                paging: true,
                pageLength: 10,
                lengthMenu: [10, 25, 50, 100]
            });

            $(document).on('change', '[name="store"], [name="start_date"], [name="end_date"], [name="yearly"]', function() {
                salesTable.ajax.reload();
            });
        });
    </script>
@endsection
