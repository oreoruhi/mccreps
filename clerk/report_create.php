<?php
    require '../functions/common_connector.php';
    //When declaring and connecting a class file to a variable, make sure to add $database in its parameter
    if($_SESSION['type'] == 'Clerk'){
        require '../functions/activity.php';
        $activity = new Activity();
        $ins_id = $_SESSION['ins_id'];
        $faculty_members = $activity->facultyList($database, $ins_id);
        $faculty = json_encode($faculty_members);
?>

<!DOCTYPE html>
<html>

<head>

    <?php include '../components/page_head.php'; ?>
    <?php include '../components/page_foot.php'; ?>

    <script type="text/javascript" src="../plugins/loopj-jquery-tokeninput/src/jquery.tokeninput.js"></script>

    <link rel="stylesheet" href="../plugins/loopj-jquery-tokeninput/styles/token-input.css" type="text/css" />
    <link rel="stylesheet" href="../plugins/loopj-jquery-tokeninput/styles/token-input-facebook.css" type="text/css" />

    <script type="text/javascript">
    $(document).ready(function() {
        $("input[type=button]").click(function () {
            alert("Would submit: " + $(this).siblings("input[type=text]").val());
        });
    });
    </script>

    <style>
        ul.token-input-list-facebook {
            width:100%;
        }
    </style>

    <script>
        $(document).ready(function(){
            $("ul").css({"width":"100%";});
        });
    </script>

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
                <h2>REPORT FORM FOR <?php echo $_GET['type']; ?></h2>
            </div>

            <!-- Report Creation Form -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <?php if($_GET['type'] == 'OBTL'){ ?>
                                <?php require 'report/obtl.php'; ?>
                            <?php } else if() {?>
                                <?php require 'report/counsel.php'; ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Report Creation Form -->

        </div>
    </section>
</body>

</html>

<?php
    } else {
        header ("location:../index.php?restricted=true");
    }
?>