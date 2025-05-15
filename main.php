<?php

require_once 'HashSet.php';

$set = new HashSet();

$set->set("apple");
$set->set("banana");
$set->set("orange");
$set->set("pineapple");
$set->set("blueberry");
$set->set("watermelon");

echo $set->has("apple"); // true
echo "\n";
echo $set->has("cherry"); // false
echo "\n";

$set->remove("apple");
echo $set->has("apple"); // false
echo "\n";

print_r($set->get()); // List of all keys in the set
