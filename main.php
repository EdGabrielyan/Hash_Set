<?php

require_once 'HashSet.php';

$set = new HashSet();

$set->add("apple");
$set->add("banana");

echo $set->contains("apple"); // true
echo "\n";
echo $set->contains("cherry"); // false
echo "\n";

$set->remove("apple");
echo $set->contains("apple"); // false
echo "\n";

print_r($set->values()); // List of all keys in the set
