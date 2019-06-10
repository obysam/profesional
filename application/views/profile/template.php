         <style>
           .btn-radio {
            width: 100%;
          }
          .img-radio {
            opacity: 0.5;
            margin-bottom: 5px;
            height: 434px !important;
            width:100% !important;
          }

          .space-20 {
              margin-top: 20px;
          }
         </style>
                <div class="row biodata">
                <div class="col-md-8 col-xs-12 col-md-offset-2">
                     <div class="card">
                            <div class="header">
                                <h4 class="title">Pilih Template</h4>
                            </div>
                            <div class="content">
                               
                                    <form class="form-horizontal well" role="form">
                                      <div class="row">
                                      <?php foreach($template->result() as $row){ ?>
                                        <div class="col-xs-6">
                                          <img src="<?=base_url();?>assets/img/cv/<?=$row->template;?>.png" class="img-responsive img-radio">
                                          <button type="button" class="btn btn-primary btn-radio" onclick="setId(<?=$row->id_template;?>)"><?=$row->nama_template;?></button>
                                          <input type="radio" id="left-item" class="hidden">
                                        </div>
                                       <?php } ?>
                                      </div>
                                    </form>

                                <div class="footer">
                                    <div class="col-md-12">
                                        <center>
                                            <a href="#" id="simpan" class="btn btn-primary"><i class="fa fa-save" aria-hidden="true"></i> Simpan</a>
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

        
