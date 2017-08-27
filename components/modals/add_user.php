<?php 
    $positions = $activity->positionList($database);
    $institutes = $activity->instituteList($database); 
?>
<!-- Add User Modal -->
<div class="modal fade" id="new-user-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #F44236; color: #fff; margin: 0; padding: 15px;">
                <button type="button" class="close" data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="largeModalLabel">New User</h4>
            </div>
            <div class="modal-body">
                <!-- Inline Layout -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div>
                            <div>
                                <form action="../functions/activity.php?activityOpt=true&addUser=true&folder=<?php echo $_SESSION['folder']?>" method="POST">
                                    <div class="row clearfix">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="firstname" placeholder="First Name *" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="middlename" placeholder="Middle Name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="lastname" placeholder="Last Name *" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <select class="form-control show-tick" name="institute">
                                                <option selected hidden disabled>-- SELECT INSTITUTE FOR THE USER --</option>
                                                <?php foreach ($institutes as $institute): ?>
                                                    <option value="<?php echo $institute['id']; ?>"><?php echo $institute['ins_name']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <select class="form-control show-tick" name="position">
                                                <option selected hidden disabled>-- SELECT POSITION FOR THE USER --</option>
                                                <?php foreach ($positions as $position): ?>
                                                    <option value="<?php echo $position['id']; ?>"><?php echo $position['sys_name']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="float: right; margin-right: 12px;">
                                        <button type="submit" class="btn bg-red btn-block btn-lg waves-effect">SAVE</button>  
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Inline Layout -->
            </div>
        </div>
    </div>
</div>