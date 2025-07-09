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

#backlink_style{
	color: #ff6000; 
	font-weight: bold;
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
?>






<!DOCTYPE html>
<html>
<head>
	<title>All Backlink</title>
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
      		<a href="../log-out.php" id="logout_btn"><i class="fa fa-sign-out" aria-hidden="true"></i>  logout</a>
    	</div>
	</nav>
	<br>
	<!------------------[Main Top Bar]---------------->

	<br>
	<center>
<div style="width: 95%; margin-bottom: 80px; margin-top: 8px;">

	<div style="background: ; width: 100%; margin-bottom: 10px; overflow: hidden;">
		<div class="row">
			<div class="col-xl-2 col-lg-2" style="text-align: left; padding-top: 5px; padding-bottom: 5px;">
				<a style="font-size: 18px; font-weight: bold;" href="add-new-backlink.php">
					<i class="fa fa-plus-circle" aria-hidden="true"></i> Add New
				</a>
			</div>

			<div class="col-xl-10 col-lg-10" style="text-align: left;">
				<a href="total-backlink.php">
          <button style="margin-right: 20px;" class="btn btn-success">All Backlink
            <span style="color:black; margin-left:5px; font-size:14px;">(<?php echo $total_backlink; ?>)</span>
          </button>    
        </a>

				<a href="dofollow-backlink.php">
          <button style="margin-right: 20px; background: #AAB7B8;" class="btn">DoFollow</button>    
        </a>

        <a href="nofollow-backlink.php">
          <button style="margin-right: 20px; background: #AAB7B8;" class="btn">NoFollow</button>
        </a>

        <a href="commenting-backlink.php">
          <button style="margin-right: 20px; background: #AAB7B8;" class="btn">Commenting</button>
        </a>

        <a href="profile-backlink.php">
          <button style="margin-right: 20px; background: #AAB7B8;" class="btn">Profile</button>
        </a>

        <a href="guest-post-backlink.php">
          <button style="margin-right: 20px; background: #AAB7B8;" class="btn">Guest Post</button>
        </a>

        <a href="exchange-backlink.php">
          <button style="margin-right: 20px; background: #AAB7B8;" class="btn">Exchange</button>
        </a>

        <a href="web-2.0-backlink.php">
          <button style="margin-right: 20px; background: #AAB7B8;" class="btn">Web 2.0</button>
        </a>
				
			</div>
		</div>
	</div>

<table class="table table-striped table-hover">
  <thead class="bg-dark" style="color: white; text-align: center; font-size: 16px;">
    <tr>
      <th>TB</th>
      <th>Backlink URL</th>
      <th>Anchor and Target URL</th>
      <th>Type</th>
      <th>Date</th>
      <th>DA-PA</th>
      <th>Edit</th>
    </tr>
  </thead>
  	<?php

////////////////////////////[Pagination Code Start]/////////////////////////////////////
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

  $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM `webinformer_backlink`  WHERE active_status='' ");
  $total_records = mysqli_fetch_array($result_count);
  $total_records = $total_records['total_records'];
  $total_no_of_pages = ceil($total_records / $total_records_per_page);
  $second_last = $total_no_of_pages - 1; // total page minus 1
  ////////////////////////////[Pagination Code End]/////////////////////////////////////


  		$no=0;
        $query1 = "SELECT  * FROM  webinformer_backlink WHERE active_status='' order by 1 DESC LIMIT $offset, $total_records_per_page";
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

      <td><?php echo $create_date ?></td>

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


<br>


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
</div>
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
</html