<?php $this->load->view('Layouts/header');?>
<style>
#paging {
    background-color: whitesmoke  ;

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

    color: #4d4a4a;
    font-family: Verdana,Arial,Helvetica,sans-serif;
    font-size: 12px;
    font-weight: bolder;
    padding: 4px 6px 7px;
    text-decoration: none;
    margin-left:2px;
}

#paging a {
    background: #fbfbfb none repeat scroll 0 0;
    border: 1px solid #b0b0b0;

    color: #212121;
    font-family: Verdana,Arial,Helvetica,sans-serif;
    font-size: 12px;
    padding: 3px 6px 6px;
    text-decoration: none;
    margin-left:2px;
}
#paging a:hover {
    background: #bbb none repeat scroll 0 0;
    border: 1px solid #dedede;
    color: #000;
}
</style>


<section id="content">


    <div class="container">


        <div class="row" style = "text-align: justify;">
            <div class="col-md-8 info-blocks text-center"  style = "min-height:698px;">
                <div class="panel-heading box-title white-bg" style="background-color:#25708b;color:white; padding: 8px 10px 9px 15px;margin-left:-15px;margin-right:-15px;">আমাদের টিম</div>

                <!-- ==================== for showing details spech ==================================-->


                <div class="row" style="margin-top: 3%;">
                    <?php if(isset($list)){foreach($list as $lists){?>



                     <div class="col-md-4">
                        <img class=" img-responsive guid" src="<?php echo "http://poricroma.com/software/media/employee_pictures/$lists->Image";?>" style = "padding: 4px;
                         line-height: 1.42857143;background-color: #fff;border: 1px solid #ddd;width:100%;display:inline-block;height:auto;" alt="No Preview" /><br>
                        
                         <span><?php echo $lists->EmployeeName;?></span><br>
                         <span><?php echo $lists->DesignationName;?></span><br>
                       
                     </div>



                 <?php }} ?>
                 <div align="center" id="paging"><?php echo $this->pagination->create_links(); ?></div>
             </div>


         </div>

         <div class="col-md-4 info-blocks text-center" id = "gallery" style = "min-height:698px;">
            <div class="panel-heading box-title white-bg" style="background-color:#25708b;color:white; padding: 8px 10px 9px 15px;margin-left:-15px;margin-right:-15px;">বিজ্ঞপ্তি</div>

            <div class="row">
                <div class="" style="overflow: hidden;">

                    <div class="row" style="margin-top: 3%;">
                        <div class="col-sm-12">
                            <ul class="" style="overflow-y: hidden; ">
                                <li style="" class="news-item">


                                    <marquee  onmouseover="this.stop();" onmouseout="this.start();" id = "vertical_marquee" face="courier" behavior="SCROLL" onmouseout="this.setAttribute('scrollamount', 2, 0);"
                                    onmouseover="this.setAttribute('scrollamount', 0, 0);" scrollamount="2" direction="up" style="text-align: left;">

                                    <?php if(isset($notice_list)){foreach($notice_list as $notice){?>
                                        <div class="row" style = "margin:0px;padding:0px; border-bottom:1px dotted gray;">

                                            <div class="col-xs-3 col-sm-3" >
                                                <div class="col-sm-12 text-center notice-month">
                                                    <?php echo substr($notice->created_on,8,2) ;?>
                                                </div>
                                                <div class="col-sm-12 text-center notice-date">
                                                    <?php echo substr($notice->created_on,0,7) ;?>
                                                </div>
                                            </div>
                                            <div class="col-xs-9 col-sm-9">
                                                <div class="row"> <a class = "read-more" target="_blank" href="<?php echo base_url("lib/images/");?><?php echo $notice->description;?>" style = "border-radius:50px;"><?php echo $notice->title;?></a> <br></div>
                                            </div>

                                        </div>
                                    <?php }} ?>
                                </marquee>

                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>




</div>





</div>
</section>






<?php $this->load->view('Layouts/footer');?>