<?php 
    session_start();
    session_destroy(); 
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>MCC Inter-Institute Reports Monitoring System</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="login-page">

    <?php require 'components/page_loader.php'; ?>

    <?php require 'components/page_overlay.php'; ?>

    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);"><b>MCC</b>-REPS</a>
            <small>MCC Inter-Institute Reports Monitoring System</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST" action="functions/password.php?changePassword=true">
                    <div class="msg">Forgot your password?</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <select class="form-control" name="question" required>
                                <option value="" selected hidden disabled>-- Please select --</option>
                                <option value="SECQ1100">What is the maiden surname of your mother?</option>
                                <option value="SECQ1200">What is the name of your favorite elementary teacher?</option>
                                <option value="SECQ1400">Who is your favorite actor, musician, or artist?</option>
                                <option value="SECQ1500">What was your favorite place to visit as a child?</option>
                                <option value="SECQ1600">What is the name of your favorite pet?</option>
                            </select>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">list</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="answer" placeholder="Answer" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <a href="index.php">Sign In</a>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-red waves-effect" type="submit">SUBMIT</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="pages/examples/sign-in.js"></script>
</body>

</html>