<?php
class LoginCore{
	public static function isLoggedIn(){
		if(isset($_SESSION['user_id'])){
			return true;
		}
		else{
            header('Location:/home/login');
		    return false;
        }
	}

	public static function isAdmin(){
		if(isset($_SESSION['user_id']) && $_SESSION['type'] == 1){
			return true;
		}
		else{
			header('Location:/home');
		    return false;
		}
	}
}
?>