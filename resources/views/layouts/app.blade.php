@include('layouts.common.head')
@yield('style.plugins')
<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid shopping">
@include('layouts.common.header')
<!-- BEGIN CONTAINER -->
<div class="page-container">
@include('layouts.common.sidebar')
<!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            @yield('content')
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
    @include('layouts.common.quick-sidebar')
</div>
<!-- END CONTAINER -->
@include('layouts.common.footer')
@include('layouts.common.script')
@yield('style.script')
</body>
</html>