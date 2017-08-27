<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="../img/<?php echo $user['display_picture']; ?>" width="70" height="70" alt="User" />
            </div>
            <div class="info-container" style="margin-top:-20px;">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $user['firstname'] . " " . $user['lastname']; ?></div>
                <div class="email">MCC-REPS <?php echo $_SESSION['type']; ?></div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="#" data-toggle="modal" data-target="#profile-modal"><i class="material-icons">person</i>Profile</a></li>
                        <li role="seperator" class="divider"></li>
                        <li><a href="../functions/logout.php"><i class="material-icons">input</i>Sign Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MCC-REPS NAVIGATION</li>
                <li>
                    <a href="index.php">
                        <i class="material-icons">home</i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <?php if ($_SESSION['type'] == 'Administrator') { ?>
                <li>
                    <a href="institutes.php">
                        <i class="material-icons">list</i>
                        <span>Institutes</span>
                    </a>
                </li>
                <li>
                    <a href="users.php">
                        <i class="material-icons">person</i>
                        <span>MCC-REPS Users</span>
                    </a>
                </li>
                <?php }
                if ($_SESSION['type'] == 'VPAA') { 
                    $institutes = $activity->instituteList($database);
                ?>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">list</i>
                        <span>OBTL</span>
                    </a>
                    <ul class="ml-menu">
                        <?php foreach ($institutes as $institute): ?>
                            <li>
                                <a href="../functions/report.php?reportOpt=true&obtlList=true&institute=<?php echo $institute['id']; ?>&folder=<?php echo $_SESSION['folder']; ?>"><?php echo $institute['ins_name']; ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </li>  
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">list</i>
                        <span>Counseling Reports</span>
                    </a>
                    <ul class="ml-menu">
                        <?php foreach ($institutes as $institute): ?>
                            <li>
                                <a href="../functions/report.php?reportOpt=true&counselingList=true&institute=<?php echo $institute['id']; ?>&folder=<?php echo $_SESSION['folder']; ?>"><?php echo $institute['ins_name']; ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </li>          
                <?php }
                if ($_SESSION['type'] == 'Clerk' || $_SESSION['type'] == 'Dean' || $_SESSION['type'] == 'Program Head'){ ?>
                <li>
                    <a href="faculty.php">
                        <i class="material-icons">people</i>
                        <span>Faculty</span>
                    </a>
                </li>               
                <?php } ?>
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; 2016 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
            </div>
            <div class="version">
                <b>MCC-REPS Version: </b> 1.0.0
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
</section>

<?php require 'modals/profile.php'; ?>