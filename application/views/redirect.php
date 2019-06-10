<head>
<title> Redirecting you to <?=$url;?></title>
   <link href="<?=base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" />
 <link href="<?=base_url();?>assets/css/jquery-ui.theme.min.css" rel="stylesheet" />
     <script src="<?=base_url();?>assets/js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="<?=base_url();?>assets/js/jquery-ui.min.js" type="text/javascript"></script>
	<script src="<?=base_url();?>assets/js/bootstrap.min.js" type="text/javascript"></script>  
</head>
<style>
             #loader {
  position: fixed;
  left: 50%;
/*  top: 50%;*/
  z-index: 1;
  width: 150px;
  height: 150px;
  margin: -75px 0 0 -75px;
  border: 16px solid #99FF00;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}
</style>
<body>
<div class="row">
<div class="col-md-12" style="padding-top: 10%">
	<center>
	
		<h3>Relax, Anda akan di arahkan ke tujuan halaman anda dalam 5 Detik</h3>
		<h5><a href="<?=$url;?>" id="link" noIndex><?=htmlentities($url);?></a></h5>
	</center>
</div>
<div class="col-md-12" style="padding-top: 5%">

			<div id="loader"></div>
</div>
<div class="col-md-12" style="padding-top:15%">
<center>		<h5><small>Halaman ini tidak terindex oleh search engine</small></h5>
	</center>
	</div>
</div>
</div>
</body>
<script>
$(document).ready(function() {
 var link = $('#link').attr('href');
window.location = link;
})
</script>