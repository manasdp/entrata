<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Document</title>
</head>
<body>
    <center>
<div class="container">
    <div class="heading">Admin Forgot Pssword</div>
    <form action="" method="POST" class="form">
      <input required="" class="input" type="email" name="email" id="email" placeholder="Enter Your E-mail">
      <input required="" class="input" type="password" name="password" id="password" placeholder="Enter New Password">
      <input required="" class="input" type="password" name="cpassword" id="password" placeholder="Enter New Password Again">
      <input class="login-button" type="submit" value="CONFORM" name="forgot">
      <span class="forgot-password"><a href="admin_login.php">BACK</a></span>
    </form>
  </div>
</center>
</body>
</html>
<?php
error_reporting(0);
session_start();
require_once __DIR__ . '/../validation.php';
@include '../include.php';

if(isset($_POST['forgot']))
{
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
        ?>
        <script>
        Swal.fire({
            icon: 'warning',
            title: 'Invalid input',
            text: <?php echo json_encode($fail); ?>
        });
        </script>
        <?php
    } else {

        $email = $ve['value'];

        // 🔐 HASH PASSWORD (IMPORTANT)
        $hashed_password = password_hash($vp['value'], PASSWORD_DEFAULT);

        // ✅ Check if admin exists
        $stmt = mysqli_prepare($con, "SELECT admin_email FROM admin_detail WHERE admin_email=?");
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($result) === 0){
            ?>
            <script>
            Swal.fire({
                icon: 'info',
                title: "Email not found",
                text: "Try a registered admin email"
            });
            </script>
            <?php
        } else {

            // ✅ Update password safely
            $stmt = mysqli_prepare($con, "UPDATE admin_detail SET password=? WHERE admin_email=?");
            mysqli_stmt_bind_param($stmt, "ss", $hashed_password, $email);
            $update = mysqli_stmt_execute($stmt);

            if($update){
                ?>
                <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'success',
                        title:'Password Updated!',
                        text: 'You can login now',
                        timer: 1500,
                        showConfirmButton: false
                    }).then(() => {
                        window.location.href = 'admin_login.php';
                    });
                });
                </script>
                <?php
            } else {
                ?>
                <script>
                Swal.fire({
                    icon: 'error',
                    title:'Error',
                    text: 'Something went wrong!'
                });
                </script>
                <?php
            }
        }
    }
}
?>