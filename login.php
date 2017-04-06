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
    if($num_rows===1){
        $row = mysql_fetch_array($result);
        if($row['pass']===$pass){
            $_SESSION['user_id']=$row['id'];
            $_SESSION['user_name']=$row['name'];
            header("location: index.php");
        }else{
            ?>
            密码错误，请重新<a href="login.php">登录</a>。
            <?
        }
    }else{
        ?>
        没有该用户，请立刻<a href="reg.php">注册</a>
        <?
    }
    ?>
    <?
}else{
    ?>
    <form method="post">
    <input name="name" type="text">
    <input name="pass" type="text">
    <input type="submit" value="登录" />
    </form>
    <a href="reg.php">注册</a>
    <?
}
mysql_close();
?>