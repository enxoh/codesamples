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
                if($_POST['Password'] = $_POST['ConfirmPassword'] 
                && password_verify($_POST['CurrentPassword'], $current_User->password_hash)){
                    $password_hash = password_hash($_POST['Password'], PASSWORD_DEFAULT);
                    $email = $_POST['Email'];
                    $first_name = $_POST['First_name'];
                    $last_name = $_POST['Last_name'];
                    if(isset($_POST['Newsletter_status'])){
                        $newsletter_status = 1;
                    }
                    else{
                        $newsletter_status = 0;
                    }
                    $current_User->update();
                    header('location:../Profile/Details');
                }
                else{
                    ?>
                    <script>
                        alert("An error has occured");
                        window.location.href=('profile');
                    </script>
                    <?php
                }
            }

        }
    }
}
?>