<style type="text/css">
  .anu tbody td {
    padding:3px !important;
    border:1px solid #e3e3e3;
  }
</style> <?php echo form_open_multipart('recording/save_ovk_recording');?>

<?php

$id = $id['id_jadwal'];
$sql = "select * from tb_jadwal a join tb_chickin b on b.id_chickin = a.id_chickin  join  tb_kandang c on c.id_kandang = b.id_kandang
join tb_plant d on d.id_plant = b.id_plant  where id_jadwal  = '" . $id . "'";
$ax = $this->db->query($sql)->result();
$ax = $ax[0];
?>

              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Daily Report OVK</h3>
                </div>
              <div class='box-body'><div class='col-md-6'>

                  <table class='table table-condensed table-bordered'>
                  <tbody id="t1">
                    <input type='hidden' name='chk' value='<?php echo $ax->id_chickin;?>'>
					<input value="<?php echo $ax->id_jadwal;?>" type='hidden' name="no"/>
          	<input value="" type='hidden' name="no2"/>
                      <tr><th width='150px' scope='row'>No ChickIN</th>    <td><input type='text'  class='form-control' name='g' value="<?php echo $ax->no_chickin;?>" readonly='on' required></td></tr>
                    <tr><th width='150px' scope='row'>Tanggal Record</th>    <td><input type='text'  class='form-control' name='' value="<?php echo tgl_slash($ax->tgl_pembuatan);?>" readonly='on' required></td></tr>



                  </tbody>
                  </table>
                </div>

                <div class='col-md-6'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='150px' scope='row'>Kandang</th>    <td><input type='text'  class='form-control' name='g' value="<?php echo $ax->nama_kandang;?>" readonly='on' required></td></tr>
                    <tr><th width='150px' scope='row'>Plant</th>    <td><input type='text'  class='form-control' name='g' value="<?php echo $ax->nama_plant;?>" readonly='on' required></td></tr>

                  </tbody>
                  </table>
                </div>

                <table id="tt" class='table table-bordered table-striped'>
                      <thead>
                        <tr bgcolor='#e3e3e3'>
                          <th width='20px'>No</th>
                          <th >OVK Code</th>
                          <th width='250px'>Jumlah</th>
                          <th width='150px'>Satuan</th>
                          <th width='60px'>Action	</th>


                        </tr>
</theaD>
<tbody id="tx">

  <tr>
                      <td class="tnomor"></td>
                      <td><select  id='a'  class='aa comboboxx form-control' onchange=\"changeValue(this.value)\"  autofocus>
                                                            <option value=''> Feed Codes </option><option value=></option>
                                                            <?php
                                                            $page = '1';
                                                            																$sql = "select * from tb_stock  where id_chickin  = '$ax->id_chickin ' and id_material_stock  = '2'";
                                                            																$a = $this->db->query($sql)->result();
                                                            																foreach($a as $x)
                                                            																{
                                                            																?>
                                                                                            <option value="<?php echo $x->id_stock;?>">
																                                                                              <?php echo trim($x->nama_stock);?>
																                                                                     </option>

																                                                                                                          <?php } ?>
                            </select></td>
                      <td><input class='form-control' id='c' type='number' min='0.00' step="0.01"></td>
                      <td><input class='dd form-control' type='text'   id='e' readonly='on'> </td>
                      <td><button type='button' id="b1" name='submit' class='b1 btn btn-success'><span class='glyphicon glyphicon-plus' aria-hidden='true'></span></button>
          <a href='' class='hide text-danger b2 btn btn-danger'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></a>
          </td>
            </tr>
            <?php
           						  $sql = "select * from tb_ovk_detail a join tb_stock b on b.id_stock = a.id_stock where a.id_jadwal = '$ax->id_jadwal'";
           						  $aa = $this->db->query($sql)->result();
           						  foreach($aa as $xx)
           						  {
           						  ?>

           						   <tr>


                                     <td class="tnomor"></td>
                                     <td>
           						  <input type='hidden' name='aa[]' value='<?php echo $xx->id_stock;?>'/><input type='hidden' name='cc[]' class='jml' value='<?php echo $xx->jml_ovk;?>'/><input type='hidden' name='ee[]' value='<?php echo $xx->satuan;?>'/>
           						  <select readonly name='temp'  id='a'  class='aa comboboxx form-control' onchange=\"changeValue(this.value)\"  autofocus >

                          <?php

                                                          $sql = "select * from tb_stock  where id_chickin = '$ax->id_chickin'";
                                                          $a = $this->db->query($sql)->result();
                                                          foreach($a as $x)
                                                          {
                                                          ?>
           																<option <?php if($x->id_stock == $xx->id_stock) echo 'selected';?> value="<?php echo $x->id_stock;?>" >
           																<?php echo trim($x->nama_stock);?>
           																</option>
           																<?php } ?>

           																</select></td>
                                     <td><input class='form-control' readonly='on'  id='c' type='number' value='<?php echo $xx->jml_ovk;?>' ></td>
                                     <td><input class='form-control' readonly='on' id='e' type='text' value='<?php echo $xx->satuan_unit;?>'></td>
                                     <td>
           						  <a href='' class='text-danger b2 btn btn-danger'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></a>
           						  </td>
           						    </tr>

           						  <?php } ?>


                        </tbody>
                        <tfoot>
                    <tr class='alert alert-danger'>
                        <td colspan='2' align=right>Jumlah Total</td>
                        <td><span id="jml">0</span></td>

                        <td></td>
             <td></td>

                    </tr>
          </tfoot>
                </table>

            </div>
            <div class='box-footer'>
                  <button type="submit" class='btn btn-info pull-right'>Proses dan Selesai</button>
                  <a href="<?= base_url('recording') ?>"><button type='button' class='btn btn-default pull-right'>Batal</button></a>
                </div>
          </div><?php     echo form_close();?>
</table>
<script type="text/javascript">



  function changeValue(id){
  alert(prdName[id].name);
    document.getElementById('harga').value = prdName[id].name;
    document.getElementById('satuan').value = prdName[id].desc;
  };
</script>

<script>


 function numberRows() {
    var c = 0;
	var first = true;
	var jml = 0;
    $("#tx").find("tr").each(function(ind, el) {
		{
			if(c != 0)
			{
				var isi = ($(el).find("td:eq(0)").text());
				if(isi == "")
				{



				}
				$(el).find("td:eq(0)").html(ind + ".");

			}
			c++;


		}
    });
	$(".jml").each(function()
	{

		jml+=parseInt($(this).val());
	});
	$("#jml").text(jml);
  }
	$(document).ready(function()
	{
		$(".b1").click(function()
		{

			var $tr    = $(this).closest('tr');
			var $clone = $tr.clone();

			$clone.find('.b1').remove();
			$clone.find('.b2').removeClass('hide');

			$clone.find('select').val($(this).closest("tr").find('select').val());
			$clone.find('input').attr("disabled", "disabled");
			$clone.find('select').attr("disabled", "disabled");

			$tr.after($clone);


			var vala = $("#a").val();

			var valb = $("#b").val();
			var valc = $("#c").val();
			var vale = $("#e").val();
			$clone.find(".b2").before("<input type='hidden' name='aa[]' value='" + vala + "'/><input type='hidden' name='bb[]' value='" + valb + "'/><input type='hidden' name='cc[]' class='jml' value='" + valc + "'/><input type='hidden' name='ee[]' value='" + vale + "'/>");

			$(this).closest("tr").find('input').val('');
			$(this).closest("tr").find('select').val('');
			$(this).closest("tr").find('select').focus();
			numberRows();
		});
		$(document).on('click', '.b2', function(){
			var $tr    = $(this).closest('tr').remove();
			numberRows();
			return false;
		});
		$(document).on('change', '.aa', function(event){
			$.ajax({
				method:"GET",
				url:'<?php echo base_url('administrator/lookup2'); ?>',
				data:{
					id:$(this).val()
				},
				success:function(data)
				{

					$(event.target).closest('tr').find(".dd").val(data);
				}
			});
		});
		$("#d").change(function()
		{
			$(".aa").empty();
			$("#b1").attr("disabled", "disabled");

			if($(this).val() != ""){
				var val = $(this).val();
				$.ajax({
					method:"GET",
					url:'<?php echo base_url('administrator/lookupa'); ?>',
					data:{
						id:$(this).val()
					},
					success:function(data)
					{
						$(".aa").html(data);
						$(".aa").trigger("change");
						$("#dx").val(val);

						$("select:first").attr("disabled", "disabled");
						$("#b1").removeAttr("disabled");
					}
				});
			}
		});
		$("#d").trigger("change");
		numberRows();

	});
</script>
