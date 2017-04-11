<?
session_start();
require "conn.php";
require "nav.php";
?>




<div class="box-outer">
    <div class="box-inner">
        <div class="boxbar">
            <h2><a class="post" href="lists.php">公开清单</a></h2>
            <div class="opts-btn">
                <a class="post" href="create_list.php">发布</a>
            </div>
        </div>

        <div class="boxcontent">
            <div id="wot-cnt">
                <ul>
                <?
                $sql ="SELECT users.id as user_id,users.name as user_name,lists.title as list_title,lists.id as list_id FROM `users`,`lists` WHERE is_public=1 and users.id=lists.user_id"; //SQL语句
                $result = mysql_query($sql,$conn); //查询
                while($row = mysql_fetch_array($result)){
                    ?>
                    <li>
                        <a href="list.php?id=<?=$row['list_id']?>"><?=$row['list_title']?></a>
                    </li>
                <?
                }
                ?>
                </ul>
            </div>
        </div>
    </div>
</div>




<?
require "footer.php";
mysql_close();
?>
