@extends('admin.layouts.app')

@section('content')
<div class="content">
    <div class="page-header">
        <div class="add-item d-flex">
            <div class="page-title">
                <h4>Product List</h4>
                <h6>Manage your products</h6>
            </div>
        </div>
        <div class="page-btn d-flex gap-2">
            <form id="importForm" action="{{ route('import-products') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <button type="button" class="btn btn-added" id="importButton">
                    <i data-feather="upload" class="me-2"></i>
                    Import Products
                </button>
                <input type="file" id="fileInput" name="file" accept=".csv" style="display:none;">
            </form>

            <script>
                $(document).ready(function() {
                    $('#importButton').on('click', function() {
                        $('#fileInput').click(); 
                    });

                    $('#fileInput').on('change', function(event) {
                        var file = $(this).prop('files')[0];
                        if (file && file.type === 'text/csv') {
                            $('#importForm').submit();
                        } else {
                            alert('Please select a valid CSV file.');
                        }
                    });
                });
            </script>
            
            <a href="{{ url('sample-products.csv') }}" class="btn btn-added">
                <i data-feather="download" class="me-2"></i>
                Download Sample CSV
            </a>
            
            <a href="{{ route('products.create') }}" class="btn btn-added">
                <i data-feather="plus-circle" class="me-2"></i>
                Add New Product
            </a>
        </div>
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
                            <th>Category</th>
                            <th>Product</th>
                            <th>Manufactured Date</th>
                            <th>Image</th>
                            <th class="no-sort">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $key => $product)
                        <tr id="product-row-{{ $product->id }}">
                            <td>{{ ++$key }}</td>
                            <td>{{ $product->category->name ?? '' }}</td>
                            <td>{{ $product->name }} </td>
                            <td>{{ $product->manufacture_date}}</td>
                            <td><img src="{{ asset($product->image) }}" height="50" width="50"></td>
                            <td class="action-table-data">
                                <div class="edit-delete-action">
                                    <a class="me-2 p-2" href="{{ route('products.edit', $product->id) }}">
                                        <i data-feather="edit" class="feather-edit"></i>
                                    </a>
                                    @if($product->status == 1)
                                        <a class="me-2 p-2 delete-product" id="restore-product" data-id="{{ $product->id }}" href="#">Restore</a>
                                        <a class="me-2 p-2 delete-product" id="delete-product" data-id="{{ $product->id}}" style="display: none;"><i data-feather="trash-2" class="feather-trash-2"></i></a>
                                    @else 
                                        <a class="me-2 p-2 delete-product" id="delete-product" data-id="{{ $product->id}}" href="#"><i data-feather="trash-2" class="feather-trash-2"></i></a>
                                        <a class="me-2 p-2 delete-product" id="restore-product" data-id="{{ $product->id }}" style="display: none;">Restore</a>
                                    @endif
                                    <!-- <a class="p-2 delete-product" data-id="{{ $product->id }}" href="#">
                                        <i data-feather="trash-2" class="feather-trash-2"></i>
                                    </a> -->
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
        var url = "{{route('products.destroy','')}}/" + productId;

        if (confirm('Are you sure you want to delete this product?')) {
            $.ajax({
                url: url,
                type: 'DELETE',
                data: {
                    "_token": token,
                },
                success: function(response) {
                    if(response.status == 'success') {
                        if(response.product == 1) {
                            $('#restore-product[data-id="' + productId + '"]').show();
                            $('#delete-product[data-id="' + productId + '"]').hide();
                        } else {
                            $('#restore-product[data-id="' + productId + '"]').hide();
                            $('#delete-product[data-id="' + productId + '"]').show();
                        }
                        // $('#product-row-' + productId).remove();
                        // alert('Product deleted successfully');
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

