<?php
session_start();
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
document.addEventListener('DOMContentLoaded', function() {
    Swal.fire({
        icon: 'success',
        title: 'You Have Been Logged Out.',
        text: 'Thank You!'
    }).then(() => {
        window.location.href = 'index.php';
    });
});
</script>

</body>
</html>
