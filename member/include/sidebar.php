<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="./home.php">
  <div class="sidebar-brand-icon">
  <i class="fas fa-users fa-2x"></i>
  </div>
  <div class="sidebar-brand-text mx-3">Member</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item <?php echo $dashboard ?>">
  <a class="nav-link" href="./home.php">
    <i class="fas fa-fw fa-calendar-alt"></i>
    Events</a>
</li>

<li class="nav-item <?php echo $gallery ?>">
  <a class="nav-link" href="./gallery.php?mode=show">
    <i class="fas fa-fw fa-image"></i>
    Gallery</a>
</li>



<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline mt-5">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->