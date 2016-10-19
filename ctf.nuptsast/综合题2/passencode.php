<?php
function passencode($content)
{
    //$pass  = urlencode($content);
    $array = str_split($content);
    $pass  = "";
    for ($i = 0; $i < count($array); $i++) {
        if ($pass != "") {
            $pass = $pass . " " . (string) ord($array[$i]);
        } else {
            $pass = (string) ord($array[$i]);
        }
    }
    return $pass;
}
?>