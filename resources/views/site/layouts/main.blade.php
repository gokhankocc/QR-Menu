<!doctype html>
<html class="no-js" lang="tr">
@include('site.layouts.head')
<body>
@yield('css')
@include('site.layouts.header')
@yield('content')
@include('site.layouts.footer')
@include('site.layouts.script')
@yield('js')
</body>
</html>
