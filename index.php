<?php 
error_reporting(0);
session_start();

$BMS_Login_Status = $_SESSION['BMS_is_login_now'];

if($BMS_Login_Status==true)
{

}
else
{
    header('location:login.php');
}
?>




<style type="text/css">

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

    //////Database File Link//////
  include_once('fashionaminoo/db-connect.php');

	// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
             die("Connection failfed: " . $conn->connect_error);
        } 
        $conn->set_charset('utf8mb4');


        ///////////////////[Total Backlink Count Code]//////////////////
        $fashionaminoo_total_backlink=0;
        $query1 = "SELECT  * FROM  webinformer_backlink WHERE active_status='' order by 1 DESC ";
        $query2 = mysqli_query($conn, $query1);

        while ($backlink_data = mysqli_fetch_array($query2))
        {
            $fashionaminoo_total_backlink++;
            $backlnk_id         = $backlink_data['id'];
        } 
        ///////////////////[Total Backlink Count Code]//////////////////


 ?>




<!DOCTYPE html>
<html>
<head>
	<title>Backlink Management</title>
	<link rel="icon" href="fashionaminoo/images/favicon.png">
	<meta charset="utf-8">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">  
	<link rel="stylesheet" href="fashionaminoo/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="fashionaminoo/bootstrap/css/bootstrap.css">
	<script src="fashionaminoo/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="fashionaminoo/bootstrap/jquery.js"></script>

	<!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="fashionaminoo/bootstrap/assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <!------------- Side Bar Link Fils ----------------->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="fashionaminoo/sidebar-files/style.css">

</head>
<body>

	<!-------------------------[Main Top Bar]------------------------>
	<nav class="navbar navbar-dark bg-dark sticky-top" style="padding: 2px; padding-left: 20px; padding-right: 20px;">
		<h1 class="navbar-brand"></h1>

		<a href="index.php" class="navbar-brand" style="font-size: 30px; color: white; font-weight: bold; padding: 0; margin: 0;"><img src="fashionaminoo/images/backlink-icon.png" width="30px"> Backlink Management</a>

		<div class="nav navbar-nav navbar-right">
      		<a href="log-out.php" id="logout_btn"><i class="fa fa-sign-out" aria-hidden="true"></i>  logout</a>
    	</div>
	</nav>
	<!-------------------------[Main Top Bar]------------------------>



<div class="wrapper d-flex align-items-stretch" style="height: 100%;">
		<!-------------------------[Side Bar Code Start]------------------------>
		<nav id="sidebar">
			<div class="custom-menu">
				<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          		<i class="fa fa-bars"></i>
	          		<span class="sr-only">Toggle Menu</span>
	        	</button>
        	</div>

        	<ul class="list-unstyled components mb-5">

          		<li class="active">
              		<a href="index.php"><span class="fa fa-tachometer mr-3"></span> Dashboard</a>
          		</li>

                <li>
                    <a href="post-editor.php"><span class="fa fa-pencil-square-o mr-3"></span> Post Editor</a>
                </li>

          		<li>
            		<a href="usefull-tools.php"><span class="fa fa-wrench mr-3"></span> Tools</a>
          		</li>

        	</ul>
    	</nav>
    	<!-------------------------[Side Bar Code End]------------------------>



	<div class="container" style="margin-top: 75px;">
		<table class="table table-striped table-hover">
			<thead class="bg-dark" style="color: white; font-size: 16px;">
				<th>
					Website Name
				</th>
				<th>
					Total Backlink
				</th>
				<th>
					View
				</th>
			</thead>
			<tr style="background: ;">
				<td style="font-size: 18px; font-weight: bold; color: #ff6000;">
					Fashionaminoo.Com
				</td>
				<td>
					<?php echo $fashionaminoo_total_backlink; ?>
				</td>
				<td>
					<a href="fashionaminoo"><button class="btn btn-info">Open</button></a>
				</td>
			</tr>
		</table>
	</div>
</div>

<!------------ Sidebar Javascript Link -------------------->
    <script src="fashionaminoo/sidebar-files/js/jquery.min.js"></script>
    <script src="fashionaminoo/sidebar-files/js/popper.js"></script>
    <script src="fashionaminoo/sidebar-files/js/bootstrap.min.js"></script>
    <script src="fashionaminoo/sidebar-files/js/main.js"></script>
    <script src="fashionaminoo/bootstrap/js/bootstrap.js"></script>
<!------------ sidebar Javascript Link -------------------->
</body>
</html>