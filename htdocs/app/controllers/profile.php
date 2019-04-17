<?php
class Profile extends Controller{

	function index(){
		if(LoginCore::isLoggedIn()){
            $user = $this->model('User');
            $current_User = $user->getUser($_SESSION['username']);
            $data =  (array) $current_User;
            $this->view('Profile/Details',$data);
        }
	}

    public function changePassword(){

        if(LoginCore::isLoggedIn()){
            $user = $this->model('User');
            $current_User = $user->getUser($_SESSION['username']);
            $data =  (array) $current_User;
            $this->view('Profile/ChangePassword',$data);
        }

        if(isset($_SESSION['user_id'])){

            $user = $this->model('User');
            $current_User = $user->getUser($_SESSION['username']);

            if(isset($_POST['action'])){
                if($_POST['Password'] == $_POST['ConfirmPassword'] 
                && password_verify($_POST['CurrentPassword'], $current_User->password_hash)){
                    $current_User->password_hash = password_hash($_POST['Password'], PASSWORD_DEFAULT);
                    $current_User->updatePassword();

                    ?>
                    <script>
                        alert("Password updated!");
                        window.location.href=('details');
                    </script>
                    <?php
                }
                else{
                    ?>
                    <script>
                        alert("An error has occured");
                        window.location.href=('details');
                    </script>
                    <?php
                }
            }
        }
    }


    public function edit(){

        if(LoginCore::isLoggedIn()){
            $user = $this->model('User');
            $current_User = $user->getUser($_SESSION['username']);
            $data =  (array) $current_User;
            $this->view('Profile/Edit',$data);
        }

        if(isset($_SESSION['user_id'])){

            $user = $this->model('User');
            $current_User = $user->getUser($_SESSION['username']);

            if(isset($_POST['action'])){               
                $current_User->email = $_POST['Email'];
                $current_User->first_name = $_POST['First_name'];
                $current_User->last_name = $_POST['Last_name'];
                if(isset($_POST['Newsletter_status'])){
                    $current_User->newsletter_status = 1;
                }
                else{
                    $current_User->newsletter_status = 0;
                }
                $current_User->update();

                ?>
                <script>
                    alert("Profile updated!");
                    window.location.href=('details');
                </script>
                <?php
            }  
            /*       
            else{
                ?>
                <script>
                    alert("An error has occured");
                    window.location.href=('details');
                </script>
                <?php
            }*/
        }

    }    
}
?>