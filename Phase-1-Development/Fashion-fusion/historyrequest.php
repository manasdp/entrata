<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if(!isset($_SESSION['email'])){
    header('location:login.php');
    exit();
}

@include 'include.php';

$user = $_SESSION['email'];

// ✅ Check if any approved order exists
$stmt = mysqli_prepare($con, "SELECT order_id FROM orders WHERE email=? AND status='approved' ");
mysqli_stmt_bind_param($stmt, "s", $user);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if(mysqli_num_rows($result) > 0){
    header('location:billhistory.php');
    exit();
}

// If no approved orders → show message
?>
<!DOCTYPE html>
<html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<script>
document.addEventListener('DOMContentLoaded', function() {
    Swal.fire({
        icon: 'info',
        title:'Sorry!',
        text: 'Please wait. Your request is pending.'
    }).then(() => {
        window.location.href = 'cart.php';
    });
});
</script>

</body>
</html>