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
  font-size: 15px;
}
#form_div{
  display: none;
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


  #backlink_style{
  color: #ff6000;
  font-size: 17px; 
  padding: 5px;
}
#my_style{
  color: #0056b3;
}

#link_redirect_icon a i{
  color: #444444;
  font-weight: bold;
  font-size: 15px;
}





ul.pagination_11 {
    display: inline-block;
    padding: 0;
    margin: 0;
}

ul.pagination_11 li {display: inline;}

ul.pagination_11 li a {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
    transition: background-color .3s;
    border: 1px solid #ddd;
}

.pagination_11 li:first-child a {
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px;
}

.pagination_11 li:last-child a {
    border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;
}

ul.pagination_11 li a.active {
    background-color: #4CAF50;
    color: white;
    border: 1px solid #4CAF50;
}

ul.pagination_11 li a:hover:not(.active) {background-color: #ddd;}

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


if (isset($_POST['add_new_page']))
{
  $page_title     = $_POST ['page_title'];
  $page_type      = $_POST ['page_type'];
  $page_url       = $_POST ['page_url'];
 


  $sql ="INSERT INTO webinformer_all_pages (page_title, page_type, page_url) VALUES ('$page_title', '$page_type','$page_url')";

                if ($conn->query($sql) === TRUE) 
                {
                  $success_sms = "Backlink Successfully Add";
                  $_SESSION['success']=$success_sms;
                  header('location:all-pages.php');
                } 
                else 
                {
                    $conn_erroe = $conn->error;
                    echo "<div style='color:red;'>Technical issue</div>";
                }
}

?>



<?php 
$search_url="";
if (isset($_GET['search_now']))
{
  $search_url = $_GET['search_url'];
}

?>




<!DOCTYPE html>
<html>
<head>
	<title>All Pages</title>
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

          		<li>
              		<a href="index.php"><span class="fa fa-tachometer mr-3"></span> Dashboard</a>
          		</li>

          		<li>
            		<a href="add-new-backlink.php"><span class="fa fa-plus mr-3"></span> Add New Backlink</a>
          		</li>

          		<li>
            		<a href="url-search.php"><span class="fa fa-search mr-3"></span> Search URL</a>
          		</li>

          		<li class="active">
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
          <center>
            <span style="color: green; font-weight: bold; font-size: 17px;"><?php echo $successfully_add; ?></span>
          </center>
          
          <div id="form_div" style="width: 100%; height: auto; background: #3A4450; padding: 25px; overflow: hidden; margin-bottom: 15px;">
            <form action="" method="post">
            <div class="row">
              <div class="col-xl-8 col-lg-8">
                <label id="label">Page Title</label>
                <input type="text" name="page_title" required="required" class="form-control" autocomplete="off" style="font-size: 15px;">
              </div>

              <div class="col-xl-3 col-lg-3">
                <label id="label">Page Type</label>
                <select name="page_type" class="form-control" style="width: 150px; height: 40px; font-size: 16px;  border-radius: 5px;">
                  <option>Post</option>
                  <option>Category</option>
                  <option>Page</option>
                </select>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-xl-10 col-lg-10">
                 <label id="label">Page URL</label>
                <input type="text" name="page_url" required="required" class="form-control" autocomplete="off" style="font-size: 15px;">
              </div>
            </div>
            <br>
            <center>
              <button type="submit" name="add_new_page" class="btn btn-info">Add Page</button>
            </center>
            </form>
          </div>



  <center>
<div style="width: 100%; margin-bottom: 80px; margin-top: 8px;">
  <div style="background: ; width: 100%; margin-bottom: 10px; overflow: hidden;">
    <form action="" method="get">
    <div class="row">
      <div class="col-xl-2 col-lg-2" style="text-align: left; padding-bottom: 5px; margin-right: 0; padding-right: 0;">
        <button type="button" id="add_page_btn" onclick="hideform()" style="font-size: 18px; font-weight: bold;" class="btn btn-danger">
          <i  class="fa fa-plus-circle" aria-hidden="true"></i> Add New
        </button>
      </div>
      
        <div class="col-xl-7 col-lg-7" style="background: ;">
          <input style="width: 100%; height: 38px; padding: 10px;" type="text" name="search_url" placeholder="Enter URL" value="<?php echo $search_url; ?>">
        </div>

        <div class="col-xl-2 col-lg-2" style="text-align: left; margin: 0; padding: 0;">
          <button type="submit" name="search_now" class="btn btn-info">
            Search
          </button>
        </div>
      </form>
    </div>
  </div>

<table class="table table-striped table-hover">
  <thead class="bg-dark" style="color: white; text-align: center; font-size: 16px;">
    <tr>
      <th>No.</th>
      <th>Title & URL</th>
      <th>TB</th>
      <th>DoFollow</th>
      <th>NoFollow</th>
      <th>RD</th>
      <th>Lost</th>
    </tr>
  </thead>
    <?php

    ////////////////////////////[Pagination Code Start]/////////////////////////////////////
    if ($search_url=="") 
      {
if (isset($_GET['page_no']) && $_GET['page_no']!="") {
  $page_no = $_GET['page_no'];
  } 
  else 
  {
    $page_no = 1;
  }

  $total_records_per_page = 20;
  $offset = ($page_no-1) * $total_records_per_page;
  $previous_page = $page_no - 1;
  $next_page = $page_no + 1;
  $adjacents = "2"; 

  $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM `webinformer_all_pages`");
  $total_records = mysqli_fetch_array($result_count);
  $total_records = $total_records['total_records'];
  $total_no_of_pages = ceil($total_records / $total_records_per_page);
  $second_last = $total_no_of_pages - 1; // total page minus 1
}
  ////////////////////////////[Pagination Code End]/////////////////////////////////////






      $no=0;

      if ($search_url=="") 
      {
        $query1 = "SELECT  * FROM  webinformer_all_pages order by 1 DESC LIMIT $offset, $total_records_per_page ";
      }
      else
      {
        $query1 = "SELECT  * FROM  webinformer_all_pages WHERE page_url='$search_url' order by 1 DESC ";
      }
        
        $query2 = mysqli_query($conn, $query1);

        while ($backlink_list = mysqli_fetch_array($query2))
        {
            $no++;
            $page_url        = $backlink_list['page_url'];
            $page_title       = $backlink_list['page_title'];
            $page_type         = $backlink_list['page_type'];
        ?>
    <tr>
      <th>
        <?php echo $no; ?>
      </th>

      <!------- Title And URL Show Start------->
      <td>
        <span id="backlink_style"><?php echo substr($page_title, 0,500); ?></span>
        <br>
        <br>
        <a href="my-url-data.php?my_url_data=<?php echo $page_url; ?>">
          <span id="my_style" style="padding: 5px;"><?php echo substr($page_url, 0,60)."..."; ?></span>
        </a>
        <span id="link_redirect_icon">
          <a target="_blank" href="<?php echo $page_url ?>">
            <i class="fa fa-external-link" aria-hidden="true"></i>
          </a>
        </span>
      </td>
      <!------- Title And URL Show End------->


       <!-------- Total Backlink Count Start--------->
      <td style="font-weight: bold; color: green; font-size: 19px; text-align: center;">
        <?php 
        $total_backlink=0; 
        ////SELECT MYSQLI DATABASE
        $query1 = "SELECT * FROM webinformer_backlink WHERE my_link='$page_url' AND active_status='' ";
        $main_query = mysqli_query($conn, $query1);

        while ($result = mysqli_fetch_array($main_query)) 
        {
           $total_backlink++;
        }
            //////Echo Total This URL Backlink
            echo $total_backlink;
          ?>
      </td>
      <!-------- Total Backlink Count End--------->



      <!------------- Dofollow Count Start --------->
      <td style="text-align: center;">
         <?php 
        $DoFollow_backlink=0; 
        ////SELECT MYSQLI DATABASE
        $query1 = "SELECT * FROM webinformer_backlink WHERE my_link='$page_url' AND link_type='DoFollow' AND active_status='' ";
        $main_query = mysqli_query($conn, $query1);

        while ($result = mysqli_fetch_array($main_query)) 
        {
           $DoFollow_backlink++;
        }
          ?>
        <p style="border-bottom: 2px solid black;">
          <a href="my-url-data.php?my_url_data=<?php echo $page_url; ?>&backlink_type=DoFollow">
            <span style="font-weight: bold; margin-right: 5px; color: #ff6000; font-size: 18px;">Total: </span>
            <span style="color: green; font-size: 17px; font-weight: bold;"><?php echo $DoFollow_backlink; ?></span>
          </a>
        </p>


        <!------------------[DoFollow Commenting Baklink Count Code Start]-------------------->
        <?php 
        $DoFollow_Com_backlink=0; 
        ////SELECT MYSQLI DATABASE
        $query1 = "SELECT * FROM webinformer_backlink WHERE 
                   my_link='$page_url' AND 
                   link_type='DoFollow' AND
                   backlink_category='Commenting' AND active_status='' ";

        $main_query = mysqli_query($conn, $query1);

        while ($result = mysqli_fetch_array($main_query)) 
        {
           $DoFollow_Com_backlink++;
        }
          ?>
        <span style="font-weight: bold; color: black; float: left;">
          Com:
        </span>
        <span style="color: black; float: right; margin-right: 10px;">
          <?php echo $DoFollow_Com_backlink; ?>
        </span>
        <!------------------[DoFollow Commenting Baklink Count Code End]-------------------->

        <br>

        <!------------------[DoFollow Profile Baklink Count Code Start]-------------------->
        <?php 
        $DoFollow_Pro_backlink=0; 
        ////SELECT MYSQLI DATABASE
        $query1 = "SELECT * FROM webinformer_backlink WHERE 
                   my_link='$page_url' AND 
                   link_type='DoFollow' AND
                   backlink_category='Profile' AND active_status='' ";

        $main_query = mysqli_query($conn, $query1);

        while ($result = mysqli_fetch_array($main_query)) 
        {
           $DoFollow_Pro_backlink++;
        }
          ?>
        <span style="font-weight: bold; color: black; float: left;">
          Pro:
        </span>
        <span style="color: black; float: right; margin-right: 10px;">
          <?php echo $DoFollow_Pro_backlink; ?>
        </span>
        <!------------------[DoFollow Profile Baklink Count Code End]-------------------->

        <br>

        <!------------------[DoFollow Web 2.0 Baklink Count Code Start]-------------------->
        <?php 
        $DoFollow_Web_2_0_backlink=0; 
        ////SELECT MYSQLI DATABASE
        $query1 = "SELECT * FROM webinformer_backlink WHERE 
                   my_link='$page_url' AND 
                   link_type='DoFollow' AND
                   backlink_category='Web 2.0' AND active_status='' ";

        $main_query = mysqli_query($conn, $query1);

        while ($result = mysqli_fetch_array($main_query)) 
        {
           $DoFollow_Web_2_0_backlink++;
        }
          ?>
        <span style="font-weight: bold; color: black; float: left;">
          2.0:
        </span>
        <span style="color: black; float: right; margin-right: 10px;">
          <?php echo $DoFollow_Web_2_0_backlink; ?>
        </span>
        <!------------------[DoFollow Web 2.0 Baklink Count Code End]-------------------->

        <br>

        <!------------------[DoFollow Guest Post Baklink Count Code Start]-------------------->
        <?php 
        $DoFollow_GP_backlink=0; 
        ////SELECT MYSQLI DATABASE
        $query1 = "SELECT * FROM webinformer_backlink WHERE 
                   my_link='$page_url' AND 
                   link_type='DoFollow' AND
                   backlink_category='Guest Post' AND active_status='' ";

        $main_query = mysqli_query($conn, $query1);

        while ($result = mysqli_fetch_array($main_query)) 
        {
           $DoFollow_GP_backlink++;
        }
          ?>
        <span style="font-weight: bold; color: black; float: left;">
          GP:
        </span>
        <span style="color: black; float: right; margin-right: 10px;">
          <?php echo $DoFollow_GP_backlink; ?>
        </span>
        <!------------------[DoFollow Guest Post Baklink Count Code End]-------------------->


        <br>


        <!------------------[DoFollow Exchange Baklink Count Code Start]-------------------->
        <?php 
        $DoFollow_Exc_backlink=0; 
        ////SELECT MYSQLI DATABASE
        $query1 = "SELECT * FROM webinformer_backlink WHERE 
                   my_link='$page_url' AND 
                   link_type='DoFollow' AND
                   backlink_category='Guest Post' AND active_status='' ";

        $main_query = mysqli_query($conn, $query1);

        while ($result = mysqli_fetch_array($main_query)) 
        {
           $DoFollow_Exc_backlink++;
        }
          ?>
        <span style="font-weight: bold; color: black; float: left;">
          Exc:
        </span>
        <span style="color: black; float: right; margin-right: 10px;">
          <?php echo $DoFollow_Exc_backlink; ?>
        </span>
        <!------------------[DoFollow Exchange Baklink Count Code End]-------------------->

        <br>


         <!------------------[DoFollow  Earn Count Code Start]-------------------->
        <?php 
        $DoFollow_Earn_backlink=0; 
        ////SELECT MYSQLI DATABASE
        $query1 = "SELECT * FROM webinformer_backlink WHERE 
                   my_link='$page_url' AND 
                   link_type='DoFollow' AND
                   backlink_category='Earn' AND active_status='' ";

        $main_query = mysqli_query($conn, $query1);

        while ($result = mysqli_fetch_array($main_query)) 
        {
           $DoFollow_Earn_backlink++;
        }
          ?>
        <span style="font-weight: bold; color: black; float: left;">
          Earn:
        </span>
        <span style="color: black; float: right; margin-right: 10px;">
          <?php echo $DoFollow_Earn_backlink; ?>
        </span>
        <!------------------[DoFollow Earn Baklink Count Code End]-------------------->

      </td>
      <!------------- Dofollow Count End --------->




      <!------------- Nofollow Count Start --------->
      <td style="text-align: center;">
        <?php 
        $NoFollow_backlink=0; 
        ////SELECT MYSQLI DATABASE
        $query1 = "SELECT * FROM webinformer_backlink WHERE my_link='$page_url' AND link_type='NoFollow' AND active_status='' ";
        $main_query = mysqli_query($conn, $query1);

        while ($result = mysqli_fetch_array($main_query)) 
        {
           $NoFollow_backlink++;
        }
          ?>
        <p style="border-bottom: 2px solid black;">
          <a href="my-url-data.php?my_url_data=<?php echo $page_url; ?>&backlink_type=NoFollow">
            <span style="font-weight: bold; margin-right: 5px; color: red; font-size: 18px;">Total: </span>
            <span style="color: green; font-size: 17px; font-weight: bold;"><?php echo $NoFollow_backlink; ?></span>
          </a>
        </p>



        <!------------------[NoFollow Commenting Baklink Count Code Start]-------------------->
        <?php 
        $NoFollow_Com_backlink=0; 
        ////SELECT MYSQLI DATABASE
        $query1 = "SELECT * FROM webinformer_backlink WHERE 
                   my_link='$page_url' AND 
                   link_type='NoFollow' AND
                   backlink_category='Commenting' AND active_status='' ";

        $main_query = mysqli_query($conn, $query1);

        while ($result = mysqli_fetch_array($main_query)) 
        {
           $NoFollow_Com_backlink++;
        }
          ?>
        <span style="font-weight: bold; color: black; float: left;">
          Com:
        </span>
        <span style="color: black; float: right; margin-right: 10px;">
          <?php echo $NoFollow_Com_backlink; ?>
        </span>
        <!------------------[NoFollow Commenting Baklink Count Code End]-------------------->

        <br>

        <!------------------[NoFollow Profile Baklink Count Code Start]-------------------->
        <?php 
        $NoFollow_Pro_backlink=0; 
        ////SELECT MYSQLI DATABASE
        $query1 = "SELECT * FROM webinformer_backlink WHERE 
                   my_link='$page_url' AND 
                   link_type='NoFollow' AND
                   backlink_category='Profile' AND active_status='' ";

        $main_query = mysqli_query($conn, $query1);

        while ($result = mysqli_fetch_array($main_query)) 
        {
           $NoFollow_Pro_backlink++;
        }
          ?>
        <span style="font-weight: bold; color: black; float: left;">
          Pro:
        </span>
        <span style="color: black; margin-left: 7px; float: right; margin-right: 10px;">
          <?php echo $NoFollow_Pro_backlink; ?>
        </span>
        <!------------------[NoFollow Profile Baklink Count Code End]-------------------->


        <br>


        <!------------------[NoFollow Web 2.0 Baklink Count Code Start]-------------------->
        <?php 
        $NoFollow_Web_2_0_backlink=0; 
        ////SELECT MYSQLI DATABASE
        $query1 = "SELECT * FROM webinformer_backlink WHERE 
                   my_link='$page_url' AND 
                   link_type='NoFollow' AND
                   backlink_category='Web 2.0' AND active_status='' ";

        $main_query = mysqli_query($conn, $query1);

        while ($result = mysqli_fetch_array($main_query)) 
        {
           $NoFollow_Web_2_0_backlink++;
        }
          ?>
        <span style="font-weight: bold; color: black; float: left;">
          2.0:
        </span>
        <span style="color: black; float: right; margin-right: 10px;">
          <?php echo $NoFollow_Web_2_0_backlink; ?>
        </span>
        <!------------------[NoFollow Web 2.0 Baklink Count Code End]-------------------->


        <br>


        <!------------------[NoFollow Guest Post Baklink Count Code Start]-------------------->
        <?php 
        $NoFollow_GP_backlink=0; 
        ////SELECT MYSQLI DATABASE
        $query1 = "SELECT * FROM webinformer_backlink WHERE 
                   my_link='$page_url' AND 
                   link_type='NoFollow' AND
                   backlink_category='Guest Post' AND active_status='' ";

        $main_query = mysqli_query($conn, $query1);

        while ($result = mysqli_fetch_array($main_query)) 
        {
           $NoFollow_GP_backlink++;
        }
          ?>
        <span style="font-weight: bold; color: black; float: left;">
          GP:
        </span>
        <span style="color: black; float: right; margin-right: 10px;">
          <?php echo $NoFollow_GP_backlink; ?>
        </span>
        <!------------------[NoFollow Guest Post Baklink Count Code End]-------------------->


        <br>


        <!------------------[NoFollow Exchange Baklink Count Code Start]-------------------->
        <?php 
        $NoFollow_Exc_backlink=0; 
        ////SELECT MYSQLI DATABASE
        $query1 = "SELECT * FROM webinformer_backlink WHERE 
                   my_link='$page_url' AND 
                   link_type='NoFollow' AND
                   backlink_category='Exchange' AND active_status='' ";

        $main_query = mysqli_query($conn, $query1);

        while ($result = mysqli_fetch_array($main_query)) 
        {
           $NoFollow_Exc_backlink++;
        }
          ?>
        <span style="font-weight: bold; color: black; float: left;">
          Exc:
        </span>
        <span style="color: black; float: right; margin-right: 10px;">
          <?php echo $NoFollow_Exc_backlink; ?>
        </span>
        <!------------------[NoFollow Exchange Baklink Count Code End]-------------------->


        <br>


        <!------------------[NoFollow  Earn Count Code Start]-------------------->
        <?php 
        $NoFollow_Earn_backlink=0; 
        ////SELECT MYSQLI DATABASE
        $query1 = "SELECT * FROM webinformer_backlink WHERE 
                   my_link='$page_url' AND 
                   link_type='NoFollow' AND
                   backlink_category='Earn' AND active_status='' ";

        $main_query = mysqli_query($conn, $query1);

        while ($result = mysqli_fetch_array($main_query)) 
        {
           $NoFollow_Earn_backlink++;
        }
          ?>
        <span style="font-weight: bold; color: black; float: left;">
          Earn:
        </span>
        <span style="color: black; float: right; margin-right: 10px;">
          <?php echo $NoFollow_Earn_backlink; ?>
        </span>
        <!------------------[NoFollow Earn Baklink Count Code End]-------------------->

      </td>
      <!------------- Nofollow Count End --------->




      <!------------ [Referring Domains Code Start] ------------------>
      <td>
        <?php 
          $count=0; 

          ////SELECT MYSQLI DATABASE
          $query1 = "SELECT referring_domains, count(referring_domains) AS amount 
                    FROM webinformer_backlink 
                    WHERE my_link='$page_url' AND active_status=''
                    GROUP BY referring_domains
                    ORDER BY amount
                    DESC ";

          $main_query = mysqli_query($conn, $query1);

          while ($result = mysqli_fetch_array($main_query)) 
          {
            $referring_domains = $result['referring_domains'];
            $count++;
          }  
        ?>
        <span style="font-weight: bold; font-size: 17px;">
          <?php  echo $count; ?>
        </span>
      </td>
      <!------------ [Referring Domains Code Start] ------------------>


      <!-------------------- Lost Backlink Count ---------------------->
      <td style="font-weight: bold; color: red; font-size: 19px; text-align: center;">
        <?php 
        $total_backlink=0; 
        ////SELECT MYSQLI DATABASE
        $query1 = "SELECT * FROM webinformer_backlink WHERE my_link='$page_url' AND active_status='Lost' ";
        $main_query = mysqli_query($conn, $query1);

        while ($result = mysqli_fetch_array($main_query)) 
        {
           $total_backlink++;
        }
            //////Echo Total This URL Backlink
            echo $total_backlink;
          ?>
      </td>
      <!-------------------- Lost Backlink Count ---------------------->
    </tr>
    <?php }?>
</table>
  </div>




<!-----------------------------------[Pagination Code Start]----------------------------------------------->
<div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC; margin-top: 0;'>
<strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
</div>

<ul class="pagination_11">
  <?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>
    
  <li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
    <a <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>>Previous</a>
  </li>
       
    <?php 
  if ($total_no_of_pages <= 10){     
    for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
      if ($counter == $page_no) {
       echo "<li class='active'><a>$counter</a></li>";  
        }else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
        }
        }
  }
  elseif($total_no_of_pages > 10){
    
  if($page_no <= 4) {     
   for ($counter = 1; $counter < 8; $counter++){     
      if ($counter == $page_no) {
       echo "<li class='active'><a>$counter</a></li>";  
        }else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
        }
        }
    echo "<li><a>...</a></li>";
    echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
    echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
    }

   elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {     
    echo "<li><a href='?page_no=1'>1</a></li>";
    echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";
        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {     
           if ($counter == $page_no) {
       echo "<li class='active'><a>$counter</a></li>";  
        }else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
        }                  
       }
       echo "<li><a>...</a></li>";
     echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
     echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";      
            }
    
    else {
        echo "<li><a href='?page_no=1'>1</a></li>";
    echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";

        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
          if ($counter == $page_no) {
       echo "<li class='active'><a>$counter</a></li>";  
        }else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
        }                   
                }
            }
  }
?>
    
  <li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
  <a <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>>Next</a>
  </li>
    <?php if($page_no < $total_no_of_pages){
    echo "<li><a href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
    } ?>
</ul>
<!-----------------------------------[Pagination Code Start]----------------------------------------------->

</center>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

  </center>
  <br>
  <br>



      	</div>
    </div>




<script type="text/javascript">
  function hideform() {
    var x = document.getElementById('add_page_btn');
    var b = document.getElementById('form_div');


    if (b.style.display === 'block') {
        b.style.display = 'none';

    } else {
        b.style.display = 'block';
    }
}
</script>

<!------------ Javascript Link -------------------->
    <script src="sidebar-files/js/jquery.min.js"></script>
    <script src="sidebar-files/js/popper.js"></script>
    <script src="sidebar-files/js/bootstrap.min.js"></script>
    <script src="sidebar-files/js/main.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
<!------------ Javascript Link -------------------->
</body>
</html>