<?
session_start();
require "conn.php";
$sql ="SELECT * FROM `lists`,`users` where `lists`.user_id=`users`.id"; //SQL语句
$result = mysql_query($sql,$conn); //查询
while($row = mysql_fetch_array($result)){
    ?>
    <?=$row['title']?>
    <?
}
mysql_close();
?>


<?
if (isset($_SESSION['user_name'])) {
    //do something
    ?>
    <?=$_SESSION['user_name']?>
    <a href="logout.php">退出</a>
    <?
}else{
    ?>
    <a href="login.php">登录</a>
    <?
}
?>
