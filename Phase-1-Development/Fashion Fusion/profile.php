<?php
error_reporting(0);
session_start();

// --- AUTHENTICATION & DATA FETCHING BEFORE HTML ---
if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
    header("Location: login.php");
    exit();
}

require_once 'include.php';

$user = $_SESSION['email'];

// Prepared statement to securely fetch user data
$stmt = mysqli_prepare($con, "SELECT name, email, gender, contactno FROM user_detail WHERE email=?");
mysqli_stmt_bind_param($stmt, "s", $user);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if(!$result){
    die("Query failed: " . mysqli_error($con));
}

$userData = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion Fusion | My Profile</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&family=Playfair+Display:ital,wght@0,600;0,700;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <?php @include 'header.php';?>

    <div class="profile-page-wrapper">
        <?php if($userData): ?>
        
        <div class="profile-card">
            <div class="profile-header">
                <img class="profile-avatar" src="images/profile.png" alt="Profile Picture" onerror="this.src='https://cdn-icons-png.flaticon.com/512/847/847969.png'">
                <h2>
                    <?php 
                    $prefix = ($userData['gender'] == 'Male') ? "Mr. " : "Ms. ";
                    echo $prefix . htmlspecialchars($userData['name']);
                    ?>
                </h2>
                <p class="profile-role">Fashion Fusion Member</p>
            </div>

            <div class="profile-body">
                <h3 class="section-title">Account Details</h3>
                
                <div class="profile-detail-grid">
                    <div class="detail-item">
                        <i class="bi bi-envelope-at"></i>
                        <div class="detail-info">
                            <h4>Email Address</h4>
                            <p><?php echo htmlspecialchars($userData['email']); ?></p>
                        </div>
                    </div>
                    
                    <div class="detail-item">
                        <i class="bi bi-telephone"></i>
                        <div class="detail-info">
                            <h4>Contact Number</h4>
                            <p><?php echo htmlspecialchars($userData['contactno'] ? $userData['contactno'] : 'Not provided'); ?></p>
                        </div>
                    </div>

                    <div class="detail-item">
                        <i class="bi bi-person-vcard"></i>
                        <div class="detail-info">
                            <h4>Gender</h4>
                            <p><?php echo htmlspecialchars($userData['gender'] ? $userData['gender'] : 'Not specified'); ?></p>
                        </div>
                    </div>
                </div>

                <div class="profile-actions">
                    <a href="cart.php" class="btn-primary"><i class="bi bi-cart3"></i> My Cart</a>
                    <a href="historyrequest.php" class="btn-outline"><i class="bi bi-clock-history"></i> Order History</a>
                </div>
                
                <div class="profile-logout">
                    <a href="logout.php" class="btn-text-danger"><i class="bi bi-box-arrow-right"></i> Log Out</a>
                </div>
            </div>
        </div>

        <?php else: ?>
        <div class="empty-cart">
            <i class="bi bi-person-exclamation empty-icon"></i>
            <h2>User Profile Not Found</h2>
            <p>We couldn't load your details. Please try logging in again.</p>
            <a href="login.php" class="btn-primary mt-3">Go to Login</a>
        </div>
        <?php endif; ?>
    </div>

    <footer class="site-footer">
        <div class="footer-bottom" style="margin-top: 0; padding: 20px 0;">
            <p>&copy; <?php echo date("Y"); ?> Fashion Fusion. All Rights Reserved.</p>
        </div>
    </footer>

</body>
</html>