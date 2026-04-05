<nav class="main-navbar">
    <div class="logo">
        <a href="index.php">
            <img src="images/logo.png" alt="Fashion Fusion Logo">
        </a>
    </div>

    <form method="GET" action="products.php" class="search-bar">
        <input type="text" name="search" placeholder="Search products..." required>
        <button type="submit" aria-label="Search"><i class="bi bi-search"></i></button>
    </form>

    <button class="mobile-menu-btn" aria-label="Toggle navigation">
        <i class="bi bi-list"></i>
    </button>

    <ul class="nav-links">
        <li><a href="index.php" title="Home"><i class="bi bi-house"></i></a></li>
        <li><a href="products.php" title="Shop Collection"><i class="bi bi-bag"></i></a></li>

        <?php if(isset($_SESSION['email'])) { ?>
        <li>
            <a href="cart.php" class="cart-icon" title="View Cart">
                <i class="bi bi-cart"></i>
                <?php
                // Defensive check to ensure $con exists
                if(isset($con)) {
                    // Added security: escape the session email
                    $user = mysqli_real_escape_string($con, $_SESSION['email']);
                    $q1 = "SELECT * FROM cart WHERE email='$user'";
                    $result = mysqli_query($con, $q1);
                    $num_rows = mysqli_num_rows($result);
                    
                    // Only show the red badge if there are items in the cart
                    if($num_rows > 0) {
                        echo '<span class="cart-count">' . $num_rows . '</span>';
                    }
                }
                ?>
            </a>
        </li>
        <?php } ?>

        <li><a href="aboutus.php" title="About Us"><i class="bi bi-people"></i></a></li>
        <li><a href="contact.php" title="Contact Us"><i class="bi bi-telephone"></i></a></li>

        <?php if(isset($_SESSION['email'])) { ?>
            <li><a href="profile.php" title="Your Profile"><i class="bi bi-person-circle"></i></a></li>
            <li><a href="logout.php" title="Logout"><i class="bi bi-box-arrow-right"></i></a></li>
        <?php } else { ?>
            <li><a href="login.php" class="login-btn"><i class="bi bi-person"></i> Login</a></li>
        <?php } ?>
    </ul>
</nav>

<script>
    document.querySelector('.mobile-menu-btn').addEventListener('click', function() {
        document.querySelector('.nav-links').classList.toggle('active');
    });
</script>