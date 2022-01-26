<title><?php echo $title;?></title>
<?php
$user_session=$this->session->userdata('system.user');

?>
<style>
    #spy7 {
        margin-bottom: 0px;
    }
    #paging {
        background: #ccc url("<?php echo base_url(); ?>media/silk/ui-bg_highlight-soft_75_cccccc_1x100.png") repeat-x scroll 50% 50%;
        border: 1px solid #aaa;
        border-radius: 0 0 4px 4px;
        float: left;
        font-family: verdana;
        font-size: 12px;
        height: 47px;
        padding: 12px 20px 0 10px;
        text-align: left;
        width: 100%;
    }
    #paging strong {
        background: #ccc none repeat scroll 0 0;
        border: 1px solid #fff;
        border-radius: 0 6px;
        color: #4d4a4a;
        font-family: Verdana,Arial,Helvetica,sans-serif;
        font-size: 12px;
        font-weight: bolder;
        padding: 2px 5px 5px;
        text-decoration: none;
    }

    #paging a {
        background: #fbfbfb none repeat scroll 0 0;
        border: 1px solid #b0b0b0;
        border-radius: 0 6px;
        color: #212121;
        font-family: Verdana,Arial,Helvetica,sans-serif;
        font-size: 12px;
        padding: 2px 5px 5px;
        text-decoration: none;
    }
    #paging a:hover {
        background: #bbb none repeat scroll 0 0;
        border: 1px solid #dedede;
        color: #000;
    }
    .filter input {
        border: 1px solid #cecece;
        border-radius: 0 0 8px;
        font-family: "Trebuchet MS",Verdana,Arial,Helvetica,sans-serif;
        font-size: 11px;
        margin: 0 0 0 10px;
        padding: 1px 6px 1px 2px;
        width: 120px;
        height: 24px;
    }
    .filter select {
        border: 1px solid #cecece;
        border-radius: 0 0 8px;
        font-family: "Trebuchet MS",Verdana,Arial,Helvetica,sans-serif;
        font-size: 11px;
        margin: 0 0 0 10px;
        padding: 1px 6px 1px 2px;
        width: 120px;
        height: 24px;
    }
</style>

<div class="panel" id="spy7">
    <div class="panel-heading1">
        <?php echo form_open('leave_calculations/index',array('id'=>'search_form','name'=>'search_form','method'=>"GET")); ?>

       

        <table class="filter" style="width: 100%">
            <tr>
                <td width="10%">
                 
                    <?php echo form_input('Year',set_value('Year',isset($session_data['Year'])?$session_data['Year']:""));?>

                <td width="60%">
                   
                    <input id="submit" class="filter_search_buttons" type="submit" value="Search" name="submit">
                  

                </td>
                <td width="10%"><button style="font-weight:normal;" class="btn active btn-alert btn-block" id="add_new_function" type="button"> <?php if(isset($language) && $language == 'B'){echo isset($language_list['Add_New'])?$language_list['Add_New']:'Add New';}else{echo 'Add New';} ?> &nbsp; <span class="glyphicons glyphicons-circle_plus"></span></button></td>
            </tr>
        </table>
        <?php echo form_close();?>
    </div>
    <div class="panel-body pn">
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th >Year Of Experience</th>
                <th >Sick Leave Number</th>
                <th >Earn Leave Number</th>
                <th >Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $i=1;
            foreach($list as $row){
                
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row->Year; ?></td>
                        <td><?php echo $row->SickLeave; ?></td>
                        <td><?php echo $row->EarnLeave; ?></td>
                        <td>
                            <?php
                           
                            echo anchor('leave_calculations/edit/' . $row->LeaveCalculationId, img(array('src' => base_url() . 'media/assets/img/icons/edit1.gif', 'border' => '0', 'alt' => 'edit')), array('title' => 'edit', 'class' => 'edit')) . '&nbsp';
                            echo anchor('leave_calculations/delete/' . $row->LeaveCalculationId, img(array('src' => base_url() . 'media/assets/img/icons/delete1.gif', 'border' => '0', 'alt' => 'delete')), array('title' => 'Delete', 'class' => 'delete', 'onclick' => "return confirm('Are You Sure To Delete This Type Information')"));

                            ?>
                        </td>
                    </tr>
                    <?php
                   
                $i++;
            }

            ?>
            </tbody>
        </table>
    </div>
</div>
<div align="center" id="paging"><?php echo $this->pagination->create_links(); ?></div>