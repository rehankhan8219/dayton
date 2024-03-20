<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li {{request()->routeIs(homeRoute()) ? 'mm-active' : ''}}>
                    <a href="{{route(homeRoute())}}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">@lang('Dashboard')</span>
                    </a>
                </li>

                @if ($logged_in_user->hasAllAccess())
                    <li class="{{request()->routeIs('admin.user.*') ? 'mm-active' : ''}}">
                        <a href="{{route('admin.user.index')}}" class="waves-effect">
                            <i class="bx bx-user-circle"></i>
                            <span key="t-admin-users">@lang('Admin Users')</span>
                        </a>
                    </li>
                @endif
                {{-- @if ($logged_in_user->hasAllAccess())
                    <li class="{{request()->routeIs('admin.role.*') ? 'mm-active' : ''}}">
                        <a href="{{route('admin.role.index')}}" class="waves-effect">
                            <i class="bx bx-lock"></i>
                            <span key="t-roles">@lang('Roles & Permissions')</span>
                        </a>
                    </li>    
                @endif --}}

                @if ($logged_in_user->hasAllAccess() || $logged_in_user->can('admin.access.blog'))
                    <li class="{{request()->routeIs('admin.blog.*') ? 'mm-active' : ''}}">
                        <a href="{{route('admin.blog.index')}}" class="waves-effect">
                            <i class="bx bx-notepad"></i>
                            <span key="t-roles">@lang('Blog')</span>
                        </a>
                    </li>
                @endif
                
                @if ($logged_in_user->hasAllAccess() || $logged_in_user->can('admin.access.risk_calculator'))
                    <li class="{{request()->routeIs('admin.riskcalculator.*') ? 'mm-active' : ''}}">
                        <a href="{{route('admin.riskcalculator.index')}}" class="waves-effect">
                            <i class="bx bx-calculator"></i>
                            <span key="t-roles">@lang('Risk Calculator')</span>
                        </a>
                    </li>
                @endif
                
                @if (
                    $logged_in_user->hasAllAccess() ||
                    (
                        $logged_in_user->can('admin.access.user.list') ||
                        $logged_in_user->can('admin.access.user.deactivate') ||
                        $logged_in_user->can('admin.access.user.reactivate') ||
                        $logged_in_user->can('admin.access.user.clear-session') ||
                        $logged_in_user->can('admin.access.user.impersonate') ||
                        $logged_in_user->can('admin.access.user.change-password')
                    )
                )
                    <li class="{{request()->routeIs('admin.member.*') ? 'mm-active' : ''}}">
                        <a href="{{route('admin.member.index')}}" class="waves-effect">
                            <i class="bx bx-user-circle"></i>
                            <span key="t-admin-users">@lang('Database')</span>
                        </a>
                    </li>
                @endif
                @if ($logged_in_user->hasAllAccess() || $logged_in_user->can('admin.access.bill'))
                    <li class="{{request()->routeIs('admin.bill.*') ? 'mm-active' : ''}}">
                        <a href="{{route('admin.bill.index')}}" class="waves-effect">
                            <i class="bx bx-file"></i>
                            <span key="t-roles">@lang('Bill')</span>
                        </a>
                    </li>
                @endif
                @if ($logged_in_user->hasAllAccess() || $logged_in_user->can('admin.access.commission'))
                    <li class="{{request()->routeIs('admin.commission.*') ? 'mm-active' : ''}}">
                        <a href="{{route('admin.commission.index')}}" class="waves-effect">
                            <i class="bx bx-money"></i>
                            <span key="t-roles">@lang('Commission')</span>
                        </a>
                    </li>
                @endif
                @if ($logged_in_user->hasAllAccess() || $logged_in_user->can('admin.access.growtree'))
                    <li class="{{request()->routeIs('admin.growtree.*') ? 'mm-active' : ''}}">
                        <a href="{{route('admin.growtree.index')}}" class="waves-effect">
                            <i class="bx bx-git-merge"></i>
                            <span key="t-roles">@lang('Grow Tree')</span>
                        </a>
                    </li>
                @endif

                {{-- @if ($logged_in_user->hasAllAccess())
                    <li class="menu-title" key='t-settings'>@lang('Settings')</li>
                    <li class="{{request()->routeIs('admin.settings.*') ? 'mm-active' : ''}}">
                        <a href="{{route('admin.settings.index')}}" class="waves-effect">
                            <i class="fa fa-cog"></i>
                            <span key="t-roles">@lang('Settings')</span>
                        </a>
                    </li>
                @endif --}}
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>