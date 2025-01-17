<?php
    session_start();
    require_once 'connect.php';
    if (!isset($_SESSION['id']) || $_SESSION['id'] == "" || !isset($_SESSION['status']) || $_SESSION['status'] != "Teacher") {
        header("Location: logout.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'include.php'; ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Level</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="homeT.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="homeT.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Home</span></a>
            </li>
            <!-- Nav Item - Grading -->
            <li class="nav-item">
                <a class="nav-link" href="grading.php">
                    <i class="fas fa-fw fa-chalkboard-teacher"></i>
                    <span>Class</span></a>
            </li>

            <!-- Nav Item - Grading -->
            <li class="nav-item active">
                <a class="nav-link" href="Level.php">
                    <i class="fas fa-fw fa-level-up-alt"></i>
                    <span>Level</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['first_name']?> <?php echo $_SESSION['last_name']?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Level</h1>
                    </div>
                    <div class="card-body mr-3">
                        <div style="overflow-x: auto;">
                            <table id="table_id" class="table display nowrap mb-3" style="text-align: center;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Student</th>
                                        <th>Email</th>
                                        <th>Level</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="studentlist">
                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>
<script>
    $(document).ready(function(){
        function reload(){
            $.ajax({
                url: "ajax/getstudentlevel.php",
                method: "POST",
                data: {

                },
                success: function (result) {
                    $("#studentlist").html(result);
                },
                error: function () {
                    alert("Server Not Responding");
                }
            });
        }
        $.ajax({
            url: "ajax/getstudentlevel.php",
            method: "POST",
            data: {

            },
            success: function (result) {
                $("#studentlist").html(result);
            },
            error: function () {
                alert("Server Not Responding");
            }
        });
        $(document).on("click", ".LB", function(){
            var id = $(this).attr("id");
            var data = $("#" + id).data("val");
            $.ajax({
                url: "ajax/updatelevel.php",
                method: "POST",
                data: {
                    id: data,
                    status:1
                },
                success: function (result) {
                    swal.fire({
                        title: 'Success',
                        icon: 'success',
                        confirmButtonText: 'Ok',
                        willClose:reload
                    })
                },
                error: function () {
                    alert("Server Not Responding");
                }
            });
        });
        $(document).on("click", ".LI", function(){
            var id = $(this).attr("id");
            var data = $("#" + id).data("val");
            $.ajax({
                url: "ajax/updatelevel.php",
                method: "POST",
                data: {
                    id: data,
                    status:2
                },
                success: function (result) {
                    swal.fire({
                        title: 'Success',
                        icon: 'success',
                        confirmButtonText: 'Ok',
                        willClose:reload
                    })
                },
                error: function () {
                    alert("Server Not Responding");
                }
            });
        });
        $(document).on("click", ".LA", function(){
            var id = $(this).attr("id");
            var data = $("#" + id).data("val");
            $.ajax({
                url: "ajax/updatelevel.php",
                method: "POST",
                data: {
                    id: data,
                    status:3
                },
                success: function (result) {
                    swal.fire({
                        title: 'Success',
                        icon: 'success',
                        confirmButtonText: 'Ok',
                        willClose:reload
                    })
                },
                error: function () {
                    alert("Server Not Responding");
                }
            });
        });  
    });     
</script>
</html>