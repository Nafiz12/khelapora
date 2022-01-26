<title><?php echo $title;?></title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $(function () {
            $("#chk_index_all").click(function () {
                if ($("#chk_index_all").is(':checked')) {
                    $(".chk_index").prop("checked", true);
                } else {
                    $(".chk_index").prop("checked", false);
                }
            });

			$("#chk_add_all").click(function () {
				if ($("#chk_add_all").is(':checked')) {
					$(".chk_add").prop("checked", true);
				} else {
					$(".chk_add").prop("checked", false);
				}
			});


			$("#chk_edit_all").click(function () {
				if ($("#chk_edit_all").is(':checked')) {
					$(".chk_edit").prop("checked", true);
				} else {
					$(".chk_edit").prop("checked", false);
				}
			});

			$("#chk_delete_all").click(function () {
				if ($("#chk_delete_all").is(':checked')) {
					$(".chk_delete").prop("checked", true);
				} else {
					$(".chk_delete").prop("checked", false);
				}
			});
        });
    });
</script>



			<div class="panel-body pn">
				<form method="post" action="<?php echo base_url();?>index.php/<?php echo $this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3);?> ">
					<div class="form-group">
						<div style="float: right;" class="col-xs-2"><button class="btn btn-hover btn-danger btn-block" type="button" onclick="javascript:history.go(-1)">Cancel</button></div>
						<div style="float: right;" class="col-xs-2"><input type="submit" id = " " class="btn btn-hover btn-alert btn-block" value="Save" ></div>
					</div>
					<div class="table-responsive" style = "overflow-x: visible;">
						<table class="table table-bordered mbn">
							<thead>
							<tr>
								<th>Name </th>
								<th>View <input type="checkbox"id="chk_index_all"/> </th>
								<th>Add <input type="checkbox"id="chk_add_all"/></th>
								<th>Edit <input type="checkbox"id="chk_edit_all"/> </th>
								<th>Delete <input type="checkbox"id="chk_delete_all"/></th>
								<th>Other</th>
							</tr>
							</thead>
							<tbody>
							<?php
							foreach($items as $group_name=>$r0)
							{
								if(!empty($r0)){ ?><tr style="background:#999"><td colspan="6"><?php echo $group_name ?></td></tr><?php }
								foreach($r0 as $cntroller=>$r1)
								{
									$complete=array();
									?><tr><td><?php echo $r1['name'];?></td><?php
									foreach($r1['function'] as $function=>$r2)
									{	//echo "<pre>"; print_r($r2);
										if($function=="index"){ ?><td><input class="chk_index" type="checkbox" <?php echo isset($saved_data[$cntroller][$function])?'checked="checked"':''; ?> name="data[<?php echo $cntroller ?>][<?php echo $function ?>]" /></td><?php $complete['1']=1; continue;  }
										else{ if(!isset($complete['1'])){ $complete['1']=1; ?><td>-</td><?php } }

										if($function=="add"){ ?><td><input class="chk_add" type="checkbox" <?php echo isset($saved_data[$cntroller][$function])?'checked="checked"':''; ?> name="data[<?php echo $cntroller ?>][<?php echo $function ?>]" /></td><?php $complete['2']=1; continue; }
										else{ if(!isset($complete['2'])){ $complete['2']=1; ?><td>-</td><?php } }

										if($function=="edit"){ ?><td><input class="chk_edit" type="checkbox" <?php echo isset($saved_data[$cntroller][$function])?'checked="checked"':''; ?> name="data[<?php echo $cntroller ?>][<?php echo $function ?>]" /></td><?php $complete['3']=1; continue; }
										else{ if(!isset($complete['3'])){ $complete['3']=1; ?><td>-</td><?php } }

										if($function=="delete"){ ?><td><input class="chk_delete" type="checkbox" <?php echo isset($saved_data[$cntroller][$function])?'checked="checked"':''; ?> name="data[<?php echo $cntroller ?>][<?php echo $function ?>]" /></td><?php $complete['4']=1; continue;  }
										else{ if(!isset($complete['4'])){ $complete['4']=1; ?><td>-</td><?php } }

										if($function!="index" || $function!="add" || $function!="edit" || $function!="delete")
										{
											?><td><?php echo $r2['name']; ?> <input type="checkbox" <?php echo isset($saved_data[$cntroller][$function])?'checked="checked"':''; ?> name="data[<?php echo $cntroller ?>][<?php echo $function ?>]" /></td><?php $complete['5']=1; continue;
										}


									}
									?></tr><?php
								}
							}
							?>
	<!--						<tr><td colspan="6" bgcolor="#666666"></td></tr>-->
							</tbody>
						</table>
							<div class="form-group">
								<div style="float: right;" class="col-xs-2"><button class="btn btn-hover btn-danger btn-block" type="button" onclick="javascript:history.go(-1)">Cancel</button></div>
								<div style="float: right;" class="col-xs-2"><input type="submit" class="btn btn-hover btn-alert btn-block" value="Save" ></div>
							</div>
					</div>
				</form>
			</div>
	</div>
</div>
<?php $this->load->view('Layouts/admin_footer'); ?>