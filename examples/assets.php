<?php
require_once __DIR__ . '/../vendor/autoload.php';

$api = new \CoinCapIO\API();
$assets_all = $api->assets->all();
print_r($assets_all);
