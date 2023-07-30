<!-- Sidebar -->

<ul class="navbar-nav mybg sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon ">
                    <i class="fas fa-building"></i>
                </div>
                <div class="sidebar-brand-text mx-3">VENUE BOOKING</div>
            </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Services
    </div>
    <li class="nav-item">
        <a class="nav-link" href="venueManager.php">
            <i class="fas fa-fw fa-th"></i>
            <span>All Venue</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="allBooking.php">
            <i class="fas fa-fw fa-book"></i>
            <span>All Bookings</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="customerManager.php">
            <i class="fas fa-fw fa-users"></i>
            <span>Customers</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="report.php">
            <i class="fas fa-fw fa-briefcase"></i>
            <span>Venue Report</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="comment.php">
        <i class="fas fa-envelope fa-fw"></i>
            <span>Massage</span></a>
    </li>    
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>


<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.php">Logout</a>
            </div>
        </div>
    </div>
</div>
