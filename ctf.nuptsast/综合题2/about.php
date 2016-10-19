<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> <?php
$file = $_GET['file'];
if ($file == "" || strstr($file, 'config.php')) {
    echo "file参数不能为空！";
    exit();
} else {
    $cut = strchr($file, "loginxlcteam");
    if ($cut == false) {
        $data = file_get_contents($file);
        $date = htmlspecialchars($data);
        echo $date;
    } else {
        echo "<script>alert('敏感目录，禁止查看！但是。。。')</script>";
    }
}