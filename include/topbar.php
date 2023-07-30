    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Nav Item - Map -->
                    <li class="nav-item">
                        <a class="nav-link" href="map.php">
                            <i class="fas fa-map-marked-alt mr-2"></i>Map
                        </a>
                    </li>


                   

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <?php
                    if (!isset($_SESSION['role'])) {
                    ?>
                        <a href="./login.php" id="login" style="text-decoration: none; font-family: sans-serif;" class="text-success mt-4">
                            Log In
                        </a>
                        
                    <?php
                    } else {
                        $user = $_SESSION['user'];
                        $role = $_SESSION['role'];
                    ?>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $user; ?></span>
                                <img class="img-profile rounded-circle" src="img/miwani.jpg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="./Profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Profile
                                </a>
                    
                                
                                <a class="dropdown-item" href="Handler/logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-power-off fa-sm fa-fw mr-2 text-gray-400"></i> Logout
                                </a>
                            </div>
                        </li>

                    <?php
                    }
                    ?>

                </ul>
            </nav>
            <!-- End of Topbar -->

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header mybg">
                            <h5 class="modal-title" id="exampleModalLabel">Are You Sure You Want To Logout?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="text-danger">×</span>
                            </button>
                        </div>
                        <div class="modal-body text-dark">Select "Logout" below if you are ready to end your current session.</div>
                        <div class="modal-footer">
                            <button class="btn btn-sm btn-outline-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-sm btn-outline-success" href="./Handler/logout.php">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
            