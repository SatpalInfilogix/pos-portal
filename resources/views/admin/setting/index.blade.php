@extends('admin.layouts.app')

@section('content')
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4>Settings</h4>
                    <h6>Manage your settings on portal</h6>
                </div>
            </div>
        </div>


        <form action="{{ route('admin.settings.general-setting') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body add-product pb-0">
                    <div class="accordion-card-one accordion" id="accordionExample">
                        <div class="accordion-item">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Site Name</label>
                                        <input type="text" class="form-control" name="site_name"
                                            value="{{ old('title_name', App\Helpers\SettingHelper::setting('site_name')) }}">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="text" class="form-control" name="buisness_email"
                                            value="{{ old('buisness_email', App\Helpers\SettingHelper::setting('buisness_email')) }}">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Contact</label>
                                        <input type="text" class="form-control" name="buisness_contact"
                                            value="{{ old('buisness_contact', App\Helpers\SettingHelper::setting('buisness_contact')) }}">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Logo</label>
                                        <input type="file" name="logo" id="add-logo" class="form-control">
                                        @if (App\Helpers\SettingHelper::setting('logo'))
                                            <img src="{{ asset(App\Helpers\SettingHelper::setting('logo')) }}" id="preview-Img"
                                                class="img-preview" style="width:50px;">
                                        @else
                                            <img src="" id="preview-Img" style="width:50px;" name="image" hidden>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="btn-add mb-4">
                                <button type="submit" class="btn btn-submit">Save Changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
    <script>
        $('#add-logo').change(function() {
            var input = this;
            if (input.files && input.files[0]) {
                $('#preview-Img').prop('hidden', false);
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#preview-Img').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        });
    </script>
@endsection
