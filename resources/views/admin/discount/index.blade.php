@extends('admin.layouts.app')

@section('content')
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4>Discount List</h4>
                    <h6>Manage your discount</h6>
                </div>
            </div>
            
            <div class="page-btn">
                <a href="{{ route('discounts.create') }}" class="btn btn-added"><i data-feather="plus-circle"
                        class="me-2"></i>Add New Discount</a>
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
                                <th>Quantity</th>
                                <th>Price</th>
                                <th class="no-sort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($discounts as $key => $discount)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $discount->quantity }} </td>
                                    <td>{{ $discount->discount }}</td>
                                    <td class="action-table-data">
                                        <div class="edit-delete-action">
                                            <a class="me-2 p-2" href="{{ route('discounts.edit', $discount->id) }}">
                                                <i data-feather="edit" class="feather-edit"></i>
                                            </a>
                                            @if($discount->status == 1)
                                                <a class="me-2 p-2 delete-product" id="restore-discount" data-id="{{ $discount->id }}" href="#">Restore</a>
                                                <a class="me-2 p-2 delete-product" id="delete-discount" data-id="{{$discount->id}}" style="display: none;"><i data-feather="trash-2" class="feather-trash-2"></i></a>
                                            @else 
                                                <a class="me-2 p-2 delete-product" id="delete-discount" data-id="{{$discount->id}}" href="#"><i data-feather="trash-2" class="feather-trash-2"></i></a>
                                                <a class="me-2 p-2 delete-product" id="restore-discount" data-id="{{ $discount->id }}" style="display: none;">Restore</a>
                                            @endif
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
        var url = "{{route('discounts.destroy','')}}/" + productId;

        if (confirm('Are you sure you want to delete this discount record?')) {
            $.ajax({
                url: url,
                type: 'DELETE',
                data: {
                    "_token": token,
                },
                success: function(response) {
                    if(response.status == 'success') {
                        if(response.discount == 1) {
                            $('#restore-discount[data-id="' + productId + '"]').show();
                            $('#delete-discount[data-id="' + productId + '"]').hide();
                        } else {
                            $('#restore-discount[data-id="' + productId + '"]').hide();
                            $('#delete-discount[data-id="' + productId + '"]').show();
                        }
                        // $('#discount-record-row-' + productId).remove();
                        // alert('Disciunt Record deleted successfully');
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

