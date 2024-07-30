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

        <form action="{{ route('inventory-transfer.store') }}" method="post">
            @csrf
            <div class="card">
                <div class="card-body pb-0">
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
                    <div class="row">
                        <h5 class="form-label fw-bold">Select Products</h5>
                        <div class="col-12">
                            <table id="products-table" class="table products-table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Category</th>
                                        <th>Product</th>
                                        <th>Manufactured Date</th>
                                        <th>Image</th>
                                        <th class="no-sort">Quantity</th>
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
            $('.products-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('get-products') }}",
                    type: "POST",
                    data: function(d) {
                        d._token = "{{ csrf_token() }}";
                        return d;
                    }
                },
                columns: [{
                        data: null,
                        className: 'select-checkbox',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            return `<input type="checkbox" name="products[]" value="${row.id}">`;
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
                        data: null,
                        className: 'quantity-column',
                        render: function(data, type, row) {
                            return `<input type="number" class="quantity-input" data-id="${row.id}" value="${data.quantity || 0}" style="width: 100px;">`;
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

            $(document).on('change', '[name="products[]"]', function() {
                var checked = $(this).is(':checked');
                var id = $(this).data('id');
                console.log('Checkbox with ID ' + id + ' is ' + (checked ? 'checked' : 'unchecked'));
                // Handle your checkbox state change here
            });
        });
    </script>
@endsection
