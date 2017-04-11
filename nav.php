<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" href="css/style.css?v=3.3">
    <body>
    
    <?
    if ($HTTP_SERVER_VARS["HTTP_X_FORWARDED_FOR"]){
        $ip = $HTTP_SERVER_VARS["HTTP_X_FORWARDED_FOR"];
    }elseif ($HTTP_SERVER_VARS["HTTP_CLIENT_IP"]){
        $ip = $HTTP_SERVER_VARS["HTTP_CLIENT_IP"];
    }elseif ($HTTP_SERVER_VARS["REMOTE_ADDR"]){
        $ip = $HTTP_SERVER_VARS["REMOTE_ADDR"];
    }elseif (getenv("HTTP_X_FORWARDED_FOR")){
        $ip = getenv("HTTP_X_FORWARDED_FOR");
    }elseif (getenv("HTTP_CLIENT_IP")){
        $ip = getenv("HTTP_CLIENT_IP");
    }elseif (getenv("REMOTE_ADDR")){
        $ip = getenv("REMOTE_ADDR");
    }else{
        $ip = "Unknown";
    }

    

    
    ?>
            
            
<div class="nav">
    <ul>
<?
if (isset($_SESSION['user_name'])) {
    //do something
    ?>
    <li class="first">
        <a href="index.php">首页</a>
    </li>
    <li>
        <a href="lists.php">公共清单</a>
    </li>
    <li>
        <?=$_SESSION['user_name']?>
    </li>
    <li>
        <a href="logout.php">退出</a>
    </li>
    <?
}else{
    ?>
    <li class="first">
        <a href="index.php">首页</a>
    </li>
    <li>
        <a href="login.php">登录</a>
    </li>
    <li>
        <a href="lists.php">公共清单</a>
    </li>
    <li>
        匿名用户
    </li>
    <?
}
?>
    </ul>
</div>