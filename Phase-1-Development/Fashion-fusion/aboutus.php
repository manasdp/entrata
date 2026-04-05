<?php
session_start();
error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion Fusion | About Us</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&family=Playfair+Display:ital,wght@0,600;0,700;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <link rel="stylesheet" href="css/style.css">
</head> 
<body>  
  
    <?php @include 'header.php';?>

    <div class="page-header">
        <h1>About <span class="text-primary">Fashion Fusion</span></h1>
        <hr class="divider">
    </div>

    <section class="about-section">
        <div class="container about-container">
            
            <div class="about-images">
                <div class="img-wrapper img-1">
                    <img src="./image/img01.jfif" alt="Fashion Style 1" onerror="this.src='images/slide1.jpg'">
                </div>
                <div class="img-wrapper img-2">
                    <img src="./image/img1.png" alt="Fashion Style 2" onerror="this.src='images/slide2.jpg'">
                </div>
                <div class="img-wrapper img-3">
                    <img src="./image/img03.jpg" alt="Fashion Style 3" onerror="this.src='images/slide3.jpg'">
                </div>
            </div>

            <div class="about-text">
                <h4 class="sub-title">Welcome To</h4>
                <h2 class="main-title">The Future of Fashion</h2>
                
                <div class="text-content">
                    <p>Welcome to Fashion Fusion, where style meets innovation in the world of clothing. Our online boutique is dedicated to bringing you the latest trends with a twist, offering a unique blend of classic elegance and contemporary flair.</p>
                    <p>At Fashion Fusion, we believe that fashion is more than just clothing; it's a form of self-expression, creativity, and empowerment. Thank you for choosing Fashion Fusion as your go-to destination for all things fashion. We can't wait to help you discover your next favorite look!</p>
                    
                    <div id="moreText" class="hidden-text">
                        <p>We are committed to quality, customer satisfaction, and modern design. From sustainable fabrics to cutting-edge silhouettes, our collections are curated for the modern individual who isn't afraid to stand out.</p>
                    </div>
                </div>

                <a href="javascript:void(0);" id="toggleBtn" class="btn-primary" onclick="toggleText()">Read More <i class="bi bi-chevron-down"></i></a>
            </div>
        </div>
    </section>

    <section class="explore-banner">
        <h2>Ready to upgrade your wardrobe?</h2>
        <a href="products.php" class="btn-outline">Shop The Collection</a>
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

    <script>
    function toggleText() {
        var text = document.getElementById("moreText");
        var btn = document.getElementById("toggleBtn");

        if (text.classList.contains("hidden-text")) {
            text.classList.remove("hidden-text");
            text.style.display = "block";
            // Slight delay for smooth CSS transition
            setTimeout(() => text.classList.add("show-text"), 10);
            btn.innerHTML = "Read Less <i class='bi bi-chevron-up'></i>";
        } else {
            text.classList.remove("show-text");
            setTimeout(() => {
                text.style.display = "none";
                text.classList.add("hidden-text");
            }, 300);
            btn.innerHTML = "Read More <i class='bi bi-chevron-down'></i>";
        }
    }
    </script>
</body>
</html>