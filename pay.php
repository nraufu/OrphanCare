<?php
include("admin/include/connect.php");
$userid=$_SESSION['user_id'];
$amount=$_POST['amount'];
$purpose=$_POST['purpose'];
?>	

<!DOCTYPE html>
<html lang="en">
<head>
<?php
$pagetitle="Pay";
include('./include/libraries.php');
?>
</head>
<body>
<?php
include("./include/navbar.php");
?>
<div id="wrapper">
<div class="main">	
		<div class="content">
			
			<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
					<script type="text/javascript">
						$(document).ready(function () {
							$('#horizontalTab').easyResponsiveTabs({
								type: 'default', //Types: default, vertical, accordion           
								width: 'auto', //auto or any width like 600px
								fit: true   // 100% fit in a container
							});
						});
						
					</script>
						<div class="sap_tabs" style="width: 100%;">
							<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
								<div class="pay-tabs">
									<h2>Select Payment Method</h2>
									  <ul class="resp-tabs-list">
										  <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span><label class="pic1"></label>Credit Card</span></li>
										  <li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span><label class="pic3"></label>Net Banking</span></li>
										  <li class="resp-tab-item" aria-controls="tab_item-2" role="tab"><span><label class="pic4"></label>DD/Cheque</span></li> 
										  <li class="resp-tab-item" aria-controls="tab_item-3" role="tab"><span><label class="pic2"></label>Debit Card</span></li>
										  <div class="clear"></div>
									  </ul>	
								</div>
								<div class="resp-tabs-container">
									<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
										<div class="payment-info">
											<h3 class="pay-title">Credit Card Info</h3>
											<form action="pay.php?mode=cc&amp;uid=<?php echo $userid; ?>&amp;pps=<?php echo $purpose; ?>&amp;amt=<?php echo $amount; ?>">
												<div class="tab-for">				
													<h5>NAME ON CARD</h5>
														<input type="text" value="" required>
													<h5>CARD NUMBER</h5>													
														<input class="pay-logo" type="text" value="0000-0000-0000-0000" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '0000-0000-0000-0000';}" required>
												</div>	

												<div class="transaction">
													<div class="tab-form-left user-form">
														<h5>EXPIRATION</h5>
															<ul>
																<li>
																	<input type="number" class="text_box" type="text" value="6" min="1" required />	
																</li><br><br>
																<li>
																	<input type="number" class="text_box" type="text" value="1988" min="1" required />	
																</li>
																
															</ul>
													</div>
													<br><br><br>
													<div class="tab-form-right user-form-rt">
														<h5>CVV NUMBER</h5>													
														<input type="text" value="xxxx" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'xxxx';}" required>
													</div>
													<div class="clear"></div>
												</div>
												<input type="submit" value="SUBMIT">
											</form>
											<div class="single-bottom">
													<ul>
														<li>
															<input type="checkbox"  id="brand" value="">
															<label for="brand"><span></span>By checking this box, I agree to the Terms & Conditions & Privacy Policy.</label>
														</li>
													</ul>
											</div>
										</div>
									</div>
									<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
										<div class="payment-info">
											<h3>Net Banking</h3>
											<div class="radio-btns">
												<div class="swit">								
													<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio" checked=""><i></i>Andhra Bank</label> </div></div>
													<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Allahabad Bank</label> </div></div>
													<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Bank of Baroda</label> </div></div>
													<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Canara Bank</label> </div></div>	
													<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>IDBI Bank</label> </div></div>
													<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Icici Bank</label> </div></div>	
													<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Indian Overseas Bank</label> </div></div>	
													<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Punjab National Bank</label> </div></div>	
													<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>South Indian Bank</label> </div></div>
													<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>State Bank Of India</label> </div></div>		
												</div>
												<div class="swit">								
													<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio" checked=""><i></i>City Union Bank</label> </div></div>
													<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>HDFC Bank</label> </div></div>
													<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>IndusInd Bank</label> </div></div>
													<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Syndicate Bank</label> </div></div>
													<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Deutsche Bank</label> </div></div>	
													<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Corporation Bank</label> </div></div>
													<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>UCO Bank</label> </div></div>	
													<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Indian Bank</label> </div></div>	
													<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Federal Bank</label> </div></div>	
													<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>ING Vysya Bank</label> </div></div>	
												</div>
												<div class="clear"></div>
											</div>
											<a href="pay.php?mode=nb&amp;uid=<?php echo $userid; ?>&amp;pps=<?php echo $purpose; ?>&amp;amt=<?php echo $amount; ?>">Continue</a>
										</div>
									</div>
									<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-2">
										<div class="payment-info">
											<h3>DD/Cheque</h3>
											<p>Please send the Demand Draft or Cheque of any nationalised bank payable at Bengaluru to the following address<br><br>Stepping Stones<br>Department of Computer Science<br>Christ University<br>Hosur Road<br>Bengaluru 560 029<br><br><br></p>
											<a href="pay.php?mode=dd&amp;uid=<?php echo $userid; ?>&amp;pps=<?php echo $purpose; ?>&amp;amt=<?php echo $amount; ?>">Continue</a>
										</div>
									</div>
									<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-3">	
										<div class="payment-info">
											
											<h3 class="pay-title">Dedit Card Info</h3>
											<form action="pay.php?mode=dc&amp;uid=<?php echo $userid; ?>&amp;pps=<?php echo $purpose; ?>&amp;amt=<?php echo $amount; ?>">
												<div class="tab-for">				
													<h5>NAME ON CARD</h5>
														<input type="text" value="" required>
													<h5>CARD NUMBER</h5>													
														<input class="pay-logo" type="text" value="0000-0000-0000-0000" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '0000-0000-0000-0000';}" required>
												</div>	
												<div class="transaction">
													<div class="tab-form-left user-form">
														<h5>EXPIRATION</h5>
															<ul>
																<li>
																	<input type="number" class="text_box" type="text" value="6" min="1" required />	
																</li><br><br>
																<li>
																	<input type="number" class="text_box" type="text" value="1988" min="1" required />	
																</li>
																
															</ul>
													</div>
													<div class="tab-form-right user-form-rt">
													<br><br>
														<h5>CVV NUMBER</h5>													
														<input type="text" value="xxxx" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'xxxx';}" required >
													</div>
													<div class="clear"></div>
												</div>
												<input type="submit" value="SUBMIT">
											</form>
											<div class="single-bottom">
													<ul>
														<li>
															<input type="checkbox"  id="brand" value="">
															<label for="brand"><span></span>By checking this box, I agree to the Terms & Conditions & Privacy Policy.</label>
														</li>
													</ul>
											</div>
										</div>	
									</div>
								</div>	
							</div>
						</div>
		</div>
	</div>
<?php
include("include/footer.php");
?>
</div>
<!--end of wrapper-->
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>
<?php
if(isset($_GET['mode']) && ($_GET['mode']=='nb'))
{
	$qry=mysqli_query($con,"insert into donations(u_id,amount,purpose,don_type,pay_method) values('".$_GET['uid']."','".$_GET['amt']."','".$_GET['pps']."','Donation','Net Banking')");
	header("location: thankyou.html");
}
if(isset($_GET['mode']) && ($_GET['mode']=='dc'))
{
	$qry=mysql_query("insert into donations(u_id,amount,purpose,don_type,pay_method) values('".$_GET['uid']."','".$_GET['amt']."','".$_GET['pps']."','Donation','Debit Card')");
	header("location: thankyou.html");
}
if(isset($_GET['mode']) && ($_GET['mode']=='cc'))
{
	$qry=mysql_query("insert into donations(u_id,amount,purpose,don_type,pay_method) values('".$_GET['uid']."','".$_GET['amt']."','".$_GET['pps']."','Donation','Credit Card')");
	header("location: thankyou.html");
}
if(isset($_GET['mode']) && ($_GET['mode']=='dd'))
{
	$qry=mysql_query("insert into donations(u_id,amount,purpose,don_type,pay_method) values('".$_GET['uid']."','".$_GET['amt']."','".$_GET['pps']."','Donation','DD/Cheque')");
	header("location: thankyou.html");
}
?>
