

<div class="box-body">


    <div id = "#example1_filter" class="alert alert-primary text-right"><a href="<?php echo base_url();?>index.php/User_roles/add" class="btn btn-primary" style = "text-decoration: none;">Add New </a> </div>

            <table class="table table-responsive table-bordered table-striped" id="example1" >
                <thead>
                <tr>
                    <th>SL</th>
                    <th>Roll Name</th>
                    <th>Roll Description</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i=1;
                foreach($user_roles as $row){
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row['role_name']; ?></td>
                        <td><?php echo $row['role_description']; ?></td>
                        <td>

<!--                            --><?php
//                            echo anchor('index.php/Student_admissions/view/' . $student->id .'/'. $student->section_name, img(array('src' => base_url() . 'lib/images/view.png', 'border' => '0', 'alt' => 'view')), array('title' => 'edit', 'class' => 'edit')).'&nbsp';
//                            echo anchor('index.php/Student_admissions/payment/' . $student->id .'/'.$student->section_id .'/'.$student->roll_no, img(array('src' => base_url() . 'lib/images/payment.png', 'border' => '0', 'alt' => 'editt')), array('title' => 'edit', 'class' => 'edit')).'&nbsp';
//                            echo anchor('index.php/Student_admissions/edit/' . $student->id , img(array('src' => base_url() . 'lib/images/editt.png', 'border' => '0', 'alt' => 'editt')), array('title' => 'edit', 'class' => 'edit')).'&nbsp';
//                            echo anchor('index.php/Student_admissions/delete/' . $student->id .'/'.$student->image, img(array('src' => base_url() . 'lib/images/delete.png', 'border' => '0', 'alt' => 'delete')), array('title' => 'Delete', 'class' => 'delete','onclick'=>"return confirm('Are You Sure To Delete This ?')"));
//
//
//                            ?>
                            <?php
                            if($row['role_name'] != "Super Admin"){
                            echo anchor('index.php/User_roles/user_role_wise_privillige/' . $row['id'], img(array('src' => base_url() . 'lib/images/lock.gif', 'border' => '0', 'alt' => 'Payment')), array('title' => 'Permission', 'class' => 'view')).'&nbsp';
                            if($row['is_editable'] == 1){
                                echo anchor('index.php/user_roles/edit/' . $row['id'], img(array('src' => base_url() . 'lib/images/editt.png', 'border' => '0', 'alt' => 'edit')), array('title' => 'edit', 'class' => 'edit')).'&nbsp';
                                echo anchor('index.php/user_roles/delete/' . $row['id'], img(array('src' => base_url() . 'lib/images/delete.png', 'border' => '0', 'alt' => 'delete')), array('title' => 'Delete', 'class' => 'delete','onclick'=>"return confirm('Are You Sure To Delete This Type Information')"));
                            }
                            }
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
<!-- /.box-body -->
</div>
<!-- /.box -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php $this->load->view('Layouts/admin_footer'); ?>

<script type="text/javascript" src="<?php echo base_url(); ?>media/vendor/plugins/datatables/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>media/vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>media/vendor/plugins/datatables/extensions/Editor/js/dataTables.editor.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>media/vendor/plugins/datatables/media/js/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>media/vendor/plugins/datatables/extensions/Editor/js/editor.bootstrap.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        //alert('AA');
        // "use strict";

        // Init Theme Core
        Core.init();

        // Init Theme Core
        //Demo.init();

        // Init tray navigation smooth scroll
        $('.tray-nav a').smoothScroll({
            offset: -145
        });

        // Custom tray navigation animation
        setTimeout(function() {
            $('.custom-nav-animation li').each(function(i, e) {
                var This = $(this);
                var timer = setTimeout(function() {
                    This.addClass('animated zoomIn');
                }, 100 * i);
            });
        }, 600);


        // Init Datatables with Tabletools Addon
        $('#datatable2').dataTable({
            "aoColumnDefs": [{
                'bSortable': false,
                'aTargets': [-1]
            }],
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": "",
                    "sNext": ""
                }
            },
            "iDisplayLength": 5,
            "aLengthMenu": [
                [5, 10, 25, 50, -1],
                [5, 10, 25, 50, "All"]
            ],
            "sDom": '<"dt-panelmenu clearfix"lfr>t<"dt-panelfooter clearfix"ip>',
            "oTableTools": {
                "sSwfPath": "<?php echo base_url(); ?>media/vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf"
            }
        });

        var alphabet = $('<div class="dt-abc-filter"/>').append('<span class="abc-label">Search: </span> ');
        var columnData = table6.column(0).data();
        var bins = bin(columnData);

        $('<span class="active"/>')
            .data('letter', '')
            .data('match-count', columnData.length)
            .html('None')
            .appendTo(alphabet);

        for (var i = 0; i < 26; i++) {
            var letter = String.fromCharCode(65 + i);

            $('<span/>')
                .data('letter', letter)
                .data('match-count', bins[letter] || 0)
                .addClass(!bins[letter] ? 'empty' : '')
                .html(letter)
                .appendTo(alphabet);
        }

        $('#datatable6').parents('.panel').find('.panel-menu').addClass('dark').html(alphabet);

        alphabet.on('click', 'span', function() {
            alphabet.find('.active').removeClass('active');
            $(this).addClass('active');

            _alphabetSearch = $(this).data('letter');
            table6.draw();
        });

        var info = $('<div class="alphabetInfo"></div>')
            .appendTo(alphabet);

        var _alphabetSearch = '';

        $.fn.dataTable.ext.search.push(function(settings, searchData) {
            if (!_alphabetSearch) {
                return true;
            }
            if (searchData[0].charAt(0) === _alphabetSearch) {
                return true;
            }
            return false;
        });

        function bin(data) {
            var letter, bins = {};
            for (var i = 0, ien = data.length; i < ien; i++) {
                letter = data[i].charAt(0).toUpperCase();

                if (bins[letter]) {
                    bins[letter] ++;
                } else {
                    bins[letter] = 1;
                }
            }
            return bins;
        }



        // MISC DATATABLE HELPER FUNCTIONS

        // Add Placeholder text to datatables filter bar
        $('.dataTables_filter input').attr("placeholder", "Enter Terms...");

    });
</script>

<!---->
<!--<div class="box-header well" style="height:50px;">-->
<!--                -->
<!--                <div style="float:left"><form action="--><?php //echo base_url(); ?><!--/index.php/user_roles/index" method="post"><input type="text" placeholder="Item Name" name="search" id="search" value="--><?php //isset($search)?$search:""; ?><!--" > <input type="submit" value="Search"></form></div>-->
<!--				<div style="float:right"><a class="btn btn-success" href="--><?php //echo base_url(); ?><!--index.php/user_roles/add">Add</a></div>-->
<!--                -->
<!--            </div>-->
<!--<table class="table table-striped table-bordered responsive">-->
<!--  <thead>-->
<!--  <tr>-->
<!--    <th  scope="col">Role Name</th>-->
<!--    <th  scope="col">Role Description</th>-->
<!--    --><?php //
//	foreach($form_data as $r)
//	{
//		?><!--<th width="170">--><?php //echo $r['form_show']; ?><!--</th>--><?php
//	}
//	?>
<!--    <th>Action</th>-->
<!--  </tr>-->
<!--  </thead>-->
<!-- --><?php //foreach($user_roles as $row){ ?>
<!--  <tr>-->
<!--    <td>--><?php //echo $row['role_name']; ?><!--</td>-->
<!--    <td>--><?php //echo $row['role_description']; ?><!--</td>-->
<!--    --><?php //
//	foreach($form_data as $r)
//	{
//		?><!--<td>--><?php //echo $row[$r['item']]; ?><!--</td>--><?php
//	}
//	?>
<!--    <td>-->
<!--    	<a href="--><?php //echo base_url(); ?><!--index.php/user_roles/user_role_wise_privillige/--><?php //echo $row['id'] ?><!--"></i><img src="--><?php //echo base_url(); ?><!--media/silk/lock.gif" alt="Edit" title="Edit" /> </a>&nbsp;-->
<!--    	<a href="--><?php //echo base_url(); ?><!--index.php/user_roles/edit/--><?php //echo $row['id'] ?><!--"></i><img src="--><?php //echo base_url(); ?><!--media/silk/pencil.png" alt="Edit" title="Edit" /> </a>&nbsp;-->
<!--    	<a href="--><?php //echo base_url(); ?><!--index.php/user_roles/delete/--><?php //echo $row['id'] ?><!--"></i><img src="--><?php //echo base_url(); ?><!--media/silk/cross.png" alt="Delete" title="Delete" /> </a>-->
<!--    </td>-->
<!--  </tr>-->
<!--  --><?php //} ?>
<!--</table>-->
<!---->
<?php //if($pgi){?><!--    -->
<!---->
<?php //echo $this->pagination->create_links(); ?>
<!---->
<?php //} ?>
<!---->
<!---->
<!---->
<!---->
