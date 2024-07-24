@extends('admin.layouts.app')
    @section('content')
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4>New Discount</h4>
                    <h6>Create new discount</h6>
                </div>
            </div>
            <ul class="table-top-head">
                <li>
                    <div class="page-btn">
                        <a href="{{ route('discounts.index') }}" class="btn btn-secondary"><i data-feather="arrow-left"
                                class="me-2"></i>Back to Discount</a>
                    </div>
                </li>
            </ul>
        </div>

        <form action="{{ route('discounts.update', $discount->id) }}" method="post" enctype="multipart/form-data" id='product-form'>
        @csrf
            <div class="card">
                <div class="card-body add-product pb-0">
                    <div class="accordion-card-one accordion" id="accordionExample">
                        <div class="accordion-item">
                        <div class="row">
                                <div class="mb-3 add-product">
                                    <label class="form-label">Quantity</label>
                                    <input type="text" name="quantity" id="quantity" class="form-control" value="{{ $discount->quantity }}">
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="mb-3 add-product">
                                    <label class="form-label">Discount</label></label>
                                    <input type="text" name="discount" id="discount" class="form-control" value="{{ $discount->discount }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="btn-addproduct mb-4">
                            <button type="submit" class="btn btn-submit">Save Discount</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @endsection
<!-- @section('script')
<script>
    $(document).ready(function () {
        $('body').on('input', '.product-autocomplete', function() {
            var input = $(this).val().trim();
            var autocompleteContainer = $(this).siblings('.autocomplete-items');

            $.ajax({
                type: 'GET',
                url: '{{ route('autocomplete') }}',
                data: { input: input },
                success: function(response) {
                    autocompleteContainer.empty();
                    if (response.length > 0) {
                        $.each(response, function(key, value) {
                            var autocompleteItem = '<div class="autocomplete-item" data-id="' + value.id + '">' + value.name + '</div>';
                            autocompleteContainer.append(autocompleteItem);
                        });
                        autocompleteContainer.show();
                    } else {
                        autocompleteContainer.hide();
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Autocomplete AJAX error:', status, error);
                }
            });
        });

        // Function to handle click on autocomplete-item
        $('body').on('click', '.autocomplete-item', function() {
            var productName = $(this).text(); // Get the text of the selected item
            var productId = $(this).data('id'); // Get the data-id attribute of the selected item
            var inputField = $(this).closest('.mb-3').find('.product-autocomplete'); // Find the corresponding input field

            inputField.val(productName); // Set the value of the input field to the selected product name
            $(this).parent('.autocomplete-items').empty().hide(); // Hide the autocomplete dropdown
        });
    });


</script>
@endsection -->
