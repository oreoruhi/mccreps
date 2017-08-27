<?php
    require '../functions/common_connector.php';
    //When declaring and connecting a class file to a variable, make sure to add $database in its parameter
    if($_SESSION['type'] == 'Administrator'){
        require '../functions/activity.php';
        $activity = new Activity();
        $institutes = $activity->instituteList($database);
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
            <?php if(isset($_GET['added'])){ ?>
                <div class="alert bg-teal alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    A new institute record has been added.
                </div>
            <?php } ?>
            <?php if(isset($_GET['archived'])){ ?>
                <div class="alert bg-teal alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    An institute record has been archived.
                </div>
            <?php } ?>
            <?php if(isset($_GET['updated'])){ ?>
                <div class="alert bg-teal alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    An institute record has been updated.
                </div>
            <?php } ?>
            <?php if(isset($_GET['error'])){ ?>
                <div class="alert bg-red alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    Something went wrong while processing your request. Please try again.
                </div>
            <?php } ?>
            <div class="block-header">
                <h2>INSTITUTES</h2>
            </div>

            <!-- Institute List -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <?php require '../components/modals/add_institute.php'; ?>
                        <div class="header">
                            <button type="button" class="btn bg-blue waves-effect" data-toggle="modal" data-target="#new-institute-modal" style="float: right; margin-top: -5px;">ADD NEW INSTITUTE</button>
                            <br>
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Institute ID</th>
                                        <th>Institute Name</th>
                                        <th>Institute Logo</th>
                                        <th>Faculty Count</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($institutes as $institute): ?>
                                    <tr>
                                        <td><?php echo $institute['ins_id']; ?></td>
                                        <td><?php echo $institute['ins_name']; ?></td>
                                        <td><center><img src="../images/<?php echo $institute['logo']; ?>" width="40" height="40" alt="Logo"></center></td>
                                        <td><?php echo $institute['faculty_count']; ?></td>
                                        <td><center><button type="button" class="btn bg-green waves-effect" data-toggle="modal" data-target="#edit-institute-modal-<?php echo $institute['id']; ?>">MODIFY</button>&nbsp;<a href="../functions/activity.php?activityOpt=true&deleteInstitute=true&id=<?php echo $institute['id']; ?>&folder=<?php echo $_SESSION['folder']; ?>"><button type="button" class="btn bg-red waves-effect">DELETE</button></a></center></td>
                                    </tr>
                                    <?php require '../components/modals/edit_institute.php'; ?>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Institute List -->

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