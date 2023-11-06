<!DOCTYPE html>
<html lang="en">

@include('includes.dashboard.head')

<body class="sb-nav-fixed">
    @include('includes.dashboard.navbar')
    <div id="layoutSidenav">
        @include('includes.dashboard.slider')
        <div id="layoutSidenav_content">
            @yield('content')
            @include('includes.dashboard.footer')
        </div>
    </div>
    @include('includes.dashboard.script')
</body>

</html>
