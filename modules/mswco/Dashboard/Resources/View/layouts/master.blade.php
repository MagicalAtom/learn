@include('Dashboard::layouts.link')
<body>
@include('Dashboard::layouts.sidebar')
<div class="content">
@include('Dashboard::layouts.header')
@include('Dashboard::layouts.breadcrumb')
    <div class="main-content">
@yield('content')
</div>
</div>
</body>
@stack('js')
</html>
