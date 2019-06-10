
<style>
.padding3{
  padding-left: 5px;
  padding-right: 5px
}
.paddingbot10{
  padding-bottom: 10px !important;
}
.socialIcon{
  padding-top: 20px;
}
.labelKiri{
  font-size:11px;
  color:grey;
}
.labelKanan{
  font-size:11px;
  color: #428bca;
}
.marbot0{
  margin-bottom: 5px !important;
}
.halfLine{
   line-height: 1 !important;
}
.padtop3{
  padding-top: 3px;
}
.profile{
  width:170px !important;
  height:170px !important;
}
</style>
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
<body>
    <div class="wrapper padtop25">
        <div class="sidebar-wrapper">
            <div class="profile-container paddingbot10">
                <?php foreach($user->result() as $row){ 

                  $domisili = $row->name; 
                  $fb = $row->facebook;
                  $tw = $row->twitter;
                  $ig = $row->instagram;
                  $ln = $row->linkedin;
                  $statusPengalaman = $row->statusPengalaman;
                  ?>
                <img class="profile" src="<?=base_url();?>assets/img/upload/<?=$row->foto;?>" alt="Foto-<?=$row->nama;?>" />

                <h1 style="font-size:25px !important"><?=htmlentities($row->nama);?></h1>
                <h3 class="tagline"><?=$row->bidangUtama;?></h3>
                <center><a href="mailto: <?=$row->email;?>"><?=htmlentities($row->email);?></a>
                </center>
              
                <div class="socialIcon">
                <center>
                  <?php if($fb!=""){ ?>
                    <a href="<?=base_url().'main/redirect/'.urlencode(base64_encode($fb));?>" target="_blank"><i class="fa fa-facebook fa-2x padding3"></i></a>
                  <?php } if($tw!=""){ ?>              
                    <a href="<?=base_url().'main/redirect/'.urlencode(base64_encode($tw));?>" target="_blank"><i class="fa fa-twitter fa-2x padding3"></i></a>
                  <?php } if($ig!=""){ ?>              
                    <a href="<?=base_url().'main/redirect/'.urlencode(base64_encode($ig));?>" target="_blank"><i class="fa fa-instagram fa-2x padding3"></i></a>
                  <?php } if($ln!=""){ ?>              
                    <a href="<?=base_url().'main/redirect/'.urlencode(base64_encode($ln));?>" target="_blank"><i class="fa fa-linkedin fa-2x padding3"></i></a>
                  <?php } ?>
                </center>
                </div>
                <?php }?>
            </div><!--//profile-container-->
         <!--//contact-container-->
          
            
            <div class="education-container container-block">
                <h2 class="container-block-title">Pendidikan</h2>
                <?php foreach($pendidikan->result() as $pen){ ?>
                <div class="item">
                    <h4 class="degree"><?=htmlentities($pen->bidang_pendidikan);?></h4>
                    <h5 class="meta" style="color:white"><?=htmlentities($pen->tingkatan)?> - IPK <?=htmlentities($pen->nilai);?>/<?=htmlentities($pen->skala);?></h5>
                    <h5 class="meta"><?=htmlentities($pen->sekolah);?></h5>
                    <div class="time"><?=htmlentities($pen->thn_masuk);?> - <?=htmlentities($pen->thn_lulus);?></div>
                </div><!--//item-->
                <?php } ?>
            </div><!--//education-container-->
            
            <div class="languages-container container-block">
                <h2 class="container-block-title">Bahasa</h2>
                <ul class="list-unstyled interests-list">
                  <?php foreach($bahasa->result() as $bhs){ ?>
                    <li><?=htmlentities($bhs->bahasa);?> <span class="lang-desc">(<?php htmlentities(kemampuan($bhs->kemampuan));?>)</span></li>
            
                    <?php } ?>
                </ul>
            </div><!--//interests-->
            
        </div><!--//sidebar-wrapper-->
        
        <div class="main-wrapper">
            
            <section class="section summary-section">
                <h2 class="section-title"><i class="fa fa-user"></i>Objektif</h2>
                <div class="summary">
                     <?php foreach($user->result() as $row){?>
                     <p><?=htmlentities($row->objektif);?></p>
                    <?php }?>
                </div><!--//summary-->
            </section><!--//section-->
            
            <?php if($statusPengalaman!=0){ ?>
            <section class="section experiences-section">
                <h2 class="section-title"><i class="fa fa-briefcase"></i>Pengalaman</h2>
                
                <?php foreach($pengalaman->result() as $pln){ 
                  if($pln->tanggal_keluar==null){
                    $tanggal_keluar = "Sekarang";
                  }else{
                    $tanggal_keluar= monthYear($pln->tanggal_keluar);
                  }
                  ?>
                <div class="item">
                    <div class="meta">
                        <div class="upper-row">
                            <h3 class="job-title"><b><?=htmlentities($pln->posisi);?></b></h3>
                            <div class="time"><?=monthYear($pln->tanggal_gabung);?> - <?=$tanggal_keluar;?></div>
                            <div class="company"><?=htmlentities($pln->perusahaan);?> | <?=htmlentities($pln->name);?></div>
                           
                           <div id="informasi">
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
                                    <label class="labelKanan marbot0"><?=htmlentities($pln->nama_bidang);?></label>
                                  </div>
                              </div>
                              <div class="col-md-12 halfLine col-ms-12">
                                  <div class="col-md-4 col-sm-12">
                                    <label class="labelKiri marbot0">Level Posisi</label>
                                  </div>
                                  <div class="col-md-8 col-sm-12">
                                    <label class="labelKanan marbot0"><?=htmlentities($pln->tingkatan_posisi);?></label>
                                  </div>
                              </div>
                              <?php if($pln->gajiShow==1){ ?>
                                 <div class="col-md-12 halfLine col-ms-12">
                                  <div class="col-md-4 col-sm-12">
                                    <label class="labelKiri marbot0">Gaji</label>
                                  </div>
                                  <div class="col-md-8 col-sm-12">
                                    <label class="labelKanan marbot0"><?=htmlentities($pln->gaji);?></label>
                                  </div>
                              </div>
                              <?php } ?>
                           </div>
                        </div><!--//upper-row-->
                      
                    </div><!--//meta-->
                    <div class="details">
                       <p><?=htmlentities($pln->detail);?></p>
                    </div><!--//details-->
                </div>
                <?php } ?>
          
            </section><!--//section-->
            <?php } ?>
            
            <section class="skills-section section">
                <h2 class="section-title"><i class="fa fa-rocket"></i>Keahlian</h2>
                <div class="skillset">        
                  <?php foreach($skill->result() as $skl){ ?>
                    <div class="item">
                        <h3 class="level-title"><?=htmlentities($skl->skill);?></h3>
                        <div class="level-bar">
                            <div class="level-bar-inner" data-level="<?php echo htmlentities(($skl->kemampuan*20)-5);?>%">
                            </div>                                      
                        </div><!--//level-bar-->                                 
                    </div><!--//item-->
                  <?php } ?>
                    
                </div>  
                
            </section><!--//skills-section-->

            <section class="section skills-section">
                <h2 class="section-title"><i class="fa fa-search"></i>Informasi Tambahan</h2>
                <div class="skillset">
                   <div class="item">
                        <h4 class="level-title padtop3">Domisili</h4>
                        <div>
                            <p><?=htmlentities($domisili);?></p>                                    
                        </div><!--//level-bar-->                                 
                    </div><!--//item-->

                     <div class="item">
                        <h4 class="level-title padtop3">Preferensi Kerja 1</h4>
                        <div>
                            <p><?=htmlentities($prefLok1);?></p>                                    
                        </div><!--//level-bar-->                                 
                    </div><!--//item-->
                    <?php if($prefLok2!=NULL){ ?>
                    <div class="item">
                        <h4 class="level-title padtop3">Preferensi Kerja 2</h4>
                        <div>
                            <p><?=htmlentities($prefLok2);?></p>                                    
                        </div><!--//level-bar-->                                 
                    </div><!--//item-->
                    <?php } if($prefLok3!=NULL){ ?>
                      <div class="item">
                        <h4 class="level-title padtop3">Preferensi Kerja 3</h4>
                        <div>
                            <p><?=htmlentities($prefLok3);?></p>                                    
                        </div><!--//level-bar-->  
                        </div>                               
                    <?php } ?>
        
                    <?php if($GS==1){ ?>
                      <div class="item">
                        <h4 class="level-title padtop3">Gaji yang di harapkan</h4>
                        <div>
                            <p><?=htmlentities($gaji);?></p>                                    
                        </div><!--//level-bar--> 
                        </div>                                
                    <?php } ?>
                    <!--//item-->
                </div><!--//summary-->
            </section><!--//section-->

            
        </div><!--//main-body-->
    </div>
 
    <footer class="footer">
        <div class="text-center">
                <!--/* This template is released under the Creative Commons Attribution 3.0 License. Please keep the attribution link below when using for your own project. Thank you for your support. :) If you'd like to use the template without the attribution, you can check out other license options via our website: themes.3rdwavemedia.com */-->
                <small class="copyright">Profesional CV by <a href="http://profesional.id">www.Profesional.id</a> | Designed with <i class="fa fa-heart"></i> by <a href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a></small>
        </div><!--//container-->
    </footer><!--//footer-->
 
    <!-- Javascript -->          
    <script type="text/javascript" src="<?=base_url();?>assets/plugins/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="<?=base_url();?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>    
    <!-- custom js -->
    <script type="text/javascript" src="<?=base_url();?>assets/js/main.js"></script>            
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