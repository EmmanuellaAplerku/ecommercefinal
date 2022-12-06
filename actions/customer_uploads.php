<?php
session_start();
include(dirname(__FILE__)).'/../controllers/customer_controller.php';

if (isset($_POST['submitfiles'])) {
    // echo "hmm";
    $user_id = $_SESSION['customer_id'];
    $desc = $_POST['message'];

    // echo $user_id . '<br>';
    // echo $desc . '<br>';
    $count = 0;
    $target = '../assets/img/customer_uploads/';
    foreach ($_FILES['file']['name'] as $filename) {
        $temp = $target;
        $tmp = $_FILES['file']['tmp_name'][$count];
        $count = $count + 1;
        $temp = $target . basename($filename);
        $move = move_uploaded_file($tmp, $temp);
        if($move){
            // insert into the db
            $result = insert_uploads_ctr($user_id, $desc, $temp);
            if($result){
                $temp = '';
                $tmp = '';
                header('Location: ../view/success.php');
            }else{
                echo "operation failed";
            }
        }
            
        
    }
}
?>
