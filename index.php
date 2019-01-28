<?php

require_once 'shipping/Item.php';
require_once 'shipping/Order.php';

$item1 = new \amazon\shipping\Item([
    'amazonPrice' => 10,
    'weight' => 0.2,
    'width' => 5,
    'height' => 5,
    'depth' => 15
]);

$item1->addShippingFreeType(5000);

$item2 = new \amazon\shipping\Item([
    'amazonPrice' => 10,
    'weight' => 0.3,
    'width' => 5,
    'height' => 5,
    'depth' => 15
]);

$order = new \amazon\shipping\Order();

$order->addItem($item1);
$order->addItem($item2);

echo 'Gross prices for tow items: <b>' . $order->getGrossPrice() . '</b>';
