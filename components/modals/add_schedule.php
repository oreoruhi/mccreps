<!-- Add Schedule Modal -->
<div class="modal fade" id="new-schedule-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #F44236; color: #fff; margin: 0; padding: 15px;">
                <button type="button" class="close" data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title modalLabelSched" id="largeModalLabel"></h4>
            </div>
            <div class="modal-body">
                <!-- Inline Layout -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div>
                            <div>
                                <form action="../functions/activity.php?activityOpt=true&addSchedule=true&folder=<?php echo $_SESSION['folder']; ?>" method="POST">

                                    <input type="text" name="reportType" value="" hidden><br>
                                    
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <select class="form-control show-tick" name="semester" required>
                                                <option selected hidden disabled>-- SELECT SEMESTER --</option>
                                                <option value="1">1st</option>
                                                <option value="2">2nd</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="date" name="deadline" class="datepicker form-control" placeholder="Please choose a date..." required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="float: right; margin-right: 12px;">
                                        <button type="submit" class="btn bg-red btn-lg m-l-15 waves-effect">SAVE</button>
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