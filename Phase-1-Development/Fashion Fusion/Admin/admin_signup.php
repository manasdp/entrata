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
    <div class="heading">Admin Sign Up</div>
    <form action="" method="POST" class="form">
        <input class="input" type="text" name="name" placeholder="Full Name" required minlength="2" maxlength="100" pattern="[A-Za-z\s\-'.]+">
        <input class="input" type="email" name="email" placeholder="E-mail" required maxlength="254">
        <input class="input" type="tel" name="contact" placeholder="Contact Number (10 digits)" required pattern="[6-9][0-9]{9}" maxlength="10" inputmode="numeric">
        <div class="input">
			  <label>Gender</label>
        <input type="radio" value="Male" name="gender" required>Male
        <input type="radio" value="Female" name="gender">Female
        </div>
        <input class="input" type="password" name="password" placeholder="Password (min 8)" required minlength="8" maxlength="128">
        <input class="login-button" type="submit" value="Sign Up" name="signup">
        <span class="forgot-password"><a href="index.php">BACK</a></span>
    </form>
  </div>
</center>
</body>
</html>
<?php
error_reporting(0);
require_once __DIR__ . '/../validation.php';
@include '../include.php';

if(isset($_POST['signup']))
{
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
        ?>
        <script>
        Swal.fire({ icon: 'warning', title: 'Invalid input', text: <?php echo json_encode($fail); ?> });
        </script>
        <?php
    } else {

        $name = $vn['value'];
        $email = $ve['value'];
        $contact = $vc['value'];
        $gender = $vg['value'];
        $password = $vp['value'];

        // 🔐 HASH PASSWORD (IMPORTANT)
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // ✅ Check if admin exists
        $stmt = mysqli_prepare($con, "SELECT admin_email FROM admin_detail WHERE admin_email=?");
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($result) > 0){
            ?>
            <script>
            Swal.fire({
                icon: 'info',
                title:'Email Exists',
                text: 'Admin already registered!',
            });
            </script>
            <?php
        } else {

            // ✅ Insert admin securely
            $stmt = mysqli_prepare($con, 
                "INSERT INTO admin_detail(name, admin_email, contactno, gender, password) 
                 VALUES(?,?,?,?,?)"
            );

            mysqli_stmt_bind_param($stmt, "sssss", 
                $name, $email, $contact, $gender, $hashed_password
            );

            if(mysqli_stmt_execute($stmt)){
                ?>
                <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                    icon: 'success',
                    title:'Account Created',
                    text: 'Admin registered successfully!',
                    timer: 1500,
                    showConfirmButton: false
                    }).then(() => {
                        window.location.href = 'index.php';
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
                    text: 'Something went wrong!',
                });
                </script>
                <?php
            }
        }
    }
}
?>