<?php
    require '../functions/common_connector.php';
    //When declaring and connecting a class file to a variable, make sure to add $database in its parameter
    if($_SESSION['type'] == 'Clerk'){
        require '../functions/activity.php';
        $activity = new Activity();
        $schedules = $activity->scheduleList($database);
?>

<!DOCTYPE html>
<html>

<head>

    <?php require '../components/page_head.php'; ?>

    <!-- Bootstrap Select Css -->
    <link href="../plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

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
            <?php include '../components/validation_messages.php'; ?>
            <?php if(isset($_GET['obtl'])){ ?>
                <div class="alert bg-teal alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    An OBTL draft has been successfully created.
                </div>
            <?php } ?>
            <?php if(isset($_GET['deleted'])){ ?>
                <div class="alert bg-teal alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    A report has been successfully deleted.
                </div>
            <?php } ?>
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>OBTL</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive" style="max-height: 200px; overflow-y:auto;">
                                <table class="table table-hover dashboard-task-infos">
                                    <thead>
                                        <tr>
                                            <th><center>ACADEMIC YEAR</center></th>
                                            <th><center>DEADLINE</center></th>
                                            <th><center>EXTENSION</center></th>
                                            <th><center>STATUS</center></th>
                                            <th><center>ACTIONS</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($schedules as $schedule): ?>
                                            <?php if($schedule['report_type']  == 'OBTL' && $schedule['status'] != 'Closed'){ ?>
                                                <tr>
                                                    <td><center><?php echo $schedule['academic_year']; ?></center></td>
                                                    <td><center><?php echo date_format(date_create($schedule['deadline']), 'M d, Y - D'); ?></center></td>
                                                    <td><center><?php echo date_format(date_create($schedule['deadline_extension']), 'M d, Y - D'); ?></center></td>
                                                    <td><center><?php echo $schedule['status']; ?></center></td>
                                                    <td><center>
                                                            <?php
                                                                $obtlId = $schedule['id'];
                                                                $review = $activity->reviewCount($database, $obtlId);
                                                                if(count($review) > 0){
                                                                    $review_details_id = $review[0]['id'];
                                                                    $review_details = $activity->reviewDetails($database, $review_details_id);
                                                            ?>
                                  
                                                            <button type="button" class="btn bg-green waves-effect" data-chunk='<?php echo json_encode($review); ?>' data-type='obtl' data-details='<?php echo json_encode($review_details); ?>' data-toggle="modal" data-target="#review-modal">REVIEW SUBMITTED REPORT</button>
                                                
                                                            <?php
                                                                } else {
                                                            ?>
                                                            <a href="report_create.php?id=<?php echo $schedule['id']; ?>&type=<?php echo $schedule['report_type']; ?>">
                                                                <button type="button" class="btn bg-cyan waves-effect">CREATE REPORT</button>
                                                            </a>
                                                            <?php
                                                                }
                                                            ?>
                                                        </center></td>
                                                </tr>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>COUNSELING REPORTS</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive" style="max-height: 200px; overflow-y:auto;">
                                <table class="table table-hover dashboard-task-infos">
                                    <thead>
                                        <tr>
                                            <th><center>ACADEMIC YEAR</center></th>
                                            <th><center>DEADLINE</center></th>
                                            <th><center>EXTENSION</center></th>
                                            <th><center>STATUS</center></th>
                                            <th><center>ACTIONS</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($schedules as $schedule): ?>
                                            <?php if($schedule['report_type']  == 'Counseling Report' && $schedule['status'] != 'Closed'){ ?>
                                                <tr>
                                                    <td><center><?php echo $schedule['academic_year']; ?></center></td>
                                                    <td><center><?php echo date_format(date_create($schedule['deadline']), 'M d, Y - D'); ?></center></td>
                                                    <td><center><?php echo date_format(date_create($schedule['deadline_extension']), 'M d, Y - D'); ?></center></td>
                                                    <td><center><?php echo $schedule['status']; ?></center></td>
                                                    <td><center>
                                                        <?php 
                                                            $counselId = $schedule['id'];
                                                            $reviewCounsel = $activity->counselReportCount($database, $counselId);
                                                            if(count($reviewCounsel) > 0){
                                                                $review_details_id_counsel = $reviewCounsel[0]['id'];
                                                                $review_details_counsel = $activity->reviewDetailsCounsel($database, $review_details_id_counsel);
                                                        ?>
                                                            <button type="button" class="btn bg-green waves-effect" data-chunk='<?php echo json_encode($reviewCounsel); ?>' data-type='counsel' data-details='<?php echo json_encode($review_details_counsel); ?>' data-toggle="modal" data-target="#review-modal">REVIEW SUBMITTED REPORT</button>
                                                        <?php } else { ?>
                                                            <a href="report_create.php?id=<?php echo $schedule['id']; ?>&type=<?php echo $schedule['report_type']; ?>"><button type="button" class="btn bg-cyan waves-effect">CREATE REPORT</button></a>
                                                        <?php } ?>
                                                    </center></td>
                                                </tr>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->

        </div>
    </section>
    
    <?php require '../components/modals/review_modal.php'; ?>

    <?php require '../components/page_foot.php'; ?>

    <!-- CountTo Index Support -->
    <script src="../js/pages/index.js"></script>

    <!-- Select Plugin Js -->
    <script src="../plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <script>

        $('#review-modal').on('show.bs.modal', function(e) {
            var type = $(e.relatedTarget).data('type');

            if(type === 'obtl'){
                var datachunk = $(e.relatedTarget).data('chunk');
                var data = datachunk[0];
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
                $(e.currentTarget).find('.input-type').val(type);

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

                if(data['dean_remarks'] == 'Approved'){
                    $('.decision-buttons-clerk').hide();
                } else {
                    $('.decision-buttons-clerk').show();
                }

            } else if(type === 'counsel'){
                var datachunk = $(e.relatedTarget).data('chunk');
                var data = datachunk[0];
                var details = $(e.relatedTarget).data('details');

                $(e.currentTarget).find('.report-title').html(data['counsel_title']);
                $(e.currentTarget).find('.report-author').html(data['firstname'] + " " + data['middlename'] + " " + data['lastname']);
                $(e.currentTarget).find('.report-institute').html(data['ins_name']);
                $(e.currentTarget).find('.report-date').html(data['dean_fa_submitted']);
                $(e.currentTarget).find('.report-vpaa-status').html(data['vpaa_remarks']);
                $(e.currentTarget).find('.report-dean-status').html(data['dean_remarks']);
                $(e.currentTarget).find('.report-system-status').html(data['system_remarks']);
                $(e.currentTarget).find('.report-vpaa-remarks').html(data['vpaa_comments']);
                $(e.currentTarget).find('.report-dean-remarks').html(data['dean_comments']);
                $(e.currentTarget).find('.input-contain').val(data['id']);
                $(e.currentTarget).find('.input-type').val(type);

                if(data['dean_remarks'] == 'Approved'){
                    $('.decision-buttons-clerk').hide();
                } else {
                    $('.decision-buttons-clerk').show();
                }                
            }

        });

        $('#review-modal').on('hide.bs.modal', function(e) {
            $('.list-data-even').empty();
            $('.list-data-odd').empty();
            $('.report-title').empty();
            $('.report-author').empty();
            $('.report-institute').empty();
            $('.report-date').empty();
            $('.report-vpaa-status').empty();
            $('.report-dean-status').empty();
            $('.report-system-status').empty();
            $('.report-dean-remarks').empty();
            $('.report-vpaa-remarks').empty();
        });



    </script>

</body>

</html>

<?php
    } else {
        header ("location:../index.php?restricted=true");
    }
?>