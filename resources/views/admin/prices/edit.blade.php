@extends('admin.layouts.app')
    @section('content')
    <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
    <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
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

        <form action="{{ route('prices.update', $price->id) }}" method="post" enctype="multipart/form-data" id='product-form'>
        @csrf
            <div class="card">
                <div class="card-body add-product pb-0">
                    <div class="accordion-card-one accordion" id="accordionExample">
                        <div class="accordion-item">
                            <div class="row">
                                <div class="mb-3 add-product">
                                    <label class="form-label">Product Name</label>
                                    <select name="product" id="product-dropdown" class="form-control chosen-select" required>
                                        <option value="{{ $price->product->name }}">{{ $price->product->name }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 add-product">
                                    <label class="form-label">Quantity</label></label>
                                    <input type="text" name="quantityValue" id="quantityValue" class="form-control" value="{{ $price->quantity }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 add-product">
                                    <label class="form-label">Quantity Type</label></label>
                                    <input type="text" name="quantity" id="quantity" class="form-control" value="{{ $price->quantity_type }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 add-product">
                                    <label class="form-label">Price</label></label>
                                    <input type="text" name="price" id="price" class="form-control" value="{{ $price->price }}">
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
        $('[name="product"]').chosen({
            placeholder_text_single: 'Enter Product Name',
            allow_single_deselect: true,
            no_results_text: 'No results matched'
        });
        $('.chosen-search-input').on('keyup', function() {
            var inputValue = $(this).val().trim();

            $.ajax({
                url : '{{ route("autocomplete") }}',
                type : 'GET',
                data : {
                    'input' : inputValue
                },success : function(response){
                    console.log(response);
                    $.each(response, function(i, item) {
                        
                        var optionExists = $('#product-dropdown option[value="' + item.name + '"]').length > 0;
                        if (!optionExists) {
                            $('#product-dropdown').append('<option value="' + item.name + '">' + item.name + '</option>');
                            $('#product-dropdown').trigger('chosen:updated'); // Refresh chosen
                        }
                    });
                },error : function(err){
                    //console.log(err);
                }
            });
        });
    });


</script>
@endsection
