<?php
function encode($str){
    echo $str."\n";
    $_o = strrev($str);
    echo $_o."\n";
    for($_0 = 0; $_0<strlen($_o); $_0++){
        $_c = substr($_o, $_0, 1);
        $__ = ord($_c) + 1;
        $_c = chr($__);
        $_ = $_.$_c;
    }

    echo $_."\n";
    echo str_rot13(strrev(base64_encode($_))) . "\n";
    return str_rot13(strrev(base64_encode($_)));
}

echo encode('hello') . "\n";

$a = 'iEJqak3pjIaZ0NzLiITLwWTqzqGAtW2oyOTq1A3pzqas';
echo $a . "\n";
echo base64_decode(strrev(str_rot13($a))). "\n";
$b = base64_decode(strrev(str_rot13($a)));
    for($_0 = 0; $_0<strlen($b); $_0++){
        $_c = substr($b, $_0, 1);
        $__ = ord($_c) - 1;
        $_c = chr($__);
        $_ = $_.$_c;
    }
    echo $_."\n";
    echo strrev($_)."\n";

?>
