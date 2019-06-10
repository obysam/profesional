<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="<?=base_url();?>assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    Profesional <small>Online CV</small>
                </a>
            </div>

            <ul class="nav">
                <li class="sAktif active">
                    <a href="<?=base_url();?>adminx/tambahBerita">
                        <i class="pe-7s-user"></i>
                        <p>Kategori</p>
                    </a>
                </li>              
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><?=$title;?></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
								<p class="hidden-lg hidden-md"><?=$title;?></p>
                            </a>
                        </li>
                       <!--  <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret hidden-sm hidden-xs"></b>
                                    <span class="notification hidden-sm hidden-xs">5</span>
									<p class="hidden-lg hidden-md">
										5 Notifications
										<b class="caret"></b>
									</p>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li>
                        <li>
                           <a href="">
                                <i class="fa fa-search"></i>
								<p class="hidden-lg hidden-md">Search</p>
                            </a>
                        </li> -->
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#" onclick="isComplete();" class="btn btn-info">Preview CV</a></li>
                          <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p>
                                        Akun
                                        <b class="caret"></b>
                                    </p>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="<?=base_url()?>user/resetPassword">Reset Password</a></li>
                                  <li>
                                    <a href="<?=base_url()?>main/logOut">
                                        <p>Log out</p>
                                    </a>
                                  </li>
                              </ul>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p>
										Setting
										<b class="caret"></b>
									</p>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="<?=base_url();?>user/templates">Template</a></li>
                              </ul>
                        </li>
                       
						<li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>

    <style>
        .topplus10{
            padding-top: 15px !important;
        }
        .topplus80{
            padding-top: 80px !important;
        }
        .padleft0{
            padding-left: 0px !important;
            margin-left: 0px !important;
        }
        .padright0{
            padding-right: 0px !important;
            margin-right: 0px !important;
        }
        .bot0{
            padding-bottom: 0px !important;
            margin-bottom: 0px !important;
        }
        .width100{
            width:100% !important;
        }
        .easy-autocomplete{
            width: 100% !important;
        }
        .padtop5{
            margin-top: 5px !important;
        }
          select.ui-datepicker-month{
             color: #777 !important;
          }
          select.ui-datepicker-year{
             color: #777 !important;
          }
         .abang{
            color:red;
         }
         .hijau{
            color:green;
         }
         .biru{
            color:blue;
         }
         .oren{
            color:orange;
         }
         .newPad{
            padding: 3px 16px !important;
         }
         .persentase{
            font-weight: 900
         }
       
    </style>

        <div class="content">
            <div class="container-fluid" data-bind="visible: !model.Processing()">