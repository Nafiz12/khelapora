<title><?php echo $title;?></title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script type="text/javascript" src="<?php echo base_url();?>media/assets/js/jquery.autocomplete.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>media/assets/css/jquery.autocomplete.css" />
<?php
$user_session=$this->session->userdata('system.user');
$language = $user_session['LanguageOption'];
?>
<script>
    $(function() {
        $( "#datepicker" ).datepicker();
    });
</script>
<style>
    .ac_results {
        width: 502px;
    }
    .customized_input_box {
        display: block;
        width: 100%;
        height: 33px;
        padding: 9px 12px;
        font-size: 13px;
        line-height: 1.5;
        color: #555555;
        background-color: #ffffff;
        background-image: none;
        border: 1px solid #dddddd;
        border-radius: 0px;
        -webkit-transition: border-color ease-in-out .15s;
        -o-transition: border-color ease-in-out .15s;
        transition: border-color ease-in-out .15s;
    }
    .cal_total {
        display: block;
        width: 100%;
        height: 33px;
        padding: 9px 12px;
        font-size: 13px;
        line-height: 1.5;
        color: #555555;
        background-color: #ffffff;
        background-image: none;
        border: 1px solid #dddddd;
        border-radius: 0px;
        -webkit-transition: border-color ease-in-out .15s;
        -o-transition: border-color ease-in-out .15s;
        transition: border-color ease-in-out .15s;
    }
    .custom_checkbox {
        background-color: #fff;
        background-image: none !important;
        border: 1px solid #dddddd;
        filter: none !important;
        outline: medium none;
        width: 100%;
        height: 34px !important;
    }
    .ac_input {
        width: 100%;
    }
</style>
<?php
$action = $this->uri->segment(2);
?>

<!-- Begin: Content -->
<div id="content" class="animated fadeIn">
    <div class="row">

        <div class="col-md-12">

            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title"><?php echo $title;?></span>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="<?php echo site_url('orders/'.$action); ?>" role="form" method="POST" enctype="multipart/form-data" onsubmit="return validate_form();">
                        <?php
                        if ($action == "edit") {
                            ?>

                            <input type="hidden" name="txt_order_id" value="<?php echo isset($Order_data->OrderId)?$Order_data->OrderId:""?>">
                            <?php
                        }
                        ?>
                        <div class="form-group">
                            <label style="font-weight:normal;font-family: <?= $user_session['FontFamily']; ?>" for="inputStandard" class="col-lg-3 control-label">  <?php if(isset($language) && $language == 'B'){echo isset($language_list['Bill_No'])?$language_list['Bill_No']:'Bill number';}else{echo 'Bill number';} ?></label>
                            <div class="col-lg-6">
                                <input type="text" id="txt_bill_no" required="required" readonly="readonly" class="form-control" name="txt_bill_no" value="<?php echo isset($Order_data->BillNo) ? $Order_data->BillNo:$bill_number; ?>">
                                <?php echo form_error('txt_bill_no'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label style="font-weight:normal;font-family: <?= $user_session['FontFamily']; ?>" for="maskedDate" class="col-lg-3 control-label">  <?php if(isset($language) && $language == 'B'){echo isset($language_list['Transaction_Date'])?$language_list['Transaction_Date']:'Transaction Date';}else{echo 'Transaction Date';} ?></label>
                            <div class="col-lg-6">
                                <input type="text" id="datepicker" required="required" class="form-control" name="txt_order_date" value="<?php echo isset($Order_data->OrderDate) ? $Order_data->OrderDate:date('Y-m-d');; ?>">
                                <?php echo form_error('txt_order_date'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label style="font-weight:normal;font-family: <?= $user_session['FontFamily']; ?>" for="inputStandard" class="col-lg-3 control-label">  <?php if(isset($language) && $language == 'B'){echo isset($language_list['Type_Customer_Name'])?$language_list['Type_Customer_Name']:'Type Customer Name';}else{echo 'Type Customer Name';} ?></label>
                            <div class="col-lg-6">
                                <input type="text" style="width: 45%; margin-right: 5%; float: left;"  id="customer_info" name="CustomerName" class="form-control" value ="<?php echo isset($Customer_data->CustomerName)?$Customer_data->CustomerName:'';?>" placeholder="Type Customer Name">
                                <input type="text" style="width: 50%; float: left;"  id="CustomerPhoneNumber" name="PhoneNumber" class="form-control" value ="<?php echo isset($Customer_data->PhoneNumber)?$Customer_data->PhoneNumber:'';?>" placeholder="Phone Number">
                                <span style="color: #999; font-size: 11px;">** [ Please  <b>Leave Blank or Select Guest </b> if customer is not added ]</span>
                                <input id="customer_id" name="customer_id"  type="hidden" value ="<?php echo isset($Customer_data->CustomerId)?$Customer_data->CustomerId:$guest_customer_info->CustomerId ;?>"/>
                                <input id="customer_id" name="isNew"  type="hidden" value ="1"/>
                                <?php echo form_error('txt_location_name'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label style="font-weight:normal;font-family: <?= $user_session['FontFamily']; ?>" for="inputStandard" class="col-lg-3 control-label">  <?php if(isset($language) && $language == 'B'){echo isset($language_list['Type_Product_Name'])?$language_list['Type_Product_Name']:'Type Product Name';}else{echo 'Type Product Name';} ?></label>
                            <div class="col-lg-6">
                                <input type="text"  id="product_info" class="form-control"  placeholder="Type Product Name">
                                <?php echo form_error('txt_location_name'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label style="font-weight:normal;font-family: <?= $user_session['FontFamily']; ?>" for="maskedDate" class="col-lg-3 control-label">&nbsp;</label>
                            <div class="col-lg-6">
                                <div id="alert" class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <i class="fa fa-remove pr10"></i>
                                    <strong>Warning!</strong> You Have already select this product.
                                </div>
                                <div id="quantity_alert" class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <i class="fa fa-remove pr10"></i>
                                    <strong>Warning!</strong> You do  not have enough Quantity.
                                </div>
                                <div id="delete_success" class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <i class="fa fa-trophy pr10"></i>
                                    <strong>Success!</strong> The product has been deleted.
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="table-responsive">
                                <table align="center" class="table table-bordered mbn" style="width: 90%" id="product_details_info">
                                    <thead>
                                    <tr>
                                        <th width="5%"># </th>
                                        <th style="font-weight:normal;font-family: <?= $user_session['FontFamily']; ?>" width="20%"> <?php if(isset($language) && $language == 'B'){echo isset($language_list['Name'])?$language_list['Name']:'Name';}else{echo 'Name';} ?> </th>
                                        <!--                                        <th style="font-weight:normal;font-family: --><?//= $user_session['FontFamily']; ?><!--" width="10%"> --><?php //if(isset($language) && $language == 'B'){echo isset($language_list['Supplier'])?$language_list['Supplier']:'Supplier';}else{echo 'Supplier';} ?><!-- </th>-->
                                        <th style="font-weight:normal;font-family: <?= $user_session['FontFamily']; ?>" width="10%"> <?php if(isset($language) && $language == 'B'){echo isset($language_list['Size'])?$language_list['Size']:'Size';}else{echo 'Size';} ?> </th>
                                        <th style="font-weight:normal;font-family: <?= $user_session['FontFamily']; ?>" width="10%"> <?php if(isset($language) && $language == 'B'){echo isset($language_list['Unit_Price'])?$language_list['Unit_Price']:'Unit Price';}else{echo 'Unit Price';} ?> </th>
                                        <th style="font-weight:normal;font-family: <?= $user_session['FontFamily']; ?>" width="10%"> <?php if(isset($language) && $language == 'B'){echo isset($language_list['Stock_Quantity'])?$language_list['Stock_Quantity']:'Stk Qan';}else{echo 'Stk Qan';} ?> </th>
                                        <th style="font-weight:normal;font-family: <?= $user_session['FontFamily']; ?>" width="10%"> <?php if(isset($language) && $language == 'B'){echo isset($language_list['Quantity'])?$language_list['Quantity']:'Quantity';}else{echo 'Quantity';} ?> </th>
                                        <th style="font-weight:normal;font-family: <?= $user_session['FontFamily']; ?>" width="10%"> <?php if(isset($language) && $language == 'B'){echo isset($language_list['Total'])?$language_list['Total']:'Total';}else{echo 'Total';} ?> </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $index = 1;
                                    if($action == "edit"){
                                        $index = 1;
                                        //echo "A<pre>";$row['ProductSize'];
                                        $length=count($Order_details_data);
                                        foreach($Order_details_data as $row){
                                            ?>
                                            <tr id="table_row<?php echo $index;?>">
                                                <td><?php echo $index; ?></td>
                                                <td>
                                                    <input type="hidden" name="txt_product_id[<?php echo $index; ?>]" id="txt_product_id<?php echo $index; ?>" value="<?php echo $row['ProductId']; ?>" />
                                                    <input type="hidden" name="txt_OrderDetails_id[<?php echo $index; ?>]" id="txt_OrderDetails_id<?php echo $index; ?>" value="<?php echo $row['OrderDetailsId']; ?>" />
                                                    <input type="hidden" name="txt_supplier_id[<?php echo $index; ?>]" id="txt_supplier_id<?php echo $index; ?>" value="<?php echo $row['SupplierId']; ?>" />
                                                    <label style="font-weight:normal;font-family: <?= $user_session['FontFamily']; ?>"><?php echo $row['ProductName']; ?></label>
                                                </td>
                                                <!--                                                <td>-->
                                                <!--                                                    <input type="hidden" name="txt_supplier_id[--><?php //echo $index; ?><!--]" id="txt_supplier_id--><?php //echo $index; ?><!--" value="--><?php //echo $row['SupplierId']; ?><!--" />-->
                                                <!--                                                    <label style="font-weight:normal;font-family: --><?//= $user_session['FontFamily']; ?><!--">--><?php //echo $row['SupplierName']; ?><!--</label>-->
                                                <!--                                                </td>-->
                                                <td><?php echo $row['SizeName']; ?><input type="hidden"  name="txt_product_size_id[<?php echo $index; ?>]" id="txt_product_size<?php echo $index; ?>" value="<?php echo $row['ProductSize']; ?>" /></td>
                                                <td><input type="text" class="customized_input_box" name="txt_unit_price[<?php echo $index; ?>]"  id="txt_unit_price<?php echo $index; ?>" value="<?php echo $row['ProductPricePerUnit']; ?>" autocomplete="off" /></td>
                                                <td>
                                                    <input type="text" class="customized_input_box" name="txt_stock_quantity[<?php echo $index; ?>]" id="txt_stock_quantity<?php echo $index; ?>" value="<?php echo $row['ProductStock']; ?>" autocomplete="off"/>
                                                </td>
                                                <td>
                                                    <input type="text" class="customized_input_box" name="txt_quantity[<?php echo $index; ?>]" onkeyup="calculate_totalprice(<?php echo $index; ?>)" id="txt_quantity<?php echo $index; ?>" value="<?php echo $row['ProductQty']; ?>" autocomplete="off"/><input type="hidden" class="customized_input_box" name="txt_pre_quantity[<?php echo $index; ?>]" id="txt_pre_quantity<?php echo $index; ?>" value="<?php echo $row['ProductQty']; ?>"/>
                                                </td>

                                                <td><input type="text" style="width:70%;" name="txt_total[<?php echo $index; ?>]" id="txt_total<?php echo $index; ?>" value="<?php echo $row['TotalAmount']; ?>" class="cal_total" readonly="readonly" /></td>
                                            </tr>
                                            <?php
                                            $index++;
                                        }
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="form-group">
                            <label style="font-weight:normal;font-family: <?= $user_session['FontFamily']; ?>" for="maskedDate" class="col-lg-3 control-label">  <?php if(isset($language) && $language == 'B'){echo isset($language_list['Total_Amount'])?$language_list['Total_Amount']:'Total Amount';}else{echo 'Total Amount';} ?></label>
                            <div class="col-lg-6">
                                <input type="text" id="txt_order_total" readonly="readonly" class="form-control" name="txt_order_total" value="<?php echo isset($Order_data->OrderTotal)?$Order_data->OrderTotal:'';?>">
                                <?php echo form_error('txt_order_total'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label style="font-weight:normal;font-family: <?= $user_session['FontFamily']; ?>" for="maskedDate" class="col-lg-3 control-label">  <?php if(isset($language) && $language == 'B'){echo isset($language_list['Discount'])?$language_list['Discount']:'Discount';}else{echo 'Discount';} ?> (%)</label>
                            <div class="col-lg-6">
                                <input type="text" id="txt_discount_percentage" min="1" max="5"class="form-control" placeholder="Discount (%)" name="txt_discount_percentage" value="<?php echo isset($Order_data->DiscountPercentage)?$Order_data->DiscountPercentage:0;?>">
                                <?php echo form_error('txt_discount_percentage'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label style="font-weight:normal;font-family: <?= $user_session['FontFamily']; ?>" for="maskedDate" class="col-lg-3 control-label">  <?php if(isset($language) && $language == 'B'){echo isset($language_list['Discount_Amount'])?$language_list['Discount_Amount']:'Discount Amount';}else{echo 'Discount Amount';} ?></label>
                            <div class="col-lg-6">
                                <input type="text" id="txt_discount" class="form-control" placeholder="Discount" readonly="readonly" name="txt_discount" value="<?php echo isset($Order_data->DiscountAmount)?$Order_data->DiscountAmount:0.00;?>">
                                <span style="display: none; color: red;" id="discount_amount_error">Discount Amount Invalid</span>
                                <?php echo form_error('txt_discount'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label style="font-weight:normal;font-family: <?= $user_session['FontFamily']; ?>" for="maskedDate" class="col-lg-3 control-label">  <?php if(isset($language) && $language == 'B'){echo isset($language_list['Payment'])?$language_list['Payment']:'Payment';}else{echo 'Payment';} ?></label>
                            <div class="col-lg-6">
                                <input type="text" id="txt_payment_amount" class="form-control" name="txt_payment_amount" value="<?php echo isset($Order_payment_data[0]->PaidAmount)?$Order_payment_data[0]->PaidAmount:'';?>">
                                <span style="display: none; color: red;" id="payment_amount_error">Amount can not be more than total order amount.</span>
                                <?php echo form_error('txt_payment_amount'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div style="float: right;" class="col-xs-2"><button class="btn btn-hover btn-danger btn-block" type="button" onclick="javascript:history.go(-1)">  <?php if(isset($language) && $language == 'B'){echo isset($language_list['Cancel'])?$language_list['Cancel']:'Cancel';}else{echo 'Cancel';} ?></button></div>
                            <div style="float: right;" class="col-xs-2"><input type="submit" class="btn btn-hover btn-alert btn-block" value="  <?php if(isset($language) && $language == 'B'){echo isset($language_list['Save'])?$language_list['Save']:'Save';}else{echo 'Save';} ?>" ></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var matched, browser;

    jQuery.uaMatch = function( ua ) {
        ua = ua.toLowerCase();

        var match = /(chrome)[ \/]([\w.]+)/.exec( ua ) ||
            /(webkit)[ \/]([\w.]+)/.exec( ua ) ||
            /(opera)(?:.*version|)[ \/]([\w.]+)/.exec( ua ) ||
            /(msie) ([\w.]+)/.exec( ua ) ||
            ua.indexOf("compatible") < 0 && /(mozilla)(?:.*? rv:([\w.]+)|)/.exec( ua ) ||
            [];

        return {
            browser: match[ 1 ] || "",
            version: match[ 2 ] || "0"
        };
    };

    matched = jQuery.uaMatch( navigator.userAgent );
    browser = {};

    if ( matched.browser ) {
        browser[ matched.browser ] = true;
        browser.version = matched.version;
    }

    // Chrome is Webkit, but Webkit is also Safari.
    if ( browser.chrome ) {
        browser.webkit = true;
    } else if ( browser.webkit ) {
        browser.safari = true;
    }

    jQuery.browser = browser;

</script>
<script type="text/javascript" language="javascript">
    $(document).ready(function() {
        $("#alert").hide();
        $("#quantity_alert").hide();
        $("#delete_success").hide();

        $("#txt_discount_percentage").change(function(){
            var discount_amounts = 0;
            var order_total_amount = parseFloat($("#txt_order_total").val());
            var discount_per = parseFloat($("#txt_discount_percentage").val());
            if(discount_per<100){
                discount_amounts = parseFloat((order_total_amount*discount_per)/100);
            }
            $("#txt_discount").val(discount_amounts);
            discount_amount_cng_effect();
        });

        $("#txt_discount").change(function(){
            discount_amount_cng_effect()
        });
    });
    function discount_amount_cng_effect(){
        var order_total_amount = parseFloat($("#txt_order_total").val());
        var discount_amount = parseFloat($("#txt_discount").val());
        if(discount_amount>order_total_amount){
            $("#txt_discount").css('border-color','red');
            $("#discount_amount_error").show();
        }else {
            $("#discount_amount_error").hide();
            if(discount_amount > 0){
                $("#txt_payment_amount").val(order_total_amount - discount_amount);
            }
        }
    }
    //Customaer Name Search Start
    $("#customer_info").autocomplete('<?php echo site_url("customers/ajax_get_customer_list/")?>',{
        minChars: 0,
        width: 310,
        matchContains: "word",
        cacheLength: 0,
        highlightItem: true,
        formatItem: function(row, i, max, term) {
            //alert(row);
            var tmp;
            tmp=row[0].split(",");
            return "<strong>"+tmp[1]+"</strong>" + "<br><span style='font-size: 80%;'>Phone Number: " + tmp[2]  + "</span>";
        },
        formatResult: function(row) {
            var tmp;
            tmp=row[0].split(",");
            return tmp[1];
        }
    }).result(function(e, item) {
        var tmp;
        $("#alert").hide();
        $("#quantity_alert").hide();
        tmp=item[0].split(",");
        //alert(tmp[0]);
        $("#customer_id").val(tmp[0]);
        //$("#CustomerPhoneNumber").attr('readonly','readonly');
        $("#CustomerPhoneNumber").val(tmp[2]);
        $("#isNew").val(0);
    });
    //Customaer Name Search End

    $("#product_info").autocomplete('<?php echo site_url("products/ajax_get_product_list_purchase_auto/")?>',{
        //alert("hello");
        // var selected_supplier_id = $('#cbo_supplier').val();
        // var selected_location_id = $('#cbo_branch').val();
        minChars: 0,
        width: 310,
        matchContains: "word",
        cacheLength: 0,
        highlightItem: true,
        formatItem: function(row, i, max, term) {
            //alert(row);
            var tmp;
            tmp=row[0].split(",");
            return "<strong>"+tmp[1]+"</strong>" + "<br><strong>Supplier :"+tmp[4]+"</strong>" +  "<br>Category : " + tmp[3]+"<br />Product Size : "+tmp[5]+"<br />Stock Quantity : " + tmp[8]  + "</span>";
        },
        formatResult: function(row) {
            var tmp;
            tmp=row[0].split(",");
            return tmp[1];
        }
    }).result(function(e, item) {
        var tmp;
        $("#alert").hide();
        $("#quantity_alert").hide();
        tmp=item[0].split(",");
        var stock_quantity = tmp[8];
        var index = $("#product_details_info tr").length;
        var sl = index;
        if(stock_quantity>0){
            if(index >1){
                //alert(index);
                var i;
                var product_id;
                var quantity;
                var new_product_id = tmp[0];
                for (i = 1; i < index; i++) {
                    var id='delete_icon_'+i;
                    $("#"+id).html('');
                    //alert(i);
                    product_id = $("#txt_product_id"+ i).val();

                    var product_size = $("#txt_product_size"+ i).val();
                    var supplier_id = $("#txt_supplier_id"+ i).val();
                    if(supplier_id == tmp[7] && product_size==tmp[6]){
                        $("#alert").show();
                        $(this).val('');
                        return false;
                    }
                }
            }
            var table_data = '<tr id="table_row'+index+'">'+
                '<td>' + sl +' .</td>'+
                '<td><input type="hidden" name="txt_product_id['+index+']" id="txt_product_id'+index+'" value='+ tmp[0] +'><input type="hidden"  name="txt_supplier_id['+index+']" id="txt_supplier_id'+index+'" value="'+ tmp[7] +'" /><label style="font-weight:normal;font-family: <?= $user_session['FontFamily']; ?>">' + tmp[1] + '</label></td>'+
                //'<td><label style="font-weight:normal;font-family: <?= $user_session['FontFamily']; ?>">' + tmp[4] + '</label></td>'+
                '<td>'+tmp[5]+'<input type="hidden"  name="txt_product_size_id['+index+']" id="txt_product_size'+index+'" value="'+ tmp[6] +'" /></td>'+

                '<td><input type="text" onkeyup="calculate_totalprice('+index+')" class="customized_input_box" name="txt_unit_price['+index+']" id="txt_unit_price'+index+'" value="'+ tmp[9] +'" autocomplete="off" /></td>'+
                '<td><input type="text" readonly="readonly" class="customized_input_box" name="txt_stock_quantity['+index+']" id="txt_stock_quantity'+index+'" value="'+ tmp[8] +'" autocomplete="off" /></td>'+
                '<td><input type="text" class="customized_input_box" name="txt_quantity['+index+']" onkeyup="calculate_totalprice('+index+')" id="txt_quantity'+index+'" value='+1+' autocomplete="off"/><input type="hidden" name="txt_pre_quantity['+index+']" id="txt_pre_quantity'+index+'" value='+0+' autocomplete="off"/></td>'+

                '<td><input type="text" name="txt_total['+index+']" id="txt_total'+index+'" value="'+ tmp[9] +'" class="cal_total" readonly="readonly" /></td>'+
                '</tr>';
            //console.log(table_data);
            $("#product_details_info").append(table_data);
            // calculate the order total
            var order_total_price=parseFloat($("#txt_order_total").val());
            //alert(order_total_price);
            if(isNaN(order_total_price)){
                $("#txt_order_total").val(tmp[9]);
                $("#txt_payment_amount").val(tmp[9]);
            }
            else{
                order_total_price = order_total_price+ parseFloat(tmp[9]);
                $("#txt_order_total").val(order_total_price);
                $("#txt_payment_amount").val(order_total_price);
            }
            $(this).val('');
        }
        else{
            $("#alert").show();
            $(this).val('');
            return false;
        }

    });
    function calculate_totalprice(index){
        var stock_quantity = parseFloat($("#txt_stock_quantity"+index).val());
        previous_total_price = parseFloat($("#txt_total"+index).val());
        //alert(previous_total_price);
        var quantity = parseFloat($("#txt_quantity"+index).val());
        var pre_quantity = parseFloat($("#txt_pre_quantity"+index).val());
        var unit_price = parseFloat($("#txt_unit_price"+index).val());
        if((stock_quantity+pre_quantity)<quantity){
            $("#quantity_alert").show();
            $("#txt_quantity"+index).val(1)
            return false;
        }else{
            var total_price = quantity*unit_price;
            $("#txt_total"+index).val(total_price);
            //calculate_order_total(previous_total_price,total_price);
            calculate_grand_total();
        }
    }
    function calculate_grand_total(){
        var total=0.00;
        $('.cal_total').each(function() {
            //alert(total);
            total += parseFloat($(this).val());
        });

        $("#txt_order_total").val(total);
        $("#txt_payment_amount").val(total);
    }
    function calculate_order_total(previous_total_price,total_price){
        var order_total_price=parseFloat($("#txt_order_total").val());
        $("#txt_order_total").val(order_total_price - previous_total_price + total_price);
        $("#txt_payment_amount").val(order_total_price - previous_total_price + total_price);

    }
    function delete_row(index){
        if(confirm('Are you sure to delete?')){
            var product_price = parseFloat($("#txt_total"+index).val());
            calculate_order_total(product_price,0);
            <?php if($action == "edit"){?>
            var OrderDetails_id = $("#txt_OrderDetails_id"+index).val();
            //alert(PurchaseDetails_id);
            $.post('<?php echo site_url("orders/ajax_delete_productfrom_details/")?>', {OrderDetails_id: OrderDetails_id},
                function(data){
                    if(data.status == 'failure' ){

                    }else{
                        $("#delete_success").show();
                    }
                },"json");
            <?php } ?>

            $("#table_row"+index).remove();
        }

    }
    function validate_form(){
        var result = true;
        var order_total_amount = parseFloat($("#txt_order_total").val());
        var discount_amount = parseFloat($("#txt_discount").val());
        var paid_amount = parseFloat($("#txt_payment_amount").val());
        if(discount_amount>order_total_amount){
            $("#txt_discount").css('border-color','red');
            $("#discount_amount_error").show();
            result = false;
        }
        if((order_total_amount-discount_amount)<paid_amount){
            $("#txt_payment_amount").css('border-color','red');
            $("#payment_amount_error").show();
            result = false;
        }
        return result;
    }

</script>
