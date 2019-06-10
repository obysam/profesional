 <?php $no=0; foreach($pendidikan->result() as $row){ ?>
 <input type="hidden" class="nomor" value="<?=$no;?>">
              <div class="row">
                        <div class="col-md-12">
                        <div class="col-md-3 topplus80">
                          <h5 class="title"><?=$row->thn_masuk;?> / <?php if($row->thn_lulus==null){
                            echo "Sekarang";}else{ echo $row->thn_lulus;}?></h5>
                        </div>
                        <div class="content col-md-9">
                            <div class="row header">
                            <div class="col-md-8 padleft0">
                              <h4 class="title"><u><?=$row->sekolah;?></u></h4>
                                <h5 class="title"><?=$row->name;?></h5>
                              <br>
                            </div>
                            <div class="col-md-4">
                              <a href="#" id="<?=$row->id_pendidikan;?>" class="btn btn-danger hapuspendidikan pull-right" title='Hapus'><i class="pe-7s-trash"></i></a>
                           
                              <a href="#" id="<?=$row->id_pendidikan;?>" class="btn btn-info editpendidikan pull-right" title='Edit'><i class="pe-7s-pen"></i></a>
                               
                            </div>
                            </div>
                                 <div class="row form-group bot0">
                                      <label class="col-md-4 control-label" for="perusahaan">Bidang Pendidikan</label>  
                                      <div class="col-md-5">
                                      <?=$row->bidang_pendidikan;?>
                                      </div>
                                </div>
                                <div class="row form-group bot0">
                                      <label class="col-md-4 control-label" for="perusahaan">Tingkatan</label>  
                                      <div class="col-md-5">
                                      <?=$row->tingkatan;?>
                                      </div>
                                </div>
                                <div class="row form-group bot0">
                                      <label class="col-md-4 control-label" for="spesialisasi">Indeks Prestasi</label>  
                                      <div class="col-md-5">
                                      <?=$row->nilai;?> / <?=$row->skala;?>
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

                      <?php $no++; } ?>

                      <script type="text/javascript">
                        $('.hapuspendidikan').click(function(){
                          var id_pendidikan = $(this).attr('id');
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
     
                            var url = "<?=base_url();?>user/deletePendidikan";
                              model.Processing(true);
                          
                            $.post(url,{id_pendidikan:id_pendidikan}, function(result){
                                 swal("success", "Data Berhasil terhapus", "success");
                                   $('#tabel-Pendidikan').load('<?=base_url();?>user/tabelPendidikan');
                            model.Processing(false);

                            })
    swal("Sukses!", "Data pendidikan telah terhapus.", "success");
  } else {
    swal("Cancel Hapus", "Terima Kasih", "error");
  }
});
                           
                          })


$('.editpendidikan').click(function(){
  var id_pendidikan = $(this).attr('id');
  var url = "<?=base_url();?>user/getpendidikanbyID";
  $.post(url,{id_pendidikan:id_pendidikan}, function(result){
     var res = jQuery.parseJSON(result);
     
      
      model.Processing(true);
      model.Pendidikan().id_pendidikan(res[0].id_pendidikan);
      model.Pendidikan().sekolah(res[0].sekolah);
      model.Pendidikan().lokasi(res[0].name);
      model.Pendidikan().thn_lulus(res[0].thn_lulus);
      model.Pendidikan().thn_masuk(res[0].thn_masuk);
      model.Pendidikan().tingkatan(res[0].tingkatan);
      setTimeout(function(){
      $("#id_bidang_pendidikan").val(res[0].id_bidang_pendidikan).trigger('change');;
      model.Pendidikan().id_bidang_pendidikan(res[0].id_bidang_pendidikan);
      
      },3000)
      model.Pendidikan().detail(res[0].detail);
      model.Pendidikan().skala(res[0].skala);
      model.Pendidikan().nilai(res[0].nilai);
      if(res[0].thn_lulus == null){
          $("#tanggal_keluar").prop("disabled", true);
          model.Pendidikan().thn_lulus('');
      }
     
      $('.form-Pendidikan').show();
      $('.tabel-Pendidikan').hide();
      model.Processing(false);
  })
})

function getId(string){
    param = {param:string};
    return $.ajax({
        url: '<?=base_url();?>user/getRegenciesbyId',
        type: "POST",
        dataType: "text",
        data: param
    });
}

function getRegenciesbyId(string) {
    var name = getId(string);
    name.done(function(data) {

    });
}

var no = <?=$no;?>;
model.nomor(no);

</script>