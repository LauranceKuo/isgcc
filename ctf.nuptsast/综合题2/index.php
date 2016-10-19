<?php
if (!isset($_COOKIE['username'])) {
    setcookie('username', '');
    setcookie('userpass', '');
}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <title>皇家邮电渗透测试平台</title>
  <style type="text/css">
/*<![CDATA[*/
  <!-- .STYLE1 {font-size: 18px} --> 
  /*]]>*/
  </style>
</head>

<body>
  <center>
    <h1>Xlcteam客户留言板</h1>
    <hr />
    &nbsp;

    <div align="left" style="width:1024px">
      <h3>&nbsp;&nbsp;欢迎来到Xlcteam客户留言板，各位朋友可以在这里留下对本公司的意见或建议。<br />
      <br />
      &nbsp;&nbsp;本组织主要为企业提供网络安全服务。正如公司名所说，本公司是混迹在“娱乐圈”中的公司，喜欢装B，一直摸黑竞争对手，从未被黑。<br />
      &nbsp;&nbsp;本公司的经营理念为“技术好，算个吊，摸黑对手有一套，坑到学生才叫吊~”。<br />
      &nbsp;&nbsp;你别说不爽我们，有本事来爆我们（科哥）菊花~ come on！！</h3>&nbsp;
    </div>
    <hr />

    <div id="msg" name="msg" align="left" style="width:1024px">
      <h2>客户留言：</h2>
      <hr />
      <br />
      <?php //这里输出用户留言 include 'antixss.php'; include 'config.php'; $con = mysql_connect($db_address,$db_user,$db_pass) or die("不能连接到数据库！！".mysql_error()); mysql_select_db($db_name,$con); $page=$_GET['page']; if($page=="" || $page==0){ $page='1'; } $page=intval($page); $start=($page-1)*7; $last=$page*7; $result=mysql_query("SELECT * FROM `message` WHERE display=1 ORDER BY id LIMIT $start,$last"); if(mysql_num_rows($result)>0){ while($rs=mysql_fetch_array($result)){ echo htmlspecialchars($rs['nice'],ENT_QUOTES).":<br />"; echo '&nbsp;&nbsp;&nbsp;&nbsp;'.antixss($rs['say']).'<br /><hr />'; } } mysql_free_result($result); 
      ?>

      <center>
        <p><a href="index.php">首页</a> <?php
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
        ?> <a href="index.php?page=%3C?phpecho%20htmlspecialchars($pagenum);?%3E">尾页</a></p>

        <form method="post" action="./so.php">
          留言搜索(输入ID): <input name="soid" type="text" id="soid" /> <input type="submit" value="搜索" />
        </form>
      </center>
    </div>
    <hr />

    <div id="say" name="say" align="left" style="width:1024px">
      <h2>留言：</h2>

      <form method="post" action="./preview.php">
        <span class="STYLE1">昵称：</span> <input name="nice" type="text" id="nice" <?php //这里是获取昵称的cookie再显示 value="" $username=$_COOKIE['username']; $username=htmlspecialchars($username,ENT_QUOTES); echo ' value="'.$username.'" '; 
        ?> />

        <p class="STYLE1">内容：<br />
        &nbsp;&nbsp;&nbsp;
        <textarea style="width:800px;height:100px" name="usersay" id="usersay">
</textarea> <label><br />
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input onclick="return checkform()" type="submit" name="Submit" style="width:600px;height:50px" value="预览" /></label><br />
        &nbsp;&nbsp;&nbsp;&nbsp;(可用[a]网址[/a]代替&lt;a href=&quot;网址&quot; &gt;网址&lt;/a&gt;)</p>
      </form>
    </div>

    <div>
      <h4><a href="./about.php?file=sm.txt">本CMS说明</a></h4>
    </div>

    <div align="center">
      鸣谢·红客联盟(HUC)官网<br />
    </div>
  </center><script type="text/javascript">
//<![CDATA[
  function checkform(){ if(say.nice.value=="" || say.usersay.value==""){ alert("昵称或留言内容不能为空"); return false; }else{ return true; } 
  //]]>
  </script>
</body>
</html>
