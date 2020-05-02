<li class="nav-item nav-dropdown">
    <a class="nav-link " href="{!! route('dashboard') !!}"> <i class="icon-speedometer"></i>&nbsp;Dashboard</a>
</li>
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"> <i class="fa fa-feed"></i>&nbsp;Item Management</a>
    <ul class="nav-dropdown-items">

        <li class="nav-item">
            <a class="nav-link" href="{{ route('magazines.index') }}">Magazine</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('products.index') }}">Product</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('subscriptionTypes.index') }}">Subscription Types</a>
        </li>

    </ul>
</li>


<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-basket-loaded" ></i>&nbsp;Purchases</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('purchase_details.index') }}">Purchase Details</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.issued.magazine') }}">User-Issued Magazine</a>
        </li>
        {{--<li class="nav-item">--}}
        {{--<a class="nav-link" href="{{ route('carts.index') }}">Carts</a>--}}
        {{--</li>--}}
    </ul>
</li>

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"> <i class="icon-ban"></i>&nbsp;Advertisement </a>
    <ul class="nav-dropdown-items">

        <li class="nav-item">
            <a class="nav-link" href="{{ route('advertisementTypes.index') }}">Advertisement Types</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('advertisements.index') }}">Advertisements</a>
        </li>

    </ul>
</li>

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"> <i class="icon-user"></i> User Management</a>
    <ul class="nav-dropdown-items">

        <li class="nav-item">
            <a class="nav-link" href="{!! route('users.index') !!}">Users</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{!! route('roles.index') !!}">Roles</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{!! route('permissions.index') !!}">Permission</a>
        </li>

    </ul>
</li>
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"> <i class="icon-control-start"></i>&nbsp;Packages</a>
    <ul class="nav-dropdown-items">

        <li class="nav-item">
            <a class="nav-link" href="{!! route('packages.single') !!}">Single Packages</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{!! route('packages.index') !!}">Combo Packages</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{!! route('packages.subscription') !!}">Subscription Packages</a>
        </li>

    </ul>
</li>


<li class="nav-item {{ Request::is('mails*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('mails.create') }}">
        <i class="fa fa-envelope-o"></i>
        <span>Send Mail</span>
    </a>
</li>
<li class="nav-item nav-dropdown">
    <a class="nav-link " href="{!! route('notifications.index') !!}"> <i class="icon-bell"></i>&nbsp;Push Notification</a>
</li>
<li class="nav-item nav-dropdown">
    <a class="nav-link " href="{!! route('settings') !!}"> <i class="icon-settings"></i>&nbsp;Setting</a>
</li>
<li class="nav-item nav-dropdown">
    <a class="nav-link " href="{!! route('currencies.index') !!}"> <i class="fa fa-money"></i>&nbsp;Currency</a>
</li>
<li class="nav-item nav-dropdown">
    <a class="nav-link " href="{!! route('contactus.index') !!}"> <i class="icon-chart"></i>&nbsp;Messages</a>
</li>
<li class="nav-item nav-dropdown">
    <a class="nav-link " href="{!! route('manual.issue') !!}"> <i class="icon-chart"></i>&nbsp;Messages</a>
</li>

