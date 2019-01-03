@php
$r = \Route::current()->getAction();
$route = (isset($r['as'])) ? $r['as'] : '';
@endphp

<li class="nav-item mT-30">
    <a class="sidebar-link {{ starts_with($route, 'dash') ? 'active' : '' }}" href="{{ route('dash') }}">
        <span class="icon-holder">
            <i class="c-blue-500 ti-home"></i>
        </span>
        <span class="title">Dashboard</span>
    </a>
</li>


<!--Module Products-->
@can('category.index')
<li class="nav-item dropdown ">
    <a class="dropdown-toggle" href="javascript:void(0);">
        <span class="icon-holder">
            <i class="c-teal-500 ti-truck"></i> 
        </span>
        <span class="title">Bodega</span> 
        <span class="arrow">
            <i class="ti-angle-right"></i>
        </span>
    </a>
    <ul class="dropdown-menu" >
        <li class="nav-item dropdown">
            <a href="javascript:void(0);">
                <span>Producto</span>
            </a>
        </li>

        <li class="nav-item dropdown">
            <a href="javascript:void(0);">
                <span>Extras</span> 
                <span class="arrow"><i class="ti-angle-right"></i></span>
            </a>
            <ul class="dropdown-menu">
                @can('category.index') <li><a class="sidebar-link {{ starts_with($route, 'category') ? 'active' : '' }}" href="{{ route('category.index') }}" >Categorías</a></li> @endcan
                <li><a href="javascript:void(0);">Sub-Categorías</a></li>
                <li><a href="javascript:void(0);">Marcas</a></li>
            </ul>
        </li>

        
    </ul>
</li>
@endcan

<!--Module Users-->

<li class="nav-item dropdown {{ starts_with($route, 'users') ? 'open' : '' }} {{ starts_with($route, 'roles') ? 'open' : '' }} {{ starts_with($route, 'permissions') ? 'open' : '' }}">
    <a class="dropdown-toggle" href="javascript:void(0);">
        <span class="icon-holder">
            <i class="c-teal-500 ti-user"></i> 
        </span>
        <span class="title">Users</span> 
        <span class="arrow">
            <i class="ti-angle-right"></i>
        </span>
    </a>
    <ul class="dropdown-menu">
        @can('users.index')
        <li class="nav-item dropdown">
            <a class="sidebar-link {{ starts_with($route, 'users') ? 'active' : '' }}" href="{{ route('users.index') }}">
                <span>Users</span>
            </a>
        </li>
        @endcan
        @can('roles.index')
        <li class="nav-item dropdown">
            <a class="sidebar-link {{ starts_with($route, 'roles') ? 'active' : '' }}" href="{{ route('roles.index') }}">
                <span>Roles</span>
            </a>
        </li>
        @endcan
        @can('permissions.index')
        <li class="nav-item dropdown">
            <a class="sidebar-link {{ starts_with($route, 'permissions') ? 'active' : '' }}" href="{{ route('permissions.index') }}">
                <span>Permisos</span>
            </a>
        </li>
        @endcan

    </ul>
</li>
