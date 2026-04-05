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
    <title>Fashion Fusion | Home</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&family=Playfair+Display:ital,wght@0,600;0,700;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <link rel="stylesheet" href="css/style.css">
</head> 
<body>  

    <?php @include 'header.php';?>

    <section class="video-hero">
        <div class="video-overlay">
            <h1>Welcome to Fashion Fusion</h1>
            <p>Discover the latest trends in modern fashion.</p>
            <a href="products.php" class="shop-btn">Shop The Collection</a>
        </div>
        <video autoplay muted loop playsinline class="back__video">
            <source src="images/video.mp4" type="video/mp4">
        </video>
    </section>

    <section class="brand-message">
        <div class="message-container">
            <span class="subtitle">Define Your Identity</span>
            <h2>Elevate Your Everyday Wardrobe.</h2>
            <p>Fashion Fusion curates the finest apparel from around the globe. Whether you are dressing for a casual weekend getaway or a high-stakes meeting, find the perfect premium pieces that speak to your unique, individual style.</p>
        </div>
    </section>

    <section class="category-banners">
        <a href="man.php" class="banner-box">
            <img src="images/slide1.jpg" alt="Men's Fashion" onerror="this.src='https://images.unsplash.com/photo-1617137968427-85924c800a22?q=80&w=800'">
            <div class="banner-content">
                <h2>Men's Fashion</h2>
                <p>New Fashion, New Passion.</p>
                <span class="btn-outline-white">Shop Men</span>
            </div>
            <div class="banner-overlay"></div>
        </a>

        <a href="woman.php" class="banner-box">
            <img src="images/slide2.jpg" alt="Women's Fashion" onerror="this.src='https://images.unsplash.com/photo-1490481651871-ab68de25d43d?q=80&w=800'">
            <div class="banner-content">
                <h2>Women's Fashion</h2>
                <p>New Fashion, New Passion.</p>
                <span class="btn-outline-white">Shop Women</span>
            </div>
            <div class="banner-overlay"></div>
        </a>

        <a href="kids.php" class="banner-box">
            <img src="images/slide3.jpg" alt="Kid's Fashion" onerror="this.src='https://images.unsplash.com/photo-1514090458221-65bb69cf63e6?q=80&w=800'">
            <div class="banner-content">
                <h2>Kid's Fashion</h2>
                <p>New Fashion, New Passion.</p>
                <span class="btn-outline-white">Shop Kids</span>
            </div>
            <div class="banner-overlay"></div>
        </a>
    </section>

    <section class="trending-section">
        <div class="section-header">
            <h2>Trending Now</h2>
            <hr class="divider">
        </div>
        
        <div class="container">
            <div class="trending-grid">
                <div class="trending-card">
                    <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?q=80&w=600" alt="Summer Essentials">
                    <div class="trending-info">
                        <h3>Summer Essentials</h3>
                        <a href="products.php" class="btn-text">Explore <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                
                <div class="trending-card">
                    <img src="https://images.unsplash.com/photo-1483985988355-763728e1935b?q=80&w=600" alt="Urban Streetwear">
                    <div class="trending-info">
                        <h3>Urban Streetwear</h3>
                        <a href="products.php" class="btn-text">Explore <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                
                <div class="trending-card">
                    <img src="https://images.unsplash.com/photo-1539109136881-3be0616acf4b?q=80&w=600" alt="Evening Elegance">
                    <div class="trending-info">
                        <h3>Evening Elegance</h3>
                        <a href="products.php" class="btn-text">Explore <i class="bi bi-arrow-right"></i></a>
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