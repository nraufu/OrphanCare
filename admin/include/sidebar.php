<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="./home.php">
  <div class="sidebar-brand-icon">
  <i class="fas fa-user fa-2x"></i>
  </div>
  <div class="sidebar-brand-text mx-3">Admin</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item <?php echo $dashboard ?>">
  <a class="nav-link" href="./home.php?mode=show">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    Dashboard</a>
</li>
<li class="nav-item <?php echo $logbook?>">
  <a class="nav-link" href="./logbook.php">
    <i class="fas fa-fw fa-user-secret"></i>
    Logbook</a>
</li>

<li class="nav-item <?php echo $users; ?>">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
    <i class="fas fa-fw fa-users"></i>
    Users
  </a>
  <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded bg-success">
      <a class="collapse-item" href="./sponsors.php?mode=show"> Sponsors</a>
      <a class="collapse-item" href="./members.php"> Members</a>
    </div>
  </div>
</li>


<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item <?php echo $request; ?>">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-fw fa-envelope"></i>
    Requests
  </a>
  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded bg-success">
      <a class="collapse-item" href="./new_members.php"> New Members</a>
    </div>
  </div>
</li>


<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item <?php echo $orphans; ?>">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
    <i class="fas fa-fw fa-child"></i>
    Orphans
  </a>
  <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded bg-success">
      <a class="collapse-item" href="./add_orphan.php?mode=add">Add</a>
      <a class="collapse-item" href="./orphan_det.php?mode=show"> Details</a>
    </div>
  </div>
</li>



<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline mt-5">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->