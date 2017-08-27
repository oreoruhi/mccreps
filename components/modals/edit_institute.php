<!-- Add Institute Modal -->
<div class="modal fade" id="edit-institute-modal-<?php echo $institute['id']; ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #F44236; color: #fff; margin: 0; padding: 15px;">
                <button type="button" class="close" data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="largeModalLabel">Edit Institute</h4>
            </div>
            <div class="modal-body">
                <!-- Inline Layout -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div>
                            <div>
                                <form action="../functions/activity.php?activityOpt=true&editInstitute=true&id=<?php echo $institute['id']; ?>&folder=<?php echo $_SESSION['folder']?>" method="POST" enctype="multipart/form-data">
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="insname" value="<?php echo $institute['ins_name']; ?>" placeholder="Institute Name" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="insabb" placeholder="Institute Abbreviation" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="file" name="image" id="fileToUpload" accept="image/*" style="width: 300px;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="margin:0;padding:0;">
                                            <button type="submit" class="btn bg-red btn-lg m-l-15 waves-effect">SAVE</button>
                                        </div>
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