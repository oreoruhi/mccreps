<?php
    require '../functions/common_connector.php';
    //When declaring and connecting a class file to a variable, make sure to add $database in its parameter
    if($_SESSION['type'] == 'Program Head'){
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
            <?php include '../components/validation_messages.php'; ?>
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">list</i>
                        </div>
                        <div class="content">
                            <div class="text">LIST OF INSTITUTES</div>
                            <div class="number count-to" data-from="0" data-to="5" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person</i>
                        </div>
                        <div class="content">
                            <div class="text">MCC-REPS USERS</div>
                            <div class="number count-to" data-from="0" data-to="11" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->

        </div>
    </section>

    <?php include '../components/page_foot.php'; ?>

    <!-- CountTo Index Support -->
    <script src="../js/pages/index.js"></script>

</body>

</html>

<?php
    } else {
        header ("location:../index.php?restricted=true");
    }
?>