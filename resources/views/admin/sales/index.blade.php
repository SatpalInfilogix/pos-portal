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
                <table id="sales-table" class="table sales-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Order ID</th>
                            <th>Price</th>
                            <th>Customer Name</th>
                            <th>Customer Address</th>
                            <th>Transit Status</th>
                            <th class="no-sort">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                         <!-- @foreach($orderSet as $key => $order)
                        <tr>
                          <td>
                              {{$order->id}}
                          </td>
                          <td>
                              {{$order->OrderID}}
                          </td>
                          <td>
                              {{$order->TotalAmount}}
                          </td>
                          <td>
                              {{$order->CustomerName}}
                          </td>
                          <td>
                              {{$order->ShippingAddress}}
                          </td>
                          <td>
                              {{$order->transit_status}}
                          </td>
                          

                            <td class="action-table-data">
                                <div class="edit-delete-action">
                                    <a class="me-2 p-2 btn btn-secondary-light" href="{{ route('sales.view',$order->OrderID)}}">
                                        <i data-feather="eye" class="feather-eye"></i>
                                    </a>
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
        $('.sales-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('get-sales') }}",
                type: "POST",
                data: function(d) {
                    d._token = "{{ csrf_token() }}";
                    return d;
                }
            },
            columns: [
                { data: "id" },
                { data: "OrderId" },
                { data: "TotalAmount" },
                { data: "CustomerName" },
                { data: "ShippingAddress" },
                { data: "transit_status" },
                {
                    data: null,
                    render: function(data, type, row) {
                        var actions = '<div class="edit-delete-action">';
                        actions += `<a class="me-2 p-2 btn-secondary-light" href="./sales/${row.OrderId}">`;
                        actions += '<i class="fa fa-eye"></i>';
                        actions += '</a>';
                        actions += '</div>';
                        return actions;
                    }
                }
            ],
            columnDefs: [
                {
                    orderable: false,
                    targets: 6  // Index for the actions column
                }
            ],
            paging: true,
            pageLength: 10,
            lengthMenu: [10, 25, 50, 100]
        });
    });

</script>
@endsection