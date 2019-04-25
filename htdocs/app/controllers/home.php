<?php

class Home extends Controller 
{
    // Main page where the user lands (non-dependent on session)
    public function index($name = '')
    {
        // Get all announcements
        $announcements = $this->model('Announcement');  
        $announcements = $announcements->selectAll();
        $data['announcements'] = (array) $announcements;

        // Get all products
        $products = $this->model('Products');  
        $products = $products->selectAllProducts();
        $data['products'] = (array) $products;

        // Recent products for recently added        
        $recentProducts = $this->model('Products');  
        $recentProducts = $recentProducts->getLatestProducts();
        $data['recentProducts'] = (array) $recentProducts;        

        $this->view('Home/Index', $data);
    }

    public function register()
    {       
        if(isset($_POST['action'])){
            if($_POST['Password'] = $_POST['ConfirmPassword']){
                $user = $this->model('User');
                $user->username = $_POST['Username'];
                $user->password_hash = password_hash($_POST['Password'], PASSWORD_DEFAULT);
                $user->email = $_POST['Email'];
                $user->first_name = $_POST['First_name'];
                $user->last_name = $_POST['Last_name'];
                if(isset($_POST['Newsletter_status'])){
                    $user->newsletter_status = 1;
                }
                else{
                    $user->newsletter_status = 0;
                }
                $user->insert();
                header('location:/Home');
            }
        }
        else{           
            $this->view('Home/Register');
        }
    }

    public function login(){

        /*  if there is a session already and the user tries to access the log in page 
            than the user will automatically be redirected to the home page.
        */
        if(!$_SESSION){

            if(isset($_POST['action'])){
                $user = $this->model('User');
                $theUser = $user->getUser($_POST['Username']);
                if($theUser && password_verify($_POST['Password'], $theUser->password_hash)){
                    $_SESSION['user_id'] = $theUser->user_id;
                    $_SESSION['first_name'] = $theUser->first_name;
                    $_SESSION['username'] = $theUser->username;
                    $_SESSION['type'] = $theUser->type;
                    header('location:/Home');
                }
                else{
                    $this->view('Home/Login');
                }
            }else{
                $this->view('Home/Login');
            }
        }else{
            header('location:/Home');
        }
    }

    // When the user logs out, the session is destroyed and the user is redirected to the home page.
    public function logOut(){
        session_destroy();
        header('location:/Home');
    }
}