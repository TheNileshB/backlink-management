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









<!DOCTYPE html>
<html>
<head>
  <title>Post Editor</title>
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
  


<script src="tinymce/tinymce.min.js"></script>

<script> 
    tinymce.init({
      selector: "#post_content",
      height: 600,
      
      mobile:{
        theme: "silver"
      },

      // To disable "Powered by TinyMCE"
      branding: false,
      
      ////// Font Size Set 
      fontsize_formats: "8px 10px 12px 14px 16px 17px 18px 20px 24px 28px 32px 36px 48px",

      //// All Plugins enable
      plugins: [
        "image,paste codesample",
        "imagetools textpattern colorpicker template save fullscreen stylebuttons",
        "advlist autolink link image lists charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
        "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
      ],

      ///// Tolls Bar Line 1
      toolbar1: "undo redo bold italic underline formatselect fontselect  fontsizeselect  ",

      //// Tools Bar Line 2
      toolbar2: " emoticons   link unlink bullist numlist forecolor backcolor alignleft aligncenter alignright alignjustify responsivefilemanager image media code",


      //////////////////// Top Menubar All Option Code Start ///////////////////////
      menu : {    
        file: {title: 'File', items: 'newdocument | print'},
        edit: {title: 'Edit', items: 'undo redo | cut copy | selectall'},
        insert: {title: 'Insert', items: 'link unlink | media image responsivefilemanager | emoticons charmap insertdatetime hr'},
        format: {title: 'Format', items: 'bold italic underline strikethrough superscript subscript codesample | formats forecolor backcolor | removeformat'},
        view: {title: 'View', items: 'visualaid | code visualblocks visualchars | code preview fullscreen'},
        table: {title: 'Table', items: 'inserttable tableprops deletetable | cell row column'},
      },
      menubar: 'file edit view insert format table',
      ////////////////// Top Menubar All Option Code End //////////////////////////



      ///// Fotter Status Bar
      statusbar: true,

      ////Right Click Menu
      contextmenu: false,


      convert_urls: false,
      paste_data_images: true,


      ///  Image Caption On
      ///image_caption: true,

      // enable title field in the Image dialog
      image_title: true,

      // enable image advance menu
      image_advtab: true,

      // enable automatic uploads of images represented by blob or data URIs
      automatic_uploads: true,

 });

</script>
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

              <li>
                    <a href="all-pages.php"><span class="fa fa-file-text mr-3"></span> All Pages</a>
              </li>

              <li class="active"> 
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
          <div>
        
            <textarea name="post_content" id="post_content"></textarea>

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
</html>


<style type="text/css">
body{
  background: #E1E1E1;
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

