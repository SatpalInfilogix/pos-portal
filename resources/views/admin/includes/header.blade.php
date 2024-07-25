<div class="header">

    <div class="header-left active">
        <a href="{{ route('backend-dashboard') }}" class="logo logo-normal">
            <img src="{{ asset('assets/img/logo.png') }}" alt>
        </a>
        <a href="{{ route('backend-dashboard') }}" class="logo logo-white">
            <img src="{{ asset('assets/img/logo-white.png') }}" alt>
        </a>
        <a href="{{ route('backend-dashboard') }}" class="logo-small">
            <img src="{{ asset('assets/img/logo-small.png') }}" alt>
        </a>
        <a id="toggle_btn" href="javascript:void(0);">
            <i data-feather="chevrons-left" class="feather-16"></i>
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
                        <span class="user-name">{{ auth()->user()->name }}</span>
                        <span class="user-role">{{ auth()->user()->getRoleNames()->first() }}</span>
                    </span>
                </span>
            </a>
            <div class="dropdown-menu menu-drop-user">
                <div class="profilename">
                    <div class="profileset">
                        <span class="user-img">
                            <img src="{{ $profile_picture }}" alt="">
                            <span class="status online"></span>
                        </span>
                        <div class="profilesets">
                            <h6>{{ auth()->user()->name }}</h6>
                            <h5>{{ auth()->user()->getRoleNames()->first() }}</h5>
                        </div>
                    </div>
                    <hr class="m-0">
                    <a class="dropdown-item" href="{{ route('profile.index') }}"> 
                        <i class="me-2" data-feather="user"></i>
                        My Profile
                    </a>
                    <a class="dropdown-item" href="#">
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
