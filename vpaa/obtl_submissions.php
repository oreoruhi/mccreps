<?php
    require '../functions/common_connector.php';
    //When declaring and connecting a class file to a variable, make sure to add $database in its parameter
    if($_SESSION['type'] == 'VPAA'){
        $id = $_GET['id'];
        require '../functions/activity.php';
        require '../functions/report.php';
        $activity = new Activity();
        $obtl = new Reports();
        $obtl_list = $obtl->obtlListReview($database, $id);
?>

<!DOCTYPE html>
<html>

<head>

    <?php include '../components/page_head.php'; ?>

</head>

<body class="theme-red">

    <?php include '../components/page_loader.php'; ?>

    <?php include '../components/page_overlay.php'; ?>

    <?php include '../components/page_search.php'; ?>

    <?php include '../components/page_top_navbar.php'; ?>

    <?php include '../components/page_sidebar.php'; ?>

    <!-- Always put main page content in section with class name content -->
    
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>OBTL REPORTS LIST -- SUBMITTED REPORTS</h2>
            </div>

            <!-- OBTL Reports List -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <button type="button" class="btn bg-teal waves-effect" data-toggle="modal" data-target="#new-institute-modal" style="float: right; margin-top: -5px;">PRINT SUMMARY</button>
                            <br>
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>OBTL Title</th>
                                        <th>Institute</th>
                                        <th>OBTL Author</th>
                                        <th>Date Submitted</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    if(is_array($obtl_list)){
                                        foreach ($obtl_list as $report): ?>
                                            <?php
                                                if($report['dean_remarks'] == 'Approved'){
                                                    $review_details_id = $report['id'];
                                                    $review_details = $activity->reviewDetails($database, $review_details_id);
                                            ?>
                                            <tr>
                                                <td><?php echo $report['obtl_title']; ?></td>
                                                <td><?php echo $report['ins_name']; ?></td>
                                                <td><?php echo $report['firstname'] . " " . $report['middlename'] . " " . $report['lastname']; ?></td>
                                                <td><?php echo date_format(date_create($report['vpaa_fa_submitted']), 'M d, Y - D'); ?></td>
                                                <td><?php echo $report['vpaa_remarks']; ?></td>
                                                <td><center><button type="button" class="btn bg-teal waves-effect" data-chunk='<?php echo json_encode($report); ?>' data-details='<?php echo json_encode($review_details); ?>' data-toggle="modal" data-target="#review-modal">READ</button></center></td>
                                            </tr>
                                <?php 
                                                }
                                        endforeach; 
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# OBTL Reports List -->

        </div>
    </section>

    <?php require '../components/modals/review_modal.php'; ?>
    
    <?php include '../components/page_foot.php'; ?>

    <script>
        var datachunk, data, details;
        $('#review-modal').on('show.bs.modal', function(e) {
            var datachunk = $(e.relatedTarget).data('chunk');
            var data = datachunk;
            var details = $(e.relatedTarget).data('details');

            $(e.currentTarget).find('.report-title').html(data['obtl_title']);
            $(e.currentTarget).find('.report-author').html(data['firstname'] + " " + data['middlename'] + " " + data['lastname']);
            $(e.currentTarget).find('.report-institute').html(data['ins_name']);
            $(e.currentTarget).find('.report-date').html(data['dean_fa_submitted']);
            $(e.currentTarget).find('.report-vpaa-status').html(data['vpaa_remarks']);
            $(e.currentTarget).find('.report-dean-status').html(data['dean_remarks']);
            $(e.currentTarget).find('.report-system-status').html(data['system_remarks']);
            $(e.currentTarget).find('.report-vpaa-remarks').html(data['vpaa_comments']);
            $(e.currentTarget).find('.report-dean-remarks').html(data['dean_comments']);
            $(e.currentTarget).find('.input-contain').val(data['id']);
            $(e.currentTarget).find('.array-info').val(data);

            for(i = 0; i < details.length; i++){
                if(i %2 == 0){
                    $('.list-data-even').append("<li><b><center>" + details[i]['course_desc'] + "</center></b></li>");
                    for(x = 0; x < details[i]['assigned_faculty'].length; x++){

                        $('.list-data-even').append("<li><ul>" + details[i]['assigned_faculty'][x] + "</ul></li>");
                    }
                } else {
                     $('.list-data-odd').append("<li><b><center>" + details[i]['course_desc'] + "</center></b></li>");
                    for(x = 0; x < details[i]['assigned_faculty'].length; x++){

                        $('.list-data-odd').append("<li><ul>" + details[i]['assigned_faculty'][x] + "</ul></li>");
                    }                   
                }
            }

            if(data['vpaa_remarks'] == 'Approved' || data['vpaa_remarks'] == 'For Revision'){
                $('.decision-row').attr('hidden', true);
            } else {
                $('.comments').attr('hidden', true);
            }

            if(data['vpaa_remarks'] == 'Approved' && data['dean_remarks'] == 'Approved'){
                $('.print').removeAttr('hidden');
            }

            $('.clickPrint').on('click', function(){
                var dataPass = data['id'];
                window.location = "../components/printing_page.php?data=" + dataPass;
            });

        });

        $('#review-modal').on('hide.bs.modal', function(e) {
            $('.list-data-even').empty();
            $('.list-data-odd').empty();
            $('.decision-buttons').removeAttr('hidden');
        });

    </script>

</body>

</html>

<?php
    } else {
        header ("location:../index.php?restricted=true");
    }
?>