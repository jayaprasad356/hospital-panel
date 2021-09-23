<?php
session_start();
require_once './config/config.php';
require_once 'includes/auth_validate.php';


// Sanitize if you want
$customer_id = filter_input(INPUT_GET, 'patient_id', FILTER_VALIDATE_INT);
$operation = filter_input(INPUT_GET, 'operation',FILTER_SANITIZE_STRING); 
($operation == 'edit') ? $edit = true : $edit = false;
 $db = getDbInstance();

//Handle update request. As the form's action attribute is set to the same script, but 'POST' method, 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if($_FILES['image']['name']){
        if(function_exists('date_default_timezone_set')) {
            date_default_timezone_set("Asia/Kolkata");
        }
 
		// here is the current date time timestamp
		$time = date('Y-m-d h-i-s');
 
		// here we set it to the image name
		$fileName = $_FILES['image']['name'];
		$fileName = $time."-".$fileName ;
 
		// upload that image into the directory name: images
		move_uploaded_file($_FILES['image']['tmp_name'], "images/".$fileName);
		$image = $fileName;
    

    //Get customer id form query string parameter.
    $customer_id = filter_input(INPUT_GET, 'patient_id', FILTER_SANITIZE_STRING);

    //Get input data
    $data_to_update = filter_input_array(INPUT_POST);
    
    //$data_to_update['updated_at'] = date('Y-m-d H:i:s');
    $data_to_update['image'] = $image;
    $db = getDbInstance();
    $db->where('id',$customer_id);
    $stat = $db->update('checkup', $data_to_update);

    if($stat)
    {
        $_SESSION['success'] = "Checkup updated successfully!";
        //Redirect to the listing page,
        header('location: customers.php');
        //Important! Don't execute the rest put the exit/die. 
        exit();
    }

    }
    else {
            //Get customer id form query string parameter.
        $customer_id = filter_input(INPUT_GET, 'patient_id', FILTER_SANITIZE_STRING);

        //Get input data
        $data_to_update = filter_input_array(INPUT_POST);
        
        //$data_to_update['updated_at'] = date('Y-m-d H:i:s');
        
        $db = getDbInstance();
        $db->where('id',$customer_id);
        $stat = $db->update('checkup', $data_to_update);

        if($stat)
        {
            $_SESSION['success'] = "Checkup updated successfully!";
            //Redirect to the listing page,
            header('location: customers.php');
            //Important! Don't execute the rest put the exit/die. 
            exit();
        }
    }
    
}


//If edit variable is set, we are performing the update operation.
if($edit)
{
    $db->where('id', $customer_id);
    //Get data to pre-populate the form.
    $customer = $db->getOne("checkup");
}
?>


<?php
    include_once 'includes/header.php';
?>
<div id="page-wrapper">
    <div class="row">
        <h2 class="page-header">Update Checkup</h2>
    </div>
    <!-- Flash messages -->
    <?php
        include('./includes/flash_messages.php')
    ?>

    <form class="" action="" method="post" enctype="multipart/form-data" id="contact_form">
    <?php $type = "hidden";?>
        
        <?php
            //Include the common form for add and edit  
            require_once('./forms/checkup_editform.php'); 
        ?>
    </form>
</div>




<?php include_once 'includes/footer.php'; ?>