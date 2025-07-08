<!DOCTYPE html>
<html lang="tr">
@include('admin.layouts.head')
<body data-spy="scroll" data-target="#navSection" data-offset="100">
<!-- BEGIN LOADER -->
<div id="load_screen">
    <div class="loader">
        <div class="loader-content">
            <div class="spinner-grow align-self-center"></div>
        </div>
    </div>
</div>
<!--  END LOADER -->
@include('admin.layouts.header')
@include('admin.layouts.breadcumb')
<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">
    <div class="overlay"></div>
    <div class="search-overlay"></div>
    @include('admin.layouts.menu')
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        @yield('content')
        @include('admin.layouts.footer')
    </div>
    <!--  END CONTENT AREA  -->
</div>
<!-- END MAIN CONTAINER -->
@include('admin.layouts.script')
</body>
</html>
