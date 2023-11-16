<section id="header" class="clearfix cd-secondary-nav">
    <nav class="navbar nav_t">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="col_1 navbar-brand" href="{{ url('/') }}"><i class="fa fa-truck col_1"></i><span
                        class="col_4">Deli</span>Comp</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a class="m_tag {{ request()->is('/') ? 'active_tab' : '' }}"
                            href="{{ url('/') }}">Home</a></li>
                    <li><a class="m_tag" href="#about_h">About</a>
                    </li>
                    {{--  <li class="dropdown">
                        <a class="m_tag" href="#" data-toggle="dropdown" role="button"
                            aria-expanded="false">Blog<span class="caret"></span></a>
                        <ul class="dropdown-menu drop_3" role="menu">
                            <li><a href="blog.html">Blog</a></li>
                            <li><a class="border_none" href="blog_detail.html">Blog Detail</a></li>
                        </ul>
                    </li>  --}}
                    <li><a class="m_tag" href="#serv_h">Services</a></li>
                    <li><a class="m_tag" href="#gallery">Gallery</a></li>
                    {{--  <li><a class="m_tag" href="pricing.html">Pricing</a></li>  --}}
                    <li><a class="m_tag @if (request()->is('#blog_h')) active_tab @endif" href="#blog_h">Berita</a>
                    </li>
                    {{--  <li class="dropdown">
                        <a class="m_tag" href="#" data-toggle="dropdown" role="button"
                            aria-expanded="false">Pages<span class="caret"></span></a>
                        <ul class="dropdown-menu drop_3" role="menu">
                            <li><a href="register.html">Register</a></li>
                            <li><a class="border_none" href="{{ route('login') }}">Login</a></li>
                        </ul>
                    </li>  --}}
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown"><a class="m_tag" href="#" data-toggle="dropdown"><span
                                class="fa fa-search"></span></a>
                        <ul class="dropdown-menu drop_3">
                            <li>
                                <div class="row_1">
                                    <div class="col-sm-12">
                                        <form class="navbar-form navbar-left" role="search">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-primary" type="button">
                                                        Search</button>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="m_tag button mgt" href="{{ route('login') }}">
                            Login
                            <i class="fa fa-long-arrow-right"></i>
                        </a>
                    </li>
                </ul>

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

</section>
