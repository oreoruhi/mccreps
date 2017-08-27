<!-- Validation messages for profile functions -->

<?php if(isset($_GET['user_updated'])){ ?>
    <div class="alert bg-teal alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Your user information has been successfully updated.
    </div>
<?php } ?>
<?php if(isset($_GET['display_picture'])){ ?>
    <div class="alert bg-teal alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Your display picture has been successfully updated.
    </div>
<?php } ?>
<?php if(isset($_GET['password'])){ ?>
    <div class="alert bg-teal alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Your password has been successfully updated.
    </div>
<?php } ?>
<?php if(isset($_GET['error'])){ ?>
    <div class="alert bg-red alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Something went wrong while processing your request. Please try again.
    </div>
<?php } ?>