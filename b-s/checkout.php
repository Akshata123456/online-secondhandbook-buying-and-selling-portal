<?php
 session_start();
 extract($_POST);
 extract($_SESSION);
 $bname = $_GET['nm'];
 require('includes/config.php'); 
 $sql = "SELECT * FROM book WHERE b_nm = '{$bname}'";
 $res = mysqli_query($conn,$sql);
 $row = mysqli_fetch_assoc($res);
 $bid = $row['b_id'];

	
	//echo $uid;
	if(isset($submit))
	{
		$opt = $_POST['opt'];

	$query="insert into shipping_details(name,address,postal_code,city,state,phone,f_id,paymethod,bid) values('$name','$address','$pc','$city','$state','$phone','$uid','$opt','$bid')";
	
	
	if($opt == 'cod') {
		header("location:success.php?bid=".$bid);
	
	}
	elseif($opt == 'inst') {
     header("location:payinst.php?bid=".$bid);
	}
	else {
		header("location:payu.php");
	}
}
	


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php
			include("includes/head.inc.php");
		?>
</head>

<body>
    <!-- start header -->
    <div id="header">
        <div id="menu">
            <?php
							include("includes/menu.inc.php");
						?>
        </div>
    </div>
    <div id="logo-wrap">
        <div id="logo">
            <?php
							include("includes/logo.inc.php");
						?>
        </div>
    </div>

    <!-- end header -->
    <!------------------------------->
    <font style="font-size:30px;margin-left:420px">Shipping Details</font>
    <div class="container">
        <!-- freshdesignweb top bar -->
        <div class="freshdesignweb-top">
            <div class="clr"></div>

        </div>
        <!--/ freshdesignweb top bar -->

        <div class="form">
            <form id="contactform" method="post">
                <p class="contact"><label for="name">Name</label></p>
                <input id="name" name="name" placeholder="First and last name" required="" tabindex="1" type="text">

                <p class="contact"><label for="email">Address</label></p>
                <textarea id="address" name="address" placeholder="Address" required="" cols="55" row="10"
                    type="email"> </textarea>

                <p class="contact"><label for="username">Postal Code</label></p>
                <input id="pc" name="pc" placeholder="201001" required="" tabindex="2" type="text">

                <p class="contact"><label for="city">City</label></p>
                <input type="text" id="city" name="city" required="" placeholder="delhi">
                <p class="contact"><label for="state">State</label></p>
                <input type="text" id="state" name="state" required="" placeholder="delhi">
                <p class="contact"><label for="phone">Mobile phone</label></p>
                <input id="phone" name="phone" placeholder="phone number" required="" type="text"> <br>

                <p class="contact"><label for="phone">Select Payment Method</label></p>
                <select name="opt">
                    <option value="cod">Cash On Delivery</option>
                    <option value="payu">PAYU Money</option>
                    <option value="inst">Insta Mojo</option>
                </select>
                <br>
                <br>
                <input class="buttom" name="submit" id="submit" tabindex="5" value="Confirm & Proceed" type="submit">
            </form>
        </div>
    </div>
    <!-- end content -->
    <!-- start sidebar -->
    <!-- <div id="sidebar">
									
									</div> -->
    <!-- end sidebar -->



</body>