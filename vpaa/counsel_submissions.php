<?php
    require '../functions/common_connector.php';
    //When declaring and connecting a class file to a variable, make sure to add $database in its parameter
    if($_SESSION['type'] == 'VPAA'){
        $id = $_GET['id'];
        require '../functions/counsel.php';
        require '../functions/activity.php';
        $activity = new Activity();
        $counsel = new Counsel();
        $counsel_list = $counsel->counselListReview($database, $id);
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
                                    foreach ($counsel_list as $report): ?>
                                        <?php
                                            if($report['dean_remarks'] == 'Approved'){
                                        ?>
                                        <tr>
                                            <td><?php echo $report['counsel_title']; ?></td>
                                            <td><?php echo $report['ins_name']; ?></td>
                                            <td><?php echo $report['firstname'] . " " . $report['middlename'] . " " . $report['lastname']; ?></td>
                                            <td><?php echo date_format(date_create($report['vpaa_fa_submitted']), 'M d, Y - D'); ?></td>
                                            <td><?php echo $report['vpaa_remarks']; ?></td>
                                            <td><center><button type="button" class="btn bg-teal waves-effect">READ</button></center></td>
                                        </tr>
                                <?php 
                                            }
                                    endforeach; 
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

    
    <?php include '../components/page_foot.php'; ?>


</body>

</html>

<?php
    } else {
        header ("location:../index.php?restricted=true");
    }
?>