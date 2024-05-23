<div class="sidebar second" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul class="sidebar-vertical">

                <li class="menu-title"><span>Inicio</span></li>
                <li>
                    <a class="{{ @request()->routeIs('dashboard') ? 'active' : ' ' }}" href="{{ route('dashboard') }}"
                        onclick=" loading_show();"><i class="fe fe-home"></i> <span>
                            @lang('Dashboard')</span></a>
                </li>
                @canany(['chatify', 'tickets'])
                    <li class="submenu">
                        <a href="#"><i class="fe fe-grid"></i> <span> @lang('Applications')</span> <span
                                class="menu-arrow"></span></a>
                        <ul>
                            @can('chatify')
                                <li><a href="{{ route('chatify') }}"
                                        class="nav-link {{ @request()->routeIs('chatify') ? 'active' : ' ' }}"
                                        onclick=" loading_show();">@lang('Chat')</a>
                                </li>
                            @endcan
                            @can('tickets')
                                <li><a href="{{ route('tickets', '5') }}"
                                        class="nav-link {{ @request()->routeIs('tickets') || @request()->routeIs('tickets.edit') ? 'active' : ' ' }}"
                                        onclick=" loading_show();">@lang('Ticket')</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcanany
                @canany(['users', 'permissions'])
                    <li class="menu-title"><span>@lang('User Management')</span></li>
                    @canany(['users'])
                        <li class="submenu">
                            <a href="#"><i class="fe fe-users"></i> <span> @lang('users')</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                @can('users')
                                    <li>
                                        <a class="{{ @request()->routeIs('users') ? 'active' : ' ' }}" href="{{ route('users') }}"
                                            onclick=" loading_show();">
                                            @lang('Users')
                                        </a>
                                    </li>
                                @endcan

                            </ul>
                        </li>
                    @endcanany
                    @can('permissions')
                        <li>
                            <a class="{{ @request()->routeIs('permissions') || @request()->routeIs('permissions.create') ? 'active' : ' ' }}"
                                href="{{ route('permissions') }}" onclick=" loading_show();"><i class="fe fe-lock"></i> <span>
                                    @lang('Roles & Permission')</span>
                            </a>
                        </li>
                    @endcan
                @endcanany
                @canany(['customers'])
                    <li class="menu-title"><span>@lang('Customer')</span></li>
                    <li>
                        <a class="{{ @request()->routeIs('customers') || @request()->routeIs('customers.create') ? 'active' : ' ' }}"
                            href="{{ route('customers') }}" onclick=" loading_show();"><i class="fe fe-users"></i> <span>
                                @lang('Customers')</span>
                        </a>
                    </li>
                @endcanany
                @canany(['products'])
                    <li class="menu-title"><span>@lang('Inventory')</span></li>
                    <li>
                        <a class="{{ @request()->routeIs('products') ? 'active' : ' ' }}" href="{{ route('products') }}"
                            onclick=" loading_show();"><i class="fe fe-package"></i> <span>
                                @lang('Products / Services')</span>
                        </a>
                    </li>
                @endcanany
                @can('settings')
                    <li class="menu-title"><span>@lang('Settings')</span></li>
                    <li>
                        <a class="{{ @request()->routeIs('settings') ? 'active' : ' ' }}" href="{{ route('settings') }}"
                            onclick=" loading_show();"><i class="fe fe-settings"></i>
                            <span>@lang('Setting')</span></a>
                    </li>
                @endcan
            </ul>
        </div>
    </div>
</div>
