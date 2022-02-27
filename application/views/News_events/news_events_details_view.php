<style>
    body {
        background-image:url("../../lib/images/backgroupImage.png");
        background-size:500px ;
        background-repeat: repeat;
        background-color: #cccccc;
    }
</style>

<?php $this->load->view('Layouts/header');?>

<section id="content">


    <div class="row">
        <div class="col-md-12 info-blocks text-center" style="background-color:#256f8b78;min-height:698px;">
            <div class="panel-heading box-title white-bg" style="background-color:#25708b;color:white;padding: 8px 10px 9px 15px;margin-left:-15px;margin-right:-15px;margin-bottom: 20px;">রিপোর্ট এবং ঘটনা</div>
            <div class="col-md-12">
                <table id="example1" class="table table-responsive table-bordered table-striped">
                    <thead style="color: aliceblue">
                    <tr>
                        <th>Id</th>
                        <th>Image </th>
                        <th>Title</th>
                        <th>Details</th>

                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(isset($news_events_details) && !empty($news_events_details)) { foreach($news_events_details as $news_events_detail){ ?>
                        <tr>
                            <td><?php echo $news_events_detail->id;?></td>

                            <td><img class="img-circle img-responsive" src="<?php echo base_url();?><?php echo $news_events_detail->image;?>" width="100" height="100"></td>
                            <td><?php echo $news_events_detail->title;?></td>
                            <td><?= substr($news_events_detail->details, 0, 255) . '...' ?>

                            </td>
                            <?php  $str = $news_events_detail->image; $data = explode("/",$str) ; ?>

                            <td class="text-center">
                                <?php
                                //                                        echo anchor('index.php/News_events/view/' . $events->id, img(array('src' => base_url() . 'lib/images/view.png', 'border' => '0', 'alt' => 'view')), array('title' => 'edit', 'class' => 'edit')).'&nbsp';
                                echo anchor('index.php/Welcomes/show_news_events_details/' . $news_events_detail->id, img(array('src' => base_url() . 'lib/images/view.png', 'border' => '0', 'alt' => 'view')), array('title' => 'edit', 'class' => 'edit')).'&nbsp';


                                ?>




                            </td>
                        </tr>

                    <?php } } ?>
                    </tbody>



                </table>

        </div>
    </section>


<?php $this->load->view('Layouts/footer');?>