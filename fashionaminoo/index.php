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



.order-card {
    color: #fff;
}

.bg-c-blue {
    background: linear-gradient(45deg,#4099ff,#73b4ff);
}

.bg-c-green {
    background: linear-gradient(45deg,#2ed8b6,#59e0c5);
}

.bg-c-yellow {
    background: linear-gradient(45deg,#FFB64D,#ffcb80);
}

.bg-c-pink {
    background: linear-gradient(45deg,#FF5370,#ff869a);
}


.card {
    border-radius: 5px;
    -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
    box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
    border: none;
    margin-bottom: 30px;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}

#main-heading{
	padding: 15px;
	padding-bottom: 0;
	font-size: 17px;
}
#b-num{
	padding: 15px;
	padding-bottom: 5px;
	color: white;
	font-weight: bold;
}
#view-detail{
	color: white;
	font-size: 17px; 
	padding-bottom: 10px; 
	margin: 0;
}
	#view-detail a{
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


        ///////////////////[Total Backlink Count Code]//////////////////
        $total_backlink=0;
        $query1 = "SELECT  * FROM  webinformer_backlink WHERE active_status='' order by 1 DESC ";
        $query2 = mysqli_query($conn, $query1);

        while ($backlink_data = mysqli_fetch_array($query2))
        {
            $total_backlink++;
            $backlnk_id         = $backlink_data['id'];
        } 
        ///////////////////[Total Backlink Count Code]//////////////////


        ///////////////////[Total DoFollow Backlink Count Code]//////////////////
        $total_DoFollow_backlink=0;
        $query1 = "SELECT  * FROM  webinformer_backlink WHERE link_type='DoFollow' AND active_status='' order by 1 DESC ";
        $query2 = mysqli_query($conn, $query1);

        while ($backlink_data = mysqli_fetch_array($query2))
        {
            $total_DoFollow_backlink++;
            $backlnk_id         = $backlink_data['id'];
        } 
        ///////////////////[Total DoFollow Backlink Count Code]//////////////////


        ///////////////////[Total NoFollow Backlink Count Code]//////////////////
        $total_NoFollow_backlink=0;
        $query1 = "SELECT  * FROM  webinformer_backlink WHERE link_type='NoFollow' AND active_status='' order by 1 DESC ";
        $query2 = mysqli_query($conn, $query1);

        while ($backlink_data = mysqli_fetch_array($query2))
        {
            $total_NoFollow_backlink++;
            $backlnk_id         = $backlink_data['id'];
        } 
        ///////////////////[Total NoFollow Backlink Count Code]//////////////////



        ///////////////////[Total Referring Domains Count Code]//////////////////
        $total_referring_domains=0;
        $query1 = "SELECT referring_domains, count(referring_domains) AS amount
        FROM webinformer_backlink
        WHERE active_status=''
        GROUP BY referring_domains
        ORDER BY amount
        DESC";
        $main_query = mysqli_query($conn, $query1);
        
        while ($result = mysqli_fetch_array($main_query)) {

            $total_referring_domains++;
            $backlink_url = $result['referring_domains'];
        }
        ///////////////////[Total Referring Domains Count Code]//////////////////



        ///////////////////[Total Guest Post Backlink Count Code]//////////////////
        $total_Guest_Post_backlink=0;
        $query1 = "SELECT  * FROM  webinformer_backlink WHERE backlink_category='Guest Post' AND active_status='' order by 1 DESC ";
        $query2 = mysqli_query($conn, $query1);

        while ($backlink_data = mysqli_fetch_array($query2))
        {
            $total_Guest_Post_backlink++;
            $backlnk_id         = $backlink_data['id'];
        } 
        ///////////////////[Total Guest Post Backlink Count Code]//////////////////


        //////////////////[Total Commenting Backlink Count Code]//////////////////
        $total_Commenting_backlink=0;
        $query1 = "SELECT  * FROM  webinformer_backlink WHERE backlink_category='Commenting' AND active_status='' order by 1 DESC ";
        $query2 = mysqli_query($conn, $query1);

        while ($backlink_data = mysqli_fetch_array($query2))
        {
            $total_Commenting_backlink++;
            $backlnk_id         = $backlink_data['id'];
        } 
        ///////////////////[Total Commenting Backlink Count Code]//////////////////




        //////////////////[Total Commenting Backlink Count Code]//////////////////
        $total_Other_backlink=0;
        $query1 = "SELECT  * FROM  webinformer_backlink WHERE backlink_category='Other' AND active_status='' order by 1 DESC ";
        $query2 = mysqli_query($conn, $query1);

        while ($backlink_data = mysqli_fetch_array($query2))
        {
            $total_Other_backlink++;
            $backlnk_id         = $backlink_data['id'];
        } 
        ///////////////////[Total Commenting Backlink Count Code]//////////////////

        




        //////////////////[Total Exchange Backlink Count Code]//////////////////
        $total_Exchange_backlink=0;
        $query1 = "SELECT  * FROM  webinformer_backlink WHERE backlink_category='Exchange' AND active_status='' order by 1 DESC ";
        $query2 = mysqli_query($conn, $query1);

        while ($backlink_data = mysqli_fetch_array($query2))
        {
            $total_Exchange_backlink++;
            $backlnk_id         = $backlink_data['id'];
        } 
        ///////////////////[Total Exchange Backlink Count Code]//////////////////


        //////////////////[Total Profile Backlink Count Code]//////////////////
        $total_Profile_backlink=0;
        $query1 = "SELECT  * FROM  webinformer_backlink WHERE backlink_category='Profile' AND active_status='' order by 1 DESC ";
        $query2 = mysqli_query($conn, $query1);

        while ($backlink_data = mysqli_fetch_array($query2))
        {
            $total_Profile_backlink++;
            $backlnk_id         = $backlink_data['id'];
        } 
        ///////////////////[Total Profile Backlink Count Code]//////////////////



        //////////////////[Total Profile Backlink Count Code]//////////////////
        $total_Web_2_0_backlink=0;
        $query1 = "SELECT  * FROM  webinformer_backlink WHERE backlink_category='Web 2.0' AND active_status='' order by 1 DESC ";
        $query2 = mysqli_query($conn, $query1);

        while ($backlink_data = mysqli_fetch_array($query2))
        {
            $total_Web_2_0_backlink++;
            $backlnk_id         = $backlink_data['id'];
        } 
        ///////////////////[Total Profile Backlink Count Code]//////////////////



        //////////////////[Total Earn Backlink Count Code]//////////////////
        $total_Earn_backlink=0;
        $query1 = "SELECT  * FROM  webinformer_backlink WHERE backlink_category='Earn' AND active_status='' order by 1 DESC ";
        $query2 = mysqli_query($conn, $query1);

        while ($backlink_data = mysqli_fetch_array($query2))
        {
            $total_Earn_backlink++;
            $backlnk_id         = $backlink_data['id'];
        } 
        ///////////////////[Total Earn Backlink Count Code]//////////////////




        /////////////////////// [This Month Backlink Count Code] ///////////////////////
            /////// Timezone Set ///////
            date_default_timezone_set('Asia/Kolkata');
            $this_month_date  =  date("m/Y");

            $this_month_backlink=0;

            $sql = "SELECT * FROM webinformer_backlink WHERE create_date like '%$this_month_date%' AND active_status='' ";
            $main_query =mysqli_query($conn, $sql);
                while ($all_post = mysqli_fetch_array($main_query))
                {
                    $this_month_backlink++;
                }
        ///////////////////[This Month Backlink Count Code]//////////////////



        ///////////////////[Last Month Backlink Count Code]//////////////////
        date_default_timezone_set('Asia/Kolkata');
        $last_month_date_m  =  date("m");
        $last_month_date_y  =  date("Y");
        $month = $last_month_date_m-1;

        $last_month_date = $month."/".$last_month_date_y;
        $last_month_backlink=0;

            $sql = "SELECT * FROM webinformer_backlink WHERE create_date like '%$last_month_date%' AND active_status='' ";
            $main_query =mysqli_query($conn, $sql);
                while ($all_post = mysqli_fetch_array($main_query))
                {
                    $last_month_backlink++;
                }
        ///////////////////[Last Month Backlink Count Code]//////////////////



        //////////////////[Total Approved Backlink Count Code]//////////////////
        $total_Approved_backlink=0;
        $query1 = "SELECT  * FROM  webinformer_backlink WHERE backlink_status='Approved' AND active_status='' order by 1 DESC ";
        $query2 = mysqli_query($conn, $query1);

        while ($backlink_data = mysqli_fetch_array($query2))
        {
            $total_Approved_backlink++;
            $backlnk_id         = $backlink_data['id'];
        } 
        ///////////////////[Total Approved Backlink Count Code]//////////////////


        //////////////////[Total Pending Backlink Count Code]//////////////////
        $total_Pending_backlink=0;
        $query1 = "SELECT  * FROM  webinformer_backlink WHERE backlink_status='Pending' AND active_status='' order by 1 DESC ";
        $query2 = mysqli_query($conn, $query1);

        while ($backlink_data = mysqli_fetch_array($query2))
        {
            $total_Pending_backlink++;
            $backlnk_id         = $backlink_data['id'];
        } 
        ///////////////////[Total Pending Backlink Count Code]//////////////////



        //////////////////[Total Lost Backlink Count Code]//////////////////
        $total_Lost_backlink=0;
        $query1 = "SELECT  * FROM  webinformer_backlink WHERE backlink_status='Lost' order by 1 DESC ";
        $query2 = mysqli_query($conn, $query1);

        while ($backlink_data = mysqli_fetch_array($query2))
        {
            $total_Lost_backlink++;
            $backlnk_id         = $backlink_data['id'];
        } 
        ///////////////////[Total Lost Backlink Count Code]//////////////////



        //////////////////[Total Disavow Backlink Count Code]//////////////////
        $total_Disavow_backlink=0;
        $query1 = "SELECT  * FROM  disavow_backlink WHERE status='Approved' order by 1 DESC ";
        $query2 = mysqli_query($conn, $query1);

        while ($backlink_data = mysqli_fetch_array($query2))
        {
            $total_Disavow_backlink++;
            $backlnk_id         = $backlink_data['id'];
        } 
        ///////////////////[Total Disavow Backlink Count Code]//////////////////



        //////////////////[Pending Disavow Backlink Count Code]//////////////////
        $total_Pending_Disavow_backlink=0;
        $query1 = "SELECT  * FROM  disavow_backlink WHERE status='Pending' order by 1 DESC ";
        $query2 = mysqli_query($conn, $query1);

        while ($backlink_data = mysqli_fetch_array($query2))
        {
            $total_Pending_Disavow_backlink++;
            $backlnk_id         = $backlink_data['id'];
        } 
        ///////////////////[Pending Disavow Backlink Count Code]//////////////////


        ///////////////////[anchor Count Code]//////////////////
        $total_anchor=0;
        $query1 = "SELECT anchor, count(anchor) AS amount
        FROM webinformer_backlink
        GROUP BY anchor
        ORDER BY amount
        DESC";
        $main_query = mysqli_query($conn, $query1);
        
        while ($result = mysqli_fetch_array($main_query)) {

            $total_anchor++;
            $backlink_url = $result['anchor'];
        }
        ///////////////////[anchor Count Code]//////////////////

?>




<!DOCTYPE html>
<html>
<head>
	<title>Backlink Management - Fashionaminoo.Com</title>
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

     <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
</head>
<body>


	<!-------------------------[Main Top Bar]------------------------>
	<nav class="navbar navbar-dark bg-dark sticky-top" style="padding: 2px; padding-left: 20px; padding-right: 20px;">
		<a href="../"><h1 class="navbar-brand"><img src="images/backlink-icon.png" width="30px"> Backlink Management</h1></a>

		<a href="index.php" class="navbar-brand" style="font-size: 30px; color: #FF5733; font-weight: bold; padding: 0; margin: 0;">Fashionaminoo.Com</a>

		<div class="nav navbar-nav navbar-right">
      		<a href="../log-out.php" id="logout_btn"><i class="fa fa-sign-out" aria-hidden="true"></i>  logout</a>
    	</div>
	</nav>
	<!-------------------------[Main Top Bar]------------------------>




	
	<div class="wrapper d-flex align-items-stretch">
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
            		<a href="add-new-backlink.php"><span class="fa fa-plus mr-3"></span> Add New Backlink</a>
          		</li>

          		<li>
            		<a href="url-search.php"><span class="fa fa-search mr-3"></span> Search URL</a>
          		</li>

                <li>
                    <a href="all-pages.php"><span class="fa fa-file-text mr-3"></span> All Pages</a>
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


    	<!--------------------[Content Menu Start]----------------------->
      	<div id="content" class="p-4 p-md-5 pt-5">
        	
			<div class="container">
				<!-------[Row-1]------->
    			<div class="row">
    				<!------------[Total Backlink BOX Start]-------------->
        			<div class="col-md-4 col-xl-3 col-lg-3">
            			<div class="card bg-c-blue order-card">
                			<div class="card-block">
                    			<h6 class="m-b-20" id="main-heading">Total Backlink</h6>
                    			<h2 class="text-left" id="b-num"> <?php echo $total_backlink; ?> </h2>
                    			<p class="m-b-0 text-center" id="view-detail"><a href="total-backlink.php">View Detail</a></p>
                			</div>
            			</div>
        			</div>
        			<!------------[Total Backlink BOX End]-------------->

        			<!------------[DoFollow Backlink BOX Start]-------------->
        			<div class="col-md-4 col-xl-3 col-lg-3">
            			<div class="card bg-c-green order-card">
                			<div class="card-block">
                    			<h6 class="m-b-20" id="main-heading">DoFollow Backlink</h6>
                    			<h2 class="text-left" id="b-num"> <?php echo $total_DoFollow_backlink; ?> </h2>
                    			<p class="m-b-0 text-center" id="view-detail"><a href="dofollow-backlink.php">View Detail</a></p>
                			</div>
            			</div>
        			</div>
        			<!------------[DoFollow Backlink BOX End]-------------->

        			<!------------[NoFollow Backlink BOX Start]-------------->
        			<div class="col-md-4 col-xl-3 col-lg-3">
            			<div class="card bg-c-yellow order-card">
                			<div class="card-block">
                    			<h6 class="m-b-20" id="main-heading">NoFollow Backlink</h6>
                    			<h2 class="text-left" id="b-num"> <?php echo $total_NoFollow_backlink; ?> </h2>
                    			<p class="m-b-0 text-center" id="view-detail"><a href="nofollow-backlink.php">View Detail</a></p>
                			</div>
            			</div>
        			</div>
        			<!------------[NoFollow Backlink BOX End]-------------->

        			<!------------[Referring Domains BOX Start]-------------->
        			<div class="col-md-4 col-xl-3 col-lg-3">
            			<div class="card bg-c-pink order-card">
                			<div class="card-block">
                    			<h6 class="m-b-20" id="main-heading">Referring Domains</h6>
                    			<h2 class="text-left" id="b-num"> <?php echo $total_referring_domains;  ?> </h2>
                    			<p class="m-b-0 text-center" id="view-detail"><a href="referring-domains.php">View Detail</a></p>
                			</div>
            			</div>
        			</div>
        			<!------------[Referring Domains BOX End]-------------->
				</div>


				<!-------[Row-2]------->
    			<div class="row">
    				<!------------[Guest Post Backlink BOX Start]-------------->
        			<div class="col-md-4 col-xl-4 col-lg-4">
            			<div class="card bg-c-pink order-card">
                			<div class="card-block">
                    			<h6 class="m-b-20" id="main-heading">Guest Post Backlink</h6>
                    			<h2 class="text-left" id="b-num"> <?php echo $total_Guest_Post_backlink;  ?> </h2>
                    			<p class="m-b-0 text-center" id="view-detail"><a href="guest-post-backlink.php">View Detail</a></p>
                			</div>
            			</div>
        			</div>
        			<!------------[Guest Post Backlink BOX End]-------------->

        			<!------------[Commenting Backlink BOX Start]-------------->
        			<div class="col-md-4 col-xl-4 col-lg-4">
            			<div class="card bg-c-pink order-card">
                			<div class="card-block">
                    			<h6 class="m-b-20" id="main-heading">Commenting Backlink</h6>
                    			<h2 class="text-left" id="b-num"> <?php echo $total_Commenting_backlink;  ?> </h2>
                    			<p class="m-b-0 text-center" id="view-detail"><a href="commenting-backlink.php">View Detail</a></p>
                			</div>
            			</div>
        			</div>
        			<!------------[Commenting Backlink BOX End]-------------->

        			<!------------[Exchange Backlink BOX Start]-------------->
        			<div class="col-md-4 col-xl-4 col-lg-4">
            			<div class="card bg-c-pink order-card">
                			<div class="card-block">
                    			<h6 class="m-b-20" id="main-heading">Exchange Backlink</h6>
                    			<h2 class="text-left" id="b-num">  <?php echo $total_Exchange_backlink;  ?> </h2>
                    			<p class="m-b-0 text-center" id="view-detail"><a href="exchange-backlink.php">View Detail</a></p>
                			</div>
            			</div>
        			</div>
        			<!------------[Exchange Backlink BOX End]-------------->
				</div>


				<!-------[Row-3]------->
    			<div class="row">
    				<!------------[Profile Backlink BOX Start]-------------->
        			<div class="col-md-4 col-xl-4 col-lg-4">
            			<div class="card bg-c-pink order-card">
                			<div class="card-block">
                    			<h6 class="m-b-20" id="main-heading">Profile Backlink</h6>
                    			<h2 class="text-left" id="b-num">  <?php echo $total_Profile_backlink;  ?> </h2>
                    			<p class="m-b-0 text-center" id="view-detail"><a href="profile-backlink.php">View Detail</a></p>
                			</div>
            			</div>
        			</div>
        			<!------------[Profile Backlink BOX End]-------------->

        			<!------------[Web 2.0 Backlink BOX Start]-------------->
        			<div class="col-md-4 col-xl-4 col-lg-4">
            			<div class="card bg-c-pink order-card">
                			<div class="card-block">
                    			<h6 class="m-b-20" id="main-heading">Web 2.0 Backlink</h6>
                    			<h2 class="text-left" id="b-num">  <?php echo $total_Web_2_0_backlink;  ?> </h2>
                    			<p class="m-b-0 text-center" id="view-detail"><a href="web-2.0-backlink.php">View Detail</a></p>
                			</div>
            			</div>
        			</div>
        			<!------------[Web 2.0 Backlink BOX End]-------------->

        			<!------------[Earn Backlink BOX Start]-------------->
        			<div class="col-md-4 col-xl-4 col-lg-4">
            			<div class="card bg-c-pink order-card">
                			<div class="card-block">
                    			<h6 class="m-b-20" id="main-heading">Earn Backlink</h6>
                    			<h2 class="text-left" id="b-num">  <?php echo $total_Earn_backlink;  ?> </h2>
                    			<p class="m-b-0 text-center" id="view-detail"><a href="earn-backlink.php">View Detail</a></p>
                			</div>
            			</div>
        			</div>
        			<!------------[Earn Backlink BOX End]-------------->
				</div>




				<!-------[Row-4]------->
    			<div class="row">
    				<!------------[Approved Backlink BOX Start]-------------->
        			<div class="col-md-4 col-xl-4 col-lg-4">
            			<div class="card bg-c-pink order-card">
                			<div class="card-block">
                    			<h6 class="m-b-20" id="main-heading">Approved Backlink</h6>
                    			<h2 class="text-left" id="b-num">  <?php echo $total_Approved_backlink;  ?> </h2>
                    			<p class="m-b-0 text-center" id="view-detail"><a href="approved-backlink.php">View Detail</a></p>
                			</div>
            			</div>
        			</div>
        			<!------------[Approved Backlink BOX End]-------------->

        			<!------------[Pending Backlink BOX Start]-------------->
        			<div class="col-md-4 col-xl-4 col-lg-4">
            			<div class="card bg-c-pink order-card">
                			<div class="card-block">
                    			<h6 class="m-b-20" id="main-heading">Pending Backlink</h6>
                    			<h2 class="text-left" id="b-num">  <?php echo $total_Pending_backlink;  ?> </h2>
                    			<p class="m-b-0 text-center" id="view-detail"><a href="pending-backlink.php">View Detail</a></p>
                			</div>
            			</div>
        			</div>
        			<!------------[Pending Backlink BOX End]-------------->

        			<!------------[Lost Backlink BOX Start]-------------->
        			<div class="col-md-4 col-xl-4 col-lg-4">
            			<div class="card bg-c-pink order-card">
                			<div class="card-block">
                    			<h6 class="m-b-20" id="main-heading">Lost Backlink</h6>
                    			<h2 class="text-left" id="b-num">  <?php echo $total_Lost_backlink;  ?> </h2>
                    			<p class="m-b-0 text-center" id="view-detail"><a href="lost-backlink.php">View Detail</a></p>
                			</div>
            			</div>
        			</div>
        			<!------------[Lost Backlink BOX End]-------------->
				</div>



                <!-------[Row-5]------->
                <div class="row">
                    <!------------[Anchor Tag BOX Start]-------------->
                    <div class="col-md-3 col-xl-3 col-lg-3">
                        <div class="card bg-c-green order-card">
                            <div class="card-block">
                                <h6 class="m-b-20" id="main-heading">Anchor Tags</h6>
                                <h2 class="text-left" id="b-num">  <?php echo $total_anchor;  ?> </h2>
                                <p class="m-b-0 text-center" id="view-detail"><a href="all-anchor-tag.php">View Detail</a></p>
                            </div>
                        </div>
                    </div>
                    <!------------[Anchor Tag BOX End]-------------->


                    <!------------[Other Backlink BOX Start]-------------->
                    <div class="col-md-3 col-xl-3 col-lg-3">
                        <div class="card bg-c-green order-card">
                            <div class="card-block">
                                <h6 class="m-b-20" id="main-heading">Other Backlink</h6>
                                <h2 class="text-left" id="b-num">  <?php echo $total_Other_backlink;  ?> </h2>
                                <p class="m-b-0 text-center" id="view-detail"><a href="other-backlink.php">View Detail</a></p>
                            </div>
                        </div>
                    </div>
                    <!------------[Other Backlink BOX End]-------------->



                    <!------------[Pending disavow BOX Start]-------------->
                    <div class="col-md-3 col-xl-3 col-lg-3">
                        <div class="card bg-c-yellow order-card">
                            <div class="card-block">
                                <h6 class="m-b-20" id="main-heading">Pending disavow</h6>
                                <h2 class="text-left" id="b-num">  <?php echo $total_Pending_Disavow_backlink;  ?> </h2>
                                <p class="m-b-0 text-center" id="view-detail"><a href="pending-disavow-backlink.php">View Detail</a></p>
                            </div>
                        </div>
                    </div>
                    <!------------[Pending disavow BOX End]-------------->

                    <!------------[Success disavow BOX Start]-------------->
                    <div class="col-md-3 col-xl-3 col-lg-3">
                        <div class="card bg-c-yellow order-card">
                            <div class="card-block">
                                <h6 class="m-b-20" id="main-heading">Disavow Backlink</h6>
                                <h2 class="text-left" id="b-num">  <?php echo $total_Disavow_backlink;  ?> </h2>
                                <p class="m-b-0 text-center" id="view-detail"><a href="approved-disavow-backlink.php">View Detail</a></p>
                            </div>
                        </div>
                    </div>
                    <!------------[Success disavow BOX End]-------------->
                    
                </div>



                <!-------[Row-6]------->
                <div class="row">

                    <!------------[This Month Backlink BOX Start]-------------->
                    <div class="col-md-6 col-xl-6 col-lg-6">
                        <div class="card bg-c-pink order-card">
                            <div class="card-block">
                                <h6 class="m-b-20" id="main-heading">This Month Backlink</h6>
                                <h2 class="text-left" id="b-num"> <?php echo $this_month_backlink;  ?> </h2>
                                <p class="m-b-0 text-center" id="view-detail"><a href="this-month-backlink.php">View Detail</a></p>
                            </div>
                        </div>
                    </div>
                    <!------------[This Month Backlink BOX End]-------------->

                    <!------------[Last Month Backlink BOX Start]-------------->
                    <div class="col-md-6 col-xl-6 col-lg-6">
                        <div class="card bg-c-pink order-card">
                            <div class="card-block">
                                <h6 class="m-b-20" id="main-heading">Last Month Backlink</h6>
                                <h2 class="text-left" id="b-num"> <?php echo $last_month_backlink;  ?> </h2>
                                <p class="m-b-0 text-center" id="view-detail"><a href="last-month-backlink.php">View Detail</a></p>
                            </div>
                        </div>
                    </div>
                    <!------------[Last Month Backlink BOX End]-------------->
                </div>






                
			</div>
      	</div>
      	<!--------------------[Content Menu End]----------------------->
	</div>
	






<!------------ Javascript Link -------------------->
    <script src="sidebar-files/js/jquery.min.js"></script>
    <script src="sidebar-files/js/popper.js"></script>
    <script src="sidebar-files/js/bootstrap.min.js"></script>
    <script src="sidebar-files/js/main.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
<!------------ Javascript Link -------------------->
</body>
</html>