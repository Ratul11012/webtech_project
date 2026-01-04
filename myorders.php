<?php
session_start();  

include '../db.php';

if (isset($_SESSION['user_id'])) {

    if($_SESSION['user_role'] == 'user') {
        $user_id = $_SESSION['user_id'];

    $Sql="select * from products";
    $result=mysqli_query($conn,$Sql);

    if(!$result){
        echo"ERROR! : {$conn->error}";
    }
    else{
       
    }
    }
    else{
        header("Location: admin/dashboard.php");
    }

}
else{

    header("Location: ../index.php");
    exit();
}

?>


