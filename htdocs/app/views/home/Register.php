<html>
    <head>
        <title>Register</title>
        <link rel="stylesheet" type="text/css" href="/css/style.css">
    </head>

    <body>

    <div class="container">

        <form action='' method="post">

                <div>
                    <h1 class="createAccountText">Create an account</h1>
                </div>

                <div class="input-group">
                    <div class = "col-xs-4 mycustomspace">
                        <label>First Name<input type="text" name="First_name" class="form-control labelfnln"/></label>
                    </div>
                    <div class="col-xs-4">
                        <label>Last Name<input type="text" name="Last_name" class="form-control labelfnln"/></label>
                    </div>
                </div>

                <div class="row">
                  <div class="form-group col-xs-1 col-lg-5 ">
                    <label for="code">Username</label>
                      <input type="text" name="Username" class="form-control input-normal label2" />
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-xs-1 col-lg-5 ">
                    <label for="code">Email</label>
                      <input type="text" name="Email" class="form-control input-normal label2" />
                  </div>
                </div>

            <div>
                <label>Password<input type="password" name="Password" class="form-control form-control-sm label2"/></label>
            </div>

            <div>
                <label>Confirm Password<input type="password" name="ConfirmPassword" class="form-control form-control-sm label2"/></label>
            </div>

            <div>
                    <input type="checkbox" name="Newsletter_status" value="1" style="float: left;">
                    <label style="word-wrap: break-word; line-height: 16px; float: left;">&nbspYes, I would like to receive weekly Sten promotion emails.</label>
            </div>

            <div>
                <br>
                <input type="submit" name="action" class="btn btn-primary" value="Register">
            </div>
            </form>
        </div>
    </body>
</html>