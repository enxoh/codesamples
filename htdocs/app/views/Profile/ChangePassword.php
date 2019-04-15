<html>
    <head>
        <title>Change Password</title>
        <link rel="stylesheet" type="text/css" href="/css/style.css">
    </head>

    <body>
        <div class="container">
            <form action='' method="post">

                <div>
                    <h1 class="createAccountText">Change Password</h1>
                </div>

                <div>
                    <label>Current Password<input type="password" name="CurrentPassword" class="form-control form-control-sm label2"/ ></label>
                </div>

                <div>
                    <label>New Password<input type="password" name="Password" class="form-control form-control-sm label2"/></label>
                </div>

                <div>
                    <label>Confirm New Password<input type="password" name="ConfirmPassword" class="form-control form-control-sm label2"/></label>
                </div>
                <div>
                    <br>                    
                    <input type="submit" name="action" class="btn btn-primary" value="Save Changes">
                    <a href="../Profile/Details" class="btn btn-dark" role="button">Back to My Profile</a>
                </div>
            </form>
        </div>
    </body>
</html>