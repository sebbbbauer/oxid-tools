<?php


/**
 * Encode oxconfig values easily.
 *
 * USAGE:
 *  1. put this file in the source folder of the oxid eshop
 *  2. change the $varName, $varType and $varValue
 *  3. go to http://YOUR-SHOP/encode.php
 *  4. remove this file from your shop
 *
 * HINT: never use this on production environments and delete it after usage!
 */


require_once dirname(__FILE__) . "/bootstrap.php";

$varType = 'arr';
$varName = 'aSearchCols'; 
$varValue = array('oxtitle', 'oxshortdesc');

try {
    $config = oxNew('oxConfig');
    $config->saveShopConfVar($varType, $varName, $varValue);
} catch (\Exception $exception) {
    var_dump($exception);
}

