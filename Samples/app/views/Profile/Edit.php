<html>
    <head>
        <title>Edit Profile</title>
        <link rel="stylesheet" type="text/css" href="/css/style.css">
    </head>

    <body>
        <div class="container">
            <form action='' method="post">

                <div>
                    <h1 class="createAccountText">Edit Profile</h1>
                </div>

                <div class="input-group">
                    <div class = "col-xs-4 mycustomspace">
                        <label>First Name<input type="text" name="First_name" placeholder="<?php echo ($data["first_name"])?>" class="form-control labelfnln"/></label>
                    </div>
                    <div class="col-xs-4">
                        <label>Last Name<input type="text" name="Last_name" placeholder="<?php echo ($data["last_name"])?>" class="form-control labelfnln"/></label>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-xs-1 col-lg-5 ">
                        <label for="code">Username</label>
                        <input type="text" name="Username"  placeholder="<?php echo ($data["username"])?>" disabled class="form-control input-normal label2" />
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-xs-1 col-lg-5 ">
                        <label for="code">Email</label>
                        <input type="text" name="Email" placeholder="<?php echo ($data["email"])?>" class="form-control input-normal label2" />
                    </div>
                </div>

                <div>
                    <label>Current Password<input type="password" name="CurrentPassword" class="form-control form-control-sm label2"/></label>
                </div>

                <div>
                    <label>New Password<input type="password" name="Password" class="form-control form-control-sm label2"/></label>
                </div>

                <div>
                    <label>Confirm New Password<input type="password" name="ConfirmPassword" class="form-control form-control-sm label2"/></label>
                </div>

                <div>
                    <?php if($data["newsletter_status"] == 0): ?>
                        <input type="checkbox" name="Newsletter_status" value="1" style="float: left;">
                        <label style="word-wrap: break-word; line-height: 16px; float: left;">&nbspYes, I would like to receive weekly Sten promotion emails.</label>
                    <?php elseif($data["newsletter_status"] == 1): ?>
                        <input type="checkbox" checked name="Newsletter_status" value="1" style="float: left;">
                        <label style="word-wrap: break-word; line-height: 16px; float: left;">&nbspYes, I would like to receive weekly Sten promotion emails.</label>
                    <?php endif?>

                </div>

                <div>
                    <br>
                    <br>
                    <input type="submit" name="action" class="btn btn-primary" value="Save Changes">
                    <a href="../Profile/Details" class="btn btn-dark" role="button">Back to My Profile</a>
                </div>

            </form>
        </div>
    </body>
</html>