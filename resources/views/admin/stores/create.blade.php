@extends('admin.layouts.app')
@section('content')
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4>New Store</h4>
                    <h6>Add New Store</h6>
                </div>
            </div>
            <ul class="table-top-head">
                <li>
                    <div class="page-btn">
                        <a href="{{ route('stores.index') }}" class="btn btn-secondary">
                            <i data-feather="arrow-left" class="me-2"></i>
                            Back to Stores
                        </a>
                    </div>
                </li>
            </ul>
        </div>

        <form action="{{ route('stores.store') }}" method="post" enctype="multipart/form-data" id='user-form'>
            @csrf
            <div class="card">
                <div class="card-body pb-0">
                    <div class="accordion-card-one accordion" id="accordionExample">
                        <div class="accordion-item">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Store Name</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Contact Number</label>
                                    <input type="number" name="contact_number" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Location</label>
                                    <input type="text" name="location" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="btn-add mb-4">
                            <button type="submit" class="btn btn-submit">Save Store</button>
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
            $("#user-form").validate({
                rules: {
                    name: "required",
                    email: "required",
                    contact_number: "required",
                    location: "required"                
                },
                messages: {
                    name: "Please enter the first name",
                    email: "Please enter the last email",
                    contact_number: "Please enter the contact number",
                    location: "Please enter phone location"
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
