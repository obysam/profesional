                <div class="row informasi">
                <div class="col-md-8 col-xs-12 col-md-offset-2">
                     <div class="card">
                            <div class="header">
                                <h4 class="title">Form informasi</h4>
                                <p class="category">Isikan data dengan jelas sehingga memudahkan orang membaca CV anda</p>
                            </div>
                            <div class="content">
                                <form class="form-horizontal" id="form-informasi" data-bind="with: model.informasi">
                                    <fieldset>

                                    <div class="form-group">
                                      <label class="col-md-4 control-label topplus10" for="nama">Bidang Pekerjaan Utama<span class="abang">*</span></label>  
                                      <div class="col-md-6">
                                        <input type="text" class="form-control" id="bidangUtama" max="100" name="bidangUtama" data-bind="value:bidangUtama">
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label class="col-md-4 control-label topplus10" for="nama">Tingkat Pengalaman<span class="abang">*</span></label>  
                                      <div class="col-md-6">
                                        <select class="form-control" name="tingkatPengalaman" id="tingkatPengalaman" value="" data-bind="value:tingkatPengalaman">
                                          <option value="0">---Silahkan Pilih---</option>
                                         <?php foreach($tingkat->result() as $row){ ?>
                                          <option value="<?=$row->id_tingkat;?>"><?=$row->tingkat;?></option>
                                          <?php } ?>
                                          </select>
                                      </div>
                                    </div>

                                    <!-- Text input-->
                                    <div class="form-group">
                                      <label class="col-md-4 control-label topplus10" for="nama">Objektif<span class="abang">*</span></label>  
                                      <div class="col-md-6">
                                      <textarea id="objektif" name="objektif" rows="5" cols="250" class="form-control" placeholder="" class="form-control input-md" required="" value="" max="600" data-bind="value:  objektif"></textarea>
                                        <span style="font-size: 10px !important">Deskripsi Singkat mengenai anda max 600 karakter</span>
                                      </div>
                                    </div>

                                    <!-- Text Input-->
                                    <div class="form-group">
                                      <label class="col-md-4 control-label topplus10" for="posisi">Preferensi Lokasi Kerja<span class="abang">*</span></label>  
                                      <div class="col-md-5">
                                       <input type="text" name="preferensiLokasi1" id="preferensiLokasi1" class="form-control" data-bind="value: preferensiLokasi1">
                                    </div>
                                    </div>

                                     <div class="form-group">
                                      <label class="col-md-4 control-label topplus10" for="posisi">Preferensi Lokasi 2</label>  
                                      <div class="col-md-5">
                                       <input type="text" name="preferensiLokasi2" id="preferensiLokasi2" class="form-control" data-bind="value: preferensiLokasi2">
                                     </div>
                                    </div>

                                    <div class="form-group">
                                      <label class="col-md-4 control-label topplus10" for="posisi">Preferensi Lokasi 3</label>  
                                      <div class="col-md-5">
                                       <input type="text" name="preferensiLokasi3" id="preferensiLokasi3" class="form-control" data-bind="value: preferensiLokasi3">
                                     </div>
                                    </div>


                                    <!-- Text input-->
                                    <div class="form-group">
                                      <label class="col-md-4 control-label topplus10" for="tempat_lahir">Gaji yang di harapkan</label>  
                                      <div class="col-md-5">
                                        <input type="number" class="form-control"  name="gaji" id="gaji" data-bind="value:gaji">
                                           <div style="font-size: 10px !important">
                                        <input type="checkbox"  name="showGaji" id="cshowGaji" value="" data-bind="value: showGaji, checked: showGaji">
                      Publikasikan Gaji di CV ?</div>
                                      </div>
                                    </div>

                   
                                    <!-- Text input-->
                                    <div class="form-group">
                                      <label class="col-md-4 control-label topplus10" for="domisili">CV bisa di akses HRD ?</label>  
                                      <div class="col-md-5">
                                     
                                 <input type="checkbox"  name="showPublik" id="showPublik" value="" data-bind="value: showPublik, checked: showPublik">
                      Ya
                      </div>
                                      </div>
                                    </div>

                                    <!-- File Button --> 
                                   

                                    </fieldset>
                                    </form>

                          <div class="row">
                               <div class="col-md-12 martop40">
                                  <div class="footerInput">
                                     <center>
                                         <a href="#" id="simpan-informasi" class="btn btn-primary bWhite"><i class="fa fa-save" aria-hidden="true"></i> Simpan</a>
                                     </center>
                                  </div>
                              </div>
                          </div>
                            </div>
                        </div>
                </div>
            </div>

                </div>
        </div>

        
