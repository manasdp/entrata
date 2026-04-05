<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../validation.php';
@include '../include.php';

$sweet_alert = null; // ✅ IMPORTANT

if(isset($_POST['login']))
{
    $ve = ff_validate_email_addr($_POST['email'] ?? '');
    $vp = ff_validate_login_password_present($_POST['password'] ?? '');

    if (!$ve['ok'] || !$vp['ok']) {
        $msg = !$ve['ok'] ? $ve['msg'] : $vp['msg'];

        $sweet_alert = [
            'icon' => 'warning',
            'title' => 'Invalid input',
            'text' => $msg
        ];

    } else {

        $admin_email = trim($ve['value']);
        $password = trim($vp['value']);

        $stmt = mysqli_prepare($con, "SELECT * FROM admin_detail WHERE admin_email=?");
        mysqli_stmt_bind_param($stmt, "s", $admin_email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if($result && mysqli_num_rows($result) > 0){
            $admin = mysqli_fetch_assoc($result);

            if (
                password_verify($password, $admin['password']) ||
                $password === $admin['password']
            ){
                session_regenerate_id(true);
                $_SESSION['admin_email'] = $admin_email;

                $sweet_alert = [
                    'icon' => 'success',
                    'title' => 'Login Successful',
                    'text' => 'Welcome Admin!',
                    'redirect' => 'index.php'
                ];

            } else {
                $sweet_alert = [
                    'icon' => 'error',
                    'title' => 'Login Failed',
                    'text' => 'Invalid password'
                ];
            }

        } else {
            $sweet_alert = [
                'icon' => 'error',
                'title' => 'Login Failed',
                'text' => 'Email not found'
            ];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Document</title>
</head>
<body>
    <center>
<div class="container">
    <div class="heading">Admin Sign In</div>
    <form action="" method="POST" class="form">
      <input required="" class="input" type="email" name="email" id="email" placeholder="E-mail">
      <input required="" class="input" type="password" name="password" id="password" placeholder="Password">
      <span class="forgot-password"><a href="admin_forgotpass.php">Forgot Password?</a></span>
      <input class="login-button" type="submit" value="Sign In" name="login">
    </form>
  </div>
</center>
<?php if($sweet_alert): ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    Swal.fire({
        icon: '<?php echo $sweet_alert["icon"]; ?>',
        title: '<?php echo $sweet_alert["title"]; ?>',
        text: '<?php echo $sweet_alert["text"]; ?>',
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

