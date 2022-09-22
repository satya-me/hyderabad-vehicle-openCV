<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>international institute of information technology</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('/main/public') }}/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ asset('/main/public') }}/vendors/base/vendor.bundle.base.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('/main/public') }}/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('/main/public') }}/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('/main/public') }}/images/favicon.png" />

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <!-- endinject -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
        integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container-scroller">

        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex justify-content-center">
                <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
                    <a class="navbar-brand brand-logo" href="index.html"><img
                            src="{{ asset('/main/public') }}/images/International_Institute_of_Information_Technology,_Hyderabad_logo.png"
                            alt="" style="height:auto"></a>
                    <a class="navbar-brand brand-logo-mini" href="index.html"><img
                            src="{{ asset('/main/public') }}/images/International_Institute_of_Information_Technology,_Hyderabad_logo.png"
                            alt=""></a>

                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-toggle="minimize">
                        <span class="mdi mdi-sort-variant"></span>
                    </button>
                </div>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">

                <ul class="navbar-nav navbar-nav-right">

                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                            id="profileDropdown">
                            <img src="{{ asset('/main/public') }}/images/faces/face5.jpg" alt="profile" />
                            <span class="nav-profile-name">Account</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
                            <a class="dropdown-item">
                                <i class="mdi mdi-settings text-primary"></i>
                                Settings
                            </a>
                            @if (Route::has('login'))
                                @auth
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                @else
                                    <a href="{{ route('login') }}"
                                        class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                                    {{-- @if (Route::has('register'))
                                        <a href="{{ route('register') }}"
                                            class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                                    @endif --}}
                                @endauth
                            @endif
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">
                            <i class="mdi mdi-home menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('report') }}">
                            <i class="mdi mdi-circle-outline menu-icon"></i>
                            <span class="menu-title">Report</span>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('camera') }}">
                            <i class="mdi mdi-chart-pie menu-icon"></i>
                            <span class="menu-title">Camera Setting</span>
                        </a>
                    </li>

                </ul>
            </nav>
            <!-- partial -->
            @yield('content')
            <!-- page-body-wrapper ends -->
        </div>
    </div>
    <!-- container-scroller -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <!-- plugins:js -->
    <script src="{{ asset('/main/public') }}/vendors/base/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <script src="{{ asset('/main/public') }}/vendors/chart.js/Chart.min.js"></script>
    <script src="{{ asset('/main/public') }}/vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="{{ asset('/main/public') }}/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{ asset('/main/public') }}/js/off-canvas.js"></script>
    <script src="{{ asset('/main/public') }}/js/hoverable-collapse.js"></script>
    <script src="{{ asset('/main/public') }}/js/template.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('/main/public') }}/js/dashboard.js"></script>
    <script src="{{ asset('/main/public') }}/js/data-table.js"></script>
    <script src="{{ asset('/main/public') }}/js/jquery.dataTables.js"></script>
    <script src="{{ asset('/main/public') }}/js/dataTables.bootstrap4.js"></script>
    <!-- End custom js for this page-->

    <script src="{{ asset('/main/public') }}/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="https://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
    <script src="{{ asset('/main/public') }}/js/custom.js" type="text/javascript"></script>

    <!-- End custom js for this page-->

    <script src="{{ asset('/main/public') }}/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="{{ asset('/main/public') }}/js/filter.js" type="text/javascript"></script>
    <script src="{{ asset('/main/public') }}/js/tablefillter.js" type="text/javascript"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script>
        $(function() {
            $('input[name="datetimes"]').daterangepicker({
                timePicker: true,
                startDate: moment().startOf('hour'),
                endDate: moment().startOf('hour').add(32, 'hour'),
                locale: {
                    format: 'M/DD hh:mm A'
                }
            });
        });
    </script>
    <script src="{{ asset('/main/public') }}/js/download.js"></script>

</body>

</html>
