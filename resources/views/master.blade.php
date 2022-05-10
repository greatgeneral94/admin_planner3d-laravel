<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

@include('layouts.head')
<!-- END: Head-->

<!-- BEGIN: Body-->

@php
     if (Auth::check() && Auth::user()->role=="0" || Auth::user()->role=="1") {$bodycolor = "";}
     elseif(Auth::check() && Auth::user()->role=="2") {$bodycolor = "dark-layout";}
     elseif(Auth::check() && Auth::user()->role=="3") {$bodycolor = "semi-dark-layout";}
@endphp
<body class="vertical-layout vertical-menu-modern 2-columns {{$bodycolor}} @yield('type') navbar-sticky footer-static  " data-open="click"
    data-menu="vertical-menu-modern" data-col="2-columns">


    @include('layouts.header')

    <!-- BEGIN: Main Menu-->
    @if (Auth::check() && Auth::user()->role=="0" || Auth::user()->role=="1")
    @include('layouts.adminsidebar')
    @elseif(Auth::check() && Auth::user()->role=="2" )
    @include('layouts.b1sidebar')
    @elseif(Auth::check() && Auth::user()->role=="3")
    @include('layouts.c1sidebar')
        
    @endif
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
@yield('content')   
    <!-- END: Content-->

    <!-- demo chat-->
  
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
 @include('layouts.footer')
 <!-- END: Footer-->
 
 
 @include('layouts.scripts')
 

</body>
<!-- END: Body-->

</html>
