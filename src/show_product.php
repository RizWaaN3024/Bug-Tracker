<?php

require_once "../bootstrap.php";

$id = $argv[1];

$product = $entityManager->find('Product', $id);

if (null === $product) {
    echo "No Product Found";
    exit(1);
}
echo sprintf($product->getName());
