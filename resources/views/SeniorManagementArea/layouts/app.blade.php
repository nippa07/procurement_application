<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#2b2c5a">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#2b2c5a">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#2b2c5a">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Procurement System">
    <meta name="description" content="A Dashboard for Procurement System">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicons -->
    <title>@yield('pg-title','Senior Manager Area | Procurement System')</title>
    @include('SeniorManagementArea.Includes.css')
    @php
    $curr_url = Route::currentRouteName();
    @endphp
</head>

<body>
    <div id="loader">
        <h2 class="animate text-center">Procurement System</h2>
    </div>

    <!-- Sidenav -->
    @include('SeniorManagementArea.Includes.sidebar')
    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->
        @include('SeniorManagementArea.Includes.nav')
        <!-- Header -->
        <!-- Header -->
        @yield('header-content')
        <!-- Page content -->
        <div class="container-fluid cus-div mt--6">
            <div class="main-content-height">
                @yield('content')
            </div>
            <!-- Footer -->
            @include('SeniorManagementArea.Includes.footer')
        </div>
    </div>
    <!-- Logout Modal-->
    <div class="modal fade ml-6" id="logoutModal" tabindex="-1" data-backdrop="static" role="dialog"
        aria-labelledby="modal-notification" aria-hidden="true" style="margin-left: 25px;">
        <div class="modal-dialog modal-primary modal-dialog-centered modal-" role="document">
            <div class="modal-content bg-gradient-primary modal-sm ">

                <div class="modal-header">
                    <h6 class="modal-title " id="modal-title-notification">Logout</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="py-3 text-center">

                        <h4 class="heading mt-4">Are You Sure!</h4>
                        <p>
                            Do You Want To Logout Now ?
                        </p>
                    </div>

                </div>
                <div class="modal-footer">
                    {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="Submit" class="btn btn-white">Sure, Logout</button>
                    <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
                    </form> --}}
                </div>

            </div>
        </div>
    </div>


    <!-- Argon Scripts -->
    <!-- Core -->
    @include('SeniorManagementArea.Includes.js')
</body>

</html>
