<title><?php echo $title;?></title>
<?php
$yes_no_option = array(1=>"Yes",0=>"No");
?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>media/vendor/plugins/datatables/media/css/dataTables.bootstrap.css">
<div class="col-md-12">
    <div class="panel panel-visible" id="spy2">
        <div class="panel-heading" style="padding: 0px;">
            <div class="panel-title hidden-xs" style="width: 89%; float: left">
                <span class="glyphicon glyphicon-tasks"></span><?php echo $title; ?>
            </div>
            <div style="width: 11%; float: right;">
                <button class="btn active btn-alert btn-block" id="add_new_function" type="button">Add New &nbsp; <span class="glyphicons glyphicons-circle_plus"></span></button>
            </div>
        </div>
        <div class="panel-body pn">
            <table class="table table-striped table-hover" id="datatable2" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>Class Name</th>
                    <th>Section/Batch Name</th>
                    <th>Section/Batch Code</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i=1;
                foreach($results as $row){
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row->ClassName; ?></td>
                        <td><?php echo $row->SectionName; ?></td>
                        <td><?php echo $row->SectionCode; ?></td>
                        <td class="button-column">
                            <?php

                            //echo anchor('locations/view/' . $row->LocationId, img(array('src' => base_url() . 'media/assets/img/icons/view1.gif', 'border' => '0', 'alt' => 'Payment')), array('title' => 'view', 'class' => 'view')).'&nbsp';
                            echo anchor('config_sections/edit/' . $row->SectionId, img(array('src' => base_url() . 'media/assets/img/icons/edit1.gif', 'border' => '0', 'alt' => 'Payment')), array('title' => 'edit', 'class' => 'edit')).'&nbsp';
                            echo anchor('config_sections/delete/' . $row->SectionId, img(array('src' => base_url() . 'media/assets/img/icons/delete1.gif', 'border' => '0', 'alt' => 'Payment')), array('title' => 'Delete', 'class' => 'delete','onclick'=>"return confirm('Are You Sure To Delete This Type Information')"));

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
</div>

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
            "iDisplayLength": 30,
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