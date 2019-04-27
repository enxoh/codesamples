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

        if(!LoginCore::isAdmin()){
            return header('home/index');
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
            $product->insert_date = date('Y-m-d H:i:s');
            $product->insert();
            header('location:/admin/viewProducts');

        }
        else{
            $categoryList = $this->model('Categories');  
            $categoryList = $categoryList->selectAllCategories();
            $data = (array) $categoryList;

        	$this->view('Admin/addProducts', $data);
        }
	}

    // View all products 
    function viewProducts(){

        if(!LoginCore::isAdmin()){
            return header('home/index');
        }  
     
        // Pass data to the view
        $products = $this->model('Products');  
        $products = $products->selectAllProducts();
        $data = (array) $products;

        $this->view('Admin/viewProducts', $data);

    }

    // Edit selected product
    function editProduct(){

        if(!LoginCore::isAdmin()){
            $this->view('home/index');
        }        
        
        // If the product ID is set
        if(isset($_GET['id'])){            
            $products = $this->model('Products');
            $id = $_GET['id'] ;           
            $theProduct = $products->getProduct($id);

            if(isset($_POST['action'])){
                
                $theProduct->product_name = $_POST['Product_Name'];
                $theProduct->category = $_POST['Product_Category'];
                $theProduct->product_description = $_POST['Product_Description'];
                $theProduct->product_quantity = $_POST['Product_Quantity'];
                $theProduct->product_status = $_POST['Product_Status'];
                $theProduct->product_price = $_POST['Product_Price'];
                $theProduct->sale_price = $_POST['Product_Sale'];   

                $theProduct->editProduct();
                
                // Notification
                ?>
                <script>
                    alert("Product updated!");
                    window.location.href=('viewProducts');
                </script>
                <?php
            }  

            $data['product'] = (array) $theProduct;     

            $categoryList = $this->model('Categories');  
            $categoryList = $categoryList->selectAllCategories();
            $data['category'] = (array) $categoryList;              

            $this->view('Admin/editProduct', $data);
        }
    }

    // Delete selected product
    function deleteProduct($id){

        if(!LoginCore::isAdmin()){
            return header('home/index');
        }  

        if(isset($_GET['id'])){            
            $products = $this->model('Products');
            $id = $_GET['id'] ;           
            $products->deleteSelectedProduct($id);

            header('location:/admin/viewProducts');
        }

    }

    // -------------------------- End of Products -------------------------- //

    // ---------------------------- Categories ----------------------------- //

    // View all categories
    function category(){
        if(!LoginCore::isAdmin()){
            $user = $this->model('User');
            $current_User = $user->getUser($_SESSION['username']);
            $this->view('home/index');
        }

        // Pass data to the view
        $categoryList = $this->model('Categories');  
        $categoryList = $categoryList->selectAllCategories();
        $data = (array) $categoryList;

        $this->view('Admin/viewCategories', $data);
    }

    // Create category
    function addCategory(){
        if(!LoginCore::isAdmin()){
            $user = $this->model('User');
            $current_User = $user->getUser($_SESSION['username']);
            
            $this->view('home/index');
        }

        if(isset($_POST['action'])){
            $categoryList = $this->model('Categories'); 
            $categoryList->category_name = $_POST['Category_name'];
            $categoryList->category_description = $_POST['Category_description'];            

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
            $uniq_categoryImg = uniqid('', true). "." . $file_convertedExtension;

            // Make sure extension is allowed*
            if(in_array($file_convertedExtension, $possible_extensions)){
                $file_saveDestination = getcwd().'/images/categories/' . $uniq_categoryImg;    
                move_uploaded_file($file_tempDir, $file_saveDestination);
                $categoryList->category_image = $uniq_categoryImg;
            }
            else{
                 ?>
                    <script>
                        alert("An error has occured");
                    </script>
                <?php
            }            
            
            $categoryList->insertCategory();

            header('location:/admin/category');

        }
        else{
            $this->view('Admin/addCategory');
        }
    }

    // Delete Category
    function deleteCategory($id){

        if(!LoginCore::isAdmin()){
            return header('home/index');
        }  

        if(isset($_GET['id'])){
            
            $category = $this->model('Categories');
            $id = $_GET['id'] ;           
            $category->deleteSelectedCategory($id);

            header('location:/admin/category');
        }
    }

    // ------------------------- End of Categories ------------------------- //

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
            $announcement->date_added = date('Y-m-d H:i:s');
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
            return header('home/index');
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
            return header('home/index');
        }  

        if(isset($_GET['id'])){
            
            $announcements = $this->model('Announcement');
            $id = $_GET['id'] ;           
            $announcements->deleteAnnouncement($id);

            header('location:/admin/announcements');
        }
    }

    // ---------------------- End of Announcements ---------------------- //

    // --------------------------- Newsletters -------------------------- //

    function newsletter(){

        if(!LoginCore::isAdmin()){
            return header('home/index');
        }  
     
        // Pass data to the view
        $newsletterList = $this->model('User');  
        $newsletterList = $newsletterList->getMailList();
        $data = (array) $newsletterList;

        $this->view('Admin/newsletterList', $data);
    }

    function createNewsletter(){   

        $newsletterList = $this->model('User');  
        $newsletterList = $newsletterList->getMailList();
        $data = (array) $newsletterList;

        // Get all email addresses for newsletter
        foreach ($data as $row) {
            $emails[] = $row['email'];                  
        }
        $toRecipients = implode(", ", $emails); //emails seperated        

        // Send the newsletter on action
        if(isset($_POST['action'])){

            // Send Mail
            if(mail($toRecipients, $_POST['Email_subject'], $_POST['Email_body'])){
                ?>
                    <script>
                        alert("Newsletter has been sent");
                        window.location.href=('newsletter');
                    </script>
                <?php           
            }
            else{
                ?>
                    <script>
                        alert("Something went wrong while sending newsletter!");
                        window.location.href=('newsletter');
                    </script>
                <?php
            }       
        }
        $this->view('Admin/newNewsletter'); 
    }

    // ------------------------ End of Newsletter ----------------------- //
}
?>