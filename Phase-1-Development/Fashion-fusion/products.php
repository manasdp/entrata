<?php
session_start();
error_reporting(0);

@include 'include.php';
?>
<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion Fusion | Shop Collection</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&family=Playfair+Display:ital,wght@0,600;0,700;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <link rel="stylesheet" href="css/style.css">
    <script src="js/product.js" defer></script>
</head> 
<body>  
    
    <?php @include 'header.php';?>

    <div class="page-header">
        <h1>Our <span class="text-primary">Collections</span></h1>
        <hr class="divider">
    </div>

    <section class="category-quick-links">
        <div class="container">
            <div class="quick-links-grid">
                <a href="man.php" class="quick-link-card">
                    <img src="images/categories-img/category (1).png" alt="Men's Fashion" onerror="this.src='https://images.unsplash.com/photo-1617137968427-85924c800a22?q=80&w=200'">
                    <h3>Men's</h3>
                </a>
                <a href="woman.php" class="quick-link-card">
                    <img src="images/categories-img/category (2).png" alt="Women's Fashion" onerror="this.src='https://images.unsplash.com/photo-1490481651871-ab68de25d43d?q=80&w=200'">
                    <h3>Women's</h3>
                </a>
                <a href="kids.php" class="quick-link-card">
                    <img src="images/categories-img/category (1).jpg" alt="Kid's Fashion" onerror="this.src='https://images.unsplash.com/photo-1514090458221-65bb69cf63e6?q=80&w=200'">
                    <h3>Kid's</h3>
                </a>
            </div>
        </div>
    </section>

    <section class="trending-section" style="padding-top: 20px; padding-bottom: 80px;">
        <div class="container">
            <div class="section-header" style="margin-bottom: 30px;">
                <h2>Curated For You</h2>
                <hr class="divider">
            </div>
            
            <div class="trending-grid">
                <div class="trending-card" onclick="window.location.href='man.php'">
                    <img src="images/man-style.jpg" alt="Sharp Tailoring">
                    <div class="trending-info">
                        <h3>Sharp Tailoring</h3>
                        <span class="btn-text">Shop Men <i class="bi bi-arrow-right"></i></span>
                    </div>
                </div>
                
                <div class="trending-card" onclick="window.location.href='woman.php'">
                    <img src="https://images.unsplash.com/photo-1550639525-c97d455acf70?q=80&w=600" alt="Elegant Dresses">
                    <div class="trending-info">
                        <h3>Elegant Evening</h3>
                        <span class="btn-text">Shop Women <i class="bi bi-arrow-right"></i></span>
                    </div>
                </div>
                
                <div class="trending-card" onclick="window.location.href='kids.php'">
                    <img src="https://images.unsplash.com/photo-1622290291468-a28f7a7dc6a8?q=80&w=600" alt="Playful Kids">
                    <div class="trending-info">
                        <h3>Playful Styles</h3>
                        <span class="btn-text">Shop Kids <i class="bi bi-arrow-right"></i></span>
                    </div>
                </div>
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
                    <li><a href="aboutus.php">About Us</a></li>
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