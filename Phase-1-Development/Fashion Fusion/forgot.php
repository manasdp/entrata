<?php
error_reporting(0);
session_start();

// If the user is already logged in, they don't need to reset their password
if(isset($_SESSION['email'])){
    header("Location: index.php");
    exit();
}

require_once __DIR__ . '/validation.php';
require_once 'include.php';

// --- PROCESS PASSWORD RESET LOGIC BEFORE HTML RENDERS ---
$sweet_alert = null;

if(isset($_POST['forgot'])) {
    $ve = ff_validate_email_addr($_POST['email'] ?? '');
    $vp = ff_validate_password_min($_POST['password'] ?? '');
    $vcp = ff_validate_password_min($_POST['cpassword'] ?? '');

    $fail = null;

    if (!$ve['ok']) { $fail = $ve['msg']; }
    elseif (!$vp['ok']) { $fail = $vp['msg']; }
    elseif (!$vcp['ok']) { $fail = $vcp['msg']; }
    elseif ($vp['value'] !== $vcp['value']) { 
        $fail = 'Password and confirm password do not match.'; 
    }

    if ($fail !== null) {
        $sweet_alert = ['icon' => 'warning', 'title' => 'Invalid input', 'text' => $fail];
    } else {
        $email = $ve['value'];
        $password = $vp['value'];

        // Hash new password securely
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Check if user exists in the database
        $stmt = mysqli_prepare($con, "SELECT id FROM user_detail WHERE email=?");
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($result) === 0) {
            $sweet_alert = ['icon' => 'info', 'title' => 'Not Found', 'text' => 'No account found with that email address.'];
        } else {
            // Update password securely
            $stmt = mysqli_prepare($con, "UPDATE user_detail SET password=? WHERE email=?");
            mysqli_stmt_bind_param($stmt, "ss", $hashed_password, $email);

            if(mysqli_stmt_execute($stmt)) {
                $sweet_alert = ['icon' => 'success', 'title' => 'Updated!', 'text' => 'Password reset successfully.', 'redirect' => 'login.php'];
            } else {
                $sweet_alert = ['icon' => 'error', 'title' => 'Oops!', 'text' => 'Failed to update password. Please try again.'];
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
    <title>Fashion Fusion | Reset Password</title>
    
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
                <img src="images/login-images/forgot.png" alt="Reset Password" onerror="this.src='images/slide3.jpg'">
                <div class="auth-image-overlay">
                    <h2>Fresh Start</h2>
                    <p>Secure your account and get back to discovering your unique style.</p>
                </div>
            </div>

            <div class="auth-form-col">
                <div class="auth-header">
                    <h2>Reset Password</h2>
                    <p>Enter your email and create a new password below.</p>
                </div>

                <form method="post" action="" class="auth-form">
                    <div class="input-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" required maxlength="254" autocomplete="email">
                    </div>
                    
                    <div class="input-group">
                        <label for="password">New Password</label>
                        <input type="password" id="password" name="password" placeholder="Minimum 8 characters" required minlength="8" maxlength="128" autocomplete="new-password">
                    </div>

                    <div class="input-group">
                        <label for="cpassword">Confirm Password</label>
                        <input type="password" id="cpassword" name="cpassword" placeholder="Re-enter new password" required minlength="8" maxlength="128" autocomplete="new-password">
                    </div>

                    <button type="submit" name="forgot" class="btn-primary btn-block" style="margin-top: 15px;">Reset Password</button>
                </form>

                <div class="auth-footer">
                    <p>Remembered your password? <a href="login.php" class="text-primary">Back to Login</a></p>
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