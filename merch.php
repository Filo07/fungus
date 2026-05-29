<?php
session_start();
require_once 'db.php';
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
if (isset($_GET['action']) && $_GET['action'] == 'clear') {
    $_SESSION['cart'] = [];
    header("Location: merch.php");
    exit();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id'])) {
    $p_id = intval($_POST['product_id']);
    $query = "SELECT * FROM products WHERE id = $p_id";
    $result = mysqli_query($conn, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);
        if (isset($_SESSION['cart'][$p_id])) {
            $_SESSION['cart'][$p_id]['quantity']++;
        } else {
            $_SESSION['cart'][$p_id] = [
                'name' => $product['name'],
                'price' => $product['price'],
                'quantity' => 1
            ];
        }
    }
    header("Location: merch.php");
    exit();
}
$query = "SELECT * FROM products";
$products_result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merchandise Shop</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <?php require_once 'nav.php'; ?>
    </header>
    <main>
        <div class="frontbild">
            <h1>Merchandise</h1>
            <img src="bilder/gallery1.webp" alt="Merch Banner">
        </div>
        
        <section class="merch">
            <div class="cart">
                <h2>Your Cart</h2>
                <?php if (empty($_SESSION['cart'])): ?>
                    <p>Your cart is currently empty. Grab some gear!</p>
                <?php else: ?>
                    <ul>
                        <?php 
                        $total_price = 0;
                        foreach ($_SESSION['cart'] as $item): 
                            $item_total = $item['price'] * $item['quantity'];
                            $total_price += $item_total;
                        ?>
                            <li>
                                <span class="produktnamn">
                                    <strong><?php echo htmlspecialchars($item['name']); ?></strong> x<?php echo $item['quantity']; ?>
                                </span> 
                                <span class="pris">$<?php echo number_format($item_total, 2); ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <h3 class="totcart">Total: $<?php echo number_format($total_price, 2); ?></h3>
                    <a href="merch.php?action=clear" class="tömcart">Empty Backpack</a>
                <?php endif; ?>
            </div>

            <div class="merchnät">
                <?php 
                if ($products_result && mysqli_num_rows($products_result) > 0) {
                    while ($row = mysqli_fetch_assoc($products_result)) {
                ?>
                        <div class="merchlådor">
                            <img src="bilder/<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>">
                            <p class="produktnamn"><strong><?php echo htmlspecialchars($row['name']); ?></strong></p>
                            <p class="pris">$<?php echo htmlspecialchars($row['price']); ?></p>
                            
                            <form action="merch.php" method="POST">
                                <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                                <button type="submit" class="cartbtn">Add to Cart</button>
                            </form>
                        </div>
                <?php 
                    }
                } else {
                    echo "<p class='tomcart'>No products found in the wasteland database.</p>";
                }
                ?>
            </div>
        </section>
    </main>
    <footer>
        <h2>© 2026 <a href="https://github.com/Filo07">Filip Bäckman</a></h2>
    </footer>
</body>
</html>