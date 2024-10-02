@extends('admin.layouts.app')
@section('content')
    <style>
        .card .card-size {
            padding: 0.25rem;
        }

        .btn.btn-sm {
            padding: 0px 0px 0px 0px;
            font-size: 9px;
        }
        
    </style>
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4>New Product</h4>
                    <h6>Create new product</h6>
                </div>
            </div>
            <ul class="table-top-head">
                <li>
                    <div class="page-btn">
                        <a href="{{ route('products.index') }}" class="btn btn-secondary"><i data-feather="arrow-left"
                                class="me-2"></i>Back to Products</a>
                    </div>
                </li>
            </ul>
        </div>

        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data" id='product-form'>
            @csrf
            <div class="card">
                <div class="card-body add-product pb-0">
                    <div class="accordion-card-one accordion" id="accordionExample">
                        <div class="accordion-item">
                            <div class="row mb-3">
                                <div class="col-md-6 add-product">
                                    <label class="form-label">Category</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        <option value="" selected disabled>Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 add-product">
                                    <label class="form-label">Product Code</label>
                                    <input type="text" name="product_code" class="form-control" readonly>
                                    <small id="pcode-err" style="color:red; display:none;">Product code already exist</small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 add-product">
                                    <label class="form-label">Product Name</label>
                                    <input type="text" name="product_name" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="add-product">
                                    <label class="form-label">Unit</label>
                                    {{-- <select class="select2-multiple form-control" name="units[]" multiple="multiple"id="select2Multiple"> --}}
                                    <select class="select2-multiple form-control" name="units" id="select2Multiple">
                                        <option value="" selected disabled>Select Unit</option>
                                        @foreach($units as $key => $unit)
                                            <option value="{{$unit->id}}">{{$unit->name}}</option>
                                        @endforeach
                                    </select>
                                    {{-- <div class="input-blocks add-product list">
                                        <label class="form-label">Units</label>
                                        <input type="text" id="unit" class="form-control">
                                        <button type="button" id="add-units" class="btn btn-primaryadd">Add Units</button>
                                    </div>
                                    <div id="unit-list" class="mt-3 d-flex flex-wrap">
                                        <!-- Display entered units here -->
                                    </div> --}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12 add-product">
                                    <label class="form-label">Image</label>
                                    <input type="file" name="image" id="img-product" class="form-control">
                                </div>
                                <img src="" id="image_preview" name="image" hidden>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="btn-add mb-4">
                            <button type="submit" class="btn btn-submit">Save Product</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('script')
<script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.select2-multiple').select2({
            placeholder: "Select Unit",
            allowClear: true
        });
    });

    $(document).ready(function() {
        $('#img-product').change(function() {
            var input = this;
            if (input.files && input.files[0]) {
                $('#image_preview').prop('hidden', false);
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#image_preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        });

        var units = []; // Initialize units as an empty array

        // Add Units button click event
        $('#add-units').click(function() {
            var unitValue = $('#unit').val().trim();
            if (unitValue !== '') {
                units.push(unitValue); // Add to units array
                updateUnitList(); // Update the displayed units
                $('#unit').val(''); // Clear the input field
            } else {
                alert('Units cannot be empty');
            }
        });

        // Function to update displayed units
        function updateUnitList() {
            $('#unit-list').empty(); // Clear previous entries
            units.forEach(function(unit, index) {
                var listItem = $('<div class="card added-unit me-2 mb-2">' +
                    '<div class="card-body card-size d-flex justify-content-between align-items-center">' +
                    '<span>' + unit + '</span>' +
                    '<input type="hidden" name="units[]" value="' + unit + '">' +
                    '<button type="button" class="btn btn-sm btn-danger remove-units" data-index="' +
                    index + '"><span class="badge rounded-pill">x</span></button>' +
                    '</div>' +
                    '</div>');
                $('#unit-list').append(listItem); // Append each unit as a new item
            });
        }

        // Remove Unit button click event (for dynamically added elements)
        $('#unit-list').on('click', '.remove-units', function() {
            var index = $(this).data('index');
            units.splice(index, 1); // Remove from array
            updateUnitList(); // Update displayed units
        });

        // Form validation
        $("#product-form").validate({
            rules: {
                category_id: "required",
                product_name: "required",
                product_code: "required",
                image: "required",
                units: "required"
            },
            messages: {
                category_id: "Please enter category",
                product_name: "Please enter the product name",
                product_code: "Please enter the product code",
                image: "Please select image",
                units: "Please enter the unit"
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

    //check product code
    $(document).on('keyup', '[name="product_code"]', function() {
        var product_code = $(this).val();
        var token = "{{ csrf_token() }}";
        var url = "{{ route('products.check_code') }}";
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                "_token": token,
                product_code
            },
            success: function(response) {
                console.log(response);
                if (response.success) {
                    $('#pcode-err').show();
                    $('.btn-submit').prop('disabled', true);
                } else {
                    $('#pcode-err').hide();
                    $('.btn-submit').prop('disabled', false);
                }
            },
            error: function(xhr) {
                console.log(xhr);
            }
        });
    });

    $(document).ready(function() {
    function generateProductCode() {
        var category = $('#category_id option:selected').text();
        var productName = $('input[name="product_name"]').val();

        // Handle case where the placeholder is selected
        if (category === 'Select Category') {
            category = ''; // Clear category if placeholder is selected
        }

        // Extract initials
        var categoryInitials = category ? category.split(' ').map(word => word.charAt(0).toUpperCase()).join('') : '';
        var productInitials = productName ? productName.split(' ').map(word => word.charAt(0).toUpperCase()).join('') : '';

        var productCode = '';

        // Generate product code only if a valid category is selected
        if (categoryInitials) {
            $.ajax({
                url: "{{ route('products.get_latest_code_number') }}", // Define this route in your routes file
                method: 'GET',
                success: function(response) {
                    var latestCodeNumber = parseInt(response.latest_code_number, 10) || 0;
                    var newCodeNumber = String(latestCodeNumber + 1).padStart(6, '0'); // 6 digits zero-padded
                    productCode = `${categoryInitials}${productInitials}${newCodeNumber}`;
                    $('input[name="product_code"]').val(productCode);
                },
                error: function() {
                    // Handle AJAX errors
                    $('input[name="product_code"]').val('Error');
                }
            });
        } else {
            // Clear the product code if no valid category is selected
            $('input[name="product_code"]').val('');
        }
    }

    // Trigger code generation when category or product name changes
    $('#category_id, input[name="product_name"]').on('change keyup', generateProductCode);

    // Initial call to handle cases when the page loads
    generateProductCode();
});


</script>
@endsection
