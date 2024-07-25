@extends('admin.layouts.app')

@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Profile</h4>
                <h6>User Profile</h6>
            </div>
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <form action="{{ route('profile.update', Auth::id()) }}" method="post"enctype="multipart/form-data"
                    id='update-profile'>
                    @method('patch')
                    @csrf
                    <div class="profile-set">
                        <div class="profile-head">
                        </div>
                        <div class="profile-top">
                            <div class="profile-content">
                                <div class="profile-contentimg">
                                    @if ($user->profile_image)
                                        <img src="{{ asset($user->profile_image) }}" alt="img" id="blah">
                                    @else
                                        <img src="{{ asset('assets/img/default-user.png') }}" alt="img" id="blah">
                                    @endif
                                    <div class="profileupload">
                                        <input type="file" id="imgInp" name="profile_image">
                                        <a href="javascript:void(0);"><img
                                                src="{{ asset('assets/img/icons/edit-set.svg') }}" alt="img"></a>
                                    </div>
                                </div>
                                <div class="profile-contentname">
                                    <h2>{{ $user->first_name }} {{ $user->last_name }}</h2>
                                    <h4>Updates Your Photo and Personal Details.</h4>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 mb-3">
                            <label class="form-label">First Name</label>
                            <input type="text" class="form-control" name="first_name" value="{{ old('first_name', $user->first_name) }}">
                        </div>
                        <div class="col-lg-6 col-sm-12 mb-3">
                            <label class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="last_name" value="{{ old('last_name', $user->last_name) }}">
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="input-blocks">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <label class="form-label">Phone</label>
                            <input type="number" class="form-control" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}">
                        </div>
                        <div class="col-lg-6 col-sm-12 mb-3">
                            <label class="form-label">Password</label>
                            <div class="pass-group">
                                <input type="password" name="password" class="pass-input form-control"
                                    value="{{ old('password') }}">
                                <span class="fas toggle-password fa-eye-slash"></span>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-submit me-2">Submit</button>
                            {{-- <a href="javascript:void(0);" class="btn btn-cancel">Cancel</a> --}}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
    <script>
        $(function() {
            $("#update-profile").validate({
                rules: {
                    first_name: "required",
                    last_name: "required",
                    phone_number: "required",
                },
                messages: {
                    first_name: "Please enter your firstname",
                    last_name: "Please enter your lastname",
                    phone_number: "Please enter your phone number",
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
