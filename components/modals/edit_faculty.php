<!-- Edit Faculty Modal -->
<div class="modal fade" id="edit-faculty-modal-<?php echo $faculty['id']; ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #F44236; color: #fff; margin: 0; padding: 15px;">
                <button type="button" class="close" data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="largeModalLabel">Edit Faculty Member</h4>
            </div>
            <div class="modal-body">
                <!-- Inline Layout -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div>
                            <div>
                                <form action="../functions/activity.php?activityOpt=true&editFaculty=true&id=<?php echo $faculty['id']; ?>&folder=<?php echo $_SESSION['folder']?>" method="POST">
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="firstname" value="<?php echo $faculty['firstname']; ?>" placeholder="First Name *" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="middlename" value="<?php echo $faculty['middlename']; ?>" placeholder="Middle Name">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="lastname" value="<?php echo $faculty['lastname']; ?>" placeholder="Last Name *" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="extension" value="<?php echo $faculty['extension']; ?>" placeholder="Name Extension (Jr., II, III, etc.)">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="position" value="<?php echo $faculty['position']; ?>" placeholder="Position *" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <select class="form-control show-tick" name="status">
                                                <option selected hidden disabled>-- SELECT STATUS FOR THE FACULTY --</option>
                                                <option value="Permanent">Permanent</option>
                                                <option value="Casual">Casual</option>
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