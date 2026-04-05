<?php
error_reporting(0);
session_start();
require_once __DIR__ . '/validation.php';
require_once 'include.php';

// --- PROCESS CONTACT FORM BEFORE HTML RENDERS ---
$sweet_alert = null;

if(isset($_POST['submit'])) {
    $vn = ff_validate_name($_POST['name'] ?? '');
    $ve = ff_validate_email_addr($_POST['email'] ?? '');
    $vm = ff_validate_contact_message($_POST['message'] ?? '');

    if (!$vn['ok'] || !$ve['ok'] || !$vm['ok']) {
        $fail = !$vn['ok'] ? $vn['msg'] : (!$ve['ok'] ? $ve['msg'] : $vm['msg']);
        $sweet_alert = ['icon' => 'warning', 'title' => 'Invalid Input', 'text' => $fail];
    } else {
        $name = $vn['value'];
        $email = $ve['value'];
        $message = $vm['value'];

        // Prepared statement (SECURE)
        $stmt = mysqli_prepare($con, "INSERT INTO contact (name, email, message) VALUES (?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "sss", $name, $email, $message);

        if(mysqli_stmt_execute($stmt)) {
            $sweet_alert = ['icon' => 'success', 'title' => 'Thank You!', 'text' => 'Your query has been submitted.', 'redirect' => 'contact.php'];
        } else {
            $sweet_alert = ['icon' => 'error', 'title' => 'Oops!', 'text' => 'Something went wrong. Please try again.'];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion Fusion | Contact Us</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&family=Playfair+Display:ital,wght@0,600;0,700;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <?php @include 'header.php';?>

    <div class="page-header">
        <h1>Get In <span class="text-primary">Touch</span></h1>
        <hr class="divider">
    </div>

    <div class="contact-page-wrapper">
        <div class="container contact-container">
            
            <div class="contact-info-col">
                <h2>We're Here to Help</h2>
                <p>Have a question about your order, our products, or just want to say hello? Drop us a line and our customer service team will get back to you as soon as possible.</p>
                
                <div class="info-list">
                    <div class="info-item">
                        <i class="bi bi-geo-alt"></i>
                        <div>
                            <h4>Visit Us</h4>
                            <p>123 Sai Sharddha Apartment<br>Katraj, Pune, MH 411039</p>
                        </div>
                    </div>
                    
                    <div class="info-item">
                        <i class="bi bi-envelope"></i>
                        <div>
                            <h4>Email Us</h4>
                            <p>support@fashionfusion.com<br>info@fashionfusion.com</p>
                        </div>
                    </div>

                    <div class="info-item">
                        <i class="bi bi-telephone"></i>
                        <div>
                            <h4>Call Us</h4>
                            <p>+91 9922468220<br>Mon-Fri, 9am to 6pm</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="contact-form-col">
                <form method="post" action="" class="auth-form contact-form">
                    <div class="input-group">
                        <label for="name">Full Name</label>
                        <input type="text" id="name" name="name" placeholder="John Doe" required minlength="2" maxlength="100" pattern="[A-Za-z\s\-'.]+" title="Letters only">
                    </div>
                    
                    <div class="input-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" placeholder="john@example.com" required maxlength="254">
                    </div>
                    
                    <div class="input-group">
                        <label for="message">Your Message</label>
                        <textarea id="message" name="message" rows="5" placeholder="How can we help you today?" required minlength="10" maxlength="5000"></textarea>
                    </div>
                    
                    <button type="submit" name="submit" class="btn-primary btn-block">Send Message</button>
                </form>
            </div>

        </div>
    </div>

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

    <?php if($sweet_alert): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: '<?php echo $sweet_alert["icon"]; ?>',
                title: '<?php echo addslashes($sweet_alert["title"]); ?>',
                text: '<?php echo addslashes($sweet_alert["text"]); ?>',
                confirmButtonColor: '#f84258',
                showConfirmButton: <?php echo isset($sweet_alert["redirect"]) ? 'false' : 'true'; ?>,
                timer: <?php echo isset($sweet_alert["redirect"]) ? '1500' : 'undefined'; ?>
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