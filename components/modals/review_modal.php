<!-- Review Modal OBTL -->
<div class="modal fade" id="review-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #F44236; color: #fff; margin: 0; padding: 15px;">
                <button type="button" class="close" data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="largeModalLabel">Report Summary</h4>
            </div>
            <div class="modal-body">
                <div class="report-body">
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                            <p>
                                <b>Report Title</b>
                            </p>
                            <p class="report-title"></p>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                            <p>
                                <b>Report Author</b>
                            </p>
                            <p class="report-author"></p>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                            <p>
                                <b>Report Institute</b>
                            </p>
                            <p class="report-institute"></p>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                            <p>
                                <b>Submission Date</b>
                            </p>
                            <p class="report-date"></p>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                            <p>
                                <b>Dean's Approval</b>
                            </p>
                            <p class="report-dean-status"></p>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                            <p>
                                <b>VPAA's Approval</b>
                            </p>
                            <p class="report-vpaa-status"></p>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                            <p>
                                <b>System Status</b>
                            </p>
                            <p class="report-system-status"></p>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <p>
                                <b>Dean Remarks</b>
                            </p>
                            <p class="report-dean-remarks"></p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <p>
                                <b>VPAA Remarks</b>
                            </p>
                            <p class="report-vpaa-remarks"></p>
                        </div>
                    </div>
                    <div class="row clearfix">
                         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <p>
                                <center><b>Report Data</b></center>
                            </p>
                        </div>                   
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <ul class="list-unstyled list-data-even">
                                
                            </ul>                       
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <ul class="list-unstyled list-data-odd">
                                
                            </ul>                       
                        </div>
                    </div>
                    <?php if($_SESSION['type'] == 'Clerk'){ ?>
                    <br>
                    <div class="row clearfix decision-row decision-buttons-clerk">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"></div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                    <form action="../functions/activity.php?activityOpt=true&deleteReport=true&folder=<?php echo $_SESSION['folder']?>" method="POST">
                                        <input type="text" class="input-contain" value="" name="idList" hidden>
                                        <button type="submit" class="btn bg-red btn-lg m-l-15 waves-effect">DELETE REPORT</button>
                                    </form>
                                </div>     
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                    <button type="button" class="btn bg-green btn-lg m-l-15 waves-effect">EDIT REPORT</button> 
                                </div>   
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"></div>             
                        </div>
                    </div>
                    <?php } ?>
                    <?php if($_SESSION['type'] == 'Dean' || $_SESSION['type'] == 'VPAA'){?>
                    <br>
                    <div class="row clearfix decision-row decision-buttons">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"></div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                    <button type="button" class="btn bg-red btn-lg m-l-15 waves-effect" onclick="comments()">FOR REVISION</button>
                                </div>     
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                    <form action="../functions/activity.php?activityOpt=true&acceptReport=true&folder=<?php echo $_SESSION['folder']?>" method="POST">
                                        <input type="text" class="input-contain" name="idList" value="" hidden>
                                        <button type="submit" class="btn bg-green btn-lg m-l-15 waves-effect">ACCEPT REPORT</button> 
                                    </form>
                                </div>   
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"></div>             
                        </div>
                    </div>
                    <div class="row clearfix decision-row comments" hidden>
                        <form action="../functions/activity.php?activityOpt=true&reviseReport=true&folder=<?php echo $_SESSION['folder']?>" method="POST">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea rows="4" class="form-control no-resize" name="comment-report" placeholder="Type your comment about the report here..."  required></textarea>
                                    </div>
                                    <input type="text" class="input-contain" name="idList" value="" hidden>
                                </div>   
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"></div>
                                <center>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                        <button type="button" class="btn btn-lg waves-effect" onclick="commentsCancel()">CANCEL</button>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                        <button type="submit" class="btn bg-red btn-lg waves-effect">SUBMIT</button> 
                                    </div>  
                                </center>   
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"></div>          
                            </div>
                        </form>
                    </div>
                    <?php } ?>
                    <div class="row clearfix print" hidden>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"></div>
                            <center>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <!-- <input type="text" class="array-info" name="array-info" value=""> -->
                                    <button type="submit" class="btn bg-teal waves-effect clickPrint">PRINT DOCUMENT</button>
                                </div>  
                            </center>   
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"></div>          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function comments(){
        $('.decision-buttons').attr('hidden', true).fadeOut();
        $('.comments').removeAttr('hidden').fadeIn();
    }

    function commentsCancel(){
        $('.comments').attr('hidden', true).fadeOut();
        $('.decision-buttons').removeAttr('hidden').fadeIn();            
    }
</script>