<?php
    require '../functions/common_connector.php';
    //When declaring and connecting a class file to a variable, make sure to add $database in its parameter
    if($_SESSION['type'] == 'Administrator'){
        require '../functions/activity.php';
        $activity = new Activity();
        $mccreps_users = $activity->userList($database);
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
            <?php if(isset($_GET['pass']) && isset($_GET['user'])){ ?>
                <div class="alert bg-teal alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    A new user has been created! Generated username is "<?php echo $_GET['user']; ?>" and generated password is "<?php echo $_GET['pass']; ?>".
                </div>
            <?php } ?>
            <?php if(isset($_GET['archived'])){ ?>
                <div class="alert bg-teal alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    A user record has been archived.
                </div>
            <?php } ?>
            <?php if(isset($_GET['error'])){ ?>
                <div class="alert bg-red alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    Something went wrong while processing your request. Please try again.
                </div>
            <?php } ?>
            <div class="block-header">
                <h2>MCC-REPS USERS</h2>
            </div>

            <!-- User List -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <?php require '../components/modals/add_user.php'; ?>
                        <div class="header">
                            <button type="button" class="btn bg-blue waves-effect" data-toggle="modal" data-target="#new-user-modal" style="float: right; margin-top: -5px;">ADD NEW USER</button>
                            <br>
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>Position</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($mccreps_users as $user): ?>
                                    <tr>
                                        <td><?php echo $user['firstname'] . " " . $user['middlename'] . " " . $user['lastname']; ?></td>
                                        <td><?php echo $user['sys_name'];
                                             if($user['sys_id'] !== "VPAA024685"){
                                                if($user['sys_id'] !== "SPADMIN015"){
                                                    echo " -- " . $user['ins_name']; 
                                                } 
                                            }?></td>
                                        <td><?php echo $user['status']; ?></td>
                                        <td>
                                            <center>
                                                <?php if($user['sys_id'] !== "VPAA024685" && $user['sys_id'] !== "SPADMIN015"){ ?>
                                                    <a href="../functions/activity.php?activityOpt=true&deleteUser=true&id=<?php echo $user[0]; ?>&folder=<?php echo $_SESSION['folder']; ?>"><button type="button" class="btn bg-red waves-effect">DELETE</button></a>
                                                <?php } else { ?>
                                                    <button type="button" class="btn bg-red waves-effect" disabled>DELETE</button>
                                                <?php } ?>
                                            </center>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# User List -->

        </div>
    </section>

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