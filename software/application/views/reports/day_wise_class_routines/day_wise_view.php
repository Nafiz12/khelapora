<title><?php echo $title;?></title>
<?php $order_total_amount = 0; ?>
<style type="text/css">
    .scale {
        border: 1px solid #000033;
    }
    .scale tr {
        border: 1px solid #000033;
        height: 25px;
    }
    .scale tr td {
        border: 1px solid #000033;
        padding-left: 10px;
        padding-right: 10px;
    }
    @media print
    {
        .no-print {
            display: none !important;
        }
        .scale {
            border: 1px solid #000;
        }
        .scale tr {
            border: 1px solid #000;
        }
        .scale tr td {
            border: 1px solid #000;
        }
        @page {
            size: auto;   /* auto is the initial value */
            margin: 0;  /* this affects the margin in the printer settings */
        }
    }
</style>
<div class="panel invoice-panel">
    <div class="panel-heading">
    <span class="panel-title">
        <span class="glyphicon glyphicon-print"></span> <?php echo $title; ?></span>
        <div id="editor" class="btn-group profile-settings-btn" style="float: right; width: 111px;" id="editor">
            <button style="padding: 9px 10px;" type="button" class="btn btn-danger btn-sm" onclick="javascript:window.print()">Print Information </button>
        </div>
    </div>
    <div class="panel-body p20" id="invoice-item">

        <div class="row mb30">
            <div align="center" class="col-md-12">
                <h3 class="lh10 mt10"> <?php echo $organization_info->OrganizationName; ?> </h3>
                <h5 class="mn"><?php echo $organization_info->OrganizationAddress_1; ?>  </h5>
            </div>
        </div>
        <div class="row mb30">
            <div align="center" class="col-md-12">
                <h4 class="mn" style="text-decoration: underline;"><?php echo $title.' of '.$class_info->ClassName; ?>  </h4>
            </div>
        </div>
        <div>
            <div class="col-md-12" style="margin-bottom: 1%;" >
                <table class="" border="0" cellspacing="0" width="88%" cellpadding="6" align="center">
                    <thead>
                    <tr>
                        <td width="80%" colspan="2"><?php echo 'Class: '.$class_info->ClassName.' | '.' Section/Batch: ALL | Shift: '.$shift_list[$posted_data['Shift']].' | '.'Day : '.$day_list[$posted_data['Day']]; ?></td>
                        <td width="80%" colspan="2"></td>
                        <td width="10%"><b>Print Date:</b></td>
                        <td width="10%"><?php echo date('Y-m-d');?></td>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="row" id="invoice-table">
            <div class="col-md-12">
                <table class="scale" cellspacing="0" width="100%" cellpadding="6" align="center">
                    <thead>
                    <tr>
                        <td width="10%">#</td>
                        <?php
                        foreach($section_list as $row){
                            echo '<td align="center">'.$row['SectionName']. '-'.$row['SectionCode'];'</td>';
                        }
                        ?>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 1;
                    foreach ($period_list as $key=>$row1) {
                        ?>
                        <tr>
                            <td><label><?php echo $row1['PeriodName'].'<br/>'.$row1['PeriodTime']; ?></label></td>
                            <?php
                            foreach($section_list as $key1=>$row2){
                                if(isset($routine_info[$key][$key1])){
                                    echo '<td height="100px;" style="text-align: center">'.$routine_info[$key][$key1]['SubjectName'].'<br>'.
                                        $routine_info[$key][$key1]['EmployeeName'].'<br>'.
                                        'Room : '.$routine_info[$key][$key1]['RoomNumber'].'<br>'.
                                        anchor('config_class_routines/edit/' . $routine_info[$key][$key1]['RoutineId'], img(array('src' => base_url() . 'media/assets/img/icons/edit1.gif', 'border' => '0', 'alt' => 'Payment')), array('title' => 'edit', 'class' => 'edit no-print')).'&nbsp'.
                                        anchor('config_class_routines/delete/' . $routine_info[$key][$key1]['RoutineId'], img(array('src' => base_url() . 'media/assets/img/icons/delete1.gif', 'border' => '0', 'alt' => 'Payment')), array('title' => 'Delete', 'class' => 'delete no-print','onclick'=>"return confirm('Are You Sure To Delete This Type Information')")).'<br>'.'</td>';
                                }
                                else{
                                    echo'<td>'.'&nbsp'.'</td>';
                                }
                            }
                            ?>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>