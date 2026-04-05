<?php
error_reporting(0);
session_start();
@include 'include.php';
require_once __DIR__ . '/validation.php';

// --- PROCESS ADD TO CART LOGIC BEFORE HTML RENDERS ---
$sweet_alert = null; 
$redirect_to_login = false;

if(isset($_POST['add_to_cart'])){
    if(!isset($_SESSION['email'])){
        $redirect_to_login = true;
    } else {
        $vq = ff_validate_cart_quantity($_POST['product_quantity'] ?? '');
        $vn = ff_validate_product_name($_POST['product_name'] ?? '');
        $vp = ff_validate_price($_POST['product_price'] ?? '');
        $vim = ff_validate_product_name($_POST['product_image'] ?? '', 255);
        
        if (!$vq['ok'] || !$vn['ok'] || !$vp['ok'] || !$vim['ok']) {
            $bad = !$vq['ok'] ? $vq['msg'] : (!$vn['ok'] ? $vn['msg'] : (!$vp['ok'] ? $vp['msg'] : $vim['msg']));
            $sweet_alert = ['icon' => 'warning', 'title' => 'Wait...', 'text' => $bad];
        } else {
            $product_name = ff_db_escape($con, $vn['value']);
            $product_price = ff_db_escape($con, (string) $vp['value']);
            $product_image = ff_db_escape($con, $vim['value']);
            $product_quantity = (int) $vq['value'];
            $user_email = ff_db_escape($con, $_SESSION['email']);
        
            $select_cart = mysqli_query($con, "SELECT * FROM `cart` WHERE image = '$product_image' AND email='$user_email' ");
        
            if(mysqli_num_rows($select_cart) > 0){
                $sweet_alert = ['icon' => 'info', 'title' => 'Already Added', 'text' => 'This product is already in your cart.'];
            }else{
                $insert_product = mysqli_query($con, "INSERT INTO `cart`(name, price, image, quantity, email) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity','$user_email')");
                $sweet_alert = ['icon' => 'success', 'title' => 'Success!', 'text' => 'Product added to your cart.'];
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
    <title>Fashion Fusion | Product Details</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&family=Playfair+Display:ital,wght@0,600;0,700;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <?php @include 'header.php';?>

    <div class="main-wrapper single-product-page">
        <div class="container">
            <?php
            // FIX: Checking for 'id' from the URL (and keeping 'edit' just in case)
            $url_id = isset($_GET['id']) ? $_GET['id'] : (isset($_GET['edit']) ? $_GET['edit'] : null);

            if($url_id){
                $eid = ff_validate_positive_int($url_id, 1, 999999);
                $edit_id = $eid['ok'] ? $eid['value'] : 0;
                
                $product_found = false;
                // Checks all your tables dynamically
                $tables = ['products_woman', 'products_man', 'products_kids', 'products'];
                $fetch_edit = null;

                if($edit_id) {
                    foreach($tables as $table) {
                        $edit_query = mysqli_query($con, "SELECT * FROM `$table` WHERE id = " . (int)$edit_id);
                        if($edit_query && mysqli_num_rows($edit_query) > 0){
                            $fetch_edit = mysqli_fetch_assoc($edit_query);
                            $product_found = true;
                            
                            // Determine the correct "Back" button link
                            $back_link = ($table == 'products_woman') ? 'woman.php' : (($table == 'products_man') ? 'man.php' : (($table == 'products_kids') ? 'kids.php' : 'products.php'));
                            break; 
                        }
                    }
                }

                if($product_found && $fetch_edit){
                    // Dynamically grabbing variables since main table uses 'name' and category tables use 'p_name'
                    $display_name = $fetch_edit['p_name'] ?? $fetch_edit['name'];
                    $display_price = $fetch_edit['p_price'] ?? $fetch_edit['price'];
                    $display_image = $fetch_edit['p_image'] ?? $fetch_edit['image'];
                    $display_desc = $fetch_edit['p_description'] ?? $fetch_edit['description'];
            ?>
            
            <form action="" method="post" class="product-detail-grid">
                <div class="product-image-col">
                    <img src="admin/uploaded_img/<?php echo htmlspecialchars($display_image); ?>" alt="<?php echo htmlspecialchars($display_name); ?>" onerror="this.src='images/placeholder.jpg'">
                </div>
                
                <div class="product-info-col">
                    <h1 class="detail-title"><?php echo htmlspecialchars($display_name); ?></h1>
                    
                    <div class="detail-stars">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-half"></i>
                        <span class="review-count">(4.5 Reviews)</span>
                    </div>

                    <div class="detail-price">₹<?php echo htmlspecialchars($display_price); ?></div>
                    
                    <p class="detail-description"><?php echo nl2br(htmlspecialchars($display_desc)); ?></p>
                    
                    <div class="purchase-actions">
                        <div class="quantity-wrapper">
                            <label for="qty">Quantity</label>
                            <input type="number" id="qty" value="1" min="1" max="20" required name="product_quantity">
                        </div>

                        <input type="hidden" name="product_id" value="<?php echo (int)$fetch_edit['id']; ?>">
                        <input type="hidden" name="product_name" value="<?php echo htmlspecialchars($display_name, ENT_QUOTES, 'UTF-8'); ?>">
                        <input type="hidden" name="product_price" value="<?php echo htmlspecialchars($display_price, ENT_QUOTES, 'UTF-8'); ?>">
                        <input type="hidden" name="product_image" value="<?php echo htmlspecialchars($display_image, ENT_QUOTES, 'UTF-8'); ?>">
                        
                        <div class="btn-groups">
                            <button type="submit" name="add_to_cart" class="btn-add-cart">
                                <i class="bi bi-bag-plus"></i> Add to Cart
                            </button>
                            <a href="<?php echo $back_link; ?>" class="btn-back">
                                <i class="bi bi-arrow-left"></i> Back to Shop
                            </a>
                        </div>
                    </div>
                </div>
            </form>

            <?php
                } else {
                    echo "<div class='no-products'><h2>Product not found</h2><p>This item may have been removed or is unavailable.</p><a href='index.php' class='btn-primary'>Return Home</a></div>";
                }
            } else {
                echo "<div class='no-products'><h2>No product selected</h2><a href='index.php' class='btn-primary'>Return Home</a></div>";
            }
            ?>
        </div>
    </div>

    <footer class="site-footer">
        <div class="footer-bottom" style="margin-top: 0; padding: 20px 0;">
            <p>&copy; <?php echo date("Y"); ?> Fashion Fusion. All Rights Reserved.</p>
        </div>
    </footer>

    <?php if($redirect_to_login): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'info',
                title: 'Login Required',
                text: 'Please log in to add items to your cart.',
                confirmButtonColor: '#111'
            }).then(() => {
                window.location.href = 'login.php';
            });
        });
    </script>
    <?php endif; ?>

    <?php if($sweet_alert): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: '<?php echo $sweet_alert["icon"]; ?>',
                title: '<?php echo addslashes($sweet_alert["title"]); ?>',
                text: '<?php echo addslashes($sweet_alert["text"]); ?>',
                confirmButtonColor: '#f84258',
                timer: 2000,
                showConfirmButton: false
            });
        });
    </script>
    <?php endif; ?>

</body>
</html>