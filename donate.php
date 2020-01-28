<?php
session_start();
if(!isset($_SESSION['sponsor']))
	header("location: essay.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
$pagetitle="Donate";
include('./include/libraries.php');
?>
</head>
<body>
<?php
$involvement ="active";
include("./include/navbar.php");
?>


<div class="container">
        
        <!-- banner -->
        <?php 
        $icon="fas fa-donate";
        $title="Donate";
        $tdescription="let make the World a better place";
        include ('./include/banner.php');
        ?>
		<!-- end of banner -->
		
        <div class="row my-3">
            <div class="col">
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Illo vitae accusamus magnam rerum omnis eaque consequuntur quia placeat suscipit reprehenderit impedit expedita nulla adipisci ipsum atque, tempora mollitia ipsa quae accusantium voluptatibus perferendis neque porro eius? Repudiandae architecto veniam hic est sint delectus iste praesentium dolore debitis? Laudantium non beatae illum vitae quasi laborum ipsa reiciendis repudiandae, vel, sint debitis.</p>
            </div>
        </div>
       <div class="row">
           <div class="col-sm-8 mx-auto">
            <form class="bg-light p-4 rounded" action="buy.php" enctype="multipart/form-data" onSubmit="return validateform();" method="post" name="donate">
                <h2 class="text-center">Donate</h2>
                <p class="form-text text-center text-muted mb-3">Fill the form to place your donation</p>
                
                <div class="form-group">
                    <label for="Purpose">Purpose</label>
                    <select class="form-control" name="purpose" id="purpose" required>
                      <option>--Select--</option>
                      <option value="Basics">Basics</option>
                      <option value="Education">Education</option>
                      <option value="Food">Food</option>
                      <option value="General">General</option>
                      <option value="Health">Health</option>
                    </select>
                </div>
                .<div class="form-group">
                  <label for="otherAmount">Amount</label>
                  <input type="numeric" name="amount" id="otherAmount" class="form-control" placeholder="Enter the amount of your Donation ($)" required>
                  
                </div>
                <div class="form-group">
                    <label for="donationMessage">Message/Comments</label>
                    <textarea class="form-control" name="Comment" id="donationMessage" rows="5" cols="30" placeholder="Leave a Message" required></textarea>
                </div>
                <div class="form-group">
                <input name="Submit" type="submit" class="btn btn-info btn-block btn-lg" value="Pay With PayPal">
                </div>
               
                </form>
           </div>
       </div>
      
</div>

    <!--footer -->
	<?php include('./include/footer.php'); ?>
     <!--end of footer -->

<script src="./js/jquery.slim.min.js"></script>
<script src="./js/popper.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
</body>
</html>