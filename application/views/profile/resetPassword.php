                <div class="row reset">
                <div class="col-md-8 col-xs-12 col-md-offset-2">
                     <div class="card">
                            <div class="header">
                                <h4 class="title">Reset Password <?=$this->session->userdata('authPass');?></h4>
                                <p class="category">Minimal 8 Karakter, Karakter Spesial tidak di izinkan. (Abjad dan Angka saja)</p>
                            </div>
                            <div class="content">
                                <form class="form-horizontal" id="form-biodata" data-bind="with: model.Reset">
                                    <fieldset>

                                    <!-- Text input-->
                                    <div class="form-group">
                                      <label class="col-md-4 control-label topplus10" for="nama">Password</label>  
                                      <div class="col-md-6">
                                      <input id="password" min="8" name="password" type="password" placeholder="" class="form-control input-md" required="" value="" data-bind="value:  password">
                                        
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label class="col-md-4 control-label topplus10" for="nama">Konfirmasi Password</label>  
                                      <div class="col-md-6">
                                         <input id="cpassword" min="8" name="cpassword" type="password" placeholder="" class="form-control input-md" required="" value="" data-bind="value:  cpassword">

                                      </div>
                                    </div>

                                

                                    </fieldset>
                                    </form>

                                <div class="footer">
                                    <div class="col-md-12">
                                        <center>
                                            <a href="#" id="simpan" class="btn btn-primary simpan"><i class="fa fa-save" aria-hidden="true"></i> Simpan</a>
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

        
