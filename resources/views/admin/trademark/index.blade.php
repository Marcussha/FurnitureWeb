<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Producer List</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../admins/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../admins/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../admins/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="../admins/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../admins/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="../admins/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../admins/css/style.css">
    <!-- End layout styles -->
</head>
<body>
<div class="container-scroller">
    @include('layouts.inc.admin.sidebar')
    <div class="container-fluid page-body-wrapper">
      @include('layouts.inc.admin.navbar')
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="col-lg-20 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4>
                                Producer
                                <a href="{{ url('admin/trademark/create')}}" class="btn btn-primary float-right">Create new </a>
                            </h4>
                        </div>
                        @if (Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{Session::get('success')}}
                            </div>
                        @endif
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>IDs</th>
                                    <th>Trademark name</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($data as $row )
                                    <tr>
                                        <td>{{$row->trademarkId}}</td>
                                        <td>{{$row->trademarkName}}</td>
                                        <td>
                                            <a href="{{url('admin/trademark/edit/'. $row->trademarkId)}}" class="btn btn-success">Edit</a>
                                            <a href="{{url('admin/trademark/delete/'. $row->trademarkId)}}" class="btn btn-danger"
                                               onclick="return confirm ('Are you sure!');">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
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
<script src="../admins/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="../admins/vendors/chart.js/Chart.min.js"></script>
<script src="../admins/vendors/progressbar.js/progressbar.min.js"></script>
<script src="../admins/vendors/jvectormap/jquery-jvectormap.min.js"></script>
<script src="../admins/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="../admins/vendors/owl-carousel-2/owl.carousel.min.js"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="../admins/js/off-canvas.js"></script>
<script src="../admins/js/hoverable-collapse.js"></script>
<script src="../admins/js/misc.js"></script>
<script src="../admins/js/settings.js"></script>
<script src="../admins/js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="../admins/js/dashboard.js"></script>
<!-- End custom js for this page -->
</body>
</html>
