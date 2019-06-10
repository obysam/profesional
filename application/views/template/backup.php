                <div class="row biodata">
                <div class="col-md-8 col-xs-12 col-md-offset-2">
                     <div class="card">
                            <div class="header">
                                <h4 class="title">Form Biodata</h4>
                                <p class="category">Isikan data dengan jelas sehingga memudahkan orang membaca CV anda</p>
                            </div>
                            <div class="content">
                                <form class="form-horizontal" id="form-biodata" data-bind="with: model.Biodata">
                                    <fieldset>

                                    <!-- Text input-->
                                    <div class="form-group">
                                      <label class="col-md-4 control-label topplus10" for="nama">Nama Lengkap</label>  
                                      <div class="col-md-5">
                                      <input id="nama" name="nama" type="text" placeholder="" class="form-control input-md" required="" value="" data-bind="value:  nama">
                                        
                                      </div>
                                    </div>

                                    <!-- Text input-->
                                    <div class="form-group">
                                      <label class="col-md-4 control-label topplus10" for="tempat_lahir">Tempat / Tgl Lahir</label>  
                                      <div class="col-md-4">
                                      <select name="tempat_lahir" id="tempat_lahir" class="form-control selectFilter" data-bind="value: tempat_lahir">
                                       <option value="null"></option>
                                        <?php foreach($regency->result() as $row){ ?>
                                        <option value="<?=$row->id;?>"><?=$row->name;?></option>
                                        <?php } ?>
                                      </select>
                                    <!--   <input id="domisili" name="domisili" type="text" placeholder="Domisili saat ini" class="form-control input-md" required="" value="" data-bind="value:  domisili">
                                       -->  
                                        
                                      </div><div class="col-md-3">
                                      <input id="tanggal_lahir" name="tanggal_lahir" type="text"  class="form-control input-md" required="" value="" data-bind="value: tanggal_lahir">
                                        
                                      </div>
                                    </div>

                      
     <select name="field_of_study_code0" id="field_of_study_code0" index="0" tabindex="-1" aria-invalid="false" aria-required="true">
                                                    <option class="customx" value="2" title="Periklanan/Media">Periklanan/Media</option>
                                                    <option class="customx" value="3" title="Agrikultur/Aquakultur/Perhutanan">Agrikultur/Aquakultur/Perhutanan</option>
                                                    <option class="customx" value="5" title="Operasi Pesawat Terbang/Manajemen Bandara">Operasi Pesawat Terbang/Manajemen Bandara</option>
                                                    <option class="customx" value="4" title="Arsitektur">Arsitektur</option>
                                                    <option class="customx" value="1" title="Seni/Desain/Multimedia Kreatif">Seni/Desain/Multimedia Kreatif</option>
                                                    <option class="customx" value="6" title="Biologi">Biologi</option>
                                                    <option class="customx" value="55" title="BioTeknologi">BioTeknologi</option>
                                                    <option class="customx" value="36" title="Bisnis/Administrasi/Manajemen">Bisnis/Administrasi/Manajemen</option>
                                                    <option class="customx" value="7" title="Kimia">Kimia</option>
                                                    <option class="customx" value="54" title="Komersial">Komersial</option>
                                                    <option class="customx" value="8" title="Ilmu Komputer/Teknologi Informasi">Ilmu Komputer/Teknologi Informasi</option>
                                                    <option class="customx" value="9" title="Kedokteran Gigi">Kedokteran Gigi</option>
                                                    <option class="customx" value="15" title="Ekonomi">Ekonomi</option>
                                                    <option class="customx" value="10" title="Jurnalisme">Jurnalisme</option>
                                                    <option class="customx" value="17" title="Pendidikan/Pengajaran/Pelatihan">Pendidikan/Pengajaran/Pelatihan</option>
                                                    <option class="customx" value="12" title="Teknik (Aviasi/Penerbangan/Astronotika)">Teknik (Aviasi/Penerbangan/Astronotika)</option>
                                                    <option class="customx" value="101" title="Teknik (Bioteknologi/Biomedikal)">Teknik (Bioteknologi/Biomedikal)</option>
                                                    <option class="customx" value="13" title="Teknik Kimia">Teknik Kimia</option>
                                                    <option class="customx" value="14" title="Teknik Sipil">Teknik Sipil</option>
                                                    <option class="customx" value="16" title="Teknik (Komputer/Telekomunikasi)">Teknik (Komputer/Telekomunikasi)</option>
                                                    <option class="customx" value="18" title="Teknik (Elektro)">Teknik (Elektro)</option>
                                                    <option class="customx" value="24" title="Teknik (Lingkungan/Kesehatan/Keamanan)">Teknik (Lingkungan/Kesehatan/Keamanan)</option>
                                                    <option class="customx" value="19" title="Teknik (Industri)">Teknik (Industri)</option>
                                                    <option class="customx" value="23" title="Teknik (Kelautan)">Teknik (Kelautan)</option>
                                                    <option class="customx" value="21" title="Teknik (Ilmu Materi)">Teknik (Ilmu Materi)</option>
                                                    <option class="customx" value="20" title="Teknik (Mekanikal)">Teknik (Mekanikal)</option>
                                                    <option class="customx" value="102" title="Teknik (Mechatronik/Elektromekanikal)">Teknik (Mechatronik/Elektromekanikal)</option>
                                                    <option class="customx" value="22" title="Teknik (Fabrikasi/Peralatan Metal &amp; Pencelupan/Pengelasan)">Teknik (Fabrikasi/Peralatan Metal &amp; Pencelupan/Pengelasan)</option>
                                                    <option class="customx" value="103" title="Teknik (Pertambangan/Mineral)">Teknik (Pertambangan/Mineral)</option>
                                                    <option class="customx" value="25" title="Teknik (Lainnya)">Teknik (Lainnya)</option>
                                                    <option class="customx" value="26" title="Teknik (Petroleum/Minyak/Gas)">Teknik (Petroleum/Minyak/Gas)</option>
                                                    <option class="customx" value="28" title="Keuangan/Akuntansi/Perbankan">Keuangan/Akuntansi/Perbankan</option>
                                                    <option class="customx" value="27" title="Manajemen Pelayanan Makanan &amp; Minuman">Manajemen Pelayanan Makanan &amp; Minuman</option>
                                                    <option class="customx" value="104" title="Teknologi Pangan/Nutrisi/Gizi">Teknologi Pangan/Nutrisi/Gizi</option>
                                                    <option class="customx" value="11" title="Ilmu Geografi">Ilmu Geografi</option>
                                                    <option class="customx" value="105" title="Geologi/Geofisika">Geologi/Geofisika</option>
                                                    <option class="customx" value="106" title="Sejarah">Sejarah</option>
                                                    <option class="customx" value="29" title="Perhotelan/Pariwisata/Manajemen Hotel">Perhotelan/Pariwisata/Manajemen Hotel</option>
                                                    <option class="customx" value="30" title="Manajemen HR">Manajemen HR</option>
                                                    <option class="customx" value="32" title="Kemanusiaan/Pengetahuan Budaya">Kemanusiaan/Pengetahuan Budaya</option>
                                                    <option class="customx" value="35" title="Logistik/Transportasi">Logistik/Transportasi</option>
                                                    <option class="customx" value="31" title="Hukum">Hukum</option>
                                                    <option class="customx" value="33" title="Manajemen Perpustakaan">Manajemen Perpustakaan</option>
                                                    <option class="customx" value="34" title="Linguistik/Bahasa">Linguistik/Bahasa</option>
                                                    <option class="customx" value="37" title="Komunikasi Massa">Komunikasi Massa</option>
                                                    <option class="customx" value="38" title="Matematika">Matematika</option>
                                                    <option class="customx" value="40" title="Kedokteran">Kedokteran</option>
                                                    <option class="customx" value="39" title="Apoteker">Apoteker</option>
                                                    <option class="customx" value="41" title="Ilmu Kelautan">Ilmu Kelautan</option>
                                                    <option class="customx" value="49" title="Pemasaran">Pemasaran</option>
                                                    <option class="customx" value="42" title="Musik/Seni Panggung">Musik/Seni Panggung</option>
                                                    <option class="customx" value="43" title="Keperawatan">Keperawatan</option>
                                                    <option class="customx" value="107" title="Optometri">Optometri</option>
                                                    <option class="customx" value="47" title="Personal Service">Personal Service</option>
                                                    <option class="customx" value="45" title="Farmasi">Farmasi</option>
                                                    <option class="customx" value="108" title="Filosofi">Filosofi</option>
                                                    <option class="customx" value="109" title="Terapi Fisik/Fisioterapi">Terapi Fisik/Fisioterapi</option>
                                                    <option class="customx" value="46" title="Fisika">Fisika</option>
                                                    <option class="customx" value="110" title="Ilmu Politik">Ilmu Politik</option>
                                                    <option class="customx" value="111" title="Pengembangan Properti/Manajemen Real Estate">Pengembangan Properti/Manajemen Real Estate</option>
                                                    <option class="customx" value="48" title="Pelayanan &amp; Manajemen Perlindungan">Pelayanan &amp; Manajemen Perlindungan</option>
                                                    <option class="customx" value="112" title="Psikologi">Psikologi</option>
                                                    <option class="customx" value="100" title="Survei Kuantitas">Survei Kuantitas</option>
                                                    <option class="customx" value="50" title="Ilmu Pengetahuan &amp; Teknologi">Ilmu Pengetahuan &amp; Teknologi</option>
                                                    <option class="customx" value="51" title="Sekretari">Sekretari</option>
                                                    <option class="customx" value="113" title="Ilmu Sosial/Sosiologi">Ilmu Sosial/Sosiologi</option>
                                                    <option class="customx" value="114" title="Ilmu &amp; Manajemen Olahraga">Ilmu &amp; Manajemen Olahraga</option>
                                                    <option class="customx" value="52" title="Tekstil/Fashion Design">Tekstil/Fashion Design</option>
                                                    
                                                <option value="115" title="Studi Perkotaan/Perencanaan Kota">Studi Perkotaan/Perencanaan Kota</option>
                                                <option value="53" title="Kedokteran Hewan">Kedokteran Hewan</option>
                                                <option value="44" title="Lainnya">Lainnya</option>
                                                </select>
                                    <!-- Text input-->
                                    <div class="form-group">
                                      <label class="col-md-4 control-label topplus10" for="domisili">Domisili</label>  
                                      <div class="col-md-4">
                                      <select name="domisili" id="domisili" class="form-control selectFilter" data-bind="value: domisili">
                                       <option value="null"></option>

                                        <?php foreach($regency->result() as $row){ ?>
                                        <option value="<?=$row->id;?>"><?=$row->name;?></option>
                                        <?php } ?>
                                      </select>
                                    <!--   <input id="domisili" name="domisili" type="text" placeholder="Domisili saat ini" class="form-control input-md" required="" value="" data-bind="value:  domisili">
                                       -->  
                                      </div>
                                    </div>

                                    <!-- File Button --> 
                                    <div class="form-group">
                                      <label class="col-md-4 control-label" for="foto">Foto</label>
                                      <div class="col-md-4">
                                        <input id="foto" name="foto" class="input-file" type="file">
                                      </div>
                                    </div>

                                    </fieldset>
                                    </form>

                                <div class="footer">
                                    <div class="col-md-12">
                                        <center>
                                            <a href="#" id="simpan-biodata" class="btn btn-primary"><i class="fa fa-save" aria-hidden="true"></i> Simpan</a>
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

        
