<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
<head>
    <title>Profesional CV - <?=$nama;?></title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Profesional Indonesia CV Online">
    <meta name="author" content="Profesional.id-<?=$nama;?>">    
    <link rel="shortcut icon" href="<?=base_url();?>favicon.ico">  
   
    <!-- Global CSS -->
    <link rel="stylesheet" href="<?=base_url();?>assets/plugins/bootstrap/css/bootstrap.min.css">   
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="<?=base_url();?>assets/plugins/font-awesome/css/font-awesome.css">
    
    <?php if($cv =="simpleblue"){ ?>
     <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,400italic,300italic,300,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- Theme CSS -->  
    <link id="theme-style" rel="stylesheet" href="<?=base_url();?>assets/css/styles.css">
    <?php } ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


    <!-- ===========================
    THEME INFO
    =========================== -->

    <!-- ===========================
    SITE TITLE
    =========================== -->

    <!-- ===========================
    FAVICONS
    =========================== -->
    <link rel="icon" href="img/favicon.png">
    <link rel="apple-touch-icon" sizes="144x144" href="img/apple-touch-icon-ipad-retina.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-iphone-retina.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-ipad.png" />
    <link rel="apple-touch-icon" sizes="57x57" href="img/apple-touch-icon-iphone.png" />

    <!-- ===========================
    STYLESHEETS
    =========================== -->
    <?php if($cv =="modern"){ ?>
    <link rel="stylesheet" href="<?=base_url();?>assets/css/style2.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/css/responsive.css">
    <link href='//fonts.googleapis.com/css?family=Kristi|Alegreya+Sans:300' rel='stylesheet' type='text/css'>

    <?php } ?>
    <!-- ===========================
    FONTS & ICONS
    =========================== -->
    

    <!--[if IE]>
        <script src="https://cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://cdn.jsdelivr.net/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<style>
.container2 {
    width: 100% !important;
}
/*
A custom Bootstrap 3.1 template
from http://bootply.com

This CSS code should follow the 'bootstrap.css'
in your HTML file.

license: MIT
author: bootply.com
*/

.icon-bar {
    background-color:#fff;
}

.navbar-trans {
    background-color:#279ddd;
    color:#fff;
}

.navbar-trans li>a:hover,.navbar-trans li>a:focus,.navbar-trans li.active {
    background-color:#38afef;
}

.navbar-trans a{
    color:#fefefe;
}

.navbar-trans .form-control:focus {
    border-color: #eee;
    outline: 0;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,0.075),0 0 8px rgba(100,100,100,0.6);
    box-shadow: inset 0 1px 1px rgba(0,0,0,0.075),0 0 8px rgba(100,100,100,0.6);
}
  
.well {
    border-color:transparent;
}

a.list-group-item.active,[class*='-info'] {
    background-color: #168ccc;
    color:#fff;
}

.padtop25{
  margin-top: 35px;
}

.padtop35{
   margin-top:65px;
}

.navbar-right{
  margin-right: 20px !important;
}

.signUp{
  background-color: #FF9900;
}
.signUp:hover{
  background-color: #99FF00 !important;
}
.navbar-brand{
  font-weight: 900;
  font-size: 28px;
}
</style>
<nav class="navbar navbar-trans navbar-fixed-top" role="navigation">
  <div class="container2">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapsible">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Profesional.ID</a>
    </div>
    <div class="navbar-collapse collapse" id="navbar-collapsible">
      <ul class="nav navbar-nav navbar-right">
        <?php if($this->session->userdata('login')){ ?>
        <li><a href="<?=base_url();?>user/profile">Setting CV</a></li>
        <li><a href="<?=base_url();?>main/logOut">LogOut</a></li>
        <?php }else{ ?>
          <li class="signUp"><a href="http://profesional.id"><b>Buat CV Anda, GRATIS!</b></a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>
