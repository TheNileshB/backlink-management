<?php 
error_reporting();
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
  background: white;
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

#backlink_style{
	color: #ff6000; 
	font-weight: bold;
}
#my_style{
	color: blue;
}

#link_redirect_icon a i{
	color: #444444;
	font-weight: bold;
	font-size: 15px;
}
#field{
	font-size: 15px;
}
</style>



<?php 

/////////// Session /////////
error_reporting(0);
session_start();

$successfully_add = $_SESSION['success'];
unset($_SESSION['success']);



//////Database File Link//////
include_once('db-connect.php');

	// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
             die("Connection failfed: " . $conn->connect_error);
        } 
        $conn->set_charset('utf8mb4');
	

	/////// Timezone Set ///////
 	date_default_timezone_set('Asia/Kolkata');
    $b_date  =  date("d/m/Y");


if (isset($_POST['submit']))
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



	$sql = "INSERT INTO webinformer_backlink (my_link, backlink, anchor, anchor_type, link_type, backlink_category, create_date, DA, PA, backlink_status, referring_domains)
                    VALUES ('$my_link_field', '$backlink_field','$anchor_field', '$anchor_type_field', '$link_type_field', '$backlink_category_field', '$create_date_field', '$da_field', '$pa_field', '$backlink_status_field', '$referring_domains')";

                if ($conn->query($sql) === TRUE) 
                {
                    $success_sms = "Backlink Successfully Add";
            		$_SESSION['success']=$success_sms;
            		header('location:add-new-backlink.php');
                } 
                else 
                {
                    $conn_erroe = $conn->error;
                    echo "<div style='color:red;'>Technical issue:- $conn_erroe </div>";
                }
}

?>






<!DOCTYPE html>
<html>
<head>
	<title>Add New Backlink</title>
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
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="sidebar-files/style.css">
</head>
<body>
	<!------------------[Main Top Bar]---------------->
	<nav class="navbar navbar-dark bg-dark sticky-top" style="padding: 2px; padding-left: 20px; padding-right: 20px;">
		<h1 class="navbar-brand"><img src="images/backlink-icon.png" width="30px"> Backlink Management</h1>

		<a href="index.php" class="navbar-brand" style="font-size: 30px; color: #FF5733; font-weight: bold; padding: 0; margin: 0;">Fashionaminoo.Com</a>

		<div class="nav navbar-nav navbar-right">
      		<a href="../log-out.php" id="logout_btn"><i class="fa fa-sign-out" aria-hidden="true"></i>  logout</a>
    	</div>
	</nav>
	<br>
	<!------------------[Main Top Bar]---------------->

	<center>
		<br>
		<p style="color: green; font-weight: bold; font-size: 17px;"><?php echo $successfully_add; ?></p>
		<div style="width: 90%; height: auto; background: #3A4450;">

			<div style="width: 100%; height: auto; overflow: auto; background: #7CC7C3;">
				<a href="index.php">
					<i style="font-size: 45px; color: white; float: left; padding: 8px;" class="fa fa-arrow-circle-left" aria-hidden="true"></i>
				</a>
				<h1 style="color: #3A4450; font-size: 30px; font-weight: bold; padding: 8px;">Add New Backlink</h1>
			</div>

			<br>
			<div style="padding: 40px;">
				<form action="" method="post">
				<div class="row text-left">

				    <div class="col-xl-6 col-lg-6" style="padding: 15px;">
				     	<label id="label">Backlink:</label>
				      	<input id="field" type="text" class="form-control"  required="required" autocomplete="off" placeholder="Backlink URL" name="backlink_field">
				    </div>
				    <div class="col-xl-6 col-lg-6" style="padding: 15px;">
				    	<label id="label">My Link:</label>
				     	<input id="field" type="text" class="form-control"  required="required" autocomplete="off" placeholder="My Page URL" name="my_link_field">
				    </div>

					<div class="col-xl-6 col-lg-6" style="padding: 15px;">
				     	<label id="label">Anchor:</label>
				      	<input id="field" type="text" class="form-control"  required="required" autocomplete="off" placeholder="Enter Anchor Keyword" name="anchor_field">
				    </div>
				     <div class="col-xl-3 col-lg-3" style="padding: 15px;">
				    	<label id="label">Anchor Type:</label>
				     	<select id="field" class="form-control" name="anchor_type_field">
				     		<option selected="selected" value="Text">Text</option>
				     		<option value="Image">Image</option>
				     	</select>
				    </div>
				    <div class="col-xl-3 col-lg-3" style="padding: 15px;">
				    	<label id="label">Link Type:</label>
				     	<select id="field" class="form-control" name="link_type_field">
				     		<option value="DoFollow">DoFollow</option>
				     		<option value="NoFollow">NoFollow</option>
				     	</select>
				    </div>

				    <div class="col-xl-3 col-lg-3" style="padding: 15px;">
				     	<label id="label">Backlink Category:</label>
				      	<select id="field" class="form-control" name="backlink_category_field">

				     		<option value="Commenting">Commenting Backlink</option>
				     		<option value="Profile">Profile Backlink</option>
				     		<option value="Web 2.0">Web 2.0 Backlink</option>
				     		<option value="Guest Post">Guest Post Backlink</option>
				     		<option value="Exchange">Exchange Backlink</option>
				     		<option value="Earn">Earn Backlink</option>
				     		<option value="Other">Other Backlink</option>
				     	</select>
				    </div>
				    <div class="col-xl-3 col-lg-3" style="padding: 15px;">
				    	<label id="label">Backlink Status:</label>
				     	<select id="field" class="form-control" name="backlink_status_field">

				     		<?php

				     			if ($BMS_Login_Status === "User_Login")
				     			{
				     		?>
				     		<option value="Pending">Pending</option>
				     		<?php
				     			}
				     		else
				     		{
				     		?>
				     		<option value="Approved">Approved</option>
				     		<option value="Pending">Pending</option>
				     		<?php
				     		}
				     		?>
				     	</select>
				    </div>
				    <div class="col-xl-2 col-lg-2" style="padding: 15px;">
				    	<label id="label">Create Date:</label>
				    	<input id="field" type="text" class="form-control" placeholder="DD/MM/YYY" value="<?php echo $b_date; ?>" name="create_date_field">
				    </div>
				    <div class="col-xl-2 col-lg-2" style="padding: 15px;">
				     	<label id="label">DA:</label>
				      	<input id="field" type="number" class="form-control" placeholder="DA" name="DA_field">
				    </div>
				    <div class="col-xl-2 col-lg-2" style="padding: 15px;">
				    	<label id="label">PA:</label>
				     	<input id="field" type="number" class="form-control" placeholder="PA" name="PA_field">
				    </div>	 
				</div>

					<div style="padding: 15px;" class="text-center">
				    	<input type="submit" class="btn btn-info" style="width: 200px; height: 50px; font-size: 18px;" value="Submit" name="submit">
				    </div>
				</form>
			</div>
			
		</div>
	</center>
	<br>
	<br>
	<center>
<div style="width: 90%; margin-bottom: 30px; margin-top: 20px;">
<table class="table table-striped table-hover">
  <thead class="bg-dark" style="color: white; text-align: center; font-size: 16px;">
    <tr>
      <th>TB</th>
      <th>Backlink URL</th>
      <th>Anchor and Target URL</th>
      <th>Type</th>
      <th>DA-PA</th>
      <th>Edit</th>
    </tr>
  </thead>
  	<?php

  		$no=0;
        $query1 = "SELECT  * FROM  webinformer_backlink WHERE active_status='' order by 1 DESC LIMIT 10";
        $query2 = mysqli_query($conn, $query1);

        while ($backlink_list = mysqli_fetch_array($query2))
        {
            $no++;
            $backlnk_id    		= $backlink_list['id'];
            $my_link    		= $backlink_list['my_link'];
            $backlink    		= $backlink_list['backlink'];
            $anchor    			= $backlink_list['anchor'];
            $link_type    		= $backlink_list['link_type'];
            $backlink_category 	= $backlink_list['backlink_category'];
            $DA    				= $backlink_list['DA'];
            $PA    				= $backlink_list['PA'];
            $create_date 		= $backlink_list['create_date'];  
    ?>
    <tr>

    	<!-------- This URL Total Backlink Count --------->
      <th>
      	<?php 
        $url_backlink=0; 

        ////SELECT MYSQLI DATABASE
        $query1 = "SELECT * FROM webinformer_backlink WHERE backlink='$backlink' ";
        $main_query = mysqli_query($conn, $query1);

        while ($result = mysqli_fetch_array($main_query)) 
        {
           $url_backlink++;
        }
          	//////Echo Total This URL Backlink
        	?>
          <a href="backlink-url-data.php?backlink_url_data=<?php echo $backlink; ?>" style="color: black; font-weight: bold; font-size: 18px;">
          	<?php echo $url_backlink; ?>
          </a>
          <?php
       ?>
       </th>
       <!-------- This URL Total Backlink Count --------->


      <!------- Backlink URL Show ------->
      <td>
      	<span id="backlink_style"><?php echo substr($backlink, 0,50)."..."; ?></span>
      	<span id="link_redirect_icon">
      		<a target="_blank" href="<?php echo $backlink ?>">
      			<i class="fa fa-external-link" aria-hidden="true"></i>
      		</a>
      	</span>
      </td>

      <!------- Anchor And Target URL -------->
      <td>
      	<samp><?php echo $anchor ?></samp>
      	<br>
      	<br>
        <a href="my-url-data.php?my_url_data=<?php echo $my_link; ?>">
        	<span id="my_style" style="padding: 5px;"><?php echo substr($my_link, 0,55)."..."; ?></span>
        </a>
      	<span id="link_redirect_icon">
      		<a target="_blank" href="<?php echo $my_link ?>">
      			<i class="fa fa-external-link" aria-hidden="true"></i>
      		</a>
      	</span>
      </td>

      <td style="text-align: center;">
      	<span id="backlink_style"><?php echo $link_type ?></span> 
      	<br>
      	<span style="color: #633974; font-weight: bold;"><?php echo $backlink_category ?></span>		
      </td>



      <!----- DA-PA -------->
      <td>
      	<span style="font-weight: bold; margin-right: 6px;">DA:</span><span><?php echo $DA ?></span>
      	<br>
      	<span style="font-weight: bold; margin-right: 7px;">PA:</span><span><?php echo $PA ?></span>
      </td>

      <!------ Edit Backlink ------->
      <td>
      	<a href="backlink-edit.php?edit_id=<?php echo $backlnk_id; ?>">
      		<i style="font-size: 30px; color: green;" class="fa fa-pencil-square" aria-hidden="true"></i>
      	</a>
      </td>
    </tr>
    <?php }?>
</table>
	</div>
	</center>
	
	<br>
	<center>
	<a href="total-backlink.php">
		<p style="font-weight: bold; font-size: 18px;">More Backlink <i class="fa fa-arrow-right" aria-hidden="true"></i></p>
	</a>
	</center>
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