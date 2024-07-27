<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('admins/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admins/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('admins/vendors/jvectormap/jquery-jvectormap.css') }}">
    <link rel="stylesheet" href="{{ asset('admins/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admins/vendors/owl-carousel-2/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admins/vendors/owl-carousel-2/owl.theme.default.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('admins/css/style.css') }}">
    <!-- End layout styles -->
  </head>
  <body>
    
    <div class="container-scroller">
      @include('layouts.inc.admin.sidebar')
      <div class="container-fluid page-body-wrapper">
        @include('layouts.inc.admin.navbar')
        <div class="main-panel">
          <div class="content-wrapper">
            @yield('content')
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © VIET FURNITURE 2022</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Furniture for your dream</span>
            </div>
        </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('admins/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('admins/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admins/vendors/progressbar.js/progressbar.min.js') }}"></script>
    <script src="{{ asset('admins/vendors/jvectormap/jquery-jvectormap.min.js') }}"></script>
    <script src="{{ asset('admins/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('admins/vendors/owl-carousel-2/owl.carousel.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('admins/js/off-canvas.js') }}"></script>
    <script src="{{ asset('admins/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('admins/js/misc.js') }}"></script>
    <script src="{{ asset('admins/js/settings.js') }}"></script>
    <script src="{{ asset('admins/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('admins/js/dashboard.js') }}"></script>
    <!-- End custom js for this page -->
  </body>
</html>