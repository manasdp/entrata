<?php
session_start();
error_reporting(0);

$user=$_SESSION['admin_email'];
$admin = $_SESSION['admin_email'];
if(!isset($admin)){
   header('location:admin_login.php');
}
@include 'include.php';

$randomNumber = rand(10, 99);
$prefix = "P";
$productId = $prefix . $randomNumber;

?>
<html>
<head>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/p_form.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Admin Panel</title>
</head>
<body>

    <div class="side-menu">
        <?php @include 'header.php';?>
    </div>

    <center>
    <div class="container">
    <form class="form" method="post" enctype="multipart/form-data">
             <p class="msg">ADD A NEW WOMEN'S PRODUCT </p>
            <div class="flex">
                <label>
                    <input readonly required="" value="<?php echo $productId;?>" name="id" type="text" class="input">
                </label>

                <label>
                    <input required="" placeholder="Enter Product Name" name="name" type="text" class="input">
                </label>
            </div>  
                    
            <label>
                <input required="" placeholder="Enter Product Price" name="price" min="0" type="number" class="input">
            </label> 

            <label>
            <p align="left">&nbsp;Select Product Image:</p>
                <input required="" placeholder="" name="upload" type="file" id="upload" accept="image/png, image/jpg, image/jpeg, image/webp" class="input">
            </label>

            <label>
            <p align="left">&nbsp;Enter Product Description:</p>
                <textarea id="feedback" name="description" rows="5" cols="30" class="input"></textarea>
            </label>
            <input type="submit" value="Add The Product" name="submit" class="submit">
    </form>
    </div>
    </center>
</body>
</html>
<?php
      error_reporting(0);
      require_once __DIR__ . '/../validation.php';

      if(isset($_POST['submit']))
      {
        $vid = ff_validate_product_id_string($_POST['id'] ?? '');
        $vn = ff_validate_product_name($_POST['name'] ?? '');
        $vp = ff_validate_price($_POST['price'] ?? '');
        $vd = ff_validate_product_description($_POST['description'] ?? '');
        $vu = ff_validate_upload_image('upload', true);
        $fail = null;
        if (!$vid['ok']) { $fail = $vid['msg']; }
        elseif (!$vn['ok']) { $fail = $vn['msg']; }
        elseif (!$vp['ok']) { $fail = $vp['msg']; }
        elseif (!$vd['ok']) { $fail = $vd['msg']; }
        elseif (!$vu['ok']) { $fail = $vu['msg']; }

        if ($fail !== null) {
            ?>
            <script>
            Swal.fire({ icon: 'warning', title: 'Invalid input', text: <?php echo json_encode($fail); ?> });
            </script>
            <?php
        } else {

        $con=mysqli_connect("localhost","root","","fashionfusion");
        if(!$con)
        {
        die("Failed to coonect");
        }

            $id = ff_db_escape($con, $vid['value']);
            $name = ff_db_escape($con, $vn['value']);
            $price = ff_db_escape($con, (string) $vp['value']);
            $description = ff_db_escape($con, $vd['value']);
            $image = ff_db_escape($con, $vu['value']);

        mysqli_select_db($con, "fashionfusion");
        $q1 = "SELECT * FROM `products_woman` WHERE p_id = '$id'";
        $result = mysqli_query($con, $q1);
        if(mysqli_num_rows($result)>0)
        {
            ?>
            <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top",
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
                didOpen: (toast) => {
                  toast.onmouseenter = Swal.stopTimer;
                  toast.onmouseleave = Swal.resumeTimer;
                }
              });
              Toast.fire({
                icon: "info",
                title:"Product is already exist!",
              });
              </script>
            <?php
       }
       else{
        $folder = "uploaded_img/";
        $filename = time() . "_" . $vu['value'];
        move_uploaded_file($vu['tmp'], $folder . $filename);
        
        $image = ff_db_escape($con, $filename);
        
        $stmt = mysqli_prepare($con, 
        "INSERT INTO products_woman (p_id,p_name,p_price,p_image,p_description) VALUES (?,?,?,?,?)");
        
        mysqli_stmt_bind_param($stmt, "sssss", $id, $name, $price, $image, $description);
        mysqli_stmt_execute($stmt);
        
        if(mysqli_stmt_affected_rows($stmt) > 0){
        ?>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title:'Successfully!',
                text: 'Product Added Successfully.',
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                window.location.href = 'products.php';
            });
        });
        </script>
        <?php
        } else {
        ?>
        <script>
        Swal.fire({
            icon: 'error',
            title:'Oops!',
            text: 'Insert failed!',
        });
        </script>
        <?php
        }
        }
        mysqli_close($con);
        }
      }
  ?>