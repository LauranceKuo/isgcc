<?php
if (!isset($_COOKIE['username'])) {
    setcookie('username', '');
    setcookie('userpass', '');
}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <title>�ʼ��ʵ���͸����ƽ̨</title>
  <style type="text/css">
/*<![CDATA[*/
  <!-- .STYLE1 {font-size: 18px} --> 
  /*]]>*/
  </style>
</head>

<body>
  <center>
    <h1>Xlcteam�ͻ����԰�</h1>
    <hr />
    &nbsp;

    <div align="left" style="width:1024px">
      <h3>&nbsp;&nbsp;��ӭ����Xlcteam�ͻ����԰壬��λ���ѿ������������¶Ա���˾��������顣<br />
      <br />
      &nbsp;&nbsp;����֯��ҪΪ��ҵ�ṩ���簲ȫ�������繫˾����˵������˾�ǻ켣�ڡ�����Ȧ���еĹ�˾��ϲ��װB��һֱ���ھ������֣���δ���ڡ�<br />
      &nbsp;&nbsp;����˾�ľ�Ӫ����Ϊ�������ã�����������ڶ�����һ�ף��ӵ�ѧ���Žе�~����<br />
      &nbsp;&nbsp;���˵��ˬ���ǣ��б����������ǣ��Ƹ磩�ջ�~ come on����</h3>&nbsp;
    </div>
    <hr />

    <div id="msg" name="msg" align="left" style="width:1024px">
      <h2>�ͻ����ԣ�</h2>
      <hr />
      <br />
      <?php //��������û����� include 'antixss.php'; include 'config.php'; $con = mysql_connect($db_address,$db_user,$db_pass) or die("�������ӵ����ݿ⣡��".mysql_error()); mysql_select_db($db_name,$con); $page=$_GET['page']; if($page=="" || $page==0){ $page='1'; } $page=intval($page); $start=($page-1)*7; $last=$page*7; $result=mysql_query("SELECT * FROM `message` WHERE display=1 ORDER BY id LIMIT $start,$last"); if(mysql_num_rows($result)>0){ while($rs=mysql_fetch_array($result)){ echo htmlspecialchars($rs['nice'],ENT_QUOTES).":<br />"; echo '&nbsp;&nbsp;&nbsp;&nbsp;'.antixss($rs['say']).'<br /><hr />'; } } mysql_free_result($result); 
      ?>

      <center>
        <p><a href="index.php">��ҳ</a> <?php
        $contents = mysql_query("SELECT * FROM `message` WHERE display=1");
        if (mysql_num_rows($contents) > 0) {
            $num = mysql_num_rows($contents);
            if ($num % 8 != 0) {
                $pagenum = intval($num / 8) + 1;
            } else {
                $pagenum = intval($num / 8);
            }
            for ($i = 1; $i <= $pagenum; $i++) {
                echo '<a href="index.php?page=' . htmlspecialchars($i) . '">' . htmlspecialchars($i) . '</a>&nbsp;';
            }
        }
        mysql_free_result($contents);
        mysql_close($con);
        ?> <a href="index.php?page=%3C?phpecho%20htmlspecialchars($pagenum);?%3E">βҳ</a></p>

        <form method="post" action="./so.php">
          ��������(����ID): <input name="soid" type="text" id="soid" /> <input type="submit" value="����" />
        </form>
      </center>
    </div>
    <hr />

    <div id="say" name="say" align="left" style="width:1024px">
      <h2>���ԣ�</h2>

      <form method="post" action="./preview.php">
        <span class="STYLE1">�ǳƣ�</span> <input name="nice" type="text" id="nice" <?php //�����ǻ�ȡ�ǳƵ�cookie����ʾ value="" $username=$_COOKIE['username']; $username=htmlspecialchars($username,ENT_QUOTES); echo ' value="'.$username.'" '; 
        ?> />

        <p class="STYLE1">���ݣ�<br />
        &nbsp;&nbsp;&nbsp;
        <textarea style="width:800px;height:100px" name="usersay" id="usersay">
</textarea> <label><br />
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input onclick="return checkform()" type="submit" name="Submit" style="width:600px;height:50px" value="Ԥ��" /></label><br />
        &nbsp;&nbsp;&nbsp;&nbsp;(����[a]��ַ[/a]����&lt;a href=&quot;��ַ&quot; &gt;��ַ&lt;/a&gt;)</p>
      </form>
    </div>

    <div>
      <h4><a href="./about.php?file=sm.txt">��CMS˵��</a></h4>
    </div>

    <div align="center">
      ��л���������(HUC)����<br />
    </div>
  </center><script type="text/javascript">
//<![CDATA[
  function checkform(){ if(say.nice.value=="" || say.usersay.value==""){ alert("�ǳƻ��������ݲ���Ϊ��"); return false; }else{ return true; } 
  //]]>
  </script>
</body>
</html>
