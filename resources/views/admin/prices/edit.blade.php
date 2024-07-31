@extends('admin.layouts.app')
@section('content')
    <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
    <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet" />
    <style>
        .autocomplete-items {
            position: absolute;
            background-color: #fff;
            border: 1px solid #ddd;
            max-height: 150px;
            overflow-y: auto;
            z-index: 1000;
            width: 96%;
        }

        .autocomplete-item {
            padding: 10px;
            cursor: pointer;
        }

        .autocomplete-item:hover {
            background-color: #f0f0f0;
        }
    </style>
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4>Edit Price</h4>
                    <h6>Edit price details</h6>
                </div>
            </div>
            <ul class="table-top-head">
                <li>
                    <div class="page-btn">
                        <a href="{{ route('prices.index') }}" class="btn btn-secondary"><i data-feather="arrow-left"
                                class="me-2"></i>Back to Prices</a>
                    </div>
                </li>
            </ul>
        </div>

        <form action="{{ route('prices.update', $price->id) }}" method="post" enctype="multipart/form-data"
            id='product-form'>
            @csrf
            <div class="card">
                <div class="card-body add-product pb-0">
                    <div class="accordion-card-one accordion" id="accordionExample">
                        <div class="accordion-item">
                            <div class="row">
                                <div class="mb-3 add-product">
                                    <label class="form-label">Product Name</label>
                                    <select name="product" id="product-dropdown" class="form-control chosen-select"
                                        required>
                                        <option></option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 add-product">
                                    <label class="form-label">Quantity</label></label>
                                    <input type="text" name="quantityValue" id="quantityValue" class="form-control"
                                        value="{{ $price->quantity }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 add-product">
                                    <label class="form-label">Quantity Type</label></label>
                                    <input type="text" name="quantity" id="quantity" class="form-control"
                                        value="{{ $price->quantity_type }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 add-product">
                                    <label class="form-label">Price</label></label>
                                    <input type="text" name="price" id="price" class="form-control"
                                        value="{{ $price->price }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="btn-add mb-4">
                            <button type="submit" class="btn btn-submit">Save Price</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chosen-js/chosen.jquery.min.js"></script>
    <script>
        function updateProductSearch(keyword) {
            $.ajax({
                url: "{{ route('autocomplete') }}",
                type: 'GET',
                data: {
                    'input': keyword
                },
                success: function(response) {
                    // Cache jQuery selector and create a Set to track existing options
                    var $dropdown = $('#product-dropdown');
                    var existingOptions = new Set($dropdown.find('option').map(function() {
                        return $(this).val();
                    }).get());

                    // Create an array to hold new options
                    var newOptions = response
                        .filter(item => !existingOptions.has(item
                            .name)) // Filter out existing options
                        .map(item =>
                            `<option value="${item.name}">${item.name}</option>`
                        ); // Create new option elements

                    if (newOptions.length > 0) {
                        // Append all new options in one go
                        $dropdown.append(newOptions.join(''));
                        // Trigger chosen:updated only once
                        $dropdown.trigger('chosen:updated');
                    }

                    $('.chosen-search-input').val(keyword);
                },
                error: function(err) {
                    console.error('Error fetching data:', err); // Better error logging
                }
            });
        }

        $(document).ready(function() {
            $('[name="product"]').chosen({
                placeholder_text_single: 'Enter Product Name',
                allow_single_deselect: true,
                no_results_text: 'No results matched'
            });

            updateProductSearch('');

            $('.chosen-search-input').on('keyup', function() {
                const searchKeyword = $(this).val().trim();
                updateProductSearch(searchKeyword);
            });
        });
    </script>
@endsection
