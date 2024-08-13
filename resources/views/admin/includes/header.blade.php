<?php 
$logo_url= DB::table('settings')->where('key','logo')->first();
if($logo_url)
{
    $logo_url = $logo_url->value;}
else{
    $logo_url = '';
}
?>

<div class="header">
    <div class="header-left active">
        <a href="{{ route('backend-dashboard') }}" class="logo logo-normal">
            <img src="@if($logo_url) {{env('BASE_IMAGE_PATH')}}{{ $logo_url }} @else {{ asset('assets/img/logo.png') }} @endif" alt>
        </a>
        <a href="{{ route('backend-dashboard') }}" class="logo logo-white">
            <img src="@if($logo_url) {{env('BASE_IMAGE_PATH')}}{{ $logo_url }} @else {{ asset('assets/img/logo-white.png') }} @endif" alt>
        </a>
        <a href="{{ route('backend-dashboard') }}" class="logo-small">
            <img src="@if($logo_url) {{env('BASE_IMAGE_PATH')}}{{ $logo_url }} @else {{ asset('assets/img/logo-small.png') }} @endif" alt>
        </a>
    </div>

    <a id="mobile_btn" class="mobile_btn" href="#sidebar">
        <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </a>

    <ul class="nav user-menu">
        <li class="nav-item nav-searchinputs"></li>

        <a href="{{ route('pos-dashboard') }}" target="_blank"><strong>POS Dashboard</strong></a>

        @if (auth()->user()->profile_image)
            @php
                $profile_picture = asset(auth()->user()->profile_image);
            @endphp
        @else
            @php
                $profile_picture = asset('assets/img/default-user.png');
            @endphp
        @endif
        <li class="nav-item dropdown has-arrow main-drop">
            <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
                <span class="user-info">
                    <span class="user-letter">
                        <img src="{{ $profile_picture }}" alt="" class="img-fluid">
                    </span>
                    <span class="user-detail">
                        <span class="user-name">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</span>
                        <span class="user-role">{{ auth()->user()->getRoleNames()->first() }}</span>
                    </span>
                </span>
            </a>
            <div class="dropdown-menu menu-drop-user">
                <div class="profilename">
                    <a class="dropdown-item" href="{{ route('profile.index') }}"> 
                        <i class="me-2" data-feather="user"></i>
                        My Profile
                    </a>
                    <a class="dropdown-item" href="{{ route('admin.settings') }}">
                        <i class="me-2" data-feather="settings"></i>
                        Settings
                    </a>
                    <hr class="m-0">
                    <a class="dropdown-item logout pb-0" href="{{ route('logout') }}">
                        <img src="{{ asset('assets/img/icons/log-out.svg') }}" class="me-2" alt="">
                        Logout
                    </a>
                </div>
            </div>
        </li>
    </ul>


    <div class="dropdown mobile-user-menu">
        <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
            aria-expanded="false"><i class="fa fa-ellipsis-v"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="#">My Profile</a>
            <a class="dropdown-item" href="#">Settings</a>
            <a class="dropdown-item" href="#">Logout</a>
        </div>
    </div>

</div>
