<header class="app-header navbar">
    <button class="navbar-toggler mobile-sidebar-toggler d-lg-none" type="button">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="/admin"></a>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button">
        <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="nav navbar-nav d-md-down-none mr-auto">
        {{\Illuminate\Support\Facades\Auth::user()->name}}-Administration Panel
    </ul>
    <ul class="nav navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <img src="" class="img-avatar" alt=" {{\Illuminate\Support\Facades\Auth::user()->name}}">
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="#">Welcome {!! Auth::user()->name !!}</a>
                <a class="dropdown-item" href="{{route('profile.index')}}"><i class="fa fa-user"></i> Profile</a>
                <a class="dropdown-item" href="{{route('profile.change_password')}}"><i class="fa fa-wrench"></i> Change Password</a>
                <a href="{!! url('/logout') !!}" class="dropdown-item btn btn-default btn-flat"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-lock"></i> Logout
                </a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </li>

    </ul>
</header>
