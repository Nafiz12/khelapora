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
    .circle_green {
        background: green;
        width: 10px;
        height: 10px;
        border-radius: 50%;
    }
    .circle_red {
        background: #f00;
        width: 10px;
        height: 10px;
        border-radius: 50%;
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
        <div class="panel-header-menu pull-right mr10">
            <a href="javascript:window.print()" class="btn btn-xs btn-default btn-gradient mr5"> <i class="fa fa-print fs13"></i> </a>
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
                <h4 class="mn" style="text-decoration: underline;"><?php echo $title; ?>  </h4>
            </div>
        </div>
        <div class="row" id="invoice-table">
            <div class="col-md-12">
                <table class="scale" cellspacing="0" width="100%" cellpadding="6" align="center">
                    <thead>
                        <tr>
                            <td width="12%">Sheet Name</td>
                            <td colspan="2"><b><?php echo $row->BookName; ?></b></td>
                        </tr>
                        <tr>
                            <td>Author</td>
                            <td colspan="2"><b><?php echo $author_list[$row->AuthorId]['AuthorName']; ?></b></td>
                        </tr>
                        <tr>
                            <td>Sheet Category</td>
                            <td colspan="2"><b><?php echo $book_type_list[$row->TypeId]['TypeName']; ?></b></td>
                        </tr>
                       
                    </thead>
                    <tbody>
                   <!--  <tr>
                        <td colspan="3" align="center"><b><?php echo 'Book Details'; ?></b></td>
                    </tr>
                    <tr>
                        <td><b><?php echo 'SL'; ?></b></td>
                        <td><b><?php echo 'Identification Number'; ?></b></td>
                        <td><b><?php echo 'Status'; ?></b></td>
                    </tr> -->
                   <!--  <?php
                    $i = 1;
                    foreach ($book_details as $row1) {
                        ?>
                        <tr>
                            <td><label><?php echo $i; ?></label></td>
                            <td><label><?php echo $row1['IdentificationNumber']; ?></label></td>
                            <?php if($row1['BookStatus']=='A'){ ?>
                                <td>
                                    <div class="circle_green" title="Available"></div>
                                </td>
                            <?php }else{ ?>
                                <td>
                                    <div class="circle_red" title="Taken"></div>
                                </td>
                            <?php } ?>
                        </tr>
                        <?php
                        $i++;
                    }
//                    ?> -->
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row no-print" id="invoice-footer" style="margin-top: 3%;">
            <div class="clearfix"></div>
            <div class="col-lg-2 ">
                <a href="javascript:window.print()" class="btn active btn-alert btn-block"><i class="fa fa-print pr5"></i> Print Book List</a>
            </div>
        </div>

    </div>
</div>