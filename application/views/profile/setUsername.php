                    <style>
           .btn-radio {
            width: 100%;
          }
          .img-radio {
            opacity: 0.5;
            margin-bottom: 5px;
            height: 350px !important;
            width:100% !important;
          }

          .space-20 {
              margin-top: 20px;
          }
          .space5{
            margin-top: 5%;
          }
          .topplus10{
            padding-top: 15px !important;
          }
          .xhide{

          }
          .kecil{
            font-size:10px;
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
         </style>
                <div class="row reset space5" >
                <div class="col-md-8 col-xs-12 col-md-offset-2">
                     <div class="card">
                            <div class="header">
                                <h4 class="title">Setting Username Anda</h4>
                                <p class="category">Username akan menjadi link CV anda, untuk itu gunakan nama asli atau nama pendek anda agar mudah di ingat.</p>
                            </div>
                            <div class="content">
                                <form class="form-horizontal" id="form-biodata" data-bind="with: model.template">
                                    <fieldset>

                                    <!-- Text input-->
                                       <div class="row">
                                         <div class="form-group col-md-12">
                                          <label class="col-md-4 control-label topplus10" for="nama">Username</label>  
                                          <div class="col-md-6">
                                           <div class="col-md-8">
                                              <input id="username" min="8" name="username" type="text" placeholder="" class="form-control" required="" value="" data-bind="value: nama">      
                                               <span class="kecil">Minimal 8 Karakter, Gunakan nama asli atau kombinasikan dengan angka lahir anda</span>             
                                          </div>
                                          <div class="col-md-2">
                                            <center>
                                               <i class="fa fa-check-circle fa-2x hijau aman" aria-hidden="true"></i><br></be><span class="aman">Tersedia</span>
                                               <i class="fa fa-times-circle fa-2x abang gaaman" aria-hidden="true"></i><span class="gaaman">Tidak Tersedia</span>
                                            </center>
                                          </div>
                                          <div class="col-md-2">
                                            <a href="#" class="btn btn-primary check">Cek Username</a>
                                            <a href="#" class="btn btn-warning ganti">Ganti</a>
                                          </div>                     
                                          </div>
                                        </div>

                                        <div class="col-md-8 col-xs-12 col-md-offset-2 template">
                                        <center><h3>Pilih Template</h3></center>
                                      <?php foreach($template->result() as $row){ ?>
                                        <div class="col-xs-6">
                                          <img src="<?=base_url();?>assets/img/cv/<?=$row->template;?>.png" class="img-responsive img-radio">
                                          <button type="button" class="btn btn-primary btn-radio" onclick="setId(<?=$row->id_template;?>)"><?=$row->nama_template;?></button>
                                          <input type="checkbox" id="left-item" class="hidden">
                                        </div>
                                       <?php } ?>
                                      </div>
                                    </div>
                                    </fieldset>
                                    </form>
                                <div class="footer">
                                    <div class="col-md-12">
                                        <center>
                                            <a href="#" id="simpan" class="btn btn-primary simpan aman2"><i class="fa fa-save" aria-hidden="true"></i> Simpan</a>
                                        </center>
                                    </div>
                                    <br>
                                    <br>
                                </div>
                            </div>
                        </div>
                </div>
            </div>

                </div>
        </div>

        
