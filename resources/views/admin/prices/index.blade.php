@extends('admin.layouts.app')

@section('content')
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4>Price List</h4>
                    <h6>Manage your price</h6>
                </div>
            </div>
            
            <div class="page-btn">
                <a href="{{ route('prices.create') }}" class="btn btn-added"><i data-feather="plus-circle"
                        class="me-2"></i>Add New Price</a>
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
                    <table id="prices-table" class="table prices-table">
                        <thead>
                            <tr>
                                <th>Sr. No</th>
                                <th>Product Code</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th class="no-sort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- @foreach($prices as $key => $price)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $price->product->product_code }} </td>
                                    <td>{{ $price->product->name }} </td>
                                    <td>${{ $price->price }}</td>
                                    <td class="action-table-data">
                                        <div class="edit-delete-action">
                                            <a class="me-2 p-2" href="{{ route('prices.edit', $price->id) }}">
                                                <i data-feather="edit" class="feather-edit"></i>
                                            </a> 
                                            @if($price->status == 1)
                                                <a class="me-2 p-2 delete-product" id="restore-price" data-id="{{ $price->id }}" href="#">Restore</a>
                                                <a class="me-2 p-2 delete-product" id="delete-price" data-id="{{ $price->id}}" style="display: none;"><i data-feather="trash-2" class="feather-trash-2"></i></a>
                                            @else 
                                                <a class="me-2 p-2 delete-product" id="delete-price" data-id="{{ $price->id}}" href="#"><i data-feather="trash-2" class="feather-trash-2"></i></a>
                                                <a class="me-2 p-2 delete-product" id="restore-price" data-id="{{ $price->id }}" style="display: none;">Restore</a>
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
        $('.prices-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('get-prices') }}",
                type: "POST",
                data: function(d) {
                    d._token = "{{ csrf_token() }}";
                    return d;
                }
            },
            columns: [
                { data: "id" },
                { data: "product_code" }, // Ensure this matches the key from the backend
                { data: "product_name" }, // Ensure this matches the key from the backend
                { data: "price" },
                {
                    data: null,
                    render: function(data, type, row) {
                        var actions = '<div class="edit-delete-action">';
                        actions += `<a class="me-2 p-2 edit-btn" href="./prices/${row.id}/edit"><i class="fa fa-edit"></i></a>`;

                        if (row.status == 1) {
                            actions += `<a class="me-2 p-2 delete-btn" id="restore-price" data-id="${row.id}" href="#">Restore</a>`;
                            actions += `<a class="me-2 p-2 delete-btn" id="delete-price" data-id="${row.id}" style="display: none;"><i class="fa fa-trash"></i></a>`;
                        } else {
                            actions += `<a class="me-2 p-2 delete-btn" id="delete-price" data-id="${row.id}" href="#"><i class="fa fa-trash"></i></a>`;
                            actions += `<a class="me-2 p-2 delete-btn" id="restore-price" data-id="${row.id}" style="display: none;">Restore</a>`;
                        }
                        actions += '</div>';
                        return actions;
                    }
                }
            ],
            columnDefs: [
                {
                    orderable: false,
                    targets: 4, // Adjust based on the actual number of columns
                    className: "action-table-data"
                }
            ],
            paging: true,
            pageLength: 10, // Adjusted to match the lengthMenu
            lengthMenu: [10, 25, 50, 100],
            order: [[1, 'asc']] // Optional: Default ordering by the product_code column
        });
    });

    $(document).ready(function() {
        $(document).on('click', '.delete-btn', function(e) {
            e.preventDefault();
            var productId = $(this).data('id');
            var token = "{{ csrf_token() }}";
            var url = "{{route('prices.destroy','')}}/" + productId;

            if (confirm('Are you sure you want to delete this price record?')) {
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    data: {
                        "_token": token,
                    },
                    success: function(response) {
                        if(response.status == 'success') {
                            if(response.price == 1) {
                                $('#restore-price[data-id="' + productId + '"]').show();
                                $('#delete-price[data-id="' + productId + '"]').hide();
                            } else {
                                $('#restore-price[data-id="' + productId + '"]').hide();
                                $('#delete-price[data-id="' + productId + '"]').show();
                            }
                            // $('#product-row-' + productId).remove();
                            // alert('rtecord deleted successfully');
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

