<?
session_start();
require "conn.php";
require "nav.php";
if (isset($_GET['id'])) {
    $list_id=$_GET['id'];
    $sql ="SELECT users.id as user_id,users.name as user_name,lists.title as list_title,lists.id as list_id FROM `users`,`lists` WHERE users.id=lists.user_id and `lists`.id=$list_id";
    $result = mysql_query($sql,$conn); //查询
    if($row = mysql_fetch_array($result)){
    ?>
    <h3><?=$row['list_title']?></h3>

    created by <?=$row['user_name']?>


    <?
    if (isset($_SESSION['user_id'])) {
        //do something
        if($row['user_id']===$_SESSION['user_id']){
            ?>
            <div class="box-outer">
        <div class="box-inner">
            <div class="boxbar">
                <h2>发布</h2>
                <!--<a data-cmd="x-wot" href="#" class="closebutton"></a>-->
            </div>
            <div class="boxcontent">
                <div id="wot-cnt">
                    <h4>你的ip：<?=$ip?> 已被我们记录，切勿发布违法内容！</h4>
                    <form action="create_task.php" method="post">
                        <div class="form-group">
                            <input type="hidden" name="list_id" value="<?=$list_id?>">
                            <input class="form-control" placeholder="任务名称" name="title" type="text">
                        </div>
                        <input class="btn btn-primary" type="submit" value="添加任务">
                    </form>
                  </form>
                </div>
            </div>
        </div>
    </div>
            
            <?
        }
    }
    ?>


    <ul class="list-group">
    <?
    $sql="select * from tasks where tasks.list_id=$list_id";
    $result = mysql_query($sql,$conn);
    while($row = mysql_fetch_array($result)){
        ?>
        <li>
            <?=$row['title']?>
        </li>
        <?
    }
    ?>
    </ul>
    <?
    }
}
?>


<?

?>


<?
require "footer.php";
mysql_close();
?>