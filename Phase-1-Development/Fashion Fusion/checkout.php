<?php
error_reporting(0);
session_start();

if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
    header('location:login.php');
    exit();
}

require_once 'include.php';
require_once __DIR__ . '/validation.php';

$user = $_SESSION['email'];
$sweet_alert = null;

// --- 1. FETCH USER DETAILS ---
$user_query = mysqli_query($con, "SELECT * FROM `user_detail` WHERE email='$user'");
$user_data = mysqli_fetch_assoc($user_query);

// --- 2. FETCH CART DETAILS & CALCULATE TOTALS ---
$stmt = mysqli_prepare($con, "SELECT * FROM cart WHERE email=?");
mysqli_stmt_bind_param($stmt, "s", $user);
mysqli_stmt_execute($stmt);
$select_cart = mysqli_stmt_get_result($stmt);

$grand_total = 0;
$cart_items = [];
$total_products_string = "";

if(mysqli_num_rows($select_cart) > 0){
    while($fetch_cart = mysqli_fetch_assoc($select_cart)){
        $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
        $grand_total += $total_price;
        $cart_items[] = $fetch_cart['name'] . ' (' . $fetch_cart['quantity'] . ')';
    }
    $total_products_string = implode(', ', $cart_items);
    // Add shipping logic to match cart
    $final_payment = ($grand_total > 999) ? $grand_total : $grand_total + 99;
} else {
    // If cart is empty, send them back to the cart page
    header('location:cart.php');
    exit();
}

// --- 3. PROCESS ORDER PLACEMENT ---
if(isset($_POST['order_btn'])) { 
    $items = ff_trim_str($_POST['items'] ?? '');
    $custname = ff_trim_str($_POST['name'] ?? '');
    $contactno = ff_trim_str($_POST['contact'] ?? '');
    $email = ff_trim_str($_POST['email'] ?? '');
    $gender = ff_trim_str($_POST['gender'] ?? '');
    $address = $_POST['address'] ?? '';
    $city = $_POST['city'] ?? '';
    $state = $_POST['state'] ?? '';
    $country = $_POST['country'] ?? '';
    $pincode = $_POST['pin_code'] ?? '';
    $payment = ff_trim_str($_POST['payment'] ?? '');

    $va = ff_validate_address($address);
    $vci = ff_validate_city_state_country($city, 'City');
    $vst = ff_validate_city_state_country($state, 'State');
    $vco = ff_validate_city_state_country($country, 'Country');
    $vpin = ff_validate_pincode_in($pincode);
    
    $fail = null;
    if ($items === '') { $fail = 'Your cart appears empty.'; }
    elseif (!$va['ok']) { $fail = $va['msg']; }
    elseif (!$vci['ok']) { $fail = $vci['msg']; }
    elseif (!$vst['ok']) { $fail = $vst['msg']; }
    elseif (!$vco['ok']) { $fail = $vco['msg']; }
    elseif (!$vpin['ok']) { $fail = $vpin['msg']; }

    if ($fail !== null) {
        $sweet_alert = ['icon' => 'warning', 'title' => 'Invalid details', 'text' => $fail];
    } else {
        // Check for pending orders to prevent duplicate spam
        $pending_query = mysqli_query($con, "SELECT * FROM orders WHERE email = '$user' AND status='pending'");
        
        if(mysqli_num_rows($pending_query) > 0) {   
            $sweet_alert = ['icon' => 'info', 'title' => 'Hold On!', 'text' => 'You already have a pending order. Please wait for approval.', 'redirect' => 'cart.php'];
        } else {
            // Insert Order
            $stmt = mysqli_prepare($con, "INSERT INTO orders (items, custname, contactno, email, gender, address, city, state, country, pincode, payment) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
            
            // Note: Saving exactly what they are paying as a string for record keeping
            $payment_record = "Rs. " . $final_payment . "/- (Cash on Delivery)";

            mysqli_stmt_bind_param($stmt, "sssssssssss",
                $items, $custname, $contactno, $email, $gender,
                $va['value'], $vci['value'], $vst['value'], $vco['value'], $vpin['value'], $payment_record
            );
            
            if(mysqli_stmt_execute($stmt)) {
                // Clear Cart
                $del_stmt = mysqli_prepare($con, "DELETE FROM cart WHERE email=?");
                mysqli_stmt_bind_param($del_stmt, "s", $user);
                mysqli_stmt_execute($del_stmt);

                $sweet_alert = ['icon' => 'success', 'title' => 'Order Placed!', 'text' => 'Your order has been placed successfully.', 'redirect' => 'cart.php'];
            } else {
                $sweet_alert = ['icon' => 'error', 'title' => 'Error', 'text' => 'Failed to place order. Try again.'];
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion Fusion | Secure Checkout</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&family=Playfair+Display:ital,wght@0,600;0,700;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <?php @include 'header.php';?>

    <div class="checkout-page-wrapper">
        <div class="container">
            <div class="page-header" style="padding-top: 0; padding-bottom: 20px;">
                <h1>Secure <span class="text-primary">Checkout</span></h1>
                <hr class="divider">
            </div>

            <form method="post" action="" class="checkout-grid">
                
                <div class="checkout-form-col">
                    <h3 class="checkout-section-title"><i class="bi bi-person-lines-fill"></i> Personal Details</h3>
                    <div class="checkout-input-grid">
                        <div class="input-group">
                            <label>Full Name</label>
                            <input readonly type="text" value="<?php echo htmlspecialchars($user_data['name']); ?>" name="name" class="readonly-input">
                        </div>
                        <div class="input-group">
                            <label>Contact Number</label>
                            <input readonly type="text" value="<?php echo htmlspecialchars($user_data['contactno']); ?>" name="contact" class="readonly-input">
                        </div>
                        <div class="input-group" style="grid-column: 1 / -1;">
                            <label>Email Address</label>
                            <input readonly type="email" value="<?php echo htmlspecialchars($user_data['email']); ?>" name="email" class="readonly-input">
                        </div>
                        <input type="hidden" name="gender" value="<?php echo htmlspecialchars($user_data['gender']); ?>">
                    </div>

                    <h3 class="checkout-section-title" style="margin-top: 40px;"><i class="bi bi-geo-alt-fill"></i> Shipping Address</h3>
                    <div class="checkout-input-grid">
                        <div class="input-group" style="grid-column: 1 / -1;">
                            <label>Street Address / Flat No.</label>
                            <input type="text" placeholder="e.g. 123 Fashion Street, Apt 4B" name="address" required minlength="5" maxlength="500">
                        </div>
                        <div class="input-group">
                            <label>City</label>
                            <input type="text" placeholder="e.g. Mumbai" name="city" required minlength="2" maxlength="80" pattern="[A-Za-z\s\-'.]+">
                        </div>
                        <div class="input-group">
                            <label>State</label>
                            <input type="text" placeholder="e.g. Maharashtra" name="state" required minlength="2" maxlength="80" pattern="[A-Za-z\s\-'.]+">
                        </div>
                        <div class="input-group">
                            <label>Country</label>
                            <input type="text" placeholder="e.g. India" name="country" required minlength="2" maxlength="80" pattern="[A-Za-z\s\-'.]+">
                        </div>
                        <div class="input-group">
                            <label>PIN Code</label>
                            <input type="text" placeholder="e.g. 400001" name="pin_code" required pattern="[0-9]{6}" maxlength="6" minlength="6" inputmode="numeric">
                        </div>
                    </div>
                </div>

                <div class="checkout-summary-col">
                    <div class="cart-summary-box" style="position: sticky; top: 100px;">
                        <h3 style="border-bottom: 1px solid #eaeaea; padding-bottom: 15px; margin-bottom: 15px;">Order Summary</h3>
                        
                        <div class="checkout-items-list">
                            <p style="color: var(--text-light); font-size: 0.9rem; line-height: 1.6; margin-bottom: 15px;">
                                <strong>Items:</strong> <?php echo htmlspecialchars($total_products_string); ?>
                            </p>
                            <input type="hidden" name="items" value="<?php echo htmlspecialchars($total_products_string); ?>">
                            <input type="hidden" name="payment" value="<?php echo $final_payment; ?>">
                        </div>

                        <div class="summary-row">
                            <span>Subtotal</span>
                            <span>₹<?php echo $grand_total; ?></span>
                        </div>
                        <div class="summary-row">
                            <span>Shipping</span>
                            <span><?php echo ($grand_total > 999) ? 'Free' : '₹99'; ?></span>
                        </div>
                        
                        <hr class="summary-divider">
                        
                        <div class="summary-row total-row" style="margin-bottom: 25px;">
                            <span>Total to Pay</span>
                            <span class="text-primary">₹<?php echo $final_payment; ?></span>
                        </div>

                        <div class="input-group" style="margin-bottom: 20px;">
                            <label>Payment Method</label>
                            <select name="payment_method" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-family: var(--font-body); background-color: #f9f9f9; pointer-events: none;">
                               <option value="cash on delivery" selected>Cash on Delivery</option>
                            </select>
                            <small style="color: #888; margin-top: 5px; display: block;">* Currently accepting COD only.</small>
                        </div>

                        <button type="submit" name="order_btn" class="btn-primary btn-block" style="font-size: 1.1rem; padding: 15px;"><i class="bi bi-bag-check-fill"></i> Place Order Now</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <footer class="site-footer">
        <div class="footer-bottom" style="margin-top: 0; padding: 20px 0;">
            <p>&copy; <?php echo date("Y"); ?> Fashion Fusion. All Rights Reserved.</p>
        </div>
    </footer>

    <?php if($sweet_alert): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: '<?php echo $sweet_alert["icon"]; ?>',
                title: '<?php echo addslashes($sweet_alert["title"]); ?>',
                text: '<?php echo addslashes($sweet_alert["text"]); ?>',
                confirmButtonColor: '#f84258',
                showConfirmButton: <?php echo isset($sweet_alert["redirect"]) ? 'false' : 'true'; ?>
            }).then(() => {
                <?php if(isset($sweet_alert["redirect"])): ?>
                window.location.href = '<?php echo $sweet_alert["redirect"]; ?>';
                <?php endif; ?>
            });
        });
    </script>
    <?php endif; ?>

</body>
</html>