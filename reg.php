<?
session_start();
require "conn.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>reg</title>
    <link rel="stylesheet" href="css/style.css?v=3.3">
    <body>

<?
$name=mysql_real_escape_string($_POST["name"]);
$pass=mysql_real_escape_string($_POST["pass"]);
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
        
        <div class="box-outer">
            <div class="box-inner">
                <div class="boxbar">
                    <h2>注册成功</h2>
                    <!--<a data-cmd="x-wot" href="#" class="closebutton"></a>-->
                </div>
                <div class="boxcontent">
                    <div id="wot-cnt">
                            注册成功，请<a href="login.php">登录</a>。
                    </div>
                </div>
            </div>
        </div>
        <?
    }else{
        ?>
        
        <div class="box-outer">
            <div class="box-inner">
                <div class="boxbar">
                    <h2>用户名已经被注册了，请重新注册</h2>
                    <!--<a data-cmd="x-wot" href="#" class="closebutton"></a>-->
                </div>
                <div class="boxcontent">
                    <div id="wot-cnt">
                            <form method="post">
                                <div class="form-group">
                                    <input class="form-control" placeholder="账号" name="name" type="text">
                                </div>
                                <div class="form-group">
                                    <input <input class="form-control" placeholder="密码" name="pass" type="text">
                                </div>
                                <input class="btn btn-primary" type="submit" value="注册" />
                            </form>
                    </div>
                </div>
            </div>
        </div>
        <?
    }
    ?>
    <?
}else{
    ?>

    <div class="box-outer">
            <div class="box-inner">
                <div class="boxbar">
                    <h2>注册</h2>
                    <!--<a data-cmd="x-wot" href="#" class="closebutton"></a>-->
                </div>
                <div class="boxcontent">
                    <div id="wot-cnt">
                            <form method="post">
                                <div class="form-group">
                                    <input class="form-control" placeholder="账号" name="name" type="text">
                                </div>
                                <div class="form-group">
                                    <input <input class="form-control" placeholder="密码" name="pass" type="text">
                                </div>
                                <input class="btn btn-primary" type="submit" value="注册" />
                            </form>
                    </div>
                </div>
            </div>
        </div>
    <?
}
?>

<?
mysql_close();
?>

    </body>
</html>