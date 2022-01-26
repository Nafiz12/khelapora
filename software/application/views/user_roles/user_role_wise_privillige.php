<title><?php echo $title;?></title>
<div class="col-md-12">
    <div class="panel panel-visible" id="spy2">
        <div class="panel-heading">
            <div class="panel-title hidden-xs">
                <span class="glyphicon glyphicon-tasks"></span><?php echo $title; ?>
            </div>
        </div>
        <div class="panel-body pn">
            <form method="post" action="<?php echo current_url(); ?>">
                <div class="form-group">
                    <div style="float: right;" class="col-xs-2"><button class="btn btn-hover btn-danger btn-block" type="button" onclick="javascript:history.go(-1)">Cancel</button></div>
                    <div style="float: right;" class="col-xs-2"><input type="submit" class="btn btn-hover btn-alert btn-block" value="Save" ></div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered mbn">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th><input type="checkbox" id="index_all"> View</th>
                            <th><input type="checkbox" id="add_all"> Add</th>
                            <th><input type="checkbox" id="edit_all"> Edit</th>
                            <th><input type="checkbox" id="delete_all"> Delete</th>
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
                                    if($function=="index"){ ?><td><input type="checkbox" class="index" <?php echo isset($saved_data[$cntroller][$function])?'checked="checked"':''; ?> name="data[<?php echo $cntroller ?>][<?php echo $function ?>]" /></td><?php $complete['1']=1; continue;  }
                                    else{ if(!isset($complete['1'])){ $complete['1']=1; ?><td>-</td><?php } }

                                    if($function=="add"){ ?><td><input type="checkbox" class="add" <?php echo isset($saved_data[$cntroller][$function])?'checked="checked"':''; ?> name="data[<?php echo $cntroller ?>][<?php echo $function ?>]" /></td><?php $complete['2']=1; continue; }
                                    else{ if(!isset($complete['2'])){ $complete['2']=1; ?><td>-</td><?php } }

                                    if($function=="edit"){ ?><td><input type="checkbox" class="edit" <?php echo isset($saved_data[$cntroller][$function])?'checked="checked"':''; ?> name="data[<?php echo $cntroller ?>][<?php echo $function ?>]" /></td><?php $complete['3']=1; continue; }
                                    else{ if(!isset($complete['3'])){ $complete['3']=1; ?><td>-</td><?php } }

                                    if($function=="delete"){ ?><td><input type="checkbox" class="delete" <?php echo isset($saved_data[$cntroller][$function])?'checked="checked"':''; ?> name="data[<?php echo $cntroller ?>][<?php echo $function ?>]" /></td><?php $complete['4']=1; continue;  }
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
<script type="text/javascript" language="javascript">
    $(document).ready(function() {
        //Index Function
        $('#index_all').change(function(){ //".checkbox" change
            if(this.checked == false){
                $(".index").prop("checked", false);
            }else{
                $(".index").prop("checked", true);
            }
        });

        //Add Function
        $('#add_all').change(function(){ //".checkbox" change
            if(this.checked == false){
                $(".add").prop("checked", false);
            }else{
                $(".add").prop("checked", true);
            }
        });

        //Edit Function
        $('#edit_all').change(function(){ //".checkbox" change
            if(this.checked == false){
                $(".edit").prop("checked", false);
            }else{
                $(".edit").prop("checked", true);
            }
        });
        //Delete Function
        $('#delete_all').change(function(){ //".checkbox" change
            if(this.checked == false){
                $(".delete").prop("checked", false);
            }else{
                $(".delete").prop("checked", true);
            }
        });
    });
</script>