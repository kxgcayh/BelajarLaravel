{{-- Left Sidebar Start --}}
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        {{-- Divider --}}
        <div id="sidebar-menu">
            <ul>
                <li class="text-muted menu-title">
                    {{__('Admin')}}
                </li>
                <li class="has_sub">
                    <a href="{{ route('home')}}">
                        <i class="ti-home"></i>
                        <span>
                            {{__('Home')}}
                        </span>
                    </a>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect">
                        <i class="ti-package"></i>
                        <span>
                            {{__('Account Control')}}
                        </span>
                        <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li>
                            <a href="{{ route('roles.index') }}">
                                {{__('Management Roles')}}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('permissions.index') }}">
                                {{__('Management Permission')}}
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
{{-- Left Sidebar End --}}
