<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> <?php
$file = $_GET['file'];
if ($file == "" || strstr($file, 'config.php')) {
    echo "file��������Ϊ�գ�";
    exit();
} else {
    $cut = strchr($file, "loginxlcteam");
    if ($cut == false) {
        $data = file_get_contents($file);
        $date = htmlspecialchars($data);
        echo $date;
    } else {
        echo "<script>alert('����Ŀ¼����ֹ�鿴�����ǡ�����')</script>";
    }
}