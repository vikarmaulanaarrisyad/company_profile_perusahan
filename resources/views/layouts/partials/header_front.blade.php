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
                <a class="col_1 navbar-brand" href="index.html"><i class="fa fa-truck col_1"></i><span
                        class="col_4">Deli</span>Comp</a>
            </div>
            <!-- Brand and toggle get grouped for better mobile display -->
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a class="m_tag active_tab" href="index.html">Home</a></li>
                    <li><a class="m_tag" href="about.html">About</a></li>
                    <li class="dropdown">
                        <a class="m_tag" href="#" data-toggle="dropdown" role="button"
                            aria-expanded="false">Blog<span class="caret"></span></a>
                        <ul class="dropdown-menu drop_3" role="menu">
                            <li><a href="blog.html">Blog</a></li>
                            <li><a class="border_none" href="blog_detail.html">Blog Detail</a></li>
                        </ul>
                    </li>
                    <li><a class="m_tag" href="services.html">Services</a></li>
                    <li><a class="m_tag" href="gallery.html">Gallery</a></li>
                    <li><a class="m_tag" href="pricing.html">Pricing</a></li>
                    <li><a class="m_tag" href="contact.html">Contact</a></li>
                    <li class="dropdown">
                        <a class="m_tag" href="#" data-toggle="dropdown" role="button"
                            aria-expanded="false">Pages<span class="caret"></span></a>
                        <ul class="dropdown-menu drop_3" role="menu">
                            <li><a href="register.html">Register</a></li>
                            <li><a class="border_none" href="login.html">Login</a></li>
                        </ul>
                    </li>
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
                        <a class="m_tag button mgt" href="{{ route('dashboard') }}">
                            Dashboard
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