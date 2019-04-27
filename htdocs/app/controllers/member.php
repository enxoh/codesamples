<?php

class Member extends Controller{
    public function index(){
        if(LoginCore::isLoggedIn()){

            $usermembership = $this->model('Membership');
            $theUser = $usermembership->getMembership($_SESSION['user_id']);
            $data = (array) $theUser;

            $this->view('Member/index',$data);
        }
    }


    public function signup(){


        if(isset($_POST['action'])){

            $member = $this->model('Membership');
            $member->mem_status = 1;
            $member->expire_date = date('Y-m-d', strtotime(date("Y-m-d"). ' + 30 days'));
            $member->begin_date = date("Y-m-d");
            $member->pay_option_id = $_POST['pay_option_id'];
            echo $_POST['pay_option_id'];
            $member->insert();
            header('location:/Home');

        }
        else{

            $payment_option = $this->model('Payment');
            $options = $payment_option->getPaymentInfo($_SESSION['user_id']);

            $data = (array) $options;


            $this->view('Member/signup',$data);
        }

    }
}