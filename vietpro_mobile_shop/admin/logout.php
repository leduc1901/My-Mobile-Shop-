<?php
session_start();
if(isset($_SESSION['email']))
{
    unset($_SESSION['email']);
    header("location:index.php");
}