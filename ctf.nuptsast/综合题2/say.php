<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> <?php
include 'config.php';
$nice = $_POST['nice'];
$say  = $_POST['usersay'];
if (!isset($_COOKIE['username'])) {
    setcookie('username', $nice);
    setcookie('userpass', '');
}
$username = $_COOKIE['username'];
$userpass = $_COOKIE['userpass'];
if ($nice == "" || $say == "") {
    echo "<script>alert('昵称或留言内容不能为空！(如果有内容也弹出此框，不是网站问题喔~ 好吧，给个提示：查看页面源码有惊喜！)');</script>";
    exit();
}
$con = mysql_connect($db_address, $db_user, $db_pass) or die("不能连接到数据库！！" . mysql_error());
mysql_select_db($db_name, $con);
$nice     = mysql_real_escape_string($nice);
$username = mysql_real_escape_string($username);
$userpass = mysql_real_escape_string($userpass);
$result   = mysql_query("SELECT username FROM admin where username='$nice'", $con);
$login    = mysql_query("SELECT * FROM admin where username='$username' AND userpass='$userpass'", $con);
if (mysql_num_rows($result) > 0 && mysql_num_rows($login) <= 0) {
    echo "<script>alert('昵称已被使用，请更换！');</script>";
    mysql_free_result($login);
    mysql_free_result($result);
    mysql_close($con);
    exit();
}
mysql_free_result($login);
mysql_free_result($result);
$say = mysql_real_escape_string($say);
mysql_query("insert into message (nice,say,display) values('$nice','$say',0)", $con);
mysql_close($con);
echo '<script>alert("构建和谐社会，留言需要经过管理员审核才可以显示！");window.location = "./index.php"</script>';
?>