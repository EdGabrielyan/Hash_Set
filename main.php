<?php

require_once 'HashSet.php';

$set = new HashSet();

$set->set("apple");
$set->set("grape");
$set->set("orange");
$set->set("pineapple");
$set->set("blueberry");
$set->set("watermelon");

echo $set->has("apple");
echo "\n";
echo $set->has("cherry");
echo "\n";

//$set->remove("apple");
echo $set->has("apple");
echo "\n";

print_r($set->get());
