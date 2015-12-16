{{-- Navigation --}}
<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container-fluid">
        {{-- Brand and toggle get grouped for better mobile display --}}
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#navbar-main">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">{{ config('blog.name') }}</a>
        </div>

        {{-- Collect the nav links, forms, and other content for toggling --}}
        <div class="collapse navbar-collapse" id="navbar-main">
            {{--<ul class="nav navbar-nav">--}}
                {{--<li>--}}
                    {{--<a href="/">Home</a>--}}
                {{--</li>--}}
            {{--</ul>--}}
            {{--<ul class="nav navbar-nav navbar-right">--}}
                {{--<li>--}}
                    {{--<a href="/contact">Contact</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="/auth/login">login</a>--}}
                {{--</li>--}}
            {{--</ul>--}}
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
                    <li>
                        <a href="/contact">Contact Us</a>
                    </li>
                    <li >
                        <a href="#">
                            <span class="fa fa-user fa-lg" style="color: #0073bb"></span>&nbsp;&nbsp;
                            {{ Auth::user()->name }}
                        </a>
                    </li>
                    <li><a href="/auth/logout">Logout</a></li>

                @endif
            </ul>
        </div>
    </div>
</nav>