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
    echo "<script>alert('�ǳƻ��������ݲ���Ϊ�գ�(���������Ҳ�����˿򣬲�����վ�����~ �ðɣ�������ʾ���鿴ҳ��Դ���о�ϲ��)');</script>";
    exit();
}
$con = mysql_connect($db_address, $db_user, $db_pass) or die("�������ӵ����ݿ⣡��" . mysql_error());
mysql_select_db($db_name, $con);
$nice     = mysql_real_escape_string($nice);
$username = mysql_real_escape_string($username);
$userpass = mysql_real_escape_string($userpass);
$result   = mysql_query("SELECT username FROM admin where username='$nice'", $con);
$login    = mysql_query("SELECT * FROM admin where username='$username' AND userpass='$userpass'", $con);
if (mysql_num_rows($result) > 0 && mysql_num_rows($login) <= 0) {
    echo "<script>alert('�ǳ��ѱ�ʹ�ã��������');</script>";
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
echo '<script>alert("������г��ᣬ������Ҫ��������Ա��˲ſ�����ʾ��");window.location = "./index.php"</script>';
?>