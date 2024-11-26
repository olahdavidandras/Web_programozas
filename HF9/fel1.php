<?php
$url = 'https://fakestoreapi.com/carts/user/1';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPGET, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
$arrayUser = json_decode($response, true);
//print_r($arrayUser);

$prodURL= 'https://fakestoreapi.com/products';
$chProd = curl_init($prodURL);
curl_setopt($chProd, CURLOPT_HTTPGET, true);
curl_setopt($chProd, CURLOPT_RETURNTRANSFER, true);
$responseProd = curl_exec($chProd);
curl_close($chProd);
$arrayProd = json_decode($responseProd, true);
//print_r($arrayProd);

$productPrices = [];

foreach ($arrayProd as $product) {
    $productPrices[$product['id']] = $product['price'];
}

$total = 0;

foreach ($arrayUser as $cart) {
    foreach ($cart['products'] as $cartItem) {
        $productId = $cartItem['productId'];
        $quantity = $cartItem['quantity'];

        if (isset($productPrices[$productId])) {
            $price = $productPrices[$productId];
            $total += $price * $quantity;
        }
    }
}

echo "A kosar erteke " . $total;


