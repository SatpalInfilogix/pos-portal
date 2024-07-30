@extends('admin.layouts.app')
    @section('content')
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4>New Customer</h4>
                    <h6>Create new customer</h6>
                </div>
            </div>
            <ul class="table-top-head">
                <li>
                    <div class="page-btn">
                        <a href="{{ route('customers.index') }}" class="btn btn-secondary"><i data-feather="arrow-left"
                                class="me-2"></i>Back to customers</a>
                    </div>
                </li>
            </ul>
        </div>

        <form action="{{ route('customers.store') }}" method="post" enctype="multipart/form-data" id='user-form'>
            @csrf
            <div class="card">
                <div class="card-body add-product pb-0">
                    <div class="accordion-card-one accordion" id="accordionExample">
                        <div class="accordion-item">
                            <div class="row mb-3">
                                <div class="add-product">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6 add-product">
                                    <label class="form-label">Phone Number</label>
                                    <input type="text" name="phone_number" class="form-control">
                                </div>
                                <div class="col-md-6 add-product">
                                    <label class="form-label">Email (Optional)</label>
                                    <input type="text" name="email" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                {{-- <div class="col-md-6 add-product">
                                    <label class="form-label"><b>Shipping Address</b></label>
                                    <textarea rows="4" name="shipping_address" class="form-control"></textarea>
                                </div> --}}
                                <div class="col-md-6 add-product">
                                    <label class="form-label"><b>Billing Address</b></label>
                                    <textarea rows="4" name="billing_address" class="form-control"></textarea>
                                </div>
                                <div class="col-md-6 add-product">
                                    <label class="form-label">Pincode</label>
                                    <input type="text" name="billing_address_pin_code" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                {{-- <div class="col-md-6 add-product">
                                    <label class="form-label">Shipping Pincode</label>
                                    <input type="text" name="shipping_address_pin_code" class="form-control">
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="btn-add mb-4">
                            <button type="submit" class="btn btn-submit">Save Customer</button>
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
        $("#user-form").validate({
            rules: {
                name: "required",
                phone_number: "required",
                billing_address: "required",
                billing_address_pin_code: "required",
                // billing_address: "required",
                // billing_city: "required",
                // billing_state: "required",
                // billing_country: "required",
                // billing_pin_Code: "required",
            },
            messages: {
                name: "Please enter the name",
                phone_number: "Please enter the phone number",
                billing_address: "Please enter the address",
                billing_address_pin_code: "Please enter the pin code",
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
