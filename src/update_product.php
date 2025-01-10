<?php

require_once '../bootstrap.php';

$id = $argv[1];
$newName = $argv[2];

$product = $entityManager->find('Product', $id);

if (null === $product) {
    echo "No Product Found";
    exit(1);
}
$product->setName($newName);
$entityManager->flush();
echo sprintf("Updated Name", $product->getName());