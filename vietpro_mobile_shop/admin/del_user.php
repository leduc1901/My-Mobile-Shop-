<?php 
session_start();
define("TEMPLATE",true);
include_once("../config/connect.php");
if(isset($_SESSION['email']) && isset($_SESSION['password']) )
{
    
        $user_id = $_GET['user_id'];
        $sql =  "DELETE FROM user WHERE user_id=$user_id";
        $query = mysqli_query($conn , $sql);
        header('location: index.php?page_layout=user');
    
}
else 
{
    header('location:index.php');
}
?>