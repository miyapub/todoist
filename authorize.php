<?
session_start();
if (isset($_SESSION['user_id'])) {
    //
    $user_id=$_SESSION['user_id'];
    $user_name=$_SESSION['name'];
    $is_admin=$_SESSION['is_admin'];
}else{
    //public
    header("location: login.php");
}