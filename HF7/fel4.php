<?php
session_start();

$products = [
    ['id' => 1, 'name' => 'Product A', 'price' => 10.99],
    ['id' => 2, 'name' => 'Product B', 'price' => 14.99],
    ['id' => 3, 'name' => 'Product C', 'price' => 19.99],
];

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_POST['add_to_cart'])) {
    $productId = $_POST['product_id'];
    $quantity = $_POST['quantity'] ?? 1;
    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId]['quantity'] += $quantity;
    } else {
        foreach ($products as $product) {
            if ($product['id'] == $productId) {
                $_SESSION['cart'][$productId] = ['name' => $product['name'], 'price' => $product['price'], 'quantity' => $quantity];
                break;
            }
        }
    }
}

if (isset($_POST['remove_from_cart'])) {
    $productId = $_POST['product_id'];
    unset($_SESSION['cart'][$productId]);
}

if (isset($_POST['update_cart']) && isset($_POST['quantities'])) {
    foreach ($_POST['quantities'] as $productId => $quantity) {
        if ($quantity <= 0) {
            unset($_SESSION['cart'][$productId]);
        } else {
            $_SESSION['cart'][$productId]['quantity'] = $quantity;
        }
    }
}

$totalPrice = 0;
foreach ($_SESSION['cart'] as $product) {
    $totalPrice += $product['price'] * $product['quantity'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
    <style>
        .product-list, .shopping-cart {
            display: inline-block;
            vertical-align: top;
            margin-right: 20px;
        }

        .cart-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .cart-item input[type="number"] {
            width: 50px;
            margin-left: 10px;
            margin-right: 10px;
        }

        .cart-item button {
            margin-left: 10px;
        }
    </style>
</head>
<body>
<div class="product-list">
    <h1>Product List</h1>
    <ul>
        <?php foreach ($products as $product): ?>
            <li>
                <?php echo $product['name'] . ' - $' . $product['price']; ?>
                <form method="post" style="display:inline;">
                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                    <input type="number" name="quantity" value="1" min="1" style="width: 50px;">
                    <button type="submit" name="add_to_cart">Add to Cart</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
<div class="shopping-cart">
    <h2>Shopping Cart</h2>
    <form method="post">
        <ul>
            <?php foreach ($_SESSION['cart'] as $productId => $product): ?>
                <li class="cart-item">
                    <?php echo $product['name'] . ' - $' . $product['price'] . ' (Quantity: ' . $product['quantity'] . ')'; ?>
                    <input type="number" name="quantities[<?php echo $productId; ?>]"
                           value="<?php echo $product['quantity']; ?>" min="0">
                    <button type="submit" name="remove_from_cart">Remove from Cart</button>
                    <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
                </li>
            <?php endforeach; ?>
        </ul>
        <button type="submit" name="update_cart">Update Cart</button>
    </form>
    <p>Total Price: $<?php echo number_format($totalPrice, 2); ?></p>
</div>
</body>
</html>
