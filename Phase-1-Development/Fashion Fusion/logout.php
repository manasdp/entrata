<?php
session_start();

// Destroy session
$_SESSION = [];
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<script>
Swal.fire({
    icon: 'success',
    title: 'Logged Out',
    text: 'You have been logged out successfully!',
    confirmButtonText: 'OK'
}).then(() => {
    window.location.href = 'index.php';
});
</script>

</body>
</html>