@extends('admin.layouts.app')

@section('content')
    <div class="content">
        <div class="content settings-content">
            <div class="page-header settings-pg-header">
                <div class="add-item d-flex">
                    <div class="page-title">
                        <h4>Settings</h4>
                        <h6>Manage your settings on portal</h6>
                    </div>
                </div>
                <ul class="table-top-head">
                    <li>
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Refresh"><i
                                data-feather="rotate-ccw" class="feather-rotate-ccw"></i></a>
                    </li>
                    <li>
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Collapse"
                            id="collapse-header"><i data-feather="chevron-up"
                                class="feather-chevron-up"></i></a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="settings-wrapper d-flex">
                        <div class="sidebars settings-sidebar " id="sidebar2">
                            <div class="sidebar-inner slimscroll">
                                <div id="sidebar-menu5" class="sidebar-menu">
                                    <ul>
                                        <li class="submenu-open">
                                            <ul>
                                                <li class="submenu">
                                                    <a href="javascript:void(0);" class="active subdrop"><i
                                                            data-feather="settings"></i><span>General
                                                            Settings</span><span class="menu-arrow"></span></a>
                                                    <ul>
                                                        <li><a href="{{ route('admin.settings') }}"
                                                                class="active">Profile</a></li>
                                                        {{-- <li><a href="security-settings.html">Security</a></li> --}}
                                                        {{-- <li><a href="notification.html">Notifications</a></li> --}}
                                                        {{-- <li><a href="connected-apps.html">Connected Apps</a></li> --}}
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="settings-page-wrap">
                            <form action="{{ route('admin.settings.general-setting') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="setting-title">
                                    <h4>General Settings</h4>
                                </div>
                                <div class="card-title-head">
                                    <h6><span><i data-feather="zap"
                                                class="feather-chevron-up"></i></span>Information</h6>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Business Name</label>
                                            <input type="text" class="form-control" name="buisness_name" value="{{ old('buisness_name', App\Helpers\SettingHelper::setting('buisness_name')) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="text" class="form-control" name="buisness_email" value="{{ old('buisness_email', App\Helpers\SettingHelper::setting('buisness_email')) }}">
                                        </div>
                                    </div>
                                   
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Contact</label>
                                            <input type="text" class="form-control" name="buisness_contact" value="{{ old('buisness_contact', App\Helpers\SettingHelper::setting('buisness_contact')) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Logo</label>
                                            <input type="file" name="logo" id="img-product" class="form-control">
                                            @if (App\Helpers\SettingHelper::setting('logo'))
                                                <img src="{{ asset(App\Helpers\SettingHelper::setting('logo')) }}"
                                                    id="preview-Img" class="img-preview" style="width:50px;">
                                            @else
                                                <img src="" id="preview-Img" style="width:50px;" name="image" hidden>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="text-end settings-bottom-btn">
                                    <button type="submit" class="btn btn-submit">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

