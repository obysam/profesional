<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="<?=base_url();?>assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    Profesional <small>Online CV</small>
                </a>
            </div>

            <ul class="nav">
                <li class="sAktif <?=$sbiodata;?> sbiodata">
                    <a href="<?=base_url();?>user/profile">
                        <i class="pe-7s-user"></i>
                        <p>Biodata</p>
                    </a>
                </li>
                <li class="sAktif <?=$sinfo;?>">
                    <a href="<?=base_url();?>user/informasi">
                        <i class="pe-7s-note2"></i>
                        <p>Info Tambahan</p>
                    </a>
                </li>
                <li class="sAktif <?=$spengalaman;?> spengalaman">
                    <a href="<?=base_url();?>user/pengalaman">
                        <i class="pe-7s-science"></i>
                        <p>Pengalaman</p>
                    </a>
                </li>
                <li class="sAktif <?=$spendidikan;?>">
                    <a href="<?=base_url();?>user/pendidikan">
                        <i class="fa fa-graduation-cap fa-2x" aria-hidden="true"></i>
                        <p>Pendidikan</p>
                    </a>
                </li>
                <li class="sAktif <?=$sahli;?>">
                    <a href="<?=base_url();?>user/ahli">
                        <i class="pe-7s-news-paper"></i>
                        <p>Keahlian</p>
                    </a>
                </li>
                <li class="sAktif <?=$sbahasa;?>">
                    <a href="<?=base_url();?>user/bahasa">
                        <i class="fa fa-language" aria-hidden="true"></i>
                        <p>Bahasa</p>
                    </a>
                </li>
                <li class="sAktif <?=$sSosmed;?>">
                    <a href="<?=base_url();?>user/sosmed">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <p>Social Media</p>
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
                          <li class="dropdown topplus5">
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
                        <li class="dropdown topplus5">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p>
										Setting
										<b class="caret"></b>
									</p>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="<?=base_url();?>user/templates">Template <?=$username;?></a></li>
                              </ul>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p>
                                        CV Proses <span class="persentase"><span data-bind="text:model.persentase"></span>%</span>
                                        <b class="caret"></b>
                                    </p>
                              </a>
                              <ul class="dropdown-menu" data-bind="foreach:model.status">
                              <span class="pull-right btn btn-warning btn-xs bot0 padtop5" data-bind="text:index,attr:{href:'<?=base_url();?>user/'+index}"></span>
                              <!-- ko if: value.length==1 -->
                                <li><a href="#" class="newPad" data-bind="text:value,attr:{href:'<?=base_url();?>user/'+index}"></a></li>
                            <!--/ko -->
                              <!-- ko if: value.length>=2 -->
                              <!-- ko foreach:value -->
                            
                                <li><a href="#" class="newPad" data-bind="text:$data,attr:{href:'<?=base_url();?>user/informasi'}"></a></li>
                             
                              <!-- /ko-->
                              <!-- /ko-->
                                 <li class="divider"></li>
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
        .topplus5{
            padding-top: 5px !important;
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

         .boxPutih{
            background-color: white;
            box-sizing: border-box;
            border-radius: 10px;
            border: lightgrey;
            border-style: solid;
            border-width: 2px;
         }

         .title{
            margin-bottom: 0px !important;
         }

         .category{
            color: #a8a8a8;
         }
        .tinggi{
          min-height: (120% - 100px);
        }
 
        .footerInput{
          background-color: #dbdbdb;
          padding-top: 10px;
          padding-bottom: 10px;
        }
        .padding-top16{
          padding-top: 16px;
        }
        .martop40{
          margin-top: 40px !important;
        }
        .noPad{
          padding-left: 0px;
          padding-right: 0px;
          margin-left: 0px;
          margin-right: 0px;
        }
        .bWhite{
          background-color: white;
        }
    </style>

    <script type="text/javascript">
        function status(){
            $.post("<?=base_url();?>base/isComplete",{},function(data){
              var res = jQuery.parseJSON(data);
              var dataArray = [];
              _.each(res[2],function(val,i){
                  if(val.length >= 1){
                    var temp = {index:i,value:val}
                    dataArray.push(temp)
                  }
              })
              model.persentase(res[0]);
              model.status(dataArray);
              model.ok(res[1]);
            })
        }

        function isComplete(){
          if(model.ok()<=7){
            swal('CV Belum Siap',"Data Anda belum lengkap, cek notifikasi di pojok kanan", "error");
          }else{
            window.location = '<?=base_url();?>cv/<?=$username;?>';
          }
        }

    </script>
        <div class="content">
            <div class="container-fluid" data-bind="visible: !model.Processing()">