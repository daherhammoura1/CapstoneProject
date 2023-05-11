<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light bg-info navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
                <li class="nav-item">
                    <a class="navbar-brand" href="#">
                        <img class="brand-logo" alt="modern admin logo" style="border-radius: 20%" src="{{ asset('app-assets\images\logo\careconnectlog.jpg') }}">
                        <h3 class="brand-text">Care Connect
                        </h3>
                    </a>
                </li>
                <li class="nav-item d-md-none">
                    <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a>
                </li>
            </ul>
        </div>
        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>


                </ul>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            <span class="mr-1">Hello,
                                <span class="user-name text-bold-700">{{Auth::user()->name}}</span>
                            </span>
                            <span class="avatar avatar-online">
                                <img src="{{ asset('app-assets\images\logo\careconnectlog.jpg') }}" style="border-radius: 40%" alt="avatar"><i></i></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#"><i class="ft-user"></i> Edit Profile</a>
                            <a class="dropdown-item" href="#"><i class="ft-mail"></i> My Inbox</a>
                            <a class="dropdown-item" href="#"><i class="ft-check-square"></i> Task</a>
                            <a class="dropdown-item" href="#"><i class="ft-message-square"></i> Chats</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="{{route('logout')}}"><i class="ft-power"></i> Logout</a>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            @if(Auth::user()->role->name=='ADMIN')
            <li id="dashboard" class=" nav-item"><a href="{{route('dashboard')}}"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main">Dashboard</span></a></li>
            <li id="users" class=" nav-item"><a href="{{route('user.index')}}"><i class="la la-user"></i><span class="menu-title" data-i18n="nav.dash.main">Users</span></a></li>
            <li id="policyType" class=" nav-item"><a href="{{route('policy_type.index')}}"><i class="fa fa-certificate"></i><span class="menu-title" data-i18n="nav.dash.main">Policy
                        Types</span></a></li>
            <li id="policyManagement" class=" nav-item"><a href="{{route('policies.index')}}"><i class="fa fa-tasks"></i><span class="menu-title" data-i18n="nav.dash.main">Policy
                        Management</span></a></li>
            <li id="role" class=" nav-item"><a href="{{route('roles.index')}}"><i class=" fa fa-id-badge"></i><span class="menu-title" data-i18n="nav.dash.main">Roles</span></a></li>
            <li id="policyStatus" class=" nav-item"><a href="{{route('policy_status.index')}}"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main">Policy
                        Status</span></a></li>
            <li id="claimsStatus" class=" nav-item"><a href="{{route('claim_status.index')}}"><i class="fa fa-signal"></i><span class="menu-title" data-i18n="nav.dash.main">Claims
                        Status</span></a></li>

            <li id="chat" class=" nav-item"><a href="{{route('chat')}}"><i class="fa fa-weixin"></i><span class="menu-title" data-i18n="nav.dash.main">Chat
                    </span></a></li>
            <li id="claims" class=" nav-item"><a href="{{route('claim.index')}}"><i class="fa fa-certificate"></i><span class="menu-title" data-i18n="nav.dash.main">Claims
                    </span></a></li>
            <li id="End-of-day" class=" nav-item"><a href="{{route('end-of-Day')}}"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main">End of Day
                    </span></a></li>
            @elseif(Auth::user()->role->name=='HOSPITAL')
            <li id="Dashboard" class=" nav-item"><a href="{{route('HospitalDashboard')}}"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main">My Dashboard
                    </span></a></li>
            <li id="claims-hosp" class=" nav-item"><a href="{{route('hospital-claim-list')}}"><i class="fa fa-certificate"></i><span class="menu-title" data-i18n="nav.dash.main">Claims
                    </span></a></li>
            <li id="Hospital-profile" class=" nav-item"><a href="{{route('hospital-profile')}}"><i class="la la-user"></i><span class="menu-title" data-i18n="nav.dash.main">My Profile
                    </span></a></li>
            <li id="chat" class=" nav-item"><a href="{{route('chat')}}"><i class="fa fa-weixin"></i><span class="menu-title" data-i18n="nav.dash.main">Chat
                    </span></a></li>



            @elseif(Auth::user()->role->name=='USER')
            <li id="Dashboard" class=" nav-item"><a href="{{route('ClientDashboard')}}"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main">My Dashboard
                    </span></a></li>
            <li id="User_info" class=" nav-item"><a href="{{route('user_profile.index')}}"><i class="la la-user"></i><span class="menu-title" data-i18n="nav.dash.main">My Profile
                    </span></a></li>
            <li id="Cilent_Policies" class=" nav-item"><a href="{{route('policies.index')}}"><i class="fa fa-certificate"></i><span class="menu-title" data-i18n="nav.dash.main">My Policies
                    </span></a></li>

            <li id="chat" class=" nav-item"><a href="{{route('chat')}}"><i class="fa fa-weixin"></i><span class="menu-title" data-i18n="nav.dash.main">Chat
                    </span></a></li>
            @endif
            <li class=" nav-item"><a href="{{route('logout')}}"><i class="la la-sign-out"></i><span class="menu-title" data-i18n="nav.dash.main">Logout</span></a></li>

        </ul>

    </div>
</div>