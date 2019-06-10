<select name="bidang_pekerjaan" id="bidang_pekerjaan" class="form-control selectFilter" data-bind="value: bidang_pekerjaan">
                                       <option value="null"></option>

                                       <?php if($bidang != FALSE) { foreach($bidang->result() as $row){?>
                                       		<option value="<?=$row->id_bidang_pekerjaan;?>"><?=$row->nama_bidang;?></option>
                                       <?php } } ?>
                                      </select>