<?php
/**
--------------------------------------------------------------------------
*/
?>

<?php
/**
 * @return Database
 */
function addslash2_get_db()
{
    static $as2db = true;
    if ($as2db === true) {
        if (false === ($as2db = gdo_db_instance('localhost', ADDSLASH2_USERNAME, ADDSLASH2_PASSWORD, ADDSLASH2_DATABASE, GWF_DB_TYPE))) {
            echo htmlDisplayError('Can`t connect to database.');
        } else {
            $as2db->setLogging(false);
            $as2db->setEMailOnError(false);
        }
    }

    return $as2db;
}
?>

<?php
/**
 * Output the nice score table.
*/
function addslash2_sort($orderby, $dir)
{
    if (false === ($db = addslash2_get_db())) {
        return false;
    }
    static $whitelist = array(1, 3, 4, 5);
    static $names = array(1 => 'Username', 3 => 'Apples', 4 => 'Bananas', 5 => 'Cherries');

    $dir = GDO::getWhitelistedDirS($dir, 'DESC');

    if (!in_array($orderby, $whitelist)) {
        return htmlDisplayError('Error 1010101: Not in whitelist.');
    }

    $orderby = $db->escape($orderby);

    $query = "SELECT * FROM users ORDER BY $orderby $dir LIMIT 10";
    if (false === ($rows = $db->queryAll($query))) {
        return false;
    }

    $headers = array(
        array('#'),
        array('Username', '1', 'ASC'),
        array('Apples', '3', 'DESC'),
        array('Bananas', '4', 'DESC'),
        array('Cherries', '5', 'DESC'),
    );
    echo '<div class="box box_c">'.PHP_EOL;
    echo '<table>'.PHP_EOL;
    echo GWF_Table::displayHeaders1($headers, GWF_WEB_ROOT.'challenge/order_by_query/index.php?by=%BY%&dir=%DIR%');
    $i = 1;
    foreach ($rows as $row) {
        echo GWF_Table::rowStart();
        echo sprintf('<td align="right">%d</td>', $i++);
        echo sprintf('<td>%s</td>', $row['username']);
        echo sprintf('<td align="right">%s</td>', $row['apples']);
        echo sprintf('<td align="right">%s</td>', $row['bananas']);
        echo sprintf('<td align="right">%s</td>', $row['cherries']);
        echo GWF_Table::rowEnd();
    }
    echo '</table>'.PHP_EOL;
    echo '</div>'.PHP_EOL;
}
?>
