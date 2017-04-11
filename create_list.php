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
    $is_public=mysql_real_escape_string($_POST['is_public']);
    if($is_public==="on"){
        $is_public=1;
    }else{
        $is_public=0;
    }
    $sql="INSERT INTO `lists` (`id`, `is_public`,`title`, `user_id`, `time`) VALUES (NULL,'$is_public', '$title', '$user_id', CURRENT_TIMESTAMP);";
    //$sql=mysql_real_escape_string($sql);
    $result = mysql_query($sql,$conn);
    $list_id=mysql_insert_id($conn);
    echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"0;url='list.php?id=$list_id'\">";
    ?>

    <?=$title?>

    <?
}else{
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
                            <input class="form-control" placeholder="列表名称" name="title" type="text">
                            <input type="checkbox" name="is_public"> 是否是公开的
                        </div>
                        <input class="btn btn-primary" type="submit" value="添加列表">
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