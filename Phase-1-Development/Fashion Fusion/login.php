<?php
error_reporting(0);
session_start();

// If user is already logged in, redirect them away from the login page
if(isset($_SESSION['email'])){
    header("Location: index.php");
    exit();
}

require_once __DIR__ . '/validation.php';
require_once 'include.php'; 

// --- PROCESS LOGIN LOGIC BEFORE HTML RENDERS ---
$sweet_alert = null;

if(isset($_POST['login'])) {
    $ve = ff_validate_email_addr($_POST['email'] ?? '');
    $vp = ff_validate_login_password_present($_POST['password'] ?? '');

    if (!$ve['ok'] || !$vp['ok']) {
        $msg = !$ve['ok'] ? $ve['msg'] : $vp['msg'];
        $sweet_alert = ['icon' => 'warning', 'title' => 'Invalid input', 'text' => $msg];
    } else {
        $email = $ve['value'];
        $password = $vp['value'];

        // Prepared Statement (SECURE)
        $stmt = mysqli_prepare($con, "SELECT * FROM user_detail WHERE email=?");
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if($row = mysqli_fetch_assoc($result)) {
            // Verify hashed password
            if(password_verify($password, $row['password'])) {
                $_SESSION['email'] = $row['email'];
                $sweet_alert = ['icon' => 'success', 'title' => 'Welcome Back!', 'text' => 'Login successful!', 'redirect' => 'index.php'];
            } else {
                $sweet_alert = ['icon' => 'error', 'title' => 'Oops!', 'text' => 'Invalid Email or Password!'];
            }
        } else {
            $sweet_alert = ['icon' => 'error', 'title' => 'Oops!', 'text' => 'User not found!'];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion Fusion | Login</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&family=Playfair+Display:ital,wght@0,600;0,700;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <?php @include 'header.php';?>

    <div class="auth-page-wrapper">
        <div class="auth-container">
            
            <div class="auth-image-col">
                <img src="/images/login-images/login.png" alt="Fashion Fusion Login" onerror="this.src='images/slide1.jpg'">
                <div class="auth-image-overlay">
                    <h2>Welcome Back</h2>
                    <p>Discover the latest trends and exclusive offers.</p>
                </div>
            </div>

            <div class="auth-form-col">
                <div class="auth-header">
                    <h2>Sign In</h2>
                    <p>Please enter your details to access your account.</p>
                </div>

                <form method="POST" action="" class="auth-form">
                    <div class="input-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" placeholder="Enter your email" name="email" required maxlength="254" autocomplete="username">
                    </div>
                    
                    <div class="input-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" placeholder="Enter your password" name="password" required maxlength="128" autocomplete="current-password">
                    </div>

                    <div class="form-actions">
                        <a href="forgot.php" class="forgot-link">Forgot Password?</a>
                    </div>

                    <button type="submit" name="login" class="btn-primary btn-block">Login</button>
                </form>

                <div class="auth-footer">
                    <p>Don't have an account? <a href="signup.php" class="text-primary">Sign Up</a></p>
                </div>
            </div>

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