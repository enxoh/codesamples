<!DOCTYPE html>
    <html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="/css/style.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <title>Account Details</title>
    </head>

    <body>
        <div class="container">

            <div>
                <h1 class="createAccountText">My Profile</h1>
            </div>

            <div class="input-group">
                <div class = "col-xs-4 mycustomspace">
                    <label style="font-weight: bold;">First Name</label>
                    <?php echo ($data["first_name"]);?>
                </div>
                <div class="col-xs-4">
                    <label style="font-weight: bold;">Last Name</label>
                    <?php echo ($data["last_name"]);?>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-xs-1 col-lg-5 ">
                    <label for="code" style="font-weight: bold;">Username</label>
                    <?php echo ($data["username"]);?>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-xs-1 col-lg-5 ">
                    <label for="code" style="font-weight: bold;">Email</label>
                    <?php echo ($data["email"]);?>
                </div>
            </div>

            <div>
                <label for="code" style="font-weight: bold;">Newsletter Status</label>
                <?php if($data["newsletter_status"] == 1): ?>
                    <label>You are currently signed up for weekly newsletter.</label>
                <?php else: ?>
                    <label>You are not currently signed up for weekly newsletter.</label>
                <?php endif; ?>
            </div>

            <div>
                <br>
                <a href="../paymentinfo/index" class="btn btn-outline-dark fa fa-credit-card">  Payment Options</a>
                <br>
                <br>
                <a href="../profile/edit" class="btn btn-primary">Edit Profile</a>
                <a href="../profile/changePassword" class="btn btn-primary">Change Password</a>
            </div>

        </div>
    </body>
</html>