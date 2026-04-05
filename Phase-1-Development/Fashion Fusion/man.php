<?php
error_reporting(0);
session_start();
@include 'include.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion Fusion | Men's Collection</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&family=Playfair+Display:ital,wght@0,600;0,700;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <link rel="stylesheet" href="css/style.css">
    <script src="js/product.js" defer></script>
</head> 
<body>  
    
    <?php @include 'header.php';?>

    <div class="page-header">
        <h1>Men's <span class="text-primary">Fashion</span></h1>
        <hr class="divider">
    </div>

    <section class="products-section">
        <div class="container">
            <div class="products-container">
                <?php
                if(isset($con)) {
                    mysqli_select_db($con, "fashionfusion");
                    $q1 = "SELECT * FROM `products_man`";
                    $result = mysqli_query($con, $q1);

                    if(mysqli_num_rows($result) > 0){
                        while($fetch_product = mysqli_fetch_assoc($result)){
                ?>
                <div class="product-card">
                    <div class="card-img-wrapper">
                        <img src="admin/uploaded_img/<?php echo htmlspecialchars($fetch_product['p_image']); ?>" alt="<?php echo htmlspecialchars($fetch_product['p_name']); ?>" onerror="this.src='images/placeholder.jpg'">
                    </div>
                    <div class="card-info">
                        <h3><?php echo htmlspecialchars($fetch_product['p_name']); ?></h3>
                        <p class="price">₹<?php echo htmlspecialchars($fetch_product['p_price']); ?></p>
                        
                        <div class="card-actions">
                            <a href="productdetail.php?id=<?php echo $fetch_product['id']; ?>" class="btn-outline">Details</a>
                            <a href="cart.php?add=<?php echo $fetch_product['id']; ?>" class="btn-primary"><i class="bi bi-cart-plus"></i> Add</a>
                        </div>
                    </div>
                </div>
                <?php
                        }
                    } else {
                        echo "<div class='no-products'><p>No items currently available in the Men's collection. Check back soon!</p></div>";
                    }
                } else {
                    echo "<p>Database connection error.</p>";
                }
                ?>
            </div>

            <div class="end-message" style="text-align: center; margin-top: 50px; padding-bottom: 20px;">
                <a href="cart.php" style="color: var(--text-dark); font-size: 1.2rem; font-weight: 600;">
                    Uh-Oh! We are <span class="text-primary">done</span> 🛒 Proceed to Cart
                </a>
            </div>
        </div>
    </section>

    <footer class="site-footer">
        <div class="footer-grid">
            <div class="footer-col brand-col">
                <a href="index.php" class="footer-logo">FASHION FUSION 🦋</a>
                <p>Elevating your everyday style with 100% original, premium quality fashion.</p>
            </div>

            <div class="footer-col">
                <h4>Shop</h4>
                <ul>
                    <li><a href="man.php">Men</a></li>
                    <li><a href="woman.php">Women</a></li>
                    <li><a href="kids.php">Kids</a></li>
                    <li><a href="exclusive.php">FashionFusion Exclusive</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4>Useful Links</h4>
                <ul>
                    <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="returns.php">Returns Policy</a></li>
                </ul>
            </div>

            <div class="footer-col features-col">
                <div class="feature-item">
                    <i class="bi bi-shield-check"></i>
                    <div>
                        <strong>100% Original</strong>
                        <span>Guaranteed products</span>
                    </div>
                </div>
                <div class="feature-item">
                    <i class="bi bi-arrow-return-left"></i>
                    <div>
                        <strong>30-Day Returns</strong>
                        <span>Hassle-free process</span>
                    </div>
                </div>
                <div class="feature-item">
                    <i class="bi bi-truck"></i>
                    <div>
                        <strong>Free Delivery</strong>
                        <span>On orders above ₹999</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; <?php echo date("Y"); ?> Fashion Fusion. All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>