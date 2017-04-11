<?
session_start();
require "conn.php";
require "authorize.php";
require "nav.php";
?>


<div>
    <a href="create_list.php">创建列表</a>
<?
if (isset($_SESSION['user_id'])) {
    //do something
    $user_id=$_SESSION['user_id']
    ?>
    
    <ul class="list-group">
    <?
    $sql ="SELECT users.id as user_id,users.name as user_name,lists.title as list_title,lists.id as list_id FROM `users`,`lists` WHERE users.id=$user_id and users.id=lists.user_id"; //SQL语句
    $result = mysql_query($sql,$conn); //查询
    while($row = mysql_fetch_array($result)){
        ?>
        <li class="list-group-item">
            <a href="list.php?id=<?=$row['list_id']?>"><?=$row['list_title']?></a>
        </li>
    <?
    }
    ?>
    </ul>
    <?
?>
    <?
}else{
    //public
    ?>
    <?
}
?>
</div>


<?
require "footer.php";
mysql_close();
?>
