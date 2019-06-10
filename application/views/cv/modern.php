

<?php function kemampuan($param){
    if($param==1){
      echo "Belajar";
    }else if($param==2){
      echo "Paham Dasar";
    }else if($param==3){
      echo "Menguasai";
    }else if($param==4){
      echo "Mahir";
    }else if($param==5){
      echo "Profesional";
    }
  }

  function monthYear($date) {

        $result = "";

        $convert_date = strtotime($date);
        $month = date('F',$convert_date);
        $year = date('Y',$convert_date);

        $result = $month ." " . $year;

        return $result;
    }
  ?>

  <style>
  .marbot0{
  margin-bottom: 0px !important;
}
.marbot5{
  margin-bottom: 5px !important;
}
.halfLine{
   line-height: 1.1 !important;
   background-color: #fcfcfc;
}
.labelKiri{
  font-size:11px;
  color:grey;
}
.labelKanan{
  font-size:11px;
  color: #428bca;
}
.textInfo{
    font-size: 13px !important;
}
  </style>
<body>
    <div class="container padtop35">
        <!-- ===========================
        HEADER
        ============================ -->
        <div id="header" class="row">
           <?php foreach($user->result() as $row){ ?>
            <div class="col-sm-2">
                <img class="propic" src="<?=base_url();?>assets/img/upload/<?=$row->foto;?>" style="height: 200px !important; width: 200px !important" alt="Foto-<?=$row->nama;?>">
            </div>
            <!-- photo end-->

            <div class="col-sm-10">
                <div class="cv-title">
             <?php
                  $objektif = $row->objektif;
                  $domisili = $row->name; 
                  $nama = $row->nama; 
                  $fb = $row->facebook;
                  $tw = $row->twitter;
                  $ig = $row->instagram;
                  $ln = $row->linkedin;
                  $statusPengalaman = $row->statusPengalaman;
                  $input = array("success", "warning", "danger", "info", "primary", "default");
                  $rand_keys = array_rand($input, 6);
                ;
                ?>
                    <div class="row">
                        <div class="col-sm-7">
                            <h1><?=htmlentities($row->nama);?></h1>
                        </div>
                        <div class="col-sm-5 text-right dl-share">
                            <!-- AddToAny BEGIN -->
                            <a class="a2a_dd btn btn-default" href=""><span class="fa fa-share "></span> Share</a>
                            <script type="text/javascript">
                                var a2a_config = a2a_config || {};
                                a2a_config.linkname = "Profesional CV by <?=$row->nama;?>";
                                a2a_config.num_services = 6;
                                a2a_config.prioritize = ["facebook", "twitter", "google_plus", "linkedin", "pinterest", "email"];
                            </script>
                            <script type="text/javascript" src="//static.addtoany.com/menu/page.js"></script>
                            <!-- AddToAny END -->

                          
                        </div>
                    </div>
                    <h2><?=$row->bidangUtama;?></h2>
                   <?php } ?>
                    
                </div><!-- Title end-->

                <!-- ===========================
                SOCIAL & CONTACT
                ============================ -->
                <div class="row">
                    <div class="col-sm-4">
                        <ul class="list-unstyled">
                            <li class="number"><a href="mailto:<?=htmlentities($row->email);?>"><span class="social fa fa-envelope-o"></span><?=htmlentities($row->email);?></a>
                            </li>
                           
                        </ul>
                    </div><!-- social 1st col end-->

                    <div class="col-sm-4">
                        <ul class="list-unstyled">
                              <?php if($fb!=""){ ?>
                    <li class="number"><a href="<?=base_url().'main/redirect/'.urlencode(base64_encode($fb));?>" target="_blank"><i class="fa fa-facebook padding3"></i>Facebook</a></li>
                    <?php } ?>
                  <?php if($tw!=""){ ?>              
                    <li class="number"><a href="<?=base_url().'main/redirect/'.urlencode(base64_encode($tw));?>" target="_blank"><i class="fa fa-twitter padding3"></i>Twitter</a></li>
                            <?php } ?>
                   
                        </ul>
                    </div><!-- social 2nd col end-->

                    <div class="col-sm-4">
                        <ul class="list-unstyled">
                       
                                <?php if($ln!=""){ ?>              
                    <li class="number"><a href="<?=base_url().'main/redirect/'.urlencode(base64_encode($ln));?>" target="_blank"><i class="fa fa-linkedin padding3"></i>Linkedin</a></li>
                  <?php } ?>
                             <?php  if($ig!=""){ ?>              
                    <li class="number"><a href="<?=base_url().'main/redirect/'.urlencode(base64_encode($ig));?>" target="_blank"><i class="fa fa-instagram padding3"></i></a></li>
                    <?php } ?>
                        </ul>
                    </div><!-- social 3rd col end-->
                </div><!-- header social end-->
            </div><!-- header right end-->
             
        </div><!-- header end-->

        <hr class="firsthr">

        <!-- ===========================
        BODY LEFT PART
        ============================ -->
        <div class="col-md-8 mainleft">
            <div id="statement" class="row mobmid">
                <div class="col-sm-1">
                    <span class="secicon fa fa-user"></span>
                </div><!--icon end-->

                <div class="col-sm-11">
                    <h3>Objektif </h3>
                    <p align="justify"><?php echo htmlentities($objektif);?></p>
                    <p class="signature"><?=htmlentities($nama);?></p>
                </div><!--info end-->
            </div><!--personal statement end-->

            <hr>

            <div id="education" class="row mobmid">
                <div class="col-sm-1">
                    <span class="secicon fa fa-graduation-cap"></span>
                </div><!--icon end-->

                <div class="col-sm-11">
                    <h3>Pendidikan</h3>
                    <?php foreach($pendidikan->result() as $pen){ ?>
                    <div class="row">
                        <div class="col-md-9">
                            <h4><b><?=htmlentities($pen->tingkatan)." ".htmlentities($pen->bidang_pendidikan);?></b></h4><h4 style="margin-top: 0px !important"><small> IPK</small><b> <?=htmlentities($pen->nilai);?><small>/<?=htmlentities($pen->skala);?> </small></b></h4>
                            <p class="sub"><?=htmlentities($pen->sekolah);?>
                            </p>
                         
                        </div>

                        <div class="year col-md-3">
                            <p><?=htmlentities($pen->thn_masuk);?> - <?=htmlentities($pen->thn_lulus);?></p>
                        </div>
                    </div>
                    <?php } ?>
                    
                    <hr>
                 
                </div>
            </div><!--Education & Certifications end-->
        
            <?php if($statusPengalaman!=0){ ?>
            <!-- ===========================
            JOB EXPERIENCES
            ============================ -->
            <div id="job" class="row mobmid">
                <div class="col-sm-1">
                    <span class="secicon fa fa-briefcase"></span>
                </div><!--icon end-->

                <div class="col-sm-11">
                    <h3>Pengalaman</h3>

                    <?php foreach($pengalaman->result() as $pln){ 
                      if($pln->tanggal_keluar==null){
                        $tanggal_keluar = "Sekarang";
                      }else{
                        $tanggal_keluar= monthYear($pln->tanggal_keluar);
                      }
                        ?>
                    <div class="row">

                        <div class="col-md-6">
                            <h4><b><?=htmlentities($pln->posisi);?></b></h4>
                        </div><div class="year col-md-6">
                            <h5><?=monthYear($pln->tanggal_gabung);?> - <?=$tanggal_keluar;?></h5>
                        </div>
                        <div class="col-md-12">
                            <p class="sub"><?=htmlentities($pln->perusahaan);?> | <?=htmlentities($pln->name);?>
                            </p>
                          
                                <div class="col-md-12 halfLine col-ms-12">
                                  <div class="col-md-4 col-sm-12">
                                    <label class="labelKiri marbot0">Industri</label>
                                  </div>
                                  <div class="col-md-8 col-sm-12">
                                    <label class="labelKanan marbot0"><?=htmlentities($pln->nama_industri);?></label>
                                  </div>
                              </div>
                                <div class="col-md-12 halfLine col-ms-12">
                                  <div class="col-md-4 col-sm-12">
                                    <label class="labelKiri marbot0">Spesialisasi</label>
                                  </div>
                                  <div class="col-md-8 col-sm-12">
                                    <label class="labelKanan marbot0"><?=htmlentities($pln->spesialisasi);?></label>
                                  </div>
                              </div>
                              
                              <div class="col-md-12 halfLine col-ms-12">
                                  <div class="col-md-4 col-sm-12">
                                    <label class="labelKiri marbot0">Bidang Pekerjaan</label>
                                  </div>
                                  <div class="col-md-8 col-sm-12">
                                    <label class="labelKanan marbot0"><?=htmlentities($pln->tingkatan_posisi);?></label>
                                  </div>
                              </div>
                                <div class="col-md-12 halfLine col-ms-12">
                                  <div class="col-md-4 col-sm-12">
                                    <label class="labelKiri marbot0">Level Posisi</label>
                                  </div>
                                  <div class="col-md-8 col-sm-12">
                                    <label class="labelKanan marbot0"><?=htmlentities($pln->nama_bidang);?></label>
                                  </div>
                              </div>
                            <p><?=htmlentities($pln->detail);?></p>
                        </div>

                       </div> 
                    <!--Job 1 end-->
                    <?php } ?>
                 
                <!--Job experiences end-->
            </div><!--Job experiences end-->

        </div><!--left end-->
         <?php } ?>
        </div>
    
        <!-- ===========================
        SIDEBAR
        =========================== -->
        <div class="col-md-4 mainright">
            <div class="row">
                <div class="col-sm-1 col-md-2 mobmid">
                    <span class="secicon fa fa-magic"></span>
                </div><!--icon end-->

                <div class="col-sm-11 col-md-10">

                    <h3 class="mobmid">Keahlian </h3>
                     <?php $i=0; foreach($skill->result() as $skl){  ?>
                    <p class="marbot0"><?=htmlentities($skl->skill);?></p>
                    <div class="progress marbot5">
                        <div class="progress-bar marbot0 progress-bar-<?php echo $input[$rand_keys[$i]];?>" role="progressbar" aria-valuenow="<?php echo htmlentities(($skl->kemampuan*20)-10);?>"" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo htmlentities(($skl->kemampuan*20)-10);?>%">
                            <span class="sr-only marbot5"><?php echo htmlentities(($skl->kemampuan*20)-10);?>% </span>
                        </div>
                    </div><!--skill end-->
              
                    <?php $i++;
                            if($i>5){
                                $i=0;
                            }
                     } ?>
  <hr>
                 
                </div><!--info end-->
            <!--tech skills end-->
            
          

            <div class="row mobmid">
                <div class="col-sm-1 col-md-2">
                    <span class="secicon fa fa-language"></span>
                </div><!--icon end-->

                <div class="col-sm-11 col-md-10 ">
                    <h3>Bahasa</h3>
                      <?php foreach($bahasa->result() as $bhs){ ?>
                    <div class="award">
                        <h5><?=htmlentities($bhs->bahasa);?>&nbsp;&nbsp;<small>(<?php htmlentities(kemampuan($bhs->kemampuan));?>)</small></h5>
                        
                       
                    </div>
                    <!--1st award end-->
                    <?php } ?>
                </div><!--awards end-->

            </div>
            
            <hr>
                <div class="row mobmid">
                <div class="col-sm-1 col-md-2">
                    <span class="secicon fa fa-info"></span>
                </div><!--icon end-->

                <div class="col-sm-11 col-md-10 ">
                    <h3>Informasi Tambahan</h3>
                    <div class="award">
                       <p class="marbot0"><b>Domisili</b></h4>
                        <div>
                            <p class="textInfo"><?=htmlentities($domisili);?></p>                                    
                        </div><!--//level-bar-->     
                     </div>
                     <div class="award">
                       <p class="marbot0"><b>Preferensi Kerja 1</b></h4>
                        <div>
                            <p class="textInfo"><?=htmlentities($prefLok1);?></p>                                    
                        </div><!--//level-bar-->     
                     </div>
                      <?php if($prefLok2!=NULL){ ?>
                     <div class="award">
                       <p class="marbot0"><b>Preferensi Kerja 2</b></h4>
                        <div>
                            <p class="textInfo"><?=htmlentities($prefLok2);?></p>                                    
                        </div><!--//level-bar-->     
                     </div>
                     <?php } if($prefLok3!=NULL){?>
                      <div class="award">
                       <p class="marbot0"><b>Preferensi Kerja 3</b></h4>
                        <div>
                            <p class="textInfo"><?=htmlentities($prefLok3);?></p>                                    
                        </div><!--//level-bar-->     
                     </div>
                     <?php } ?>
                      <?php if($GS==1){?>
                      <div class="award">
                       <p class="marbot0"><b>Gaji yang di harapkan</b></h4>
                        <div>
                            <p class="textInfo"><?=htmlentities($gaji);?></p>                                    
                        </div><!--//level-bar-->     
                     </div>
                     <?php } ?>
                    <!--1st award end-->
                </div><!--awards end-->

            </div>

        </div><!--right end-->
    </div><!--container end-->
</div>
    <!-- ===========================
    FOOTER
    =========================== -->
    <footer class="text-center">
        Designed by <a target="_blank" href="http://www.facebook.com/towkirahmedbappy">Towkir Ahmed Bappy</a>.
        </p>
    </footer>

    <!--necessary scripts and plugins-->
     <script type="text/javascript" src="<?=base_url();?>assets/plugins/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="<?=base_url();?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>    
    <script src="<?=base_url();?>assets/js/jquery.nicescroll.min.js"></script>
    <script src="<?=base_url();?>assets/js/evenfly.js"></script>
</body>

</html>

<script type="text/javascript">
$('body').scrollspy({
  target: '#navbar-collapsible',
  offset: 50
});

/* smooth scrolling sections */
$('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top - 50
        }, 1000);
        return false;
      }
    }
});
</script>