<?php
session_start();
error_reporting(0);


if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
    header('location:login.php');
    exit();
}

$user = $_SESSION['email'];

@include 'include.php';
require_once __DIR__ . '/validation.php';

// --- PROCESS CART ACTIONS BEFORE HTML RENDERS ---

// Update Quantity
if(isset($_POST['update_update_btn'])){
    $vq = ff_validate_cart_quantity($_POST['update_quantity'] ?? '');
    $vi = ff_validate_positive_int($_POST['update_quantity_id'] ?? '', 1, 999999);

    if ($vq['ok'] && $vi['ok']) {
        $update_value = (int)$vq['value'];
        $update_id = (int)$vi['value'];

        $stmt = mysqli_prepare($con, "UPDATE cart SET quantity=? WHERE id=? AND email=?");
        mysqli_stmt_bind_param($stmt, "iis", $update_value, $update_id, $user);
        mysqli_stmt_execute($stmt);

        header('location:cart.php');
        exit();
    }
}

// Remove Single Item
if(isset($_GET['remove'])){
    $vr = ff_validate_positive_int($_GET['remove'] ?? '', 1, 999999);
    if ($vr['ok']) {
        $remove_id = (int) $vr['value'];
        $stmt = mysqli_prepare($con, "DELETE FROM cart WHERE id=? AND email=?");
        mysqli_stmt_bind_param($stmt, "is", $remove_id, $user);
        mysqli_stmt_execute($stmt);
    }
    header('location:cart.php');
    exit();
}

// Clear Entire Cart
if(isset($_GET['delete_all'])){
    $stmt = mysqli_prepare($con, "DELETE FROM cart WHERE email=?");
    mysqli_stmt_bind_param($stmt, "s", $user);
    mysqli_stmt_execute($stmt);
    header('location:cart.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion Fusion | Shopping Cart</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&family=Playfair+Display:ital,wght@0,600;0,700;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <?php @include 'header.php';?>

    <div class="cart-page-wrapper">
        <div class="container">
            <div class="page-header">
                <h1>Your <span class="text-primary">Cart</span></h1>
                <hr class="divider">
            </div>

            <div class="cart-layout">
                <div class="cart-items-container">
                    <?php 
                    $stmt = mysqli_prepare($con, "SELECT * FROM cart WHERE email=?");
                    mysqli_stmt_bind_param($stmt, "s", $user);
                    mysqli_stmt_execute($stmt);
                    $select_cart = mysqli_stmt_get_result($stmt);
                    $grand_total = 0;
                    
                    if(mysqli_num_rows($select_cart) > 0){
                        while($fetch_cart = mysqli_fetch_assoc($select_cart)){
                            $sub_total = $fetch_cart['price'] * $fetch_cart['quantity'];
                            $grand_total += $sub_total;
                    ?>
                    
                    <div class="cart-item">
                        <div class="cart-img-box">
                            <img src="admin/uploaded_img/<?php echo htmlspecialchars($fetch_cart['image']); ?>" alt="<?php echo htmlspecialchars($fetch_cart['name']); ?>" onerror="this.src='images/placeholder.jpg'">
                        </div>
                        
                        <div class="cart-item-details">
                            <h3><?php echo htmlspecialchars($fetch_cart['name']); ?></h3>
                            <p class="item-price">₹<?php echo (int)$fetch_cart['price']; ?></p>
                            
                            <form action="" method="post" class="qty-form">
                                <input type="hidden" name="update_quantity_id" value="<?php echo $fetch_cart['id']; ?>">
                                <div class="qty-input-group">
                                    <label for="qty_<?php echo $fetch_cart['id']; ?>">Qty:</label>
                                    <input type="number" id="qty_<?php echo $fetch_cart['id']; ?>" name="update_quantity" min="1" max="20" required value="<?php echo (int)$fetch_cart['quantity']; ?>">
                                    <button type="submit" name="update_update_btn" class="btn-update" title="Update Quantity"><i class="bi bi-arrow-clockwise"></i></button>
                                </div>
                            </form>
                        </div>
                        
                        <div class="cart-item-actions">
                            <div class="item-subtotal">₹<?php echo $sub_total; ?></div>
                            <a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('Remove this item from cart?')" class="btn-remove" title="Remove Item">
                                <i class="bi bi-trash3"></i>
                            </a>
                        </div>
                    </div>

                    <?php
                        }
                    } else {
                        echo "<div class='empty-cart'>
                                <i class='bi bi-cart-x empty-icon'></i>
                                <h2>Your cart is empty</h2>
                                <p>Looks like you haven't added anything yet.</p>
                                <a href='products.php' class='btn-primary mt-3'>Start Shopping</a>
                              </div>";
                    }
                    ?>
                </div>

                <?php if($grand_total > 0): ?>
                <div class="cart-summary-box">
                    <h3>Order Summary</h3>
                    
                    <div class="summary-row">
                        <span>Subtotal</span>
                        <span>₹<?php echo $grand_total; ?></span>
                    </div>
                    <div class="summary-row">
                        <span>Shipping</span>
                        <span><?php echo ($grand_total > 999) ? 'Free' : '₹99'; ?></span>
                    </div>
                    
                    <hr class="summary-divider">
                    
                    <div class="summary-row total-row">
                        <span>Total</span>
                        <span>₹<?php echo ($grand_total > 999) ? $grand_total : $grand_total + 99; ?></span>
                    </div>

                    <a href="checkout.php" class="btn-primary btn-block checkout-btn">Proceed to Checkout</a>
                    <a href="products.php" class="btn-outline btn-block mt-2"><i class="bi bi-arrow-left"></i> Continue Shopping</a>
                    
                    <div class="cart-danger-zone">
                        <a href="cart.php?delete_all" onclick="return confirm('Are you sure you want to empty your entire cart?');" class="btn-text-danger">
                            Empty Cart
                        </a>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            <?php
            $stmt = mysqli_prepare($con, "SELECT order_id FROM orders WHERE email=? AND status='approved'");
            mysqli_stmt_bind_param($stmt, "s", $user);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if(mysqli_num_rows($result) > 0){
            ?>
            <div class="past-orders-section">
                <h3>Your Past Orders</h3>
                <div class="past-order-links">
                    <a href='billrequestmsg.php' class="btn-outline"><i class="bi bi-receipt"></i> View Latest Bill</a>
                    <a href='historyrequest.php' class="btn-outline"><i class="bi bi-clock-history"></i> Order History</a>
                </div>
            </div>
            <?php } ?>

        </div>
    </div>

    <footer class="site-footer">
        <div class="footer-bottom" style="margin-top: 0; padding: 20px 0;">
            <p>&copy; <?php echo date("Y"); ?> Fashion Fusion. All Rights Reserved.</p>
        </div>
    </footer>

   
</body>
</html>