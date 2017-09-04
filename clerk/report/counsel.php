<?php if(!isset($_GET['facultySubmit'])){ ?>
<h2 class="card-inside-title">Counseling Report Information Draft</h2>

<div class="row clearfix">
    <form action="../functions/counsel.php?counselOpt=true&facultyAssign=true&folder=<?php echo $_SESSION['folder']; ?>" method="POST">
       <div class="col-sm-5">
            <div class="form-group">
                <div class="form-line">
                	<input type="text" value="<?php echo $_GET['id']; ?>" name="id" hidden>
                    <input type="text" value="<?php echo $_GET['type']; ?>" name="type" hidden>
                    <input type="text" class="form-control" name="title" placeholder="Please input the title of the document..." />
                </div>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="form-group">
                <div class="form">
                    <input type="text" class="form-control" id="demo-input-facebook-theme-faculty" name="facultyAssign" placeholder="Enter assigned faculty member">
                    <input type="text" value=""  name="facultyAssignId" hidden>
                    <input type="text" value=""  name="facultyAssignReps" hidden>
                        <script type="text/javascript">
                            var members = new Array();
                           
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
                                var reps=0;
                                $("#demo-input-facebook-theme-faculty").tokenInput(<?php echo $faculty; ?>, {
                                        theme: "facebook",
                                        propertyToSearch: "firstname",
                                        resultsFormatter: function(item){ 
                                            return "<li>" + "<div style='display: inline-block; padding-left: 10px;'><div class='full_name'>" + item.firstname + " " + item.lastname + "</div></div></li>" },
                                        tokenFormatter: function(item){ 
                                            return "<li><p>" + item.firstname + " " + item.lastname + "</p></li>" },
                                        preventDuplicates: true,
                                        onAdd: function(item){
                                            members.push(item.id);
                                            reps++;

                                            console.log(members);
                                            $('input[name="facultyAssigReps"]').val(reps);
                                            $('input[name="facultyAssignId"]').val(members);
                                        },
                                        onDelete: function(item){
                                            members.remove(item.id);
                                            reps--;

                                            console.log(members);
                                            $('input[name="facultyAssigReps"]').val(reps);
                                            $('input[name="facultyAssignId"]').val(members);
                                        }
                                    });
                            });
                        </script>
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
<?php } ?>