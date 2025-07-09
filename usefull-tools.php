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








<!DOCTYPE html>
<html>
<head>
	<title>Useful Tools</title>
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
                    <a href="post-editor.php"><span class="fa fa-pencil-square-o mr-3"></span> Post Editor</a>
                </li>

              <li class="active">
                <a href="usefull-tools.php"><span class="fa fa-wrench mr-3"></span> Tools</a>
              </li>

        	</ul>
    	</nav>
    	<!-------------------------[Side Bar Code End]------------------------>


    	<!--------------------[Content Menu Start]----------------------->
      	<div id="content" class="p-4 p-md-5 pt-5">


          <div style="background: #3A4450; padding: 30px;">
            <div style="margin-bottom: 50px;">

              <br>
               <!--------- [First Letter Capitalize]----------->
              <div>
                <label style="color: white; font-size: 18px;">Image Alt Text</label>
                <input type="text" class="form-control" id="Alt_Text" style="text-transform:capitalize; font-size: 15px;">
              </div>

              <br>
              <br>

              <!--------- [Text To Link Craete]----------->
              <div>
                <label style="color: white; font-size: 18px;">Image URL</label>
                <input type="text" class="form-control"   onkeyup="Image_URL(this)" id="atl_to_url" style="font-size: 15px;">
              </div>
             

            </div>
          </div>



          <br>
          <br>
          <div style="background: #3A4450; padding: 30px;">
            <div style="margin-bottom: 50px;">
              <!--------- [Text To Link Craete]----------->
              <div>
                <label style="color: white; font-size: 18px;">Text To Link Create</label>
                <input type="text" class="form-control" onkeyup="this.value=LinkCreate(this.value);" style="font-size: 15px;">
              </div>

              <br>
              <br>

              <!--------- [First Letter Capitalize]----------->
              <div>
                <label style="color: white; font-size: 18px;">First Letter Capitalize</label>
                <input type="text" class="form-control" onkeyup="this.value=First_Letter_Capitalize(this.value);" style="text-transform:capitalize; font-size: 15px;">
              </div>

              <br>
              <br>

              <div style="margin-bottom: 50px;">
              <!--------- [Dash Remove And Text Capitalize]----------->
              <div>
                <label style="color: white; font-size: 18px;">(-) Dash Remove And First Letter Capitalize</label>
                <input type="text" class="form-control" onkeyup="this.value=DashRemove(this.value);" style="text-transform:capitalize; font-size: 15px;">
              </div>

              <br>
              <br>

              <!--------- [Underscore Remove And Text Capitalize]----------->
              <div>
                <label style="color: white; font-size: 18px;">(_) Underscore Remove And First Letter Capitalize</label>
                <input type="text" class="form-control" onkeyup="this.value=UnderscoreRemove(this.value);" style="text-transform:capitalize; font-size: 15px;">
              </div>

              <br>
              <br>

              <!--------- [All Word Capitalize]----------->
              <div>
                <label style="color: white; font-size: 18px;">All Word Capitalize</label>
                <input type="text" class="form-control" onkeyup="this.value=All_Word_Capitalize(this.value);" style="font-size: 15px;">
              </div>

              <br>
              <br>

              <!--------- [All Word LowerCase]----------->
              <div>
                <label style="color: white; font-size: 18px;">All Word LowerCase</label>
                <input type="text" class="form-control" onkeyup="this.value=All_Word_LowerCase(this.value);" style="font-size: 15px;">
              </div>
              
              
            </div>
          </div>



          



      	</div>

    </div>




<script type="text/javascript">
  
  window.onload = function() {
    var src = document.getElementById("Alt_Text"),
        dst = document.getElementById("atl_to_url");
    src.addEventListener('input', function() {
        src.value = src.value.toLowerCase();
        dst.value = src.value.split(' ').join('-').toLowerCase();
    });
};


  function Image_URL(input) {
            var regex = /[^a-z,0-9]/gi;
            input.value = input.value.split(' ').join('-').toLowerCase();
        }  

</script>








<script language="javascript" type="text/javascript">

  function LinkCreate(string) 
  {
    return string.split(' ').join('-').toLowerCase();
  }


  function First_Letter_Capitalize(string) 
  {
    return string.split('').join('').toLowerCase();
  }


  function DashRemove(string) 
  {
    return string.split('-').join(' ');
  }

  function UnderscoreRemove(string) 
  {
    return string.split('_').join(' ');
  }

  function All_Word_Capitalize(string) 
  {
    return string.split('').join('').toUpperCase();
  }

  function All_Word_LowerCase(string) 
  {
    return string.split('').join('').toLowerCase();
  }

</script>


<!------------ Sidebar Javascript Link -------------------->
    <script src="fashionaminoo/sidebar-files/js/jquery.min.js"></script>
    <script src="fashionaminoo/sidebar-files/js/popper.js"></script>
    <script src="fashionaminoo/sidebar-files/js/bootstrap.min.js"></script>
    <script src="fashionaminoo/sidebar-files/js/main.js"></script>
    <script src="fashionaminoo/bootstrap/js/bootstrap.js"></script>
<!------------ sidebar Javascript Link -------------------->
</body>
</html>
