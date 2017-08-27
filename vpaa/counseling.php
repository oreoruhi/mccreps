<?php
    require '../functions/common_connector.php';
    //When declaring and connecting a class file to a variable, make sure to add $database in its parameter
    if($_SESSION['type'] == 'VPAA'){
        require '../functions/activity.php';
        $activity = new Activity();
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
                <h2>COUNSELING HOURS REPORTS LISt</h2>
            </div>

            <!-- Counseling Hours Reports List -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Institute ID</th>
                                        <th>Institute Name</th>
                                        <th>Faculty Count</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>chena</td>
                                        <td>chena</td>
                                        <td>chena</td>
                                        <td>chena</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# OBTL Counseling Hours Reports List -->

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