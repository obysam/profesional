                <div class="tinggi">
                <div class="row biodata">
                <div class="col-md-8 col-xs-12 col-md-offset-2 boxPutih">
                   
                            <div class="headerX">
                                <h4 class="title">Form Biodata</h4>
                                <p class="category">Isikan data dengan jelas sehingga memudahkan orang membaca CV anda</p>
                                <hr>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                    <div class="col-md-8 topplus10">
                                      <form class="form-horizontal" id="form-biodata" data-bind="with: model.Biodata">
                                          <fieldset>

                                          <!-- Text input-->
                                          <div class="form-group">
                                            <label class="col-md-3 control-label " for="nama">Nama Lengkap</label>  
                                            <div class="col-md-8">
                                            <input id="nama" name="nama" type="text" placeholder="" class="form-control input-md" required="" value="" data-bind="value:  nama">
                                              
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="col-md-3 control-label " for="nama">Jenis Kelamin</label>  
                                            <div class="col-md-8">
                                               <input type="radio" class="" name="jenisKelamin" id="pria" value="pria" data-bind="value:'pria',checked: jenisKelamin">Pria
                                               <input type="radio" class="" name="jenisKelamin"  id="wanita" value="wanita" data-bind="value:'wanita',checked: jenisKelamin">wanita

                                            </div>
                                          </div>

                                            <div class="form-group">
                                            <label class="col-md-3 control-label " for="nama">Status</label>  
                                            <div class="col-md-8">
                                              <input type="radio" name="status" id="menikah" value="married" data-bind="value:'married',checked: statusPernikahan">Menikah
                                               <input type="radio" name="status" id="belum_menikah" value="single" data-bind="value:'single',checked: statusPernikahan">Belum Menikah
                       
                                            </div>
                                          </div>

                                          <!-- Text input-->
                                          <div class="form-group">
                                            <label class="col-md-3 control-label " for="tempat_lahir">Tempat / Tgl Lahir</label>  
                                            <div class="col-md-5">
                                              <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" data-bind="value: tempat_lahir" value="">
                                          <!--   <input id="domisili" name="domisili" type="text" placeholder="Domisili saat ini" class="form-control input-md" required="" value="" data-bind="value:  domisili">
                                             -->  
                                              
                                            </div><div class="col-md-3">
                                            <input id="tanggal_lahir" name="tanggal_lahir" type="text"  class="form-control input-md" required="" value="" data-bind="value: tanggal_lahir">
                                              
                                            </div>
                                          </div>

                            
                                          <!-- Text input-->
                                          <div class="form-group">
                                            <label class="col-md-3 control-label " for="domisili">Domisili</label>  
                                            <div class="col-md-8">
                                            <input type="text" name="domisili" id="domisili" class="form-control" data-bind="value: domisili" value="">
                                          <!--   <input id="domisili" name="domisili" type="text" placeholder="Domisili saat ini" class="form-control input-md" required="" value="" data-bind="value:  domisili">
                                             -->  
                                            </div>
                                          </div>

                                          <!-- File Button --> 
                                         

                                          </fieldset>
                                          </form>
                                    </div>
                            <div class="col-md-4">
                                   <div class="form-group padding-top16">
                                      <div class="foto"></div>
                                      <label class="col-md-12 control-label" for="foto">Upload Foto</label>
                                      <div class="col-md-12">
                                        <input id="foto" name="foto" class="input-file" type="file" data-bind="value: model.fileName, fileUpload: model.fileName" accept=".png, .jpg, .jpeg" >
                                      </div>
                                    </div>
                            </div>
                          </div>
                          <div class="row">
                               <div class="col-md-12 martop40">
                                  <div class="footerInput">
                                     <center>
                                         <a href="#" id="simpan-biodata" class="btn btn-primary bWhite"><i class="fa fa-save" aria-hidden="true"></i> Simpan</a>
                                     </center>
                                  </div>
                              </div>
                          </div>
                        </div>
                      </div>
                </div>
                </div>
              </div>
              <div class="martop40">
              </div>