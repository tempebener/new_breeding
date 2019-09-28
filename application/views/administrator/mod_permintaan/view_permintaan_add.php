<style type="text/css">
  .anu tbody td {
    padding:3px !important;
    border:1px solid #e3e3e3;
  }
</style> <?php echo form_open_multipart('purchase/save_purchase_req');?>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>ADD Permintaan</h3>
                </div>
              <div class='box-body'><div class='col-md-6'>

                  <table class='table table-condensed table-bordered'>
                  <tbody id="t1">
                    <input type='hidden' name='id' value=''>
                    <tr><th width='150px' scope='row'>No Permintaan</th>    <td><input type='text' style='width:40%; display:inline-block' class='form-control' id='pembelian' name='a' value='' readonly='on'>
                                                                                <label generated='true' class='error' id='message'></label></td></tr>
                      <tr ><th width='150px' scope='row'>Tgl Permintaan</th>    <td><input type='date'  class='form-control' name='' value='<?php echo date("Y-m-d");?>' readonly='on' required></td></tr>
                    <tr class="hidden"><th width='150px' scope='row'>Req Date</th>    <td><input type='text'  class='form-control' name='g' value='<?php echo date("Y-m-d");?>' readonly='on' required></td></tr>

                    <tr><th scope='row'>ChickIN</th>    <td><select name='d' id='d' class='  combobox2 form-control' >
                                                              <option  value='' selected>Search ChickIN</option>
                                                                <?php foreach($chickin as $row) { ?><option value="<?php echo $row->id_chickin;?>"><?php echo $row->no_chickin;?> </option><?php } ?>
                                                                </select>
																<input type="hidden" name="d" id="dx"/>
																</td></tr>


                  </tbody>
                  </table>
                </div>

                <div class='col-md-6'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr class='hidden'><th width='150px' scope='row'>Accepted Date</th>    <td><input type='text' class='form-control' name='h' value='$h' readonly='on'></td></tr>
                    <tr><th scope='row'>Location</th>    <td><select name='e' class='form-control ' >
                                                              <option disabled value='' selected>Search Plant</option>
                                                                <?php foreach($plant as $row) { ?><option value="<?php echo $row->id_plant;?>"><?php echo $row->nama_plant;?></option><?php } ?>
                                                                </select></td></tr>

                  </tbody>
                  </table>
                </div>

                <table id="tt" class='table table-bordered table-striped'>
                      <thead>
                        <tr bgcolor='#e3e3e3'>
                          <th width='20px'>No</th>
                          <th>Material Product</th>

                          <th width='80px'>Qty</th>
                          <th width='80px'>Sat</th>
                          <th>Note	</th>
                          <th style='width:50px'>Action</th>
                        </tr>
</theaD>

							<tfoot>
                      <tr class='alert alert-danger'>
                          <td colspan='2' align=right>Jumlah Total</td>
                          <td></td>

                          <td><span id="jml">0</span></td>
						   <td></td>
                          <td></td>
                          <td></td>

                      </tr>
					  </tfoot>
                  </table>

              </div>
              <div class='box-footer'>
                    <button type="submit" class='btn btn-info'>Proses dan Selesai</button>
                    <a href='".base_url()."purchase/delete_pembelian/".$this->session->id_pembelian."'><button type='button' class='btn btn-default'>Batal</button></a>
                  </div>
            </div><?php     echo form_close();?>


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
				url:'<?php echo base_url('purchase/lookup2'); ?>',
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
					url:'<?php echo base_url('purchase/lookup'); ?>',
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
    $("select").select2();

	});
</script>
