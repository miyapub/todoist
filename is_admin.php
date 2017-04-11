<?
session_start();
if ($_SESSION['is_admin']===1 || $_SESSION['is_admin']==="1") {
}else{
    echo "U A not admin";
    exit;
    //header("location: login.php");
}