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
   $delete_id = $vd['value'];
   mysqli_select_db($con, "fashionfusion");
   $stmt = mysqli_prepare($con, "DELETE FROM products_man WHERE id=?");
mysqli_stmt_bind_param($stmt, "i", $delete_id);
mysqli_stmt_execute($stmt);
   
      header('location:products.php');
      exit();
   
   }
}

if(isset($_POST['update_product'])){
   $vi = ff_validate_positive_int($_POST['update_p_id'] ?? '', 1, 999999);
   $vn = ff_validate_product_name($_POST['update_p_name'] ?? '');
   $vp = ff_validate_price($_POST['update_p_price'] ?? '');
   $vd = ff_validate_product_description($_POST['update_p_description'] ?? '');
   $update_p_image = $_FILES['update_p_image']['name'] ?? '';
   $update_p_image_tmp_name = $_FILES['update_p_image']['tmp_name'] ?? '';

   if($vi['ok'] && $vn['ok'] && $vp['ok'] && $vd['ok']){
   $update_p_id = $vi['value'];
   $update_p_name = ff_db_escape($con, $vn['value']);
   $update_p_price = ff_db_escape($con, (string) $vp['value']);
   $update_p_description = ff_db_escape($con, $vd['value']);

   if(empty($update_p_image))
   {
      mysqli_select_db($con, "fashionfusion");
      $stmt = mysqli_prepare($con, 
"UPDATE products_man SET p_name=?, p_price=?, p_description=? WHERE id=?");

mysqli_stmt_bind_param($stmt, "sssi", $update_p_name, $update_p_price, $update_p_description, $update_p_id);
mysqli_stmt_execute($stmt);
      
         header('location:products.php');
      exit();
   }
   else {
      $vu = ff_validate_upload_image('update_p_image', true);
      if($vu['ok']){
      $img_esc = ff_db_escape($con, $vu['value']);
      mysqli_select_db($con, "fashionfusion");
      $stmt = mysqli_prepare($con, 
"UPDATE products_man SET p_name=?, p_price=?, p_image=?, p_description=? WHERE id=?");

mysqli_stmt_bind_param($stmt, "ssssi", 
$update_p_name, $update_p_price, $img_esc, $update_p_description, $update_p_id);

mysqli_stmt_execute($stmt);
      
         move_uploaded_file($update_p_image_tmp_name, 'uploaded_img/'.$vu['value']);
         header('location:products.php');
      exit();
      }
   }
   }
}

if(isset($_GET['deletew'])){
   $vd = ff_validate_positive_int($_GET['deletew'] ?? '', 1, 999999);
   if($vd['ok']){
   $delete_id = $vd['value'];
   mysqli_select_db($con, "fashionfusion");
   $stmt = mysqli_prepare($con, "DELETE FROM products_woman WHERE id=?");
mysqli_stmt_bind_param($stmt, "i", $delete_id);
mysqli_stmt_execute($stmt);
header('location:products.php');
exit();
   
   }
}

if(isset($_POST['update_productw'])){
   $vi = ff_validate_positive_int($_POST['update_p_id'] ?? '', 1, 999999);
   $vn = ff_validate_product_name($_POST['update_p_name'] ?? '');
   $vp = ff_validate_price($_POST['update_p_price'] ?? '');
   $vd = ff_validate_product_description($_POST['update_p_description'] ?? '');
   $vu = ff_validate_upload_image('update_p_image', true);
   if($vi['ok'] && $vn['ok'] && $vp['ok'] && $vd['ok'] && $vu['ok']){
   $update_p_id = $vi['value'];
   $update_p_name = ff_db_escape($con, $vn['value']);
   $update_p_price = ff_db_escape($con, (string) $vp['value']);
   $update_p_description = ff_db_escape($con, $vd['value']);
   $update_p_image = ff_db_escape($con, $vu['value']);
   $update_p_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
   $update_p_image_folder = 'uploaded_img/'.$vu['value'];

   mysqli_select_db($con, "fashionfusion");
   $stmt = mysqli_prepare($con, 
"UPDATE products_woman SET p_name=?, p_price=?, p_image=?, p_description=? WHERE id=?");

mysqli_stmt_bind_param($stmt, "ssssi", 
$update_p_name, $update_p_price, $update_p_image, $update_p_description, $update_p_id);

mysqli_stmt_execute($stmt);
   
      move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);
      header('location:products.php');
      exit();
   }
}


if(isset($_GET['deletek'])){
   $vd = ff_validate_positive_int($_GET['deletek'] ?? '', 1, 999999);
   if($vd['ok']){
   $delete_id = $vd['value'];
   mysqli_select_db($con, "fashionfusion");
   $q1 = "DELETE FROM `products_kids` WHERE id = " . (int)$delete_id;
   $result = mysqli_query($con, $q1);
   if($result){
      header('location:products.php');
      exit();
   }
   }
}

if(isset($_POST['update_productk'])){
   $vi = ff_validate_positive_int($_POST['update_p_id'] ?? '', 1, 999999);
   $vn = ff_validate_product_name($_POST['update_p_name'] ?? '');
   $vp = ff_validate_price($_POST['update_p_price'] ?? '');
   $vd = ff_validate_product_description($_POST['update_p_description'] ?? '');
   $vu = ff_validate_upload_image('update_p_image', true);
   if($vi['ok'] && $vn['ok'] && $vp['ok'] && $vd['ok'] && $vu['ok']){
   $update_p_id = $vi['value'];
   $update_p_name = ff_db_escape($con, $vn['value']);
   $update_p_price = ff_db_escape($con, (string) $vp['value']);
   $update_p_description = ff_db_escape($con, $vd['value']);
   $update_p_image = ff_db_escape($con, $vu['value']);
   $update_p_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
   $update_p_image_folder = 'uploaded_img/'.$vu['value'];

   mysqli_select_db($con, "fashionfusion");
   $stmt = mysqli_prepare($con, 
"UPDATE products_kids SET p_name=?, p_price=?, p_image=?, p_description=? WHERE id=?");

mysqli_stmt_bind_param($stmt, "ssssi", 
$update_p_name, $update_p_price, $update_p_image, $update_p_description, $update_p_id);

mysqli_stmt_execute($stmt);
   
      move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);
      header('location:products.php');
   exit();
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
<p class="message">Men's Products</p>
<div class="container">
<section class="display-product-table">

   <table>

      <thead>
         <th>product image</th>
         <th>product name</th>
         <th>product price</th>
         <th>action</th>
      </thead>

      <tbody>
         <?php
         mysqli_select_db($con, "fashionfusion");
         $q1 = "SELECT * FROM `products_man`";
         $result = mysqli_query($con, $q1);
         if(mysqli_num_rows($result) > 0){
         while($row = mysqli_fetch_assoc($result)){
         ?>

         <tr>
            <td><img src="uploaded_img/<?php echo htmlspecialchars( $row['p_image']); ?>" height="100" alt=""></td>
            <td><?php echo htmlspecialchars ($row['p_name']); ?></td>
            <td><?php echo htmlspecialchars($row['p_price']); ?>/-</td>
            <td>
               <a title='Delete' href="products.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('are your sure you want to delete this?');"> <i class="bi bi-trash3"></i> </a>&nbsp;&nbsp;&nbsp;
               <a title='Update' href="products.php?edit=<?php echo $row['id']; ?>"><i class="bi bi-pencil-square"></i></a>
            </td>
         </tr><?php
                  }    
                  }
               ?>
      </tbody>
   </table>

</section>

<section class="edit-form-container">

   <?php
   
   if(isset($_GET['edit'])){
      $eid = ff_validate_positive_int($_GET['edit'] ?? '', 1, 999999);
      $edit_id = $eid['ok'] ? $eid['value'] : 0;
      $edit_query = $edit_id ? mysqli_query($con, "SELECT * FROM `products_man` WHERE id = " . (int)$edit_id) : false;
      if($edit_query && mysqli_num_rows($edit_query) > 0){
         while($fetch_edit = mysqli_fetch_assoc($edit_query)){
            
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <img src="uploaded_img/<?php echo htmlspecialchars( $fetch_edit['p_image']); ?>" height="150" alt="">
      <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['id']; ?>">
      <input type="text" class="box" required name="update_p_name" value="<?php echo htmlspecialchars($fetch_edit['p_name']); ?>">
      <input type="number" min="0" class="box" required name="update_p_price" value="<?php echo htmlspecialchars($fetch_edit['p_price']); ?>">
      <input type="text" class="box" required name="update_p_description" value="<?php echo htmlspecialchars($fetch_edit['p_description']); ?>">
      <input type="file" class="box" required name="update_p_image" accept="image/png, image/jpg, image/jpeg, image/webp">
      <input type="submit" value="Update The Prodcut" name="update_product" class="delete-btn">
      <button type="button" onclick="closeForm()" class="delete-btn">Cancel Update</button>
   </form>

   <?php
            };
         };
         echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
      };
   ?>

</section>

<!--===FOR WOMAN===-->
<center>
<p class="message">Women's Products</p>
<div class="container">
<section class="display-product-table">

   <table>

      <thead>
         <th>product image</th>
         <th>product name</th>
         <th>product price</th>
         <th>action</th>
      </thead>

      <tbody>
         <?php
         mysqli_select_db($con, "fashionfusion");
         $q1 = "SELECT * FROM `products_woman`";
         $result = mysqli_query($con, $q1);
         if(mysqli_num_rows($result) > 0){
         while($row = mysqli_fetch_assoc($result)){
         ?>

         <tr>
            <td><img src="uploaded_img/<?php echo htmlspecialchars($row['p_image']); ?>" height="100" alt=""></td>
            <td><?php echo htmlspecialchars($row['p_name']); ?></td>
            <td><?php echo htmlspecialchars($row['p_price']); ?>/-</td>
            <td>
               <a title='Delete' href="products.php?deletew=<?php echo $row['id']; ?>" onclick="return confirm('are your sure you want to delete this?');"> <i class="bi bi-trash3"></i></a>&nbsp;&nbsp;&nbsp;
               <a title='Update' href="products.php?editw=<?php echo $row['id']; ?>" ><i class="bi bi-pencil-square"></i> </a>
            </td>
         </tr><?php
                  }    
                  }
               ?>
      </tbody>
   </table>

</section>

<section class="edit-form-container1">

   <?php
   
   if(isset($_GET['editw'])){
      $eid = ff_validate_positive_int($_GET['editw'] ?? '', 1, 999999);
      $edit_id = $eid['ok'] ? $eid['value'] : 0;
      $edit_query = $edit_id ? mysqli_query($con, "SELECT * FROM `products_woman` WHERE id = " . (int)$edit_id) : false;
      if($edit_query && mysqli_num_rows($edit_query) > 0){
         while($fetch_edit = mysqli_fetch_assoc($edit_query)){
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <img src="uploaded_img/<?php echo htmlspecialchars($fetch_edit['p_image']); ?>" height="150" alt="">
      <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['id']; ?>">
      <input type="text" class="box" required name="update_p_name" value="<?php echo htmlspecialchars( $fetch_edit['p_name']); ?>">
      <input type="number" min="0" class="box" required name="update_p_price" value="<?php echo htmlspecialchars($fetch_edit['p_price']); ?>">
      <input type="text" class="box" required name="update_p_description" value="<?php echo htmlspecialchars( $fetch_edit['p_description']); ?>">
      <input type="file" class="box" required name="update_p_image" accept="image/png, image/jpg, image/jpeg, image/webp">
      <input type="submit" value="update the prodcut" name="update_productw" class="delete-btn">
      <button type="button" onclick="closeForm1()" class="delete-btn">Cancel Update</button>
   </form>

   <?php
            };
         };
         echo "<script>document.querySelector('.edit-form-container1').style.display = 'flex';</script>";
      };
   ?>
</section>
<!--===FOR KIDS===-->
<center>
<p class="message">Kid's Products</p>
<div class="container">
<section class="display-product-table">

   <table>

      <thead>
         <th>product image</th>
         <th>product name</th>
         <th>product price</th>
         <th>action</th>
      </thead>

      <tbody>
         <?php
         mysqli_select_db($con, "fashionfusion");
         $q1 = "SELECT * FROM `products_kids`";
         $result = mysqli_query($con, $q1);
         if(mysqli_num_rows($result) > 0){
         while($row = mysqli_fetch_assoc($result)){
         ?>

         <tr>
            <td><img src="uploaded_img/<?php echo htmlspecialchars($row['p_image']); ?>" height="100" alt=""></td>
            <td><?php echo htmlspecialchars($row['p_name']); ?></td>
            <td><?php echo htmlspecialchars($row['p_price']); ?>/-</td>
            <td>
               <a title='Delete' href="products.php?deletek=<?php echo $row['id']; ?>" onclick="return confirm('are your sure you want to delete this?');"> <i class="bi bi-trash3"></i></a>
               <a title='Update' href="products.php?editk=<?php echo $row['id']; ?>" ><i class="bi bi-pencil-square"></i></a>
            </td>
         </tr><?php
                  }    
                  }
               ?>
      </tbody>
   </table>

</section>

<section class="edit-form-container2">

   <?php
   
   if(isset($_GET['editk'])){
      $eid = ff_validate_positive_int($_GET['editk'] ?? '', 1, 999999);
      $edit_id = $eid['ok'] ? $eid['value'] : 0;
      $edit_query = $edit_id ? mysqli_query($con, "SELECT * FROM `products_kids` WHERE id = " . (int)$edit_id) : false;
      if($edit_query && mysqli_num_rows($edit_query) > 0){
         while($fetch_edit = mysqli_fetch_assoc($edit_query)){
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <img src="uploaded_img/<?php echo htmlspecialchars($fetch_edit['p_image']); ?>" height="150" alt="">
      <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['id']; ?>">
      <input type="text" class="box" required name="update_p_name" value="<?php echo htmlspecialchars($fetch_edit['p_name']); ?>">
      <input type="number" min="0" class="box" required name="update_p_price" value="<?php echo htmlspecialchars($fetch_edit['p_price']); ?>">
      <input type="text" class="box" required name="update_p_description" value="<?php echo htmlspecialchars($fetch_edit['p_description']); ?>">
      <input type="file" class="box" required name="update_p_image" accept="image/png, image/jpg, image/jpeg, image/webp">
      <input type="submit" value="update the prodcut" name="update_productk" class="delete-btn">
      <button type="button" onclick="closeForm2()" class="delete-btn">Cancel Update</button>
      
   </form>

   <?php
            };
         };
         echo "<script>document.querySelector('.edit-form-container2').style.display = 'flex';</script>";
      };
   ?>
</section>
</div>
<script>
   // Function to close the form
   function closeForm() {
      document.querySelector('.edit-form-container').style.display = 'none';
   }

   function closeForm1() {
      document.querySelector('.edit-form-container1').style.display = 'none';
   }

   function closeForm2() {
      document.querySelector('.edit-form-container2').style.display = 'none';
   }
</script>
</body>
</html>
