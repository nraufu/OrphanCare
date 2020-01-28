<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="./index.php"><img src="./images/logo.gif" alt="logo"></a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav ml-auto mt-2 text-uppercase">
                <li class="nav-item <?php echo $index; ?>">
                    <a class="nav-link" href="./index.php">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item <?php echo $about; ?>">
                    <a class="nav-link" href="./aboutus.php">About Us</a>
                </li>
                <li class="nav-item <?php echo $project; ?>">
                    <a class="nav-link" href="./projects.php">Projects</a>
                </li>
                <li class="nav-item <?php echo $gallery; ?>">
                    <a class="nav-link" href="./gallery.php">Gallery</a>
                </li>
                <li class="nav-item <?php echo $child; ?>">
                    <a class="nav-link" href="./orphans.php">Children</a>
                </li>

                <li class="nav-item <?php echo $involvement; ?>">
                    <a class="nav-link" href="./helpus.php">Get Involved</a>
                </li>
                <li class="nav-item <?php echo $contact; ?>">
                    <a class="nav-link" href="./contactus.php">Contact</a>
                </li>
                <li class="nav-item dropdown <?php echo $applicant ?>">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Applications
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="./user_register.php">Sponsor</a>
                      <a class="dropdown-item" href="./register_member.php">Member</a>
                    </div>
                </li>
                
							<?php if(isset($_SESSION['sponsor']))
						{

								echo '
								<a href="ulogout_exec.php" class="btn btn-light btn-outline-info btn-md ml-4 mb-1 <?php echo $donate; ?>" role="button"><span>'.$_SESSION['sponsor'].' <i class="fas fa-sign-out-alt"></i></span></a>
							';
								}
								else
								{
									echo '<a href="./essay.php" class="btn btn-light btn-outline-info btn-md ml-4 mb-1  <?php echo $donate; ?>" role="button"><span><i class="fas fa-user"></i> Login</span></a>';
								}
							?>
                <a href="#" class="ml-5"></a>
            </ul>
        </div>
    </nav>