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
                    <h4>New Categoryss</h4>
                    <h6>Create new category</h6>
                </div>
            </div>
            <ul class="table-top-head">
                <li>
                    <div class="page-btn">
                        <a href="{{ route('categories.index') }}" class="btn btn-secondary"><i data-feather="arrow-left"
                                class="me-2"></i>Back to categories</a>
                    </div>
                </li>
            </ul>
        </div>

        <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data" id='category-form'>
            @csrf
            <div class="card">
                <div class="card-body add-product pb-0">
                    <div class="accordion-card-one accordion" id="accordionExample">
                        <div class="accordion-item">
                            <div class="row">
                                <div class="mb-3 add-product">
                                    <label class="form-label">Category Name</label>
                                    <input type="text" name="category_name" class="form-control">
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="mb-3 add-product">
                                    <label class="form-label">Image</label>
                                    <input type="file" name="image" id="img-category" class="form-control">
                                </div>
                                <img src="" id="image_preview" name="image" hidden>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="btn-add mb-4">
                            <button type="submit" class="btn btn-submit">Save Category</button>
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
        $('#img-category').change(function() {
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
    
        $("#category-form").validate({
            rules: {
                category_name: "required",
                image: "required",
            },
            messages: {
                category_name: "Please enter the category name",
                image: "Please enter the image",
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
