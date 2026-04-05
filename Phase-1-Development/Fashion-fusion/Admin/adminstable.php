<?php
session_start();
error_reporting(0);

$user=$_SESSION['admin_email'];
$admin = $_SESSION['admin_email'];
if(!isset($admin)){
   header('location:admin_login.php');
}
@include 'include.php';
require_once __DIR__ . '/../validation.php';

if(isset($_GET['delete'])){
   $vd = ff_validate_positive_int($_GET['delete'] ?? '', 1, 999999);

   if($vd['ok']){
      $delete_id = (int)$vd['value'];

      // ❌ Prevent deleting yourself
      $stmt = mysqli_prepare($con, "SELECT admin_email FROM admin_detail WHERE id=?");
      mysqli_stmt_bind_param($stmt, "i", $delete_id);
      mysqli_stmt_execute($stmt);
      $res = mysqli_stmt_get_result($stmt);
      $row = mysqli_fetch_assoc($res);

      if($row && $row['admin_email'] == $_SESSION['admin_email']){
         echo "<script>alert('You cannot delete your own account');</script>";
      } else {
         // ✅ Safe delete
         $stmt = mysqli_prepare($con, "DELETE FROM admin_detail WHERE id=?");
         mysqli_stmt_bind_param($stmt, "i", $delete_id);
         mysqli_stmt_execute($stmt);

         header('location:adminstable.php');
         exit();
      }
   }
}

?>

<html>
<head>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/p_detail.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <title>Admin Panel</title>
</head>
<body>

   <div class="side-menu">
        <?php @include 'header.php';?>
    </div>
    
   <div class="container">
<center>
<p class="message">Admins Detail</p>
<div class="container">
<section class="display-product-table">

   <table>

      <thead>
         <th>Name</th>
         <th>Email</th>
         <th>Mobile No</th>
         <th>Gender</th>
         <th>Action</th>
      </thead>

      <tbody>
         <?php
         mysqli_select_db($con, "fashionfusion");
         $q1 = "SELECT * FROM `admin_detail`";
         $result = mysqli_query($con, $q1);
         if(mysqli_num_rows($result) > 0){
         while($row = mysqli_fetch_assoc($result)){
         ?>

         <tr>
         <td><?php echo htmlspecialchars($row['name']); ?></td>
<td><?php echo htmlspecialchars($row['admin_email']); ?></td>
<td><?php echo htmlspecialchars($row['contactno']); ?></td>
<td><?php echo htmlspecialchars($row['gender']); ?></td>
            <td>
               <a title="Delete" href="adminstable.php?delete=<?php echo $row['id']; ?>"onclick="return confirm('are your sure you want to delete this?');"> <i class="bi bi-trash3"></i></a>
            </td>
         </tr><?php
                  }    
                  }
               ?>
      </tbody>
   </table>

</section>

</section>
</div>
</body>
</html>
