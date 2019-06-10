<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Profesional.ID || Forum Profesional Indonesia - Kembangkan Karir anda bersama Profesional Indonesia">
<meta name="author" content="">
<title>Profesional.ID - Komunitas Profesional Indonesia - Gratis CV Online</title>
<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="<?=base_url();?>assets/css/bootstrap.min.css" type="text/css">
<link rel="icon" href="<?=base_url();?>assets/favicon.ico" type="image/x-icon">
<!-- Custom Fonts -->
<link href='https://fonts.googleapis.com/css?family=Mrs+Sheppards%7CDosis:300,400,700%7COpen+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800;' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?=base_url();?>assets/css/font-awesome.min.css" type="text/css">
<!-- Plugin CSS -->
<link rel="stylesheet" href="<?=base_url();?>assets/css/animate-layana.min.css" type="text/css">
<!-- Custom CSS -->
<link rel="stylesheet" href="<?=base_url();?>assets/css/style-home.css" type="text/css">
<!-- sweet alert -->
<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/sweet-alert.css">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body id="page-top">
<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
<div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand page-scroll" href="#page-top"><img src="<?=base_url();?>assets/img/logo.png" alt="logolayana"></a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
            <li>
            <a class="page-scroll" href="#homepage">Login</a>
            </li>
            <li>
            <a class="page-scroll" href="#about">Tentang Kami</a>
            </li>
            <li>
            <a class="page-scroll" href="#cvOnline">CV Online</a>
            </li>
            <li>
            <a class="page-scroll" href="#social">Kontak</a>
            </li>
          </ul>
    </div>
    <!-- /.navbar-collapse -->
</div>
<!-- /.container -->
</nav>
<style>
@-webkit-keyframes lld {
  0%   { transform: rotate(0deg) scale(1); }
  50%  { transform: rotate(180deg) scale(1.1); }
  100% { transform: rotate(360deg) scale(1); }
}
@-moz-keyframes lld {
  0%   { transform: rotate(0deg) scale(1); }
  50%  { transform: rotate(180deg) scale(1.1); }
  100% { transform: rotate(360deg) scale(1); }
}
@-o-keyframes lld {
  0%   { transform: rotate(0deg) scale(1); }
  50%  { transform: rotate(180deg) scale(1.1); }
  100% { transform: rotate(360deg) scale(1); }
}
@keyframes lld {
  0%   { transform: rotate(0deg) scale(1); }
  50%  { transform: rotate(180deg) scale(1.1); }
  100% { transform: rotate(360deg) scale(1); }
}

.m-progress {
    position: relative;
    opacity: .8;
    color: transparent !important;
    text-shadow: none !important;
}

.m-progress:hover,
.m-progress:active,
.m-progress:focus {
    cursor: default;
    color: transparent;
    outline: none !important;
    box-shadow: none;
}

.m-progress:before {
    content: '';
    
    display: inline-block;
    
    position: absolute;
    background: transparent;
    border: 1px solid #fff;
    border-top-color: transparent;
    border-bottom-color: transparent;
    border-radius: 50%;
    
    box-sizing: border-box;
    
    top: 50%;
    left: 50%;
    margin-top: -12px;
    margin-left: -12px;
    
    width: 24px;
    height: 24px;
    
    -webkit-animation: lld 1s ease-in-out infinite;
    -moz-animation:    lld 1s ease-in-out infinite;
    -o-animation:      lld 1s ease-in-out infinite;
    animation:         lld 1s ease-in-out infinite;
}

.btn-default.m-progress:before {
    border-left-color: #333333;
    border-right-color: #333333;
}

.btn-lg.m-progress:before {
    margin-top: -16px;
    margin-left: -16px;
    
    width: 32px;
    height: 32px;
}

.btn-sm.m-progress:before {
    margin-top: -9px;
    margin-left: -9px;
    
    width: 18px;
    height: 18px;
}

.btn-xs.m-progress:before {
    margin-top: -7px;
    margin-left: -7px;
    
    width: 14px;
    height: 14px;
}
#homepage{
    max-height: 800px;
    width: 100%;
    background: #4055f0;
    margin-top: 2%;
    padding: 190px 100px;
    background-image: url("<?=base_url();?>assets/img/header-copy.jpg");
    background-repeat: no-repeat;
     display: block;
     background-size:cover;

 }
#hFirst{
    font-size: 40px;
    color: white
}
#hSecond{
    margin-top:0px !important;
    color:white;
}
#MainTitle{
    padding-top: 55px;
    padding-left: 0px;
    font-size: 23px;
    color: white
}
.padding-top50{
    padding-top: 50px;
}
.padding-left0{
    padding-left: 0px !important;
}
.padding-top20{
    padding-top: 20px;
}

.padding-top40{
    padding-top: 40px !important;
}
.captionID{
    font-size:22px;
}

/* Credit to bootsnipp.com for the css for the color graph */
.colorgraph {
  height: 5px;
  border-top: 0;
  background: #c4e17f;
  border-radius: 5px;
  background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
}
.backgroundPutih{
    background: white;
    border-radius: 25px;
    padding-bottom: 20px;
    margin-top: -5% !important;
}

.CVColor{
    background-color:blue;
}

.pCV{
    padding-top: 30px;
    font-size: 17px;
}

.pCV2{
    padding-top: 30px;
    font-size: 22px;
}

.padding-top90{
    padding-top: 90px !important;
}

.birupucet{
    background: paleturquoise;
}

.cSize{
    width:100%;
    height:600px !important;
}

.padding-about{
    padding-top: 150px;
    padding-bottom: : 150px;
}

.padding-bottom{
    padding-bottom: 30px !important;
}
.backgroundPutih{
    display: none;
}
</style>

<!-- Section Intro Slider
================================================== -->
<div id="homepage">
    <div class="row">
        <div class="col-md-12">
        <div class="col-md-7 col-xs-12">
            <h2 id="hFirst">Jadilah Profesional diBidang Anda.</h2>
            <div class="col-md-4 col-xs-12 padding-top50 padding-left0">
                 <button class="btn btn-round btn-primary btn-xl login">Log In</button>
                 <button class="btn btn-round btn-info btn-xl daftar">Daftar</button>
            </div>
            <div class="col-md-6">
                 <h1 id="MainTitle"><i>Gratis CV Online</i></h1>
            </div>
        </div>
        <div class="col-md-5 col-xs-12 backgroundPutih">
            <fieldset>
                <h2>Selamat Datang, Profesional</h2>
                <hr class="colorgraph">
                <center><h4><b>Form <span class="loginText">Login </span> <span class="daftarText"> Daftar </span> <span class="lupaText"> Lupa Password</span></b></h4></center>
                <div class="form-group">
                    <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address">
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="password" class="form-control input-lg" min="8" placeholder="Password">
                </div>
                 <div class="form-group konfirmasiPass">
                    <input type="password" name="cpassword" id="cpassword" class="form-control input-lg" min="8" placeholder="Konfirmasi Password">
                </div>
                <span class="button-checkbox alternateLogin">
                    <button type="button" class="btn" data-color="info">Selalu Login</button>
                    <input type="checkbox" name="remember_me" id="remember_me" checked="checked" class="hidden">
                    <a href="#" class="btn btn-link pull-right lupa">Lupa Password?</a>
                </span>
                 <hr class="colorgraph">
                <center><?php echo $this->recaptcha->render(); ?></center>
               
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <button type="text" class="btn btn-lg btn-primary btn-block loginText" id="login">Login</button>
                        <button type="text" class="btn btn-lg btn-info btn-block daftarText" id="daftar">Daftar GRATIS</button>
                        <button type="text" class="btn btn-lg btn-success btn-block lupaText" id="lupa">Request Reset Password</button>
                    </div>
                </div>
            </fieldset>
         </div>
        </div>
    </div>
</div>
<!-- /.carousel -->

<!-- Section About
================================================== -->
<section id="about" class="padding-about">
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <h2 class="section-heading">Apa itu <b>Profesional.ID</b></h2>
            <hr>
            <p class="pCV2">
                Kami memiliki cita-cita untuk ikut membantu membangun bangsa Indonesia, dengan membentuk komunitas-komunitas profesional Indonesia. Kita berbagi ilmu dan pengalaman, serta membantu pendatang baru untuk menemukan solusi langsung dari Profesional dibidangnya.  
            </p>
        <!--     <div class="hideText">
             <h2 class="section-heading padding-top40"><b>CV Online</b>, Produk kami untuk Kemudahan Profesionalitas Anda</h2>
            <p>
                 Melihat statistik pengguna Internet Indonesia baik dari sisi mobile dan desktop yang bertumbuh pesat di setiap tahun, kami optimis untuk menghadirkan solusi CV Online sebagai solusi kemudahan anda untuk membawa identitas anda dimanapun anda berada. Tak perlu lagi anda melampirkan hard copy CV anda untuk HRD atau rekan kerja. 
            </p>
            </div> -->
    </div>
</div>
</div>
</section>

<!-- Section CV ========================== -->
<section id="cvOnline">
    <div class="col-md-12 birupucet">
        <div class="col-md-5">
               <img src="<?=base_url();?>assets/img/cv/cover-cv.png" class="img-responsive cSize">
        </div>
        <div class="col-md-7">
                 <h2 class="section-heading padding-top90"><b>CV Online</b>,<br>Untuk Kemudahan Profesionalitas Anda</h2>
                <p class="pCV">
                     Melihat statistik pengguna Internet Indonesia baik dari sisi mobile dan desktop yang bertumbuh pesat di setiap tahunnya, kami optimis untuk menghadirkan solusi CV Online sebagai solusi kemudahan anda untuk membawa identitas anda dimanapun anda berada. Tak perlu lagi anda melampirkan hard copy CV anda untuk HRD atau rekan kerja. 
                </p>
        </div>
    </div>
</section>
<div class="clearfix"></div>

<!-- Section after about
================================================== -->
<section class="no-padding" >
<div class="equal-heights">
<div class="padding-top40 padding-bottom">
    <center><h2 ><b>Mengapa CV Online Menjadi Solusi</b></h2></center>
</div>
<div class="col-md-4 bg-primary">
    <div class="box">
        <h2>Unik dan Profesional</h2>
        <p>
             Dengan kemudahan internet siapapun bisa mengakses CV dimanapun dan kapanpun, Tentu memberikan kesan positif dan profesional pada CV anda. 
        </p>
    </div>
</div>
<div class="col-md-4">
    <img src="<?=base_url();?>assets/img/getprofesional.jpg" alt="">
</div>
<div class="col-md-4 bg-dark">
    <div class="box">
        <h2>Dukungan Penuh <i>Mobile Friendly</i></h2>
        <p>
            Kami mendukung teknologi HTML5, sehingga CV anda akan selalu tampil sempurna baik di akses via desktop ataupun mobile.
        </p>
    </div>
</div>
</div>
<div class="equal-heights w-middle">
<div class="col-md-3 bg-gray">
   
        <h3 class="captionID"><b>#Meningkatkan</b> Kesempatan Karir</h3>
    </div>
</div>
<div class="col-md-3 bg-darkgray">
   
        <h3 class="captionID"><b>#CV Ringan</b> Hemat Quota</h3>
    </div>
</div>
<div class="col-md-3 bg-gray">
   
        <h3 class="captionID"><b>#Desain Profesional</b> dan Update</h3>
        
    </div>
</div>
<div class="col-md-3 bg-darkgray">
    <div>
        <h3 class="captionID"><b>#Mudah</b> di Gunakan</h3>
    </div>
</div>
</div>
</section>
<div class="clearfix">
</div>

<!--  -->
<!-- Section Social
================================================== -->
<section id="social" class="parallax parallax-image">
<div class="overlay" style="background:#222;opacity:0.5;">
</div>
<div class="wrapsection">
<div class="container">
    <div class="parallax-content">
        <div class="row wow fadeInLeft">
            <div class="col-md-3">
                <div class="funfacts text-center">
                    <div class="icon">
                        <a href="#"><i class="fa fa-twitter"></i></a>
                    </div>
                    <h4>Twitter</h4>
                </div>
            </div>
            <div class="col-md-3">
                <div class="funfacts text-center">
                    <div class="icon">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                    </div>
                    <h4>Facebook</h4>
                </div>
            </div>
            <div class="col-md-3">
                <div class="funfacts text-center">
                    <div class="icon">
                        <a href="#"><i class="fa fa-google"></i></a>
                    </div>
                    <h4>Google</h4>
                </div>
            </div>
            <div class="col-md-3">
                <div class="funfacts text-center">
                    <div class="icon">
                        <a href="#"><i class="fa fa-wordpress"></i></a>
                    </div>
                    <h4>Blog</h4>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</section>
<div class="clearfix">
</div>

<!-- Section Contact
================================================== -->
<!-- <section id="contact">
<div class="container">
<div class="row">
    <div class="col-md-8 col-md-offset-2 text-center">
        <h2 class="section-heading">CONTACT <b>US</b></h2>
        <hr class="primary">
        <p>
             Ready to start your next project with us? That's great! Give us a call or send us an email and we will get back to you as soon as possible!
        </p>
        <div class="regularform">
            <div class="done">
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    Your message has been sent. Thank you!
                </div>
            </div>
            <form method="post" action="contact.php" id="contactform" class="text-left">
                <input name="name" type="text" class="col-md-6 norightborder" placeholder="Your Name *">
                <input name="email" type="email" class="col-md-6" placeholder="E-mail address *">
                <textarea name="comment" class="col-md-12" placeholder="Message *"></textarea>
                <input type="submit" id="submit" class="contact submit btn btn-primary btn-xl" value="Send message">
            </form>
        </div>
    </div>
</div>
</div>
</section> -->

<!-- Section Footer
================================================== -->
<section class="bg-dark">
<div class="container">
<div class="row">
    <div class="col-md-12 text-center">
        <h1 class="bottombrand wow flipInX">Profesional .ID</h1>
        <p>
            &copy; 2017 Profesional.ID Powered by WowThemes.net
        </p>
    </div>
</div>
</div>
</section>

<!-- jQuery -->
<script src="<?=base_url();?>assets/js/jquery.js"></script>
<script src="<?=base_url();?>assets/js/bootstrap.min.js"></script>
<script src="<?=base_url();?>assets/js/parallax.js"></script>
<script src="<?=base_url();?>assets/js/contact.js"></script>
<script src="<?=base_url();?>assets/js/countto.js"></script>
<script src="<?=base_url();?>assets/js/jquery.easing.min.js"></script>
<script src="<?=base_url();?>assets/js/wow.min.js"></script>
<script src="<?=base_url();?>assets/js/common.js"></script>
    <script src="<?=base_url();?>assets/js/sweet-alert.min.js"></script>
<script type="text/javascript">
$('.backgroundPutih').hide();
$('.hideText').hide();
$('.konfirmasiPass').show();
$('.loginText').hide();
$('.daftarText').hide();
$('.lupaText').hide();
$('.login').click(function(){
    $('.backgroundPutih').fadeIn('slow');
     $('.konfirmasiPass').hide();
    $('#login').show();
    $('#daftar').hide();
    $('.alternateLogin').show();
    $('#password').show();
    $('.loginText').show();
    $('.daftarText').hide();
    $('.lupaText').hide();
});

$('.daftar').click(function(){
    $('.backgroundPutih').fadeIn('slow');
    $('#password').show();
    $('.konfirmasiPass').show();
    $('#login').hide();
    $('#daftar').show();
    $('.alternateLogin').hide();  
    $('.loginText').hide();
    $('.daftarText').show();
    $('.lupaText').hide();  
});

$('.lupa').click(function(){
    $('.backgroundPutih').fadeIn('slow');
    $('.konfirmasiPass').hide();
    $('#password').hide();
    $('#login').hide();
    $('#daftar').show();
    $('.alternateLogin').hide();  
    $('.loginText').hide();
    $('.daftarText').hide();
    $('.lupaText').show();  
});

$(window).scroll(function() {
    if($(window).scrollTop() > 400) {
         setTimeout(function(){$('.hideText').fadeIn('slow');},800);
    }
});

$('#login').click(function(){
    $(this).addClass('m-progress');
    var param = {
        'email'    : $('#email').val(),
        'password' : $('#password').val(),
        'g-recaptcha-response' : $('#g-recaptcha-response').val()
    }
    if(isValid(param.password)==false){
        swal('Error', 'Password hanya boleh menggunakan angka dan huruf saja','error');
        $('#login').removeClass('m-progress');

        return false;
    }
    var url = "<?=base_url();?>login/doLogin";
    $.post(url,param,function(data){
        var res = jQuery.parseJSON(data);
        $('#login').removeClass('m-progress');
        if(res.code == '1000'){
            swal('',res.msg,'success');
            $('#login').removeClass('m-progress');

            window.location.href = "<?=base_url();?>user";
        }else{
            swal('Error',res.msg,'error');
            $('#login').removeClass('m-progress');
            grecaptcha.reset();
        }
    })

})

$('#lupa').click(function(){
    $(this).addClass('m-progress');
    var param = {
        'email'    : $('#email').val(),
          'g-recaptcha-response' : $('#g-recaptcha-response').val()
    }
    var url = "<?=base_url();?>login/forgetPassword";
    $.post(url,param,function(data){
        var res = jQuery.parseJSON(data);
        $('#lupa').removeClass('m-progress');
        if(res.code == '1000'){
            swal('Ok',res.msg,'success');
            $('#lupa').removeClass('m-progress');
        }else{
            swal('Error',res.msg,'error');
            $('#lupa').removeClass('m-progress');
            grecaptcha.reset();
        }
    })
})

function isValid(str) {
    return !/[~`!@#$%\^&*()+=\-\[\]\\';,/{}|\\":<>\?]/g.test(str);
}

$('#daftar').click(function(){
    $(this).addClass('m-progress');
    var param = {
        'email'    : $('#email').val(),
        'password' : $('#password').val(),
        'cpassword' : $('#cpassword').val(),
        'g-recaptcha-response' : $('#g-recaptcha-response').val()
    }
    if(param.password !== param.cpassword){
        swal('Error', 'Password tidak sama','error');
        $('#daftar').removeClass('m-progress');
        return false;
    }
    if(param.password.length < 8){
        swal('Error', 'Password minimal 8 karakter','error');
        $('#daftar').removeClass('m-progress');
        return false; 
    }
    if(isValid(param.password)==false){
        swal('Error', 'Password hanya boleh menggunakan angka dan huruf saja','error');
        $('#daftar').removeClass('m-progress');
        return false;
    }
    var url = "<?=base_url();?>login/register";
    $.post(url,param,function(data){
        var res = jQuery.parseJSON(data);
        $('#daftar').removeClass('m-progress');
        if(res.code == '1000'){
            swal('',res.msg,'success');
        }else{
            swal('Error',res.msg,'error');
            grecaptcha.reset();
        }
    })
})
$(function(){
    $('.button-checkbox').each(function(){
        var $widget = $(this),
            $button = $widget.find('button'),
            $checkbox = $widget.find('input:checkbox'),
            color = $button.data('color'),
            settings = {
                    on: {
                        icon: 'glyphicon glyphicon-check'
                    },
                    off: {
                        icon: 'glyphicon glyphicon-unchecked'
                    }
            };

        $button.on('click', function () {
            $checkbox.prop('checked', !$checkbox.is(':checked'));
            $checkbox.triggerHandler('change');
            updateDisplay();
        });

        $checkbox.on('change', function () {
            updateDisplay();
        });

        function updateDisplay() {
            var isChecked = $checkbox.is(':checked');
            // Set the button's state
            $button.data('state', (isChecked) ? "on" : "off");

            // Set the button's icon
            $button.find('.state-icon')
                .removeClass()
                .addClass('state-icon ' + settings[$button.data('state')].icon);

            // Update the button's color
            if (isChecked) {
                $button
                    .removeClass('btn-default')
                    .addClass('btn-' + color + ' active');
            }
            else
            {
                $button
                    .removeClass('btn-' + color + ' active')
                    .addClass('btn-default');
            }
        }
        function init() {
            updateDisplay();
            // Inject the icon if applicable
            if ($button.find('.state-icon').length == 0) {
                $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i> ');
            }
        }
        init();
    });
});


</script>
</body>
</html>

