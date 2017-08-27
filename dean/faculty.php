<?php
    require '../functions/common_connector.php';
    //When declaring and connecting a class file to a variable, make sure to add $database in its parameter
    if($_SESSION['type'] == 'Dean'){
        require '../functions/activity.php';
        $activity = new Activity();
        $ins_id = $_SESSION['ins_id'];
        $faculty_members = $activity->facultyList($database, $ins_id);
?>

<!DOCTYPE html>
<html>

<head>

    <?php include '../components/page_head.php'; ?>

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
            <?php if(isset($_GET['added'])){ ?>
                <div class="alert bg-teal alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    A new faculty record has been added.
                </div>
            <?php } ?>
            <?php if(isset($_GET['archived'])){ ?>
                <div class="alert bg-teal alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    A faculty record has been archived.
                </div>
            <?php } ?>
            <?php if(isset($_GET['updated'])){ ?>
                <div class="alert bg-teal alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    A faculty record has been updated.
                </div>
            <?php } ?>
            <?php if(isset($_GET['error'])){ ?>
                <div class="alert bg-red alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    Something went wrong while processing your request. Please try again.
                </div>
            <?php } ?>
            <div class="block-header">
                <h2>INSTITUTE FACULTY MEMBER</h2>
            </div>

            <!-- Faculty List -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <button type="button" class="btn bg-blue waves-effect" data-toggle="modal" data-target="#new-faculty-modal" style="float: right; margin-top: -5px;">ADD NEW FACULTY MEMBER</button>
                            <br>
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Faculty Name</th>
                                        <th>Position</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($faculty_members as $faculty): ?>
                                    <?php require '../components/modals/edit_faculty.php'; ?>
                                    <tr>
                                        <td><?php echo $faculty['firstname'] . " " . $faculty['middlename'] . " " . $faculty['lastname'] . " " . $faculty['extension']; ?></td>
                                        <td><?php echo $faculty['position']; ?></td>
                                        <td><?php echo $faculty['status']; ?></td>
                                        <td><center><button type="button" class="btn bg-green waves-effect" data-toggle="modal" data-target="#edit-faculty-modal-<?php echo $faculty['id']; ?>">MODIFY</button>&nbsp;<a href="../functions/activity.php?activityOpt=true&deleteFaculty=true&id=<?php echo $faculty['id']; ?>&folder=<?php echo $_SESSION['folder']; ?>"><button type="button" class="btn bg-red waves-effect">DELETE</button></a></center></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Faculty List -->

        </div>
    </section>

    <?php require '../components/modals/add_faculty.php'; ?>

    <?php include '../components/page_foot.php'; ?>

    <!-- Select Plugin Js -->
    <script src="../plugins/bootstrap-select/js/bootstrap-select.js"></script>

</body>

</html>

<?php
    } else {
        header ("location:../index.php?restricted=true");
    }
?>