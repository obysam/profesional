 <?php foreach($pengalaman->result() as $row){ 
 ?>

                        <div class="row">
                        <div class="col-md-12">
                        <div class="col-md-3 topplus80">
                          <?php $now2 = new DateTime($row->tanggal_gabung);
                            $gabung = $now2->format('M Y'); 
                            echo $gabung; ?> - 

                          <?php if($row->tanggal_keluar == NULL){
                            echo "Sekarang";
                            $now = new DateTime();
                          }else{
                            $now = new DateTime($row->tanggal_keluar);
                            $Keluar = $now->format('M Y');
                            echo $Keluar;
                          }
                          ?>
                          <br>
                          <p><?php $interval = date_diff($now2, $now);
                                echo $interval->m + ($interval->y * 12) . ' Bulan';
                             ?>
                             </p>
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                            <div class="col-md-8">
                              <h4 class="title"><u><?= $row->posisi;?></u></h4>
                              <h5 class="title"><?=$row->perusahaan;?> || <?=$row->name;?></h5>
                              <br>
                            </div>
                            <div class="col-md-4">
                              <a href="#" id="<?=$row->id_pengalaman;?>" class="btn btn-danger hapusPengalaman pull-right" title='Hapus'><i class="pe-7s-trash"></i></a>
                           
                              <a href="#" id="<?=$row->id_pengalaman;?>" class="btn btn-info editPengalaman pull-right" title='Edit'><i class="pe-7s-pen"></i></a>
                               
                            </div>
                            </div>
                                <div class="row form-group bot0">
                                      <label class="col-md-4 control-label" for="perusahaan">Industri</label>  
                                      <div class="col-md-5">
                                      <?=$row->nama_industri;?>
                                      </div>
                                </div>
                                <div class="row form-group bot0">
                                      <label class="col-md-4 control-label" for="spesialisasi">Spesialisasi</label>  
                                      <div class="col-md-5">
                                      <?=$row->spesialisasi;?>
                                      </div>
                                </div>
                                <div class="row form-group bot0">
                                      <label class="col-md-4 control-label" for="bidang_pekerjaan">Bidang Pekerjaan</label>  
                                      <div class="col-md-5">
                                      <?=$row->nama_bidang;?>
                                      </div>
                                </div>
                                <div class="row form-group bot0">
                                      <label class="col-md-4 control-label" for="tingkatan_posisi">Tingkatan Posisi</label>  
                                      <div class="col-md-5">
                                      <?=$row->nama_jabatan;?>
                                      </div>
                                </div>
                                <div class="row form-group bot0">
                                      <label class="col-md-4 control-label" for="gaji">Gaji</label>  
                                      <div class="col-md-5">
                                      <?=$row->kurs.' '.$row->gaji;?>
                                      </div>
                                </div>
                                  <div class="row form-group bot0">
                                     <div class="col-md-12">
                                      <?=$row->detail;?>
                                      </div>
                                </div>
                      <hr style="border-bottom: dotted 2px #6c58d4">
                        </div>

                        </div>
                        </div>
                      <?php } ?>

                      <script type="text/javascript">
                        $('.hapusPengalaman').click(function(){
                          var id_pengalaman = $(this).attr('id');
                          swal({
                      title: "Konfirmasi Hapus",
                      text: "Anda tidak dapat mengembalikan data, setelah menghapusnya!",
                      type: "warning",
                      showCancelButton: true,
                      confirmButtonColor: "#DD6B55",
                      confirmButtonText: "Ya!",
                      cancelButtonText: "Tidak",
                      closeOnConfirm: false,
                      closeOnCancel: false
                      },
                      function(isConfirm){
                        if (isConfirm) {
     
                            var url = "<?=base_url();?>user/deletePengalaman";
                              model.Processing(true);
                          
                            $.post(url,{id_pengalaman:id_pengalaman}, function(result){
                                 swal("success", "Data Berhasil terhapus", "success");
                                   $('#tabel-pengalaman').load('<?=base_url();?>user/tabelPengalaman');
                            model.Processing(false);

                            })
                        } else {
                          swal("Cancel Hapus", "Terima Kasih", "error");
                        }
                      });
                           
                          })


$('.editPengalaman').click(function(){
  var id_pengalaman = $(this).attr('id');
  var url = "<?=base_url();?>user/getPengalamanbyID";
  $.post(url,{id_pengalaman:id_pengalaman}, function(result){
     var res = jQuery.parseJSON(result);
     var id_bidang = res[0].id_bidang_pekerjaan;
     console.log(res,'oby')
     
      model.Processing(true);
      model.Pengalaman().id_pengalaman(res[0].id_pengalaman);
      model.Pengalaman().perusahaan(res[0].perusahaan);
      model.Pengalaman().posisi(res[0].posisi);
      model.Pengalaman().lokasi(res[0].name);
      model.Pengalaman().id_spesialisasi(res[0].id_spesialisasi);
    setTimeout(function(){
      $("#spesialisasi").val(res[0].id_spesialisasi).trigger('change');
      $("#industri").val(res[0].id_industri).trigger('change');
      $("#tingkatan_posisi").val(res[0].tingkatan_posisi).trigger('change');
   },1000);


      model.Pengalaman().data_bidang(res[0].data_bidang);
      model.Pengalaman().tingkatan_posisi(res[0].tingkatan_posisi);
      model.Pengalaman().id_industri(res[0].id_industri);
      model.Pengalaman().tanggal_gabung(res[0].tanggal_gabung);
      //model.Pengalaman().tanggal_keluar(res[0].tanggal_keluar);
      model.Pengalaman().gaji(res[0].gaji);
      model.Pengalaman().detail(res[0].detail);
      
      setTimeout(function(){$('#bidang_pekerjaan').val(id_bidang);
      model.Pengalaman().id_bidang_pekerjaan(id_bidang);
      },3000);
      $('#tanggal_gabung').datepicker('setDate', new Date(res[0].tanggal_gabung));

      if(res[0].checkOut != 0){
          $("#tanggal_keluar").prop("disabled", true);
          model.Pengalaman().tanggal_keluar('');
          model.Pengalaman().checkOut(true);
      }else{
        cekDate();
         $("#tanggal_keluar").prop("disabled", false);
        
         $('#tanggal_keluar').datepicker('setDate', new Date(res[0].tanggal_keluar));
        // model.Pengalaman().tanggal_keluar(res[0].tanggal_keluar);
          model.Pengalaman().checkOut(false);

      }
      $('.form-pengalaman').show();
      $('.form-pengalaman').css('visibility','visible')
      $('.tabel-pengalaman').hide();
      model.Processing(false);
  })
})

                      </script>