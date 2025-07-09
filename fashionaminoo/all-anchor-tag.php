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

$search_anchor="";
if (isset($_GET['search_anchor']))
{
  $search_anchor = $_GET['search_anchor'];
}


?>






<!DOCTYPE html>
<html>
<head>
	<title>Anchor Tags</title>
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

	<center>
<div style="width: 80%; margin-bottom: 80px; margin-top: 8px;">

    <h1 style="font-weight: bold; color: black; font-size: 45px;">Anchor Tags</h1>
    <br>
    <br>

	<div style="background: ; width: 100%; margin-bottom: 0px; overflow: hidden;">
    <form action="" method="get">
		<div class="row">
			<div class="col-xl-7 col-lg-7" style="background: ; margin-left: 130px;">
          <input style="width: 100%; height: 40px; padding: 10px;" type="text" name="search_anchor" placeholder="Enter URL" value="<?php echo $search_anchor; ?>">
        </div>

        <div class="col-xl-2 col-lg-2" style="text-align: left; margin: 0; padding: 0; width: 40px;">
          <button type="submit" name="search_now" class="btn btn-info">
            Search
          </button>
        </div>
		</div>
    </form>
	</div>

<table class="table table-striped table-hover">
  <thead class="bg-dark" style="color: white; text-align: left; font-size: 16px;">
    <tr>
      <th>No.</th>
      <th>Anchor Tag</th>
      <th>Total Backlink</th>
      <th>View Backlink</th>
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

      $row_count=0;

      if ($search_anchor=="") 
        {
          $p_query1 = "SELECT anchor, count(anchor) AS amount
          FROM webinformer_backlink
          WHERE active_status=''
          GROUP BY anchor
          ORDER BY amount
          DESC";  
        }
        else
        {
          $p_query1 = "SELECT anchor, count(anchor) AS amount
          FROM webinformer_backlink
          WHERE anchor LIKE '%$search_anchor%' AND active_status=''
          GROUP BY anchor
          ORDER BY amount
          DESC";
        }

        $main_query = mysqli_query($conn, $p_query1);
        while ($result11 = mysqli_fetch_array($main_query)) 
        {
            $row_count++;
        }

  $total_records = $row_count;
  $total_no_of_pages = ceil($total_records / $total_records_per_page);
  $second_last = $total_no_of_pages - 1; // total page minus 1
  ////////////////////////////[Pagination Code End]/////////////////////////////////////



        $count=0;

        if ($search_anchor=="") 
        {
          $query1 = "SELECT anchor, count(anchor) AS amount
          FROM webinformer_backlink
          WHERE active_status=''
          GROUP BY anchor
          ORDER BY amount
          DESC  LIMIT $offset, $total_records_per_page";
        }
        else
        {
          $query1 = "SELECT anchor, count(anchor) AS amount
          FROM webinformer_backlink
          WHERE anchor LIKE '%$search_anchor%' AND active_status=''
          GROUP BY anchor
          ORDER BY amount
          DESC  LIMIT $offset, $total_records_per_page";
        }

        $main_query = mysqli_query($conn, $query1);
        while ($result = mysqli_fetch_array($main_query)) {

            $count++;
            $anchor_tag      = $result['anchor']; 
            $total_anchor_count   = $result['amount'];
    ?>
    <tr style="text-align: left;">
      <td><b><?php echo $count; ?></b></td>

      <!------- Referring Domains Show ------->
      <td>
        <span id="backlink_style"><?php echo substr($anchor_tag, 0,120); ?></span>
        <span id="link_redirect_icon">
          <a target="_blank" href="<?php echo $backlink ?>">
            <i class="fa fa-external-link" aria-hidden="true"></i>
          </a>
        </span>
      </td>

      <!--------[Total Backlink]---------->
      <td style="font-weight: bold; color: red; font-size: 19px;">
        <?php echo $total_anchor_count; ?>
      </td>

      <!--------[Total Backlink]---------->
      <td>
        <a href="anchor-tag-all-backlink.php?search_anchor=<?php echo $anchor_tag; ?>">
          <button class="btn btn-success">View</button>
        </a>
      </td>

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
    <a <?php if($page_no > 1){ echo "href='?search_anchor=$search_anchor&page_no=$previous_page'"; } ?>>Previous</a>
  </li>
       
    <?php 
  if ($total_no_of_pages <= 10){     
    for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
      if ($counter == $page_no) {
       echo "<li class='active'><a>$counter</a></li>";  
        }else{
           echo "<li><a href='?search_anchor=$search_anchor&page_no=$counter'>$counter</a></li>";
        }
        }
  }
  elseif($total_no_of_pages > 10){
    
  if($page_no <= 4) {     
   for ($counter = 1; $counter < 8; $counter++){     
      if ($counter == $page_no) {
       echo "<li class='active'><a>$counter</a></li>";  
        }else{
           echo "<li><a href='?search_anchor=$search_anchor&page_no=$counter'>$counter</a></li>";
        }
        }
    echo "<li><a>...</a></li>";
    echo "<li><a href='?search_anchor=$search_anchor&page_no=$second_last'>$second_last</a></li>";
    echo "<li><a href='?search_anchor=$search_anchor&page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
    }

   elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {     
    echo "<li><a href='?search_anchor=$search_anchor&page_no=1'>1</a></li>";
    echo "<li><a href='?search_anchor=$search_anchor&page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";
        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {     
           if ($counter == $page_no) {
       echo "<li class='active'><a>$counter</a></li>";  
        }else{
           echo "<li><a href='?search_anchor=$search_anchor&page_no=$counter'>$counter</a></li>";
        }                  
       }
       echo "<li><a>...</a></li>";
     echo "<li><a href='?search_anchor=$search_anchor&page_no=$second_last'>$second_last</a></li>";
     echo "<li><a href='?search_anchor=$search_anchor&page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";      
            }
    
    else {
        echo "<li><a href='?search_anchor=$search_anchor&page_no=1'>1</a></li>";
    echo "<li><a href='?search_anchor=$search_anchor&page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";

        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
          if ($counter == $page_no) {
       echo "<li class='active'><a>$counter</a></li>";  
        }else{
           echo "<li><a href='?search_anchor=$search_anchor&page_no=$counter'>$counter</a></li>";
        }                   
                }
            }
  }
?>
    
  <li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
  <a <?php if($page_no < $total_no_of_pages) { echo "href='?search_anchor=$search_anchor&page_no=$next_page'"; } ?>>Next</a>
  </li>
    <?php if($page_no < $total_no_of_pages){
    echo "<li><a href='?search_anchor=$search_anchor&page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
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



<!------------ Javascript Link -------------------->
    <script src="sidebar-files/js/jquery.min.js"></script>
    <script src="sidebar-files/js/popper.js"></script>
    <script src="sidebar-files/js/bootstrap.min.js"></script>
    <script src="sidebar-files/js/main.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
<!------------ Javascript Link -------------------->
</body>
</html