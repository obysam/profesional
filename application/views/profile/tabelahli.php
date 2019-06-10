<table class="table table-hover" id="worked">
                <thead>
                    <tr>
                        <th width="30%">Keahlian</th>
                        <th width="40%">Bidang</th>
                        <th width="20%">Kemahiran</th>
                        <th width="10%">
                        <!--     <button type="button" class="btn btn-blue add-row"><i class="fa fa-plus"></i></button> -->
                        </th>
                    </tr>
                </thead>
                <tbody>
                <?php $no=0; foreach($ahli->result() as $row){ ?>
                    <tr>
                        <td>
                            <?=$row->skill?></td>
                        <td>
                            <?=$row->spesialisasi;?>
                        </td>
                        <td>
                        <div class="stars starrr" data-rating="0" style="padding-top: 10px !important">
                          <?php 
                            for($i=0; $i<$row->kemampuan;$i++){
                              echo '<span class="glyphicon .glyphicon-star-empty glyphicon-star"></span>';
                            };
                          ;?>
                          </div>
                        <td>
                            <button type="button" class="btn btn-success edit"  id="<?=$row->id_skill;?>"><i class="fa fa-edit"></i></button>
                            <button type="button" class="btn btn-warning delete" id="<?=$row->id_skill;?>"><i class="fa fa-trash"></i></button></td>
                    </tr>
                <?php $no++; } ?>
                </tbody>
            </table>

            <script type="text/javascript">
            $('.delete').click(function(){
              var id = $(this).attr('id');
              var url = "<?=base_url();?>user/deleteSkill";
              model.Processing(true);
               swal({
                title: "Konfirmasi Hapus",
                text: "Anda akan menghapus Keahlian ini?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d9534f",
                confirmButtonText: "Ya",
                cancelButtonText: "Tidak Jadi",
                closeOnConfirm: true,
                closeOnCancel: true
              },
        function(isConfirm){
            if (isConfirm) {
              $.post(url,{id_skill:id},function(res){
                swal("Sukses","Data berhasil terhapus","success");
                 $('#tabel-ahli').load("<?=base_url();?>user/tabelahli");
              model.Processing(false);


              })
            }
          })
        })
            $('.edit').click(function(){
              var id = $(this).attr('id');
              var url = "<?=base_url();?>user/getSkillOne";
              $.post(url,{id_skill:id},function(result){
                 var res = jQuery.parseJSON(result); 
                 console.log(res)
                      model.Ahli().id_user(res[0].id_user);
                      model.Ahli().skill(res[0].skill);
                      model.Ahli().kemampuan(res[0].kemampuan);
                      $('#spesialisasi').select2('val',res[0].bidang)
                      model.Ahli().spesialisasiV(res[0].bidang);
                      model.Ahli().id_skill(res[0].id_skill);
                      var i = parseInt(res[0].kemampuan) - 1;
                      $('.starrr .glyphicon')[i].click();

              })
            })
            model.length(<?=$no;?>)

            </script>
            </script>
