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

        <form action="{{ route('prices.update', $price->id) }}" method="post" id="price-form" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body add-product pb-0">
                    <div class="accordion-card-one accordion" id="accordionExample">
                        <div class="accordion-item">
                            <div class="row">
                                <div class="mb-3 add-product">
                                    <label class="form-label">Product Name</label>
                                    <select name="product" id="product-dropdown" class="form-control chosen-select"
                                        required disabled>
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 add-product">
                                    <div class="mb-3">
                                        <label class="form-label">Units</label></label>
                                        <!-- <input type="text" name="quantity" id="quantity" class="form-control"
                                            value="{{ $price->quantity_type }}"> -->
                                        {{-- <select name="quantity" id="unit-dropdown" class="form-control chosen-select" required>
                                            <option value="" selected disabled>Select Unit</option>
                                            @if($units)
                                                @foreach($units as $unit)
                                                    <option value="{{$unit->name}}" {{ $price->quantity_type == $unit->name ? 'selected' : '' }}>{{ $unit->name}}</option>
                                                @endforeach
                                            @endif
                                        </select> --}}
                                        <input type="text" name="unit" id="unit" value="{{ $price->unit }}" class="form-control" readonly>
                                        <input type="hidden" name="unit_id" id="unit_id" value="{{$price->unit_id}}" class="form-control">

                                    </div>
                                </div>
                                <div class="col-md-6 add-product">
                                    <div class="mb-3">
                                        <label class="form-label">Quantity</label></label>
                                        <input type="number" name="quantityValue" id="quantityValue" class="form-control"
                                            value="{{ $price->quantity }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3 add-product">
                                    <label class="form-label">Price</label></label>
                                    <input type="number" name="price" id="price" class="form-control"
                                        value="{{ $price->price }}">
                                </div>
                                <div class="col-md-6 mb-3 add-product">
                                    <label class="form-label">Manufacture Date</label>
                                    <input type="text" name="manufacture_date" id="manufacture_date" class="form-control" value="{{ $price->manufacture_date }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 add-product">
                                    <div class="mb-3">
                                        <label class="form-label">New Price</label>
                                        <input type="number" name="new_price" id="new_price" class="form-control" value="{{ $price->new_price }}">
                                    </div>
                                </div>
                                <div class="col-md-6 add-product">
                                    <div class="mb-3">
                                        <label class="form-label">Start Date</label>
                                        <input type="text" name="start_date" id="start_date" class="form-control" value="{{ $price->start_date }}">
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

            setTimeout(()=>{
                $('[name="product"]').val(`{{ $price->product->id }}`).trigger('chosen:updated');
            },1500);

            updateProductSearch('');

            let debounceTimeout;
            $('.chosen-search-input').on('keyup', function() {
                clearTimeout(debounceTimeout);
                const searchKeyword = $(this).val().trim();
                debounceTimeout = setTimeout(() => {
                    updateProductSearch(searchKeyword);
                }, 300); // Adjust delay as needed
            });

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
                    },
                    error: function(err) {
                        console.error('Error fetching units:', err);
                    }
                });
            }
        });
        // document.getElementById('price').addEventListener('input', function (e) {
        //     let value = e.target.value;
        //     e.target.value = value.replace(/[^0-9.]/g, ''); // Remove any non-numeric and non-period characters
        // });

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
                        digits: "Please enter a valid number",
                        pattern: "Please enter a valid price with a single decimal point"
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
