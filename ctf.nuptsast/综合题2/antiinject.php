<?php
function antiinject($content)
{
    $keyword = array(
        "select",
        "union",
        "and",
        "from",
        ' ',
        "'",
        ";",
        '"',
        "char",
        "or",
        "count",
        "master",
        "name",
        "pass",
        "admin",
        "+",
        "-",
        "order",
        "="
    );
    $info    = strtolower($content);
    for ($i = 0; $i <= count($keyword); $i++) {
        $info = str_replace($keyword[$i], '', $info);
    }
    return $info;
}
?>