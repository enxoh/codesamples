<?php
class Admin extends Controller{

	function index(){
		if(LoginCore::isAdmin()){
            $user = $this->model('User');
            $current_User = $user->getUser($_SESSION['username']);
            $data =  (array) $current_User;
            $this->view('Admin/adminIndex',$data);
        }
	}

    // --------------------------- Products --------------------------- //   

    //Add products to database
	function addProducts(){

        if(LoginCore::isAdmin()){
            $user = $this->model('User');
            $current_User = $user->getUser($_SESSION['username']);
            $data =  (array) $current_User;
            $this->view('Admin/addProducts',$data);
        }

        if(isset($_POST['action'])){
        	$product = $this->model('Products');
        	$product->product_name = $_POST['Product_Name'];
        	$product->category = $_POST['Product_Category'];
        	$product->product_description = $_POST['Product_Description'];
        	$product->product_quantity = $_POST['Product_Quantity'];
        	$product->product_status = $_POST['Product_Status'];
        	$product->product_price = $_POST['Product_Price'];
        	$product->sale_price = $_POST['Product_Sale'];

        	// Image upload
        	$possible_extensions = array('gif', 'png', 'jpg', 'jpeg'); // allowed extension

        	$file = $_FILES['file']; //get file
        	$file_name = $_FILES['file']['name']; //get file name
        	$file_tempDir = $_FILES['file']['tmp_name']; // temp name
        	$file_size = $_FILES['file']['size']; // file size
        	$file_errorMsg = $_FILES['file']['error']; // error msg
        	$file_type = $_FILES['file']['type']; //file type
        	$file_convertedExtension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION)); // to lower to avoid upper case extensions

        	//Allow files to have the same name
        	$file_uniq = uniqid('', true). "." . $file_convertedExtension;

        	// Make sure extension is allowed*
        	if(in_array($file_convertedExtension, $possible_extensions)){
        		$file_saveDestination = getcwd().'/images/products/' . $file_uniq;    
        		move_uploaded_file($file_tempDir, $file_saveDestination);
        	}
        	else{
        		echo "This type of file extension is not allowed.";
        	}
			
        	
			$product->product_image = $file_uniq;
            $product->insert();
            header('location:/admin/index');

        }
        else{
        	$this->view('Admin/addProducts');
        }
	}

    // -------------------------- End of Products -------------------------- //

    // --------------------------- Announcements --------------------------- //

    function createAnnouncement(){
        if(!LoginCore::isAdmin()){
            $user = $this->model('User');
            $current_User = $user->getUser($_SESSION['username']);
            $data =  (array) $current_User;
            $this->view('home/index');
        }

        if(isset($_POST['action'])){
            $announcement = $this->model('Announcement');
            $announcement->announcement_name = $_POST['Announcement_Name'];
            $announcement->announcement_message = $_POST['Announcement_Msg'];
            //$announcement->announcement_date = date("Y-m-d");

            // Image upload for annoncement
            $possible_extensions = array('gif', 'png', 'jpg', 'jpeg'); // allowed extension

            $file = $_FILES['img']; //get file
            $file_name = $_FILES['img']['name']; //get file name
            $file_tempDir = $_FILES['img']['tmp_name']; // temp name
            $file_size = $_FILES['img']['size']; // file size
            $file_errorMsg = $_FILES['img']['error']; // error msg
            $file_type = $_FILES['img']['type']; //file type
            $file_convertedExtension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION)); // to lower to avoid upper case extensions

            //Allow files to have the same name
            $uniq_announcementImg = uniqid('', true). "." . $file_convertedExtension;

            // Make sure extension is allowed*
            if(in_array($file_convertedExtension, $possible_extensions)){
                $file_saveDestination = getcwd().'/images/announcements/' . $uniq_announcementImg;    
                move_uploaded_file($file_tempDir, $file_saveDestination);
                $announcement->announcement_image = $uniq_announcementImg;
            }
            else{
                 ?>
                    <script>
                        alert("An error has occured");
                       // window.location.href=('index');
                    </script>
                <?php
            }
            
            
            //$announcement->announcement_image = $uniq_announcementImg;
            $announcement->insertAnnouncement();

            header('location:/admin/index');

        }
        else{
            $this->view('Admin/addAnnouncement');
        }
    }

    // View Announcements
    function announcements(){

        if(!LoginCore::isAdmin()){
            $this->view('home/index');
        }
     
        // Pass data to the view
        $announcements = $this->model('Announcement');  
        $announcements = $announcements->selectAll();
        $data = (array) $announcements;

        $this->view('Admin/viewAnnouncements', $data);
    }

    // Delete Annoucements
    function deleteAnnouncement($id){

        if(!LoginCore::isAdmin()){
            $this->view('home/index');
        }

        if(isset($_GET['id'])){
            
            $announcements = $this->model('Announcement');
            $id = $_GET['id'] ;           
            $announcements->deleteAnnouncement($id);

            header('location:/admin/announcements');
        }
    }

    // ---------------------- End of Announcements ---------------------- //
}
?>