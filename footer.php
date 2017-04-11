<?
$sql="select count(id) as count from users";
$result = mysql_query($sql,$conn);
$rows = mysql_fetch_array($result);
$CurrentUsers=$rows['count'];

$sql="select count(id) as count from lists";
$result = mysql_query($sql,$conn);
$rows = mysql_fetch_array($result);
$CurrentLists=$rows['count'];
?>


<div class="box-outer top-box" id="site-stats">
    <div class="box-inner">
        <div class="boxbar">
            <h2>Stats</h2>
        </div>
        <div class="boxcontent">
            <div class="stat-cell"><b>清单:</b> <?=$CurrentLists?></div>
            <div class="stat-cell"><b>用户:</b> <?=$CurrentUsers?></div>
        </div>
    </div>
</div>
<div class="footer">
    <span>Copyright © 2003-2017 zhudou.org All rights reserved.</span>
</div>


</body>
</html>