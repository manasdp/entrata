<?php
error_reporting(0);
session_start();

// If the user is already logged in, redirect them to the home page
if(isset($_SESSION['email'])){
    header("Location: index.php");
    exit();
}

require_once __DIR__ . '/validation.php';
require_once 'include.php';

// --- PROCESS SIGNUP LOGIC BEFORE HTML RENDERS ---
$sweet_alert = null;

if(isset($_POST['signup'])) {
    $vn = ff_validate_name($_POST['name'] ?? '');
    $ve = ff_validate_email_addr($_POST['email'] ?? '');
    $vc = ff_validate_contact_in($_POST['contact'] ?? '');
    $vg = ff_validate_gender($_POST['gender'] ?? '');
    $vp = ff_validate_password_min($_POST['password'] ?? '');

    $fail = null;

    if (!$vn['ok']) { $fail = $vn['msg']; }
    elseif (!$ve['ok']) { $fail = $ve['msg']; }
    elseif (!$vc['ok']) { $fail = $vc['msg']; }
    elseif (!$vg['ok']) { $fail = $vg['msg']; }
    elseif (!$vp['ok']) { $fail = $vp['msg']; }

    if ($fail !== null) {
        $sweet_alert = ['icon' => 'warning', 'title' => 'Error', 'text' => $fail];
    } else {
        $name = $vn['value'];
        $email = $ve['value'];
        $contact = $vc['value'];
        $gender = $vg['value'];
        $password = $vp['value'];

        // Hash password securely
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Check if email exists
        $stmt = mysqli_prepare($con, "SELECT id FROM user_detail WHERE email=?");
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($result) > 0) {
            $sweet_alert = ['icon' => 'info', 'title' => 'Sorry!', 'text' => 'That email is already taken!'];
        } else {
            // Insert user securely
            $stmt = mysqli_prepare($con, "INSERT INTO user_detail(name,email,contactno,gender,password) VALUES(?,?,?,?,?)");
            mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $contact, $gender, $hashed_password);

            if(mysqli_stmt_execute($stmt)) {
                $sweet_alert = ['icon' => 'success', 'title' => 'Account Created!', 'text' => 'You can now log in.', 'redirect' => 'login.php'];
            } else {
                $sweet_alert = ['icon' => 'error', 'title' => 'Oops!', 'text' => 'Something went wrong! Please try again.'];
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
    <title>Fashion Fusion | Create Account</title>
    
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
                <img src="images/login-images/signup.png" alt="Fashion Fusion Signup" onerror="this.src='images/slide2.jpg'">
                <div class="auth-image-overlay">
                    <h2>Join the Club</h2>
                    <p>Create an account to unlock exclusive deals and personalized style recommendations.</p>
                </div>
            </div>

            <div class="auth-form-col">
                <div class="auth-header">
                    <h2>Create Account</h2>
                    <p>Fill in your details below to get started.</p>
                </div>

                <form method="POST" action="" class="auth-form">
                    <div class="input-group">
                        <label for="name">Full Name</label>
                        <input type="text" id="name" placeholder="e.g., John Doe" name="name" required minlength="2" maxlength="100" pattern="[A-Za-z\s\-'.]+" title="Letters only">
                    </div>
                    
                    <div class="input-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" placeholder="e.g., john@example.com" name="email" required maxlength="254" autocomplete="email">
                    </div>

                    <div class="input-group">
                        <label for="contact">Contact Number</label>
                        <input type="tel" id="contact" placeholder="10-digit mobile number" name="contact" required pattern="[6-9][0-9]{9}" maxlength="10" inputmode="numeric" title="10-digit Indian mobile">
                    </div>

                    <div class="input-group">
                        <label>Gender</label>
                        <div style="display: flex; gap: 20px; margin-top: 5px;">
                            <label style="font-weight: normal; font-size: 0.95rem; display: flex; align-items: center; gap: 5px; cursor: pointer;">
                                <input type="radio" value="Male" name="gender" required> Male
                            </label>
                            <label style="font-weight: normal; font-size: 0.95rem; display: flex; align-items: center; gap: 5px; cursor: pointer;">
                                <input type="radio" value="Female" name="gender"> Female
                            </label>
                        </div>
                    </div>

                    <div class="input-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" placeholder="Minimum 8 characters" name="password" required minlength="8" maxlength="128" autocomplete="new-password">
                    </div>

                    <button type="submit" name="signup" class="btn-primary btn-block" style="margin-top: 10px;">Create Account</button>
                </form>

                <div class="auth-footer">
                    <p>Already have an account? <a href="login.php" class="text-primary">Sign In</a></p>
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