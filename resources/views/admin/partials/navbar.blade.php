<ul class="nav navbar-nav">
    <li><a href="/">Blog Home</a></li>
    @if (Auth::check())
        <li @if (Request::is('admin/post*')) class="active" @endif>
            <a href="/admin/post">Posts</a>
        </li>
        <li @if (Request::is('admin/tag*')) class="active" @endif>
            <a href="/admin/tag">Tags</a>
        </li>
        <li @if (Request::is('admin/upload*')) class="active" @endif>
            <a href="/admin/upload">Uploads</a>
        </li>
    @endif
</ul>

<ul class="nav navbar-nav navbar-right">
    @if (Auth::guest())
        <li><a href="/auth/login">Login</a></li>
        <li><a href="/auth/register">SignUp</a> </li>
    @else
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
               aria-expanded="false">
                <span class="fa fa-user fa-lg" style="color: #0073bb"></span>&nbsp;&nbsp;
                {{ Auth::user()->name }}
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="/auth/logout">Logout</a></li>
                <li><a href="#">your profile</a> </li>
                <li><a href="/admin/post">your articles</a></li>
                <li><a href="/admin/tag">your tags</a></li>
                <li><a href="/admin/upload">your uploads</a> </li>
            </ul>
        </li>
    @endif
</ul>
