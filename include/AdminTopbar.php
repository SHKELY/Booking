
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
<!-- Main Content -->
<div id="content">
    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light mybg topbar mb-4 static-top shadow">   
        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i></button>      

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $user; ?></span>
                                <img class="img-profile rounded-circle" src="../img/miwani.jpg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="../Profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Profile
                                </a>
                    
                                
                                <a class="dropdown-item" href="../Handler/logout.php" data-toggle="modal" data-target="#adminLogoutModal">
                                    <i class="fas fa-power-off fa-sm fa-fw mr-2 text-gray-400"></i> Logout
                                </a>
                            </div>
                        </li>

                    
            

                </ul>
            </nav>
            <!-- End of Topbar -->

            <!-- Logout Modal-->
            <div class="modal fade" id="adminLogoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header mybg">
                            <h5 class="modal-title" id="exampleModalLabel">Are You Sure You Want To Logout?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="text-danger">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready.</div>
                        <div class="modal-footer">
                            <button class="btn btn-sm btn-outline-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-sm btn-outline-success" href="../Handler/logout.php">Logout</a>
                        </div>
                    </div>
                </div>
            </div>