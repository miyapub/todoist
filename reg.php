<?
session_start();
require "conn.php";
$name=$_POST["name"];
$pass=$_POST["pass"];
$method = $_SERVER['REQUEST_METHOD'];
if($method==='POST'){
    $sql="SELECT * FROM `users` where `users`.name='$name'";
    $result = mysql_query($sql,$conn);
    $num_rows = mysql_num_rows($result);
    if($num_rows===0){
        //register
        $sql="INSERT INTO `users` (`id`, `name`, `pass`, `time`) VALUES (NULL, '$name', '$pass', CURRENT_TIMESTAMP);";
        $result = mysql_query($sql,$conn);
        //$user_id=mysql_insert_id($conn);
        //$_SESSION['user_id']=$user_id;
        //header("location: login.php");
        //echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"5;url='login.php'\">";
        ?>
        注册成功，请<a href="login.php">登录</a>。
        <?
    }else{
        ?>
        用户名已经被注册了，请重新注册
        <form method="post">
        <input name="name" type="text">
        <input name="pass" type="text">
        <input type="submit" value="注册" />
        </form>
        <?
    }
    ?>
    <?
}else{
    ?>
    <form method="post">
    <input name="name" type="text">
    <input name="pass" type="text">
    <input type="submit" value="reg" />
    </form>
    <?
}
mysql_close();
?>