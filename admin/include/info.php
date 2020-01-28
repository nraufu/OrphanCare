 <?php 
 $totalSponsors = mysqli_query($con,'select count( * ) as  total_sponsors from sponsor');
 $sponsors = mysqli_fetch_array($totalSponsors);

 $totalMembers = mysqli_query($con,"select count( * ) as total_members from member where approved='1'");
 $members = mysqli_fetch_array($totalMembers);

 $totalDonation = mysqli_query($con,"select sum( amount ) as total_donations from Donations");
 $donations = mysqli_fetch_array($totalDonation);

 $totalChildren = mysqli_query($con,"select count( * ) as total_children from orphans");
 $children = mysqli_fetch_array($totalChildren);

 ?>
 <!-- Content Row -->
 <div class="row">

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-primary shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Sponsors</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $sponsors['total_sponsors'] ?></div>
        </div>
        <div class="col-auto">
          <i class="fas fa-hand-holding-usd fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-success shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Members</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $members['total_members'] ?></div>
        </div>
        <div class="col-auto">
          <i class="fas fa-users fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-info shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-info text-uppercase mb-1">children</div>
          <div class="row no-gutters align-items-center">
            <div class="col-auto">
              <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $children['total_children']; ?></div>
            </div>
          </div>
        </div>
        <div class="col-auto">
          <i class="fas fa-child fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Pending Requests Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-warning shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Donations</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $donations['total_donations'] ?> $</div>
        </div>
        <div class="col-auto">
          <i class="fas fa-donate fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
