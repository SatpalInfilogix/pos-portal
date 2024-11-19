@extends('admin.layouts.app')
@section('content')
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
                    <h4>New Price</h4>
                    <h6>Create new price</h6>
                </div>
            </div>
            <ul class="table-top-head">
                <li>
                    <div class="page-btn">
                        <a href="{{ route('prices.index') }}" class="btn btn-secondary">
                            <i data-feather="arrow-left" class="me-2"></i>
                            Back to Prices
                        </a>
                    </div>
                </li>
            </ul>
        </div>

        <form action="{{ route('prices.store') }}" method="post" id="price-form" enctype="multipart/form-data">
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
                                <div class="col-md-6 add-product">
                                    <div class="mb-3">
                                        <label class="form-label">Units</label>
                                        {{-- <select name="quantity" id="unit-dropdown" class="form-control chosen-select" required>
                                            <option value="" selected disabled>Select Unit</option>
                                        </select> --}}
                                        <input type="text" name="unit" id="unit" class="form-control" value="" readonly>
                                        <inpu type="hidden" name="unit_id" id="unit_id" value="">
                                    </div>
                                </div>
                                <div class="col-md-6 add-product">
                                    <div class="mb-3">
                                        <label class="form-label">Quantity</label>
                                        <input type="text" name="quantityValue" id="quantityValue" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3 add-product">
                                    <label class="form-label">Price</label></label>
                                    <input type="text" name="price" id="price" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3 add-product">
                                    <label class="form-label">Manufacture Date</label>
                                    <input type="text" name="manufacture_date" id="manufacture_date"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 add-product">
                                    <div class="mb-3">
                                        <label class="form-label">New Price</label>
                                        <input type="text" name="new_price" id="new_price" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6 add-product">
                                    <div class="mb-3">
                                        <label class="form-label">Start Date</label>
                                        <input type="text" name="start_date" id="start_date" class="form-control">
                                    </div>
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
    <script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chosen-js/chosen.jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            var date = new Date();
            date.setDate(date.getDate() + 1); // Set to tomorrow

            $('#start_date').datepicker({
                format: 'yyyy-mm-dd',
                startDate: date,
                autoclose: true
            });

             // Datepicker initialization
            $('#manufacture_date').datepicker({
                format: 'yyyy-mm-dd', // specify the format you want
                todayHighlight: true,
                autoclose: true,
                endDate: new Date(), // Set the end date to today
                orientation: 'bottom'
            });
        });
        function updateProductSearch(keyword) {
            $.ajax({
                url: "{{ route('search-products') }}",
                type: 'GET',
                data: {
                    'input': keyword
                },
                success: function(response) {
                    var $dropdown = $('#product-dropdown');
                    var existingOptions = new Set($dropdown.find('option').map(function() {
                        return $(this).val();
                    }).get());

                    var newOptions = response
                        .filter(item => !existingOptions.has(item.name))
                        .map(item => `<option value="${item.id}">${item.name}</option>`);

                    if (newOptions.length > 0) {
                        $dropdown.append(newOptions.join(''));
                        $dropdown.trigger('chosen:updated');
                    }

                    $('.chosen-search-input').val(keyword);
                },
                error: function(err) {
                    console.error('Error fetching data:', err);
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

            let debounceTimeout;
            /* $('.chosen-search-input').on('keyup', function() {
                clearTimeout(debounceTimeout);
                const searchKeyword = $(this).val().trim();
                debounceTimeout = setTimeout(() => {
                    updateProductSearch(searchKeyword);
                }, 300); // Adjust delay as needed
            }); */

            $('#product-dropdown').on('change', function() {
                const productId = $(this).val();
                if (productId) {
                    updateUnitDropdown(productId);
                }
            });

            function updateUnitDropdown(productId) {
                $.ajax({
                    url: "{{ url('/product-units/') }}/" + productId,
                    type: 'GET',
                    success: function(result) {
                        $('#unit').val(result.data.unit);
                        $('#quantityValue').val(result.data.quantity);
                        $('#price').val(result.data.price);
                        $('#unit_id').val(result.data.unitId);
                        $('#manufacture_date').val(result.data.manufacture_date);
                        // $('#unit-dropdown').html(result.options);
                    },
                    error: function(err) {
                        console.error('Error fetching units:', err);
                    }
                });
            }
        });

        $(document).ready(function() {
            $('#quantityValue').on('input', function() {
                this.value = this.value.replace(/[^0-9]/g, '');
            });

            $('#price').on('input', function() {
                var value = $(this).val();
                var regex = /^(\d*\.?\d*)$/;
                if (regex.test(value)) {
                    value = value.replace(/(\..*)\./g, '$1');
                    $(this).val(value);
                } else {
                    $(this).val(value.slice(0, -1));
                }
            });
        });

        $(document).ready(function () {    
            $("#price-form").validate({
                rules: {
                    product: "required",
                    manufacture_date: "required",
                    quantityValue: {
                        required: true,
                        digits: true
                    },
                    price: {
                        required: true,
                        number: true,
                    },
                    new_price: {
                        required: function() {
                            return $("#start_date").val() !== "" && $("#new_price").val() === "";
                        },
                        number: true
                    },
                    start_date: {
                        required: function() {
                            return $("#new_price").val() !== "" && $("#start_date").val() === "";
                        },
                        date: true
                    }
                },
                messages: {
                    product: "Please enter the product",
                    manufacture_date: "Please enter the manufacture date",
                    quantityValue: {
                        required: "Please enter the quantity",
                        digits: "Please enter a valid number"
                    },
                    price: {
                        required: "Please enter the price",
                        number: "Please enter a valid number"
                    },
                    new_price: {
                        required: "Please enter a new price if the start date is provided.",
                        number: "Please enter a valid number"
                    },
                    start_date: {
                        required: "Please enter a start date.",
                        date: "Please enter a valid date"
                    }
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
                    form.submit();
                }
            });
        });


    </script>
@endsection
