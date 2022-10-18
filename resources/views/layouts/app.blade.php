@include('partials.header')
            <!-- /.navbar-header -->

            @include('partials.top_links')
            <!-- /.navbar-top-links -->

            @include('partials.aside')
            <!-- /.navbar-static-side -->
        </nav>
        <!--/ Suppose to be in specific View -->
        <div id="page-wrapper">
            <div class="row">
                <!-- /.col-lg-12 -->
                @yield('content')
            </div>

        </div>
        <!-- /#page-wrapper -->
@include('partials.footer')