<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Products List</title>
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
                            <h4 class="card-title">Product List</h4>
                            @if (Session:: has('success'))
                                <div class="alert alert-success" role="alert">
                                    {{Session::get('success')}}
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Ids</th>
                                        <th>Name Product</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                        <th>Detail</th>
                                        <th>Category</th>
                                        <th> Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($data as $product)
                                        <tr>
                                            <td>{{$product->productID}}</td>
                                            <td>{{$product->productName}}</td>
                                            <td>{{$product->productPrice}}</td>
                                            <td>
                                                <img src="..\Image\products\{{$product->productImage1}}" alt="No Image"
                                                     height="30x" width="30px">
                                            </td>
                                            <td>{{$product->productDetails}}</td>
                                            <td>{{$product->categoryName}}</td>
                                            <td><a href="{{url('admin/product/edit/'. $product->productID)}}" class="btn btn-primary" >Edit</a>
                                                <a href="{{url('admin/product/delete/'.$product->productID)}}" class="btn btn-danger"
                                                   onclick="return confirm ('You want to delete!');"  >Delete</a></td>
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
