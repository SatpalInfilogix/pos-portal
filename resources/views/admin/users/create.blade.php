@extends('admin.layouts.app')
@section('content')
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4>New User</h4>
                    <h6>Create new user</h6>
                </div>
            </div>
            <ul class="table-top-head">
                <li>
                    <div class="page-btn">
                        <a href="{{ route('users.index') }}" class="btn btn-secondary">
                            <i data-feather="arrow-left" class="me-2"></i>
                            Back to users
                        </a>
                    </div>
                </li>
            </ul>
        </div>

        <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data" id='user-form'>
            @csrf
            <div class="card">
                <div class="card-body pb-0">
                    <div class="accordion-card-one accordion" id="accordionExample">
                        <div class="accordion-item">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">First Name</label>
                                    <input type="text" name="first_name" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" name="last_name" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Phone Number</label>
                                    <input type="text" name="phone_number" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Role</label>
                                    <select name="role" id="role" class="form-control">
                                        <option value="" selected disabled>Select Role</option>
                                        @foreach ($roles as $key => $role)
                                            @if ($role->id !== 1)
                                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Store</label>
                                    <select name="store_id" id="store_id" class="form-control">
                                        <option value="" selected disabled>Select Store</option>
                                        @foreach ($stores as $key => $store)
                                            <option value="{{ $store->id }}">{{ $store->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="btn-add mb-4">
                            <button type="submit" class="btn btn-submit">Save User</button>
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
                    first_name: "required",
                    last_name: "required",
                    email: "required",
                    phone_number: "required",
                    role: "required",
                    store_id: "required"
                },
                messages: {
                    first_name: "Please enter the first name",
                    last_name: "Please enter the last name",
                    email: "Please enter the email",
                    phone_number: "Please enter phone number",
                    role: "Please select role",
                    store_id: "Please select store"
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
