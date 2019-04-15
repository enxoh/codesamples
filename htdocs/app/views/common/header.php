

<link rel="stylesheet" type="text/css" href="/css/navbar.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<nav class="navbar navbar-light fixed-top" style="background-color: #003b64;">
    <div class="container">
      <a class="navbar-brand" href="/home/index">
        <img src="https://images.bbycastatic.ca/sf/images/common/main-logo.svg" width="60" height="50" class="d-inline-block align-top" alt=""></a>
    	<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
    	      <li class="nav-item active">
    	        <a class="nav-link" href="#">Shop <span class="sr-only">(current)</span></a>
    	      </li>
    	      </ul>
      </div>
</nav>

<div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top fixed-top-2">
        <div class="container">
        <!---
            <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
            ---->
        <div id="navbarNavDropdown" class="navbar-collapse collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>

            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <?php if(!isset($_SESSION['user_id'])): ?>
                    <a class="nav-link" href="/home/Login">Sign In</a>
                    <?php else: ?>
                    <a class="nav-link" href="/home/logOut">Log Out</a>
                    <?php endif; ?>
                </li>

                <!-- IF NO USER IS LOGGED IN -->
                <?php if(!isset($_SESSION['user_id'])): ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">My Account</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="/home/Register">Create an Account</a>                        
                    </div>
                </li>
                <?php endif; ?>


                <!-- IF USER IS LOGGED IN -->
                <?php if(isset($_SESSION['user_id'])): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">My Account</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <h6 style="padding-left: 15px">My account</h6>
                        <a class="dropdown-item" href="../profile/details">My Profile</a>
                        <a class="dropdown-item" href="../member/index">Membership</a>

                    </div>
                </li>
                <?php endif; ?>




                <!-----------------  Admin ----------------------------->
                <?php if($_SESSION && $_SESSION['type'] == 1): ?>                    
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">My Admin</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <h6 style="padding-left: 15px">Admin Restricted</h6>
                        <a class="dropdown-item" href="../admin/index">Administration Page</a>
                    </div>
                </li>
                <?php endif; ?>


            </ul>
        </div>
    </div>
    </nav>
</div>


