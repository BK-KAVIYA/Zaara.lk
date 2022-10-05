<?php
include('../db.php');

session_start();
//$uid=$_SESSION['sid'];


?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>| Zaara.lk |</title>
        <!-- CSS -->
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/doctorPageStyle.css">

        <!-- JS-->
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <br><br><br><br>
        <?php
        
        
        $img_name = $_FILES['my_image']['name'];
        $img_size = $_FILES['my_image']['size'];
        $tmp_name = $_FILES['my_image']['tmp_name'];
        $error = $_FILES['my_image']['error'];

        if ($error === 0) {
            if ($img_size > 125000) {
                /*$em = "Sorry, your file is too large.";
                header("Location: index.php?error=$em");*/
            }else {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);

                $allowed_exs = array("jpg", "jpeg", "png"); 

                if (in_array($img_ex_lc, $allowed_exs)) {
                    $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                    $img_upload_path = 'admin/img/uploads/Sample'.$new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);

                }
            }
        }

        $productName = $_POST['pname'];
        $category = $_POST['category'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $description = $_POST['description'];
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            $sql = "INSERT INTO product (id,name,category,price,description,quantity,image) VALUES (' $productName ',' $category ','{$price}',' {$quantity} ','$description','$new_img_name')";
            if (mysqli_query($conn, $sql)) {
                /*$sql2 = "INSERT INTO userlogin (userName,password,userCategory	) VALUES('" . $userName . " ','" . $password . "','$categoryNum')";*/
                 ?>
                    <img class="d-flex justify-content-center mb-3" style="border:none;width: 20%;margin-left: auto;margin-right: auto;" src="img/feedback/success.png">
                    <div class="alert alert-success" role="alert">
                        <strong>Successfully Inserted</strong>&nbsp;<a href="dashhome.php">Back to Home</a>
                    </div>
                    <div class="alert alert-primary" role="alert">
                        <strong>Insert Again</strong>&nbsp;<a href="addAdoctor.php">Click hear</a>
                    </div>
                    <?php
                } else {
                    echo mysqli_error($conn);
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <strong>Insertion Failed</strong>&nbsp;<a href="addAdoctor.php">Try Again</a>
                    </div>
                    <?php
            }

        }
        mysqli_close($conn);
        ?>
        
    </body>
</html>

