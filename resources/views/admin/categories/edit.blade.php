@extends('admin.layouts.app')

@section('content')

<div class="content">
    <div class="page-header">
        <div class="add-item d-flex">
            <div class="page-title">
                <h4>Edit Category</h4>
                <h6>Edit category details</h6>
            </div>
        </div>
        <ul class="table-top-head">
            <li>
                <div class="page-btn">
                    <a href="{{ route('categories.index') }}" class="btn btn-secondary"><i data-feather="arrow-left"
                            class="me-2"></i>Back to Category</a>
                </div>
            </li>
        </ul>
    </div>

    <form action="{{ route('categories.update', $category->id) }}" method="post" enctype="multipart/form-data" id='category-form'>
        @csrf
        <div class="card">
            <div class="card-body add-product pb-0">
                <div class="accordion-card-one accordion" id="accordionExample">
                    <div class="accordion-item">
                        <div class="row">
                            <div class="mb-3 add-product">
                                <label class="form-label">Category Name</label>
                                <input type="text" name="category_name" class="form-control" value="{{ old('product_name', $category->name) }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 add-product">
                                <label class="form-label">Image</label>
                                <input type="file" name="image" id="category-image" class="form-control" value="{{ old('image')}}">
                        </div>
                        <div id="imagePreview">
                            @if ($category->image)
                                <img src="{{ asset($category->image) }}" id="preview-Img" class="img-preview" width="50" height="50">
                            @else
                                <img src="" id="preview-Img" height="50" width="50" name="image" hidden>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="btn-addproduct mb-4">
                        <button type="submit" class="btn btn-submit">Update Category</button>
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
    $(document).ready(function () {
        //preview product image
        $('#category-image').change(function() {
            var file = this.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').html(
                        '<img class="preview-img" width="50px" height="50px" src="' + e.target
                        .result + '" alt="Selected Image">');
                }
                reader.readAsDataURL(file);
            }
        });
        // Form validation
        $("#category-form").validate({
            rules: {
                category_name: "required",
            },
            messages: {
                category_name: "Please enter the category name",
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
