<?php 
error_reporting(0);
session_start();

$BMS_Login_Status = $_SESSION['BMS_is_login_now'];

if($BMS_Login_Status==true)
{

}
else
{
    header('location:../login.php');
}
?>





<style type="text/css">
	body{
  background: #FAFAFA;
}

#logout_btn{
	text-decoration: none; 
	color: #CBCBCB;
	margin-left: 150px;
}
	#logout_btn:hover{
		color: white;
	}

#label{
	color: white; 
	font-size: 18px;
}
#field{
	font-size: 15px;
}

</style>



<?php
/////////// Session /////////
error_reporting(0);
session_start();

$successfully_update = $_SESSION['update_success'];
unset($_SESSION['update_success']);


//// DB Connection File
    include_once('db-connect.php');


    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
             die("Connection failed: " . $conn->connect_error);
        } 
        $conn->set_charset('utf8mb4');



if (isset($_GET['edit_id']))
{
 	$edit_id = $_GET['edit_id'];


 	 ////SELECT MYSQLI DATABASE
     $query1 = "SELECT * FROM webinformer_backlink WHERE id='$edit_id' ";
     $main_query = mysqli_query($conn, $query1);
     $result = mysqli_fetch_assoc($main_query);

        $backlink_data  		= $result['backlink'];
        $my_link_data  			= $result['my_link'];
        $anchor_data  			= $result['anchor'];
        $anchor_type_data  		= $result['anchor_type'];
        $link_type_data  		= $result['link_type'];
        $backlink_category_data = $result['backlink_category'];
        $create_date_data  		= $result['create_date'];
        $DA_data  				= $result['DA'];
        $PA_data  				= $result['PA'];
        $backlink_status_data  	= $result['backlink_status'];


//// Backlink Update Form Action //////
if (isset($_POST['update']))
{
	$backlink_field 		= $_POST ['backlink_field'];
	$my_link_field 			= $_POST ['my_link_field'];
	$anchor_field 			= $_POST ['anchor_field'];
	$anchor_type_field 		= $_POST ['anchor_type_field'];
	$link_type_field 		= $_POST ['link_type_field'];
	$backlink_category_field= $_POST ['backlink_category_field'];
	$backlink_status_field	= $_POST ['backlink_status_field'];
	$create_date_field		= $_POST ['create_date_field'];
	$da_field				= $_POST ['DA_field'];
	$pa_field				= $_POST ['PA_field'];

	//////// URL TO Referring Domains //////
	$referring_domains = parse_url($backlink_field, PHP_URL_HOST);
	//////// URL TO Referring Domains //////



	/////////////Lost Backlink Action ////////
	if ($backlink_status_field=="Lost") 
	{
		////Upadte query
    	$sql = "UPDATE webinformer_backlink SET 
    		my_link='$my_link_field', 
    		backlink='$backlink_field', 
    		anchor='$anchor_field', 
    		anchor_type='$anchor_type_field', 
    		link_type='$link_type_field', 
    		backlink_category='$backlink_category_field', 
    		create_date='$create_date_field', 
    		DA='$da_field', 
    		PA='$pa_field',
    		backlink_status='$backlink_status_field',
    		referring_domains='$referring_domains',
    		active_status='Lost'
    		WHERE id='$edit_id' ";
	}
	else
	{
		////Upadte query
    $sql = "UPDATE webinformer_backlink SET 
    		my_link='$my_link_field', 
    		backlink='$backlink_field', 
    		anchor='$anchor_field', 
    		anchor_type='$anchor_type_field', 
    		link_type='$link_type_field', 
    		backlink_category='$backlink_category_field', 
    		create_date='$create_date_field', 
    		DA='$da_field', 
    		PA='$pa_field',
    		backlink_status='$backlink_status_field',
    		referring_domains='$referring_domains',
    		active_status=''
    		WHERE id='$edit_id' ";
	}

        if ($conn->query($sql) === TRUE) 
        {
        	$success_sms = "Backlink Update Successfully";
            $_SESSION['update_success']=$success_sms;
        	header('location:backlink-edit.php?edit_id='.$edit_id);
        }
}


if (isset($_POST['disavow_backlink']))
{
	$backlink_field 		= $_POST ['backlink_field'];
	$my_link_field 			= $_POST ['my_link_field'];
	$anchor_field 			= $_POST ['anchor_field'];

	$sql = "INSERT INTO disavow_backlink (backlink, my_page_url, anchor_tag, status)
                    VALUES ('$backlink_field', '$my_link_field','$anchor_field', 'Pending')";

                if ($conn->query($sql) === TRUE) 
                {
                	///// Delete This Backlink
					$sql = "DELETE FROM webinformer_backlink WHERE id='$edit_id' ";

					if ($conn->query($sql) === TRUE) 
					{
  						header('location:total-backlink.php');
					} 
					else 
					{
  						echo "Error deleting record: " . $conn->error;
					}
							
                } 
                else 
                {
                    $conn_erroe = $conn->error;
                    echo "<div style='color:red;'>Technical issue</div>";
                }
}






///////////////////////////////////////[Delete This Backlink Start]///////////////////////////////////////
if (isset($_POST['delete_backlink']))
{

    ///// Delete This Backlink
	$sql = "DELETE FROM webinformer_backlink WHERE id='$edit_id' ";

		if ($conn->query($sql) === TRUE) 
		{
  			header('location:index.php');
		} 
		else 
		{
  			echo "Error deleting record: " . $conn->error;
		}
}
///////////////////////////////////////[Delete This Backlink End]///////////////////////////////////////




}
else
{
	header('location:index.php');
}
?>






<!DOCTYPE html>
<html>
<head>
	<title>Backlink Edit</title>
	<link rel="icon" href="images/favicon.png">
	<meta charset="utf-8">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">  
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="bootstrap/jquery.js"></script>

	<!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="bootstrap/assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <!------------- Side Bar Link Fils ----------------->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="sidebar-files/style.css">
</head>
<body>

	<!-------------------------[Main Top Bar]------------------------>
	<nav class="navbar navbar-dark bg-dark sticky-top" style="padding: 2px; padding-left: 20px; padding-right: 20px;">
		<h1 class="navbar-brand"><img src="images/backlink-icon.png" width="30px"> Backlink Management</h1>

		<a href="index.php" class="navbar-brand" style="font-size: 30px; color: #FF5733; font-weight: bold; padding: 0; margin: 0;">Fashionaminoo.Com</a>

		<div class="nav navbar-nav navbar-right">
      		<a href="../log-out.php" id="logout_btn"><i class="fa fa-sign-out" aria-hidden="true"></i>  logout</a>
    	</div>
	</nav>
	<!-------------------------[Main Top Bar]------------------------>

	<center>
		<br>
		<br>
		<p style="color: green; font-weight: bold; font-size: 17px;"><?php echo $successfully_update; ?></p>
		<div style="width: 90%; height: auto; background: #3A4450;">

			<div style="width: 100%; height: auto; overflow: auto; background: #7CC7C3;">
				<a href="total-backlink.php">
					<i style="font-size: 45px; color: white; float: left; padding: 8px;" class="fa fa-arrow-circle-left" aria-hidden="true"></i>
				</a>
				<h1 style="color: #3A4450; font-size: 30px; font-weight: bold; padding: 8px;">Update Backlink</h1>
			</div>

			<div style="padding: 40px;">
				<form action="" method="post">
				<div class="row text-left">

				    <div class="col-xl-6 col-lg-6" style="padding: 15px;">
				     	<label id="label">Backlink:</label>
				      	<input id="field" type="text" class="form-control" value="<?php echo $backlink_data; ?>" autocomplete="off" placeholder="Backlink URL" name="backlink_field">
				    </div>
				    <div class="col-xl-6 col-lg-6" style="padding: 15px;">
				    	<label id="label">My Link:</label>
				     	<input id="field" type="text" class="form-control" value="<?php echo $my_link_data; ?>" autocomplete="off" placeholder="My Page URL" name="my_link_field">
				    </div>

					<div class="col-xl-6 col-lg-6" style="padding: 15px;">
				     	<label id="label">Anchor:</label>
				      	<input id="field" type="text" class="form-control" value="<?php echo $anchor_data; ?>" autocomplete="off" placeholder="Enter Anchor Keyword" name="anchor_field">
				    </div>
				     <div class="col-xl-3 col-lg-3" style="padding: 15px;">
				    	<label id="label">Anchor Type:</label>
				     	<select id="field" class="form-control" name="anchor_type_field">
				     		<?php 
				     			if ($anchor_type_data === "Text") 
				     			{
				     		?>
				     		<option selected="selected" value="Text">Text</option>
				     		<option value="Image">Image</option>
				     	<?php 
				     		}
				     		else
				     			{	?>
				     				<option selected="selected" value="Image">Image</option>
				     				<option value="Text">Text</option>
				     		<?php } ?>
				     		
				     	</select>
				    </div>
				    <div class="col-xl-3 col-lg-3" style="padding: 15px;">
				    	<label id="label">Link Type:</label>
				     	<select id="field" class="form-control" name="link_type_field">

				     		
				     		<?php 
				     			if ($link_type_data === "DoFollow") 
				     			{
				     		?>
				     			<option selected="selected" value="DoFollow">DoFollow</option>
				     			<option value="NoFollow">NoFollow</option>
				     	<?php 
				     		}
				     		else
				     			{	?>
				     				<option value="DoFollow">DoFollow</option>
				     				<option selected="selected" value="NoFollow">NoFollow</option>
				     		<?php } ?>
				     	</select>
				    </div>

				    <div class="col-xl-3 col-lg-3" style="padding: 15px;">
				     	<label id="label">Backlink Category:</label>
				      	<select id="field" class="form-control" name="backlink_category_field">


				     		
				     			<option <?php if ($backlink_category_data === "Commenting") {?> selected="selected" <?php }?> 
				     				value="Commenting">
				     				Commenting Backlink
				     			</option>

				     			<option <?php if ($backlink_category_data === "Profile") {?> selected="selected" <?php }?> 
				     				value="Profile">
				     				Profile Backlink
				     			</option>

				     			<option <?php if ($backlink_category_data === "Web 2.0") {?> selected="selected" <?php }?> 
				     				value="Web 2.0">
				     				Web 2.0 Backlink
				     			</option>

				     			<option <?php if ($backlink_category_data === "Guest Post") {?> selected="selected" <?php }?>
				     				value="Guest Post">
				     				Guest Post Backlink
				     			</option>

				     			<option <?php if ($backlink_category_data === "Exchange") {?> selected="selected" <?php }?>
				     				value="Exchange">
				     				Exchange Backlink
				     			</option>

				     			<option <?php if ($backlink_category_data === "Earn") {?> selected="selected" <?php }?>
				     				value="Earn">
				     				Earn Backlink
				     			</option>

				     			<option <?php if ($backlink_category_data === "Other") {?> selected="selected" <?php }?>
				     				value="Other">
				     				Other Backlink
				     			</option>
				     	</select>
				    </div>
				    <div class="col-xl-3 col-lg-3" style="padding: 15px;">
				    	<label id="label">Backlink Status:</label>
				     	<select id="field" class="form-control" name="backlink_status_field">


				     		<?php

				     			if ($BMS_Login_Status === "User_Login")
				     			{

				     				if ($backlink_status_data === "Pending")
				     				{
				     		?>
				     		<option value="Pending">Pending</option>
				     		<?php
				     		}
				     			}
				     		else
				     		{
				     		?>

				     		<option <?php if ($backlink_status_data === "Approved") {?> selected="selected" <?php }?>
				     			value="Approved">
				     			Approved
				     		</option>

				     		<option <?php if ($backlink_status_data === "Pending") {?> selected="selected" <?php }?>
				     			value="Pending">
				     			Pending
				     		</option>

				     		<option <?php if ($backlink_status_data === "Lost") {?> selected="selected" <?php }?>
				     			value="Lost">
				     			Lost
				     		</option>
				     		<?php
				     		}
				     		?>

				     	</select>
				    </div>
				    <div class="col-xl-2 col-lg-2" style="padding: 15px;">
				    	<label id="label">Create Date:</label>
				    	<input id="field" type="text" class="form-control" value="<?php echo $create_date_data; ?>"  placeholder="DD/MM/YYY" value="" name="create_date_field">
				    </div>
				    <div class="col-xl-2 col-lg-2" style="padding: 15px;">
				     	<label id="label">DA:</label>
				      	<input id="field" type="number" class="form-control"  value="<?php echo $DA_data; ?>"  placeholder="DA" name="DA_field">
				    </div>
				    <div class="col-xl-2 col-lg-2" style="padding: 15px;">
				    	<label id="label">PA:</label>
				     	<input id="field" type="number" class="form-control"  value="<?php echo $PA_data; ?>"  placeholder="PA" name="PA_field">
				    </div>	 
				</div>
				<br>

					<!-----------[Delete Backlink]--------------->
					<span style="float: left;">
				    	<button onclick="return confirm('Are you sure you want to delete this Backlink?');" type="submit" name="delete_backlink" class="btn btn-danger" style="height: 50px; font-weight: bold;">Delete Backlink</button>
				    </span>


				    <!-----------[Update Backlink]--------------->
					<spna style="padding: 15px;" class="text-center">
				    	<input type="submit" class="btn btn-success" style="width: 200px; height: 50px; font-size: 18px;" value="Update" name="update">
				    </spna>


				    <!-----------[Disavow Backlink]--------------->
				    <span style="float: right;">
				    	<button onclick="return confirm('Are you sure Disavow Backlink ?');" type="submit" name="disavow_backlink" class="btn btn-danger" style="height: 50px; font-weight: bold;">Disavow Backlink</button>
				    </span>
				</form>
			</div>
		</div>
	</center>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>


<!------------ Javascript Link -------------------->
    <script src="sidebar-files/js/jquery.min.js"></script>
    <script src="sidebar-files/js/popper.js"></script>
    <script src="sidebar-files/js/bootstrap.min.js"></script>
    <script src="sidebar-files/js/main.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
<!------------ Javascript Link -------------------->
</body>
</html>