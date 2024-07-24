@extends('admin.layouts.app')

@section('content')

<div class="content">
    <div class="page-header">
        <div class="add-item d-flex">
            <div class="page-title">
                <h4>Return Stock Details</h4>
                <h6>Manage your return stock details</h6>
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
            <div class="table-responsive dataview">
                <table class="table dashboard-expired-products">
                    <thead>
                        <tr>
                            <th>Sr. No</th>
                            <th>Invoice ID</th>
                            <th>Return Invoice ID</th>
                            <th>Customer Name</th>
                            <th>Vehicle Number</th>
                            <th>Contact Number</th>
                            <th class="no-sort">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($returnStocks as $key => $returnStock)
                        <tr>
                          <td>
                              {{ $key+1 }}
                          </td>
                          <td>
                              {{$returnStock->order_id}}
                          </td>
                          <td>
                            {{$returnStock->return_invoice_id}}
                        </td>
                          <td>
                              {{ $returnStock->customerDetail->customer_name }}
                          </td>
                          <td>
                              {{$returnStock->vehicle_number}}
                          </td>
                          <td>
                              {{$returnStock->contact_number}}
                          </td>
                            <td class="action-table-data">
                                <div class="edit-delete-action">
                                    <a class="me-2 p-2 btn btn-secondary-light" href="{{ route('view.stock.index',$returnStock->return_invoice_id) }}">
                                        <i data-feather="eye" class="feather-eye"></i>
                                    </a>
                                   
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
                            $('#delete-product[data-id="' + productId + '"]').hide();
                        } else {
                            console.log('restore');
                            $('#restore-customer[data-id="' + productId + '"]').hide();
                            $('#delete-product[data-id="' + productId + '"]').show();
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