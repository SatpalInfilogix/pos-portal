@extends('admin.layouts.app')
@section('content')
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4>Inventory Transfer</h4>
                    <h6>Send new items to the store</h6>
                </div>
            </div>
            <ul class="table-top-head">
                <li>
                    <div class="page-btn">
                        <a href="{{ route('inventory-transfer.index') }}" class="btn btn-secondary">
                            <i data-feather="arrow-left" class="me-2"></i>
                            Back to inventory transfer
                        </a>
                    </div>
                </li>
            </ul>
        </div>

        <form action="{{ route('inventory-transfer.store') }}" id="inventory-transfer-form" method="post">
            @csrf
            <div class="card">
                <div class="card-body pb-0">
                    @error('error')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Select Store</label>
                            <select name="store" id="store" class="form-control">
                                <option value="" selected disabled>Select Store</option>
                                @foreach ($stores as $store)
                                    <option value="{{ $store->id }}">{{ $store->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row products-container d-none">
                        <h5 class="form-label fw-bold">Select Products</h5>
                        <div class="col-12">
                            <table id="products-table" class="table products-table w-100">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Category</th>
                                        <th>Product</th>
                                        <th>Manufactured Date</th>
                                        <th>Image</th>
                                        <th>Available Quantity</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-lg-12">
                            <div class="btn-add product mb-4">
                                <button type="submit" class="btn btn-submit">Send Items</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        $(function() {
            $('[name="store"]').change(function() {
                let store_id = $(this).val();
                if (store_id) {
                    $('.products-container').removeClass('d-none');
                } else {
                    $('.products-container').addClass('d-none');
                }
            })

            $('.products-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('get-products') }}",
                    type: "POST",
                    data: function(d) {
                        d._token = "{{ csrf_token() }}";
                        d.is_deleted = false;
                        return d;
                    }
                },
                columns: [{
                        data: null,
                        className: 'select-checkbox',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            return `<input type="checkbox" class="product-item" data-id="${row.id}">`;
                        }
                    },
                    {
                        data: "category_name"
                    },
                    {
                        data: "name"
                    },
                    {
                        data: "manufacture_date"
                    },
                    {
                        data: "image",
                        render: function(data, type, row) {
                            return `<img src="${data ? '{{ url('') }}' + '/' + data : 'default-image-url'}" alt="${row.name}" style="width: 50px; height: 50px;">`;
                        }
                    },
                    {
                        data: "available_quantity",
                    },
                    {
                        data: null,
                        className: 'quantity-column',
                        render: function(data, type, row) {
                            return `<input type="number" name="quantity-input" class="quantity-input" data-id="${row.id}" value="${data.quantity || 0}" max-quantity="${data.available_quantity || 0}" style="width: 100px;">`;
                            // return `<input type="number" class="quantity-input" data-id="${row.id}" value="${data.quantity || 0}" style="width: 100px;">`;
                        }
                    }
                ],
                columnDefs: [{
                        orderable: false,
                        targets: 0
                    },
                    {
                        orderable: false,
                        targets: 5
                    }
                ],
                paging: true,
                pageLength: 10,
                lengthMenu: [10, 25, 50, 100],
                order: [
                    [2, 'asc']
                ]
            });

            $(document).on('keyup', '.quantity-input', function() {
                const maxQuantity = parseInt($(this).attr('max-quantity'), 10);
                let quantity = parseInt($(this).val(), 10);
                var product_id = $(this).data('id');

                if (quantity > maxQuantity) {
                    $(this).val(maxQuantity);
                }
                if(quantity>0){
                    $('.product-item[data-id="' + product_id + '"]').prop('checked',true);
                }
                if(quantity == 0){
                    $('.product-item[data-id="' + product_id + '"]').prop('checked',false);
                }
            });

            let products = [];

            // Function to find and remove product by ID from the array
            function removeProductById(id) {
                products = products.filter(product => product.id !== id);
            }

            // Function to add or update product in the array
            function addOrUpdateProduct(id, quantity) {
                var existingProduct = products.find(product => product.id === id);
                if (existingProduct) {
                    // Update existing product
                    existingProduct.quantity = quantity;
                } else {
                    // Add new product
                    products.push({
                        id: id,
                        quantity: quantity
                    });
                }
            }

            $(document).on('change', '.product-item', function() {
                var id = $(this).data('id');
                var quantity = $(this).closest('tr').find('.quantity-input').val();

                if ($(this).is(':checked')) {
                    addOrUpdateProduct(id, quantity);
                } else {
                    removeProductById(id);
                }
            });

            $(document).on('change keyup', '.quantity-input', function() {
                var id = $(this).data('id');
                var quantity = $(this).val();

                if ($(this).closest('tr').find('.product-item').is(':checked')) {
                    addOrUpdateProduct(id, quantity);
                }
            });

            $("#inventory-transfer-form").validate({
                rules: {
                    store: "required"
                },
                messages: {
                    store: "Please select store"
                },
                errorClass: "invalid-feedback",
                errorElement: "span",
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass("is-invalid");
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass("is-invalid");
                },
                submitHandler: function(form) {
                    // Add products data to form
                    $('<input>').attr({
                        type: 'hidden',
                        name: 'products_data',
                        value: JSON.stringify(products)
                    }).appendTo('#inventory-transfer-form');

                    form.submit();
                }
            });
        });
    </script>
@endsection
