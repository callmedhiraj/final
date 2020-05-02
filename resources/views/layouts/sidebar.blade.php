<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="/dashboard"><i class="icon-speedometer"></i> Dashboard</a>
            </li>
            <li class="nav-item {{ Request::is('categories*') ? 'active' : '' }}">
                <a class="nav-link" href="{!! route('categories.index') !!}">
                    <i class="nav-icon icon-cursor"></i>
                    <span>Category</span>
                </a>
            </li>

            <li class="nav-item {{ Request::is('subCategories*') ? 'active' : '' }}">
                <a class="nav-link" href="{!! route('subCategories.index') !!}">
                    <i class="nav-icon icon-cursor"></i>
                    <span>Sub Category</span>
                </a>
            </li>
            <li class="nav-item {{ Request::is('attributes*') ? 'active' : '' }}">
                <a class="nav-link" href="{!! route('attributes.index') !!}">
                    <i class="nav-icon icon-cursor"></i>
                    <span>Attribute</span>
                </a>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"> <i class="nav-icon icon-cursor"></i>All Product </a>
                <ul class="nav-dropdown-items">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products.index') }}">New Product</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products.approved') }}">Approved Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products.index') }}">Sold Product</a>
                    </li>

                </ul>
            </li>
            <li class="nav-item {{ Request::is('roles*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('roles.index') }}">
                    <i class="nav-icon icon-cursor"></i>
                    <span>Roles</span>
                </a>
            </li>
            <li class="nav-item {{ Request::is('permissions*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('permissions.index') }}">
                    <i class="nav-icon icon-cursor"></i>
                    <span>Permission</span>
                </a>
            </li>
            <li class="nav-item {{ Request::is('users*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('users.index') }}">
                    <i class="nav-icon icon-cursor"></i>
                    <span>Users</span></a></li>
            <li class="nav-item {{ Request::is('cities*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('cities.index') }}">
                    <i class="nav-icon icon-cursor"></i>
                    <span>Cities</span>
                </a>
            </li>
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
