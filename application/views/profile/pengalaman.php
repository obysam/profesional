<style>
table.ui-datepicker-calendar{
            display: none !important;
}
.bgHead{
  background-color: #E6F1F5;
}
.form-pengalaman{
    visibility:hidden;
}
</style>
<div class="row tabel-pengalaman" >
                <div class="col-md-10 col-xs-12 col-md-offset-1">
                  <div class="card">
                    <div class="header">
                      <div class="col-md-8">
                      <h4 class="title">Daftar Riwayat Pengalaman</h4>
                      <?php if($TP[0]['tingkatPengalaman']!=1){ ?>
                        <input type="checkbox"  name="statusPengalaman" id="statusPengalaman-0"  value="" data-bind="value: model.statusPengalaman, checked: model.statusPengalaman"> Saya Tidak Memiliki Pengalaman
                      <?php } ?>
                      </div>
                      <div class="col-md-4">
                      <a href="#" class="btn btn-primary pengalamanBaru pull-right" data-bind="visible: !model.statusPengalaman()">Tambah Baru</a>
                
                      </div> 

                    </div>

                    <div class="content">
                    <br>
                    <br>
                      <hr style="border-bottom: solid 5px #E6F1F5">
                     <div id="tabel-pengalaman">
                    
                     </div>
                    </div>
                  </div>

                </div>
                </div>
                <div class="row form-pengalaman">
                <div class="col-md-10 col-xs-12 col-md-offset-1" >
                    <div class="card">
                      <div class="header">
                         <h4 class="title">Form Pengalaman</h4>
                                <p class="category">Bagaimana jika saya fresh graduate belum berpengalaman kerja membuat CV?</p>
                      </div>
                      <div class="content">
                        <form class="form-horizontal" id="form-pengalaman" data-bind="with: model.Pengalaman">
                                    <fieldset>

                                     <div class="form-group">
                                      <label class="col-md-4 control-label topplus10" for="nama">Tgl Bergabung / Tgl Keluar</label>  
                                      <div class="col-md-3" style="width:19% !important">
                                      <div class="input-group">
                                      <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar-check-o"></i></span>
                                       <input id="tanggal_gabung" name="tanggal_gabung" type="text"  class="form-control input-md" required="" onkeydown="return false" onchange="cekDate()" value="" >

                                        </div>
                                      </div>
                                      <label class="col-md-1 topplus10" style="width:2% !important" >/</label>
                                       <div class="col-md-3" style="width:21% !important">
                                       <div class="input-group">
                                      <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar-times-o"></i></span>
                                      <input id="tanggal_keluar" name="tanggal_keluar" type="text"  class="form-control input-md" onkeydown="return false" value="" data-bind="value: tanggal_keluar">
                                      </div>
                                      <div style="font-size: 10px !important">
                                        <input type="checkbox"  name="checkOut" id="checkOut-0"  value="" data-bind="value: checkOut, checked: checkOut">
                      Bekerja Hingga Sekarang</div>
                    
                                      </div>

                                         
                                    </div>

                                    <!-- Text input-->
                                    <div class="form-group">
                                      <label class="col-md-4 control-label topplus10" for="perusahaan">Nama Perusahaan</label>  
                                      <div class="col-md-5">
                                      <input id="perusahaan" name="perusahaan" type="text" placeholder="" class="form-control input-md" required="" value="" data-bind="value:  perusahaan">
                                        
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label class="col-md-4 control-label topplus10" for="industri">Bidang Industri</label>  
                                      <div class="col-md-5">
                                         <select name="industri" id="industri" class="form-control selectFilter" data-bind="value: id_industri" width="100%">
                                       <option value="ga"></option>
                                        <?php foreach($industri->result() as $row){ ?>
                                        <option value="<?=$row->id_industri;?>"><?=$row->nama_industri;?></option>
                                        <?php } ?>
                                      </select>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label class="col-md-4 control-label topplus10" for="posisi">Lokasi</label>  
                                      <div class="col-md-5">
                                       <input type="text" name="lokasi" id="lokasi" class="form-control" data-bind="value: lokasi">
                                    </div>
                                    </div>

                                    <hr></hr>
                                    <!-- Text input-->
                                    <div class="form-group">
                                      <label class="col-md-4 control-label topplus10" for="posisi">Posisi</label>  
                                      <div class="col-md-5">
                                       <input id="posisi" name="posisi" type="text" placeholder="" class="form-control input-md" required="" value="" data-bind="value:  posisi">
                                    </div>
                                    </div>

                                 

                                    <!-- Text input-->
                                    <div class="form-group">
                                      <label class="col-md-4 control-label topplus10" for="spesialisasi">Spesialisasi</label>  
                                      <div class="col-md-5">
                                      <select name="spesialisasi" id="spesialisasi" class="form-control selectFilter" data-bind="value: id_spesialisasi" width="100%" onchange="ganti()">
                                       <option value="0">--Silahkan Pilih Spesialisasi--</option>
                                        <?php foreach($spesialisasi->result() as $row){ ?>
                             
                                         <option value="<?=$row->id_spesialisasi;?>"><?=$row->spesialisasi;?></option>
                                        <?php } ?>
                                      </select>
                                     </div>
                                     </div>

                                    <div class="form-group">
                                      <label class="col-md-4 control-label topplus10" for="bidang_pekerjaan">bidang_pekerjaan</label>  
                                      <div class="col-md-5">
                                      <div class="bidang_pekerjaan">
                                         <select name="bidang_pekerjaan" id="bidang_pekerjaan" class="form-control selectFilter" data-bind="foreach:data_bidang, value: id_bidang_pekerjaan">
                                              <option data-bind="value:id_bidang_pekerjaan2, text:nama_bidang"></option>
                                          </select>
                                      </div>
                                    </div>
                                    </div>  

                                    <div class="form-group" data-bind="visible: model.pengalamanBaru()">
                                      <label class="col-md-4 control-label topplus10" for="bidang_pekerjaan">Input Bidang Baru</label>
                                      <div class="col-md-5">
                                      <div class="bidang_pekerjaan">
                                       <input id="bidangBaru" name="bidangBaru" type="text" placeholder="" class="form-control input-md" required="" value="" data-bind="value:  bidangBaru">                         
                                      </div>
                                    </div>
                                    </div>  

                                    <div class="form-group">
                                      <label class="col-md-4 control-label topplus10" for="posisi">Tingkatan Posisi</label>  
                                      <div class="col-md-5">
                                          <select name="tingkatan_posisi" id="tingkatan_posisi" class="form-control selectFilter" data-bind="value: tingkatan_posisi">
                                          <?php foreach($jabatan->result() as $row){ ?>
                                          <option value="<?=$row->id_jabatan;?>"><?=$row->nama_jabatan;?></option>
                                          <?php } ?>
                                      </select>
                                    </div>
                                    </div>
                                     <div class="form-group">
                                      <label class="col-md-4 control-label topplus10" for="gaji">Gaji</label>  
                                      
                                      <div class="col-md-5">
                                      <div class="col-md-4 padleft0">
                                    <select name="kurs" id="kurs" class=" form-control " data-bind="value: kurs" placeholder="Mata Uang">
                                          <option value="Rp.">Rp.</option>
                                          <option value="$.">$.</option>
                                      </select>
                                      
                                      </div>
                                      <div class="col-md-8 padright0">

                                       <input id="gaji" name="gaji" type="number" placeholder="" class="form-control col-md-9" value="" data-bind="value: gaji">
                                       <div style="font-size: 10px !important">
                                        <input type="checkbox"  name="showGaji" id="showGaji-0" value="" data-bind="value: showGaji, checked: showGaji">
                        Sembunyikan di CV</div>
                                       </div>
                                       </div>
                                       </div>
                                    <div class="form-group">
                                      <label class="col-md-4 control-label topplus10" for="posisi">Detail Pekerjaan</label>  
                                      <div class="col-md-7">
                                       <textarea id="detail" name="detail" rows="7" cols="250" class="form-control" required="" value="" data-bind="value:  detail"></textarea>
                                      </div>
                                      </div>

                                    </fieldset>
                                    </form>

                          <div class="row">
                               <div class="col-md-12 martop40">
                                  <div class="footerInput">
                                     <center>
                                        <a href="#" class="btn btn-warning bWhite" id="cancelPengalaman"><i class="fa fa-save" aria-hidden="true"></i> Cancel</a>
                                        <a href="#" id="simpan-pengalaman" class="btn btn-primary bWhite"><i class="fa fa-save" aria-hidden="true"></i> Simpan</a>  </center>
                                  </div>
                              </div>
                          </div>
                          
                      </div>
                    </div>
                  </div>
                  </div>
                  </div>
                  </div>
