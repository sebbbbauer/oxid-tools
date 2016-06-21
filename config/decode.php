<?php

/**
 * Decode oxconfig values easily.
 *
 * USAGE:
 *  1. put this file in the source folder of the oxid eshop 
 *  2. change the $varName 
 *  3. go to http://YOUR-SHOP/decode.php
 *  4. remove this file from your shop
 * 
 * HINT: never use this on production environments and delete it after usage!
 */

use OxidEsales\Eshop\Core\Config;

require_once dirname(__FILE__) . "/bootstrap.php";

function fetchOxConfigValue($varName)
{
    $key = Config::DEFAULT_CONFIG_KEY;

    $query = "SELECT decode(OXVARVALUE, '$key' ) AS DECODED
    FROM `oxconfig` WHERE OXVARNAME='$varName'";

    $db = oxDb::getDb();
    $rows = $db->getAll($query);
    $row = $rows[0];

    return $row[0];
}
function fetchDecodedOxConfigValue($varName)
{
    $key = Config::DEFAULT_CONFIG_KEY;

    $query = "SELECT OXVARVALUE AS DECODED
    FROM `oxconfig` WHERE OXVARNAME='$varName'";

    $db = oxDb::getDb();
    $rows = $db->getAll($query);
    $row = $rows[0];

    return $row[0];
}

$varName = 'aSearchCols';
$value = fetchOxConfigValue($varName);
$unserializedValue = unserialize($value);
$decodedValue = '0x'.bin2hex(fetchDecodedOxConfigValue($varName));

?>

<h1>'<?= $varName ?>' from the oxconfig table</h1>

<b>Serialized:</b> <br> <?= $value ?> <br><br>
<b>Unserialized:</b> <?php var_dump($unserializedValue) ?>
<b>Unserialized & HEX:</b> <?php var_dump($decodedValue) ?>