<style>
   span.ui-icon{
            display: none !important;
          } 
          .ui-datepicker-month{
            display: none !important;
          }

table.ui-datepicker-calendar{
            display: none !important;

</style>
              <div class="row tabel-Pendidikan">
                <div class="col-md-10 col-xs-12 col-md-offset-1">
                  <div class="card">
                    <div class="header">
                      <div class="col-md-6">
                      <h4 class="title">Daftar Riwayat Pendidikan</h4>
                      <h5>Inputkan 2 Data Pendidikan terakhir anda.</h5>
                      </div>
                      <div class="col-md-6">
                      <a href="#" class="btn btn-primary PendidikanBaru pull-right" data-bind="visible: model.nomor() < 2">Tambah Baru</a>
                      </div>     
                    </div>
                    <div class="content">
                    <br>
                    <br>
                     <div id="tabel-Pendidikan">
                    
                     </div>
                    </div>
                  </div>
                </div>
                </div>
                <div class="row form-Pendidikan">
                <div class="col-md-8 col-xs-12 col-md-offset-2">
                     <div class="card">
                            <div class="header">
                                <h4 class="title">Form Pendidikan</h4>
                                <p class="category">Isikan data dengan 2 pendidikan terakhir anda.</p>
                            </div>
                            <div class="content">
                                <form class="form-horizontal" action="#" id="form-Pendidikan" data-bind="with: model.Pendidikan">
                                    <fieldset>

                                    <!-- Text input-->

                                    <div class="form-group">
                                      <label class="col-md-4 control-label topplus10" for="nama">Tahun Masuk / Keluar</label>  
                                      <div class="col-md-3" style="width:19% !important">
                                      <div class="input-group">
                                      <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar-check-o"></i></span>
                                       <input id="thn_masuk" name="thn_masuk" type="text"  class="form-control input-md" required value="" onkeydown="return false"  data-bind="value: thn_masuk">

                                        </div>
                                      </div>
                                      <label class="col-md-1 topplus10" style="width:2% !important" >/</label>
                                       <div class="col-md-3" style="width:21% !important">
                                       <div class="input-group">
                                      <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar-times-o"></i></span>
                                      <input id="thn_lulus" name="thn_lulus" type="text"  class="form-control input-md"  value="" onkeydown="return false"  data-bind="value: thn_lulus">
                                      </div>
                                      <div style="font-size: 10px !important">
                                        <input type="checkbox"  name="checkOutP" id="checkOut-0" value="" data-bind="value: checkOutP, checked: checkOutP">
                      Belajar Hingga Sekarang</div>
                    
                                      </div>

                                         
                                    </div>

                                    <div class="form-group">
                                      <label class="col-md-4 control-label topplus10" for="sekolah">Tingkatan</label>  
                                      <div class="col-md-5">
                                       <select name="tingkatan" id="tingkatan" class="form-control width100" data-bind="value: tingkatan">
                                        <option value="SMA">SMU / SMA</option>
                                        <option value="SMK">SMK</option>
                                        <option value="D3">D3 (Diploma)</option>
                                        <option value="S1">S1 (Sarjana)</option>
                                        <option value="S2">S2 (Magister)</option>
                                        <option value="S3">S3 (Doktor)</option>
                                      </select>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label class="col-md-4 control-label topplus10" for="sekolah">Nama Sekolah / Universitas</label>  
                                      <div class="col-md-5">
                                      <input id="sekolah" name="sekolah" type="text" placeholder="" class="form-control input-md" required="" value="" data-bind="value:sekolah">
                                        
                                      </div>
                                    </div>

                                      <div class="form-group bPendidikan">
                                      <label class="col-md-4 control-label topplus10" for="domisili">Bidang Pendidikan</label>  
                                      <div class="col-md-5">
                                        <div class="bidang_pendidikan">
                                          <select name="id_bidang_pendidikan" id="id_bidang_pendidikan" class="form-control selectFilter"  width="100%" data-bind="foreach:data_bidang, value: id_bidang_pendidikan">
                                              <option data-bind="value:id_bidang_pendidikan, text:bidang_pendidikan"></option>
                                          </select>
                                        </div>
                           
                                      </div>
                                    </div>

                                    <!-- Text input-->
                                    <div class="form-group">
                                      <label class="col-md-4 control-label topplus10" for="domisili">Kabupaten / Kota</label>  
                                      <div class="col-md-5">

                                         <input type="text" name="lokasi" id="lokasi" class="width100 lokasi form-control" value="" data-bind="value:lokasi">
                                    
                           
                                      </div>
                                    </div>

                            

                                     <div class="form-group">
                                      <label class="col-md-4 control-label topplus10" for="domisili">Nilai / Skala</label>  
                                      <div class="col-md-5">
                                        <div class="col-md-6 padleft0">
                                      <input id="nilai" name="nilai" type="number" placeholder="Nilai" class="form-control" required="" value="" data-bind="value:nilai">
                                            
                                        </div>
                                        <div class="col-md-6 padleft0 padright0">
                                      <input id="skala" name="skala" type="number" placeholder="Skala Nilai" class="form-control" required="" value="4.0" data-bind="value:skala">

                                        </div>
                                      </div>
                                    </div>


                                     <div class="form-group">
                                      <label class="col-md-4 control-label topplus10" for="domisili">Keterangan</label>  
                                      <div class="col-md-7">
                                       
                                       <textarea id="detail" name="detail" rows="7" cols="250" class="form-control" required="" value="" data-bind="value:  detail"></textarea>
                          
                                        </div>
                                      </div>
                                    </div>

                                    <!-- File Button --> 
                                    

                                    </fieldset>
                                    </form>

                                <div class="footer">
                                    <div class="col-md-12">
                                        <center>
                                            <button type="submit" href="#" id="simpan-Pendidikan" class="btn btn-primary"><i class="fa fa-save" aria-hidden="true"></i> Simpan</button>
                                        </center>
                                    </div>
                                    <br>
                                    <br>
                                </div>
                            </div>
                        </div>
       </div>
       </div>
       
        
