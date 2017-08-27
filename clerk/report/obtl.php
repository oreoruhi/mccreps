<?php if(!isset($_GET['subjectNumber'])){?>
<h2 class="card-inside-title">OBTL Information Draft</h2>
<div class="row clearfix">
    <form action="../functions/activity.php?activityOpt=true&numberRedirect=true&folder=<?php echo $_SESSION['folder']; ?>" method="POST">
       <div class="col-sm-8">
            <div class="form-group">
                <div class="form-line">
                    <input type="text" class="form-control" name="title" placeholder="Please input the title of the document..." />
                </div>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group">
                <div class="form-line">
                    <input type="text" value="<?php echo $_GET['id']; ?>" name="id" hidden>
                    <input type="text" value="<?php echo $_GET['type']; ?>" name="type" hidden>
                    <input type="number" class="form-control" name="numberSubject" placeholder="Please input your number of subjects..." />
                </div>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group">
                <div class="form">
                    <center><button type="submit" class="btn bg-red btn-lg m-l-15 waves-effect">SAVE</button></center>
                </div>
            </div>
        </div>
    </form>
</div>
<?php } else { ?>
<h2 class="card-inside-title">OBTL Report Draft</h2>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <form action="../functions/activity.php?activityOpt=true&obtlReport=true&subNum=<?php echo $_GET['subjectNumber']; ?>&obtlId=<?php echo $_GET['obtlid']; ?>&folder=<?php echo $_SESSION['folder']; ?>" method="POST">
            <?php for($subjectNum = $_GET['subjectNumber']; $subjectNum > 0; $subjectNum--) { ?>
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="subjectName<?php echo $subjectNum; ?>" class="form-control" placeholder="Course Name" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="subjectCode<?php echo $subjectNum; ?>" class="form-control" placeholder="Course Code" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <div class="form">
                                <input type="text" class="form-control" id="demo-input-facebook-theme-<?php echo $subjectNum; ?>" name="subjectAssign<?php echo $subjectNum; ?>" placeholder="Enter assigned faculty member">
                                <input type="text" value=""  name="subjectId<?php echo $subjectNum; ?>" hidden>
                                    <script type="text/javascript">
                                        var members<?php echo $subjectNum; ?> = new Array();
                                       
                                        Array.prototype.remove = function() {
                                            var what, a = arguments, L = a.length, ax;
                                            while (L && this.length) {
                                                what = a[--L];
                                                while ((ax = this.indexOf(what)) !== -1) {
                                                    this.splice(ax, 1);
                                                }
                                            }
                                            return this;
                                        };
                                        
                                        $(document).ready(function() {
                                            $("#demo-input-facebook-theme-<?php echo $subjectNum; ?>").tokenInput(<?php echo $faculty; ?>, {
                                                    theme: "facebook",
                                                    propertyToSearch: "firstname",
                                                    resultsFormatter: function(item){ 
                                                        return "<li>" + "<div style='display: inline-block; padding-left: 10px;'><div class='full_name'>" + item.firstname + " " + item.lastname + "</div></div></li>" },
                                                    tokenFormatter: function(item){ 
                                                        return "<li><p>" + item.firstname + " " + item.lastname + "</p></li>" },
                                                    preventDuplicates: true,
                                                    onAdd: function(item){
                                                        members<?php echo $subjectNum; ?>.push(item.id);
                                                        console.log(members<?php echo $subjectNum; ?>);
                                                        $('input[name="subjectId<?php echo $subjectNum; ?>"]').val(members<?php echo $subjectNum; ?>);
                                                    },
                                                    onDelete: function(item){
                                                        members<?php echo $subjectNum; ?>.remove(item.id);
                                                        console.log(members<?php echo $subjectNum; ?>);
                                                        $('input[name="subjectId<?php echo $subjectNum; ?>"]').val(members<?php echo $subjectNum; ?>);
                                                    }
                                                });
                                        });
                                    </script>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="float: right; margin-right: 12px;">
                <button type="button" class="btn btn-lg m-l-15 waves-effect">CANCEL</button>&nbsp;<button type="submit" class="btn bg-red btn-lg m-l-15 waves-effect">SAVE</button>
            </div>
        </form>
    </div>
</div>
<?php }?>