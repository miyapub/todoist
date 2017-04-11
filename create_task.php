<?
session_start();
require "conn.php";
require "authorize.php";
require "nav.php";
?>


<?
$method = $_SERVER['REQUEST_METHOD'];
if($method==='POST'){
    
    ?>

    <?
    $title=mysql_real_escape_string($_POST['title']);
    $list_id=mysql_real_escape_string($_POST['list_id']);
    ?>

    <?
    
    $sql="INSERT INTO `tasks` (`id`, `title`, `list_id`, `time`) VALUES (NULL, '$title', '$list_id', CURRENT_TIMESTAMP);";
    $result = mysql_query($sql,$conn);
    //$list_id=mysql_insert_id($conn);
    //echo $sql;
    echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"0;url='list.php?id=$list_id'\">";
    ?>

    <?
}
?>

<?
if($method==='GET'){
?>

    <?
    $list_id=$_GET['list_id'];
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
                    <form action="" method="post">
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
?>


<?
require "footer.php";
mysql_close();
?>