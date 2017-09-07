<?php
    require '../functions/common_connector.php';
    //When declaring and connecting a class file to a variable, make sure to add $database in its parameter
    if($_SESSION['type'] == 'VPAA'){
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
            <?php if(isset($_GET['revise'])){ ?>
                <div class="alert bg-teal alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    A submitted OBTL report has been reviewed and marked for revision.
                </div>
            <?php } ?>
            <?php if(isset($_GET['print'])){ ?>
                <div class="alert bg-teal alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    Your document is in the process of printing.
                </div>
            <?php } ?>
            <?php if(isset($_GET['accepted'])){ ?>
                <div class="alert bg-teal alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    A submitted OBTL report has been reviewed and marked as accepted.
                </div>
            <?php } ?>
            <?php if(isset($_GET['archived'])){ ?>
                <div class="alert bg-teal alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    A submitted OBTL report has been reviewed and marked as accepted.
                </div>
            <?php } ?>
            <?php if(isset($_GET['error'])){ ?>
                <div class="alert bg-red alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    Something went wrong while processing your request. Please try again.
                </div>
            <?php } ?>
            <?php if(isset($_GET['added'])){ ?>
                <div class="alert bg-teal alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    A new schedule has been added.
                </div>
            <?php } ?>
            <?php if(isset($_GET['updated'])){ ?>
                <div class="alert bg-teal alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    A scheduled submission has been updated.
                </div>
            <?php } ?>
            <?php if(isset($_GET['deleted'])){ ?>
                <div class="alert bg-teal alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    A scheduled submission has been deleted.
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
                            <button type="button" class="btn bg-blue waves-effect data-transfer" data-schedtype="OBTL" data-toggle="modal" data-target="#new-schedule-modal" style="float: right; margin-top: -23px;">SCHEDULE SUBMISSION</button>
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
                                            <?php if($schedule['report_type']  == 'OBTL' && $schedule['status'] != 'Archived'){ ?>
                                                <tr>
                                                    <td><center><?php echo $schedule['academic_year']; ?></center></td>
                                                    <td><center><?php echo date_format(date_create($schedule['deadline']), 'M d, Y - D'); ?></center></td>
                                                    <td><center><?php echo date_format(date_create($schedule['deadline_extension']), 'M d, Y - D'); ?></center></td>
                                                    <td><center><?php echo $schedule['status']; ?></center></td>
                                                    <td><center>
                                                    <?php if($schedule['status'] != 'Closed'){ ?>
                                                    <button type="button" class="btn bg-cyan waves-effect" data-toggle="modal" data-target="#edit-schedule-modal" data-reporttype="OBTL" data-id="<?php echo $schedule['id']; ?>">MODIFY DEADLINE</button>&nbsp;<a href="../functions/activity.php?activityOpt=true&deleteSchedule=true&id=<?php echo $schedule['id']; ?>&folder=<?php echo $_SESSION['folder']; ?>"><button type="button" class="btn bg-red waves-effect">CANCEL</button></a></center>
                                                    <br>
                                                    <?php } ?>
                                                    <center><a href="obtl_submissions.php?id=<?php echo $schedule['id']; ?>"><button type="button" class="btn bg-green waves-effect">SUBMITTED REPORTS</button></a>
                                                    <?php if($schedule['status'] == 'Closed'){?>
                                                    &nbsp;<a href="../functions/activity.php?activityOpt=true&archiveSchedule=true&id=<?php echo $schedule['id']; ?>&folder=<?php echo $_SESSION['folder']; ?>"><button type="button" class="btn bg-red waves-effect">ARCHIVE</button></a>
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

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>COUNSELING REPORTS</h2>
                            <button type="button" class="btn bg-blue waves-effect data-transfer" data-schedtype="Counseling Report" data-toggle="modal" data-target="#new-schedule-modal" style="float: right; margin-top: -23px;">SCHEDULE SUBMISSION</button>
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
                                            <?php if($schedule['report_type']  == 'Counseling Report' && $schedule['status'] != 'Archived'){ ?>
                                                <tr>
                                                    <td><center><?php echo $schedule['academic_year']; ?></center></td>
                                                    <td><center><?php echo date_format(date_create($schedule['deadline']), 'M d, Y - D'); ?></center></td>
                                                    <td><center><?php echo date_format(date_create($schedule['deadline_extension']), 'M d, Y - D'); ?></center></td>
                                                    <td><center><?php echo $schedule['status']; ?></center></td>
                                                    <td><center>
                                                    <?php if($schedule['status'] != 'Closed'){ ?>
                                                    <button type="button" class="btn bg-cyan waves-effect" data-toggle="modal" data-target="#edit-schedule-modal" data-reporttype="Counseling Report" data-id="<?php echo $schedule['id']; ?>">MODIFY DEADLINE</button>&nbsp;<a href="../functions/activity.php?activityOpt=true&deleteSchedule=true&id=<?php echo $schedule['id']; ?>&folder=<?php echo $_SESSION['folder']; ?>"><button type="button" class="btn bg-red waves-effect">CANCEL</button></a></center>
                                                    <br>
                                                    <?php } ?>
                                                    <center><a href="counsel_submissions.php?id=<?php echo $schedule['id']; ?>"><button type="button" class="btn bg-green waves-effect">SUBMITTED REPORTS</button></a>
                                                    <?php if($schedule['status'] == 'Closed'){?>
                                                    &nbsp;<a href="../functions/activity.php?activityOpt=true&archiveSchedule=true&id=<?php echo $schedule['id']; ?>&folder=<?php echo $_SESSION['folder']; ?>"><button type="button" class="btn bg-red waves-effect">ARCHIVE</button></a>
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
            
            <?php require '../components/modals/add_schedule.php'; ?>
            <?php require '../components/modals/edit_schedule.php'; ?>

        </div>
    </section>
    
    <?php require '../components/page_foot.php'; ?>

    <!-- CountTo Index Support -->
    <script src="../js/pages/index.js"></script>

    <!-- Select Plugin Js -->
    <script src="../plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <script>
        $('#new-schedule-modal').on('show.bs.modal', function(e) {
            var schedType = $(e.relatedTarget).data('schedtype'),
                header = 'New Schedule for ' + schedType;

            $(e.currentTarget).find('.modalLabelSched').html(header);
            $(e.currentTarget).find('input[name="reportType"]').val(schedType);
        });

        $('#edit-schedule-modal').on('show.bs.modal', function(e) {
            var reportType = $(e.relatedTarget).data('reporttype'),
                header = 'Modify Schedule for ' + reportType,
                schedId = $(e.relatedTarget).data('id');

            $(e.currentTarget).find('.modalLabelSched').html(header);
            $(e.currentTarget).find('input[name="reportId"]').val(schedId);
        });
    </script>

</body>

</html>

<?php
    } else {
        header ("location:../index.php?restricted=true");
    }
?>