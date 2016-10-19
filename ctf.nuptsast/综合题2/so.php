<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> <html xmlns="http://www.w3.org/1999/xhtml"> <head> <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> <title>搜索留言</title> </head> <body> <center> <div id="say" name="say" align="left" style="width:1024px">
  <?php
if ($_SERVER['HTTP_USER_AGENT'] != "Xlcteam Browser") {
    echo '万恶滴黑阔，本功能只有用本公司开发的浏览器才可以用喔~';
    exit();
}
$id = $_POST['soid'];
include 'config.php';
include 'antiinject.php';
include 'antixss.php';
$id = antiinject($id);
$con = mysql_connect($db_address, $db_user, $db_pass) or die("不能连接到数据库！！" . mysql_error());
mysql_select_db($db_name, $con);
$id     = mysql_real_escape_string($id);
$result = mysql_query("SELECT * FROM `message` WHERE display=1 AND id=$id");
$rs     = mysql_fetch_array($result);
echo htmlspecialchars($rs['nice']) . ':<br />&nbsp;&nbsp;&nbsp;&nbsp;' . antixss($rs['say']) . '<br />';
mysql_free_result($result);
mysql_free_result($file);
mysql_close($con);
?> </div> </center> </body> </html>
