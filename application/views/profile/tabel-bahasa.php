<table class="table table-hover" id="worked">
                <thead>
                    <tr>
                        <th width="70%">Bahasa</th>
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
                            <?=$row->bahasa?></td>
                        <td>
                        <div class="stars starrr" data-rating="0" style="padding-top: 10px !important">
                          <?php 
                            for($i=0; $i<$row->kemampuan;$i++){
                              echo '<span class="glyphicon .glyphicon-star-empty glyphicon-star"></span>';
                            };
                          ;?>
                          </div>
                        <td>
                            <button type="button" class="btn btn-success edit"  id="<?=$row->id_bahasa;?>"><i class="fa fa-edit"></i></button>
                            <button type="button" class="btn btn-warning delete" id="<?=$row->id_bahasa;?>"><i class="fa fa-trash"></i></button></td>
                    </tr>
                <?php $no++; } ?>
                </tbody>
            </table>

            <script type="text/javascript">
            $('.delete').click(function(){
              var id = $(this).attr('id');
              var url = "<?=base_url();?>user/deletebahasa";
              model.Proccessing()
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
              $.post(url,{id_bahasa:id},function(res){
                swal("Sukses","Data berhasil terhapus","success");
                 $('#tabel-bahasa').load("<?=base_url();?>user/tabelbahasa");

              })
            }
          })
        })
            $('.edit').click(function(){
              var id = $(this).attr('id');
              var url = "<?=base_url();?>user/getBahasaOne";
              $.post(url,{id_bahasa:id},function(result){
                 var res = jQuery.parseJSON(result); 
                 console.log(res)
                      model.bahasa().id_user(res[0].id_user);
                      model.bahasa().bahasa(res[0].bahasa);
                      model.bahasa().kemampuan(res[0].kemampuan);
                      model.bahasa().id_bahasa(res[0].id_bahasa);
                      var i = parseInt(res[0].kemampuan) - 1;
                      $('.starrr .glyphicon')[i].click();
              })
            })
            model.length(<?=$no;?>)

            </script>
            </script>
