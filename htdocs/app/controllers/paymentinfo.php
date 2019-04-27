<?php

class PaymentInfo extends Controller{
	function index(){
		if(loginCore::isLoggedIn()){

			$payment_option = $this->model('Payment');
			$options = $payment_option->getPaymentInfo($_SESSION['user_id']);

			$data = (array) $options;

			$this->view('Payment/index',$data);

            if(isset($_POST['action'])){
                $payment = $this->model('Payment');
                $payment->card_type = $_POST['card_type'];
                $payment->card_name = $_POST['card_name'];
                $payment->card_number = $_POST['card_number'];
                $payment->exp_date = $_POST['month'] . '/' . $_POST['year'];

                $payment->addPayment();
                ?>
                <script>
                    window.location.href=('index');
                </script>
                <?php
            }
		}
	}

    function removePayment($id){

        if(isset($_GET['id'])){
            $payment = $this->model('Payment');
            $id = $_GET['id'] ;           
            $payment->removePayment($id);

            header('location:/paymentinfo/index');
        }
    }
}

?>