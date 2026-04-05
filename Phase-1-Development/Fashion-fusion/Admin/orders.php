<?php
session_start();
error_reporting(0);

$user=$_SESSION['admin_email'];
$admin = $_SESSION['admin_email'];
if(!isset($admin)){
   header('location:admin_login.php');
}
@include 'include.php';
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
<p class="message">Total Orders</p>
<div class="container">
<section class="display-product-table">

   <table>

      <thead>
         <th>Items</th>
         <th>Customer</th>
         <th>Mobile No</th>
         <th>Email</th>
         <th>Address</th>
         <th>Total Amount</th>
         <th>Date</th>
         <th>Time</th>
         <th>Status</th>
      </thead>

      <tbody>
         <?php
         $stmt = mysqli_prepare($con, "SELECT * FROM orders ORDER BY order_id DESC");
         mysqli_stmt_execute($stmt);
         $result = mysqli_stmt_get_result($stmt);
         
         if(mysqli_num_rows($result) == 0){
             echo "<tr><td colspan='9'>No orders found</td></tr>";
         }
         
         while($row = mysqli_fetch_assoc($result)){
         ?>

         <tr>
         <td><?= htmlspecialchars($row['items']); ?></td>
<td><?= htmlspecialchars($row['custname']); ?></td>
<td><?= htmlspecialchars($row['contactno']); ?></td>
<td><?= htmlspecialchars($row['email']); ?></td>
<td>
<?= htmlspecialchars(
$row['address'].' ,'.$row['city'].' ,'.$row['state'].' ,'.$row['country'].' ,'.$row['pincode']
); ?>
</td>

<td><?= htmlspecialchars($row['payment']); ?></td>
<td><?= htmlspecialchars($row['order_date']); ?></td>
<td><?= htmlspecialchars($row['order_time']); ?></td>
<td><?= htmlspecialchars($row['status']); ?></td>
         </tr><?php
                  }    
               ?>
      </tbody>
   </table>

</section>

</section>
</div>
</body>
</html>
