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
</style>



<?php 

/////////// Session /////////
error_reporting();


//////Database File Link//////
include_once('db-connect.php');

	// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
             die("Connection failfed: " . $conn->connect_error);
        } 
        $conn->set_charset('utf8mb4');

if (isset($_POST['check_it']))
{

  $check_it_url = $_POST['url_search'];
  $url_selection = $_POST['url_selection'];


  if ($url_selection=="Backlink URL") 
  {
    header('location:backlink-url-data.php?backlink_url_data='.$check_it_url);
  }



  if ($url_selection=="My URL") 
  {
    header('location:my-url-data.php?my_url_data='.$check_it_url);
  }



  if ($url_selection=="Referring Domains URL") 
  {
     header('location:referring-domains-url-data.php?referring_domains_url_data='.$check_it_url);
  }

}
?>






<!DOCTYPE html>
<html>
<head>
	<title>Search Any URL</title>
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
	<!------------------[Main Top Bar]---------------->
	<nav class="navbar navbar-dark bg-dark sticky-top" style="padding: 2px; padding-left: 20px; padding-right: 20px;">
		<h1 class="navbar-brand"><img src="images/backlink-icon.png" width="30px"> Backlink Management</h1>

		<a href="index.php" class="navbar-brand" style="font-size: 25px; color: #FF5733; font-weight: bold; padding: 0; margin: 0;">Fashionaminoo.Com</a>

		<div class="nav navbar-nav navbar-right">
      		<a href="#" id="logout_btn"><i class="fa fa-sign-out" aria-hidden="true"></i>  logout</a>
    	</div>
	</nav>
	<!------------------[Main Top Bar]---------------->
<div style="background: #E7E7E7; width: 100%; height: auto; overflow: hidden;">
  <div style="width: 100%; height: auto; background: ; padding-top: 30px; margin-bottom: 358px; margin-top: 50px;">
    <br>
    <center>
      <h1 style="font-weight: bold;">URL Analytics</h1>
      <p style="font-size: 18px; color: black; margin-bottom: 30px;">Please Enter URL And Select My URL or Backlink URL And Click Check it</p>
    </center>

    <div class="row">
      <div class="col-xl-3 col-lg-3" style="background: ; margin: 0; padding:;">
        <form action="" method="post">
        <select name="url_selection" class="browser-default custom-select selectpicker" style="float: right; width: 220px; height: 43px;">
          <option value="Backlink URL">Backlink URL</option>
          <option value="My URL">My URL</option>
          <option value="Referring Domains URL">Referring Domains URL</option>
      </select>
      </div>

      <div class="col-xl-8 col-lg-8" style="text-align: left; background: ; margin: 0; padding:;">
        <div class="row">
          <div class="col-xl-9 col-lg-9" style=" margin: 0; padding:0;">
          <input style="height: 43px; padding: 10px; border: none; width: 100%;" type="search" placeholder="Enter Anchor Keyword" name="url_search">
        </div>

        <div class="col-xl-3 col-lg-3" style=" margin: ; padding-left: 9px;">
          <button style="height: 43px" type="submit" name="check_it" class="btn btn-danger">Check it</button>
        </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
	




<!------------ Javascript Link -------------------->
    <script src="sidebar-files/js/jquery.min.js"></script>
    <script src="sidebar-files/js/popper.js"></script>
    <script src="sidebar-files/js/bootstrap.min.js"></script>
    <script src="sidebar-files/js/main.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
<!------------ Javascript Link -------------------->
</body>
</html