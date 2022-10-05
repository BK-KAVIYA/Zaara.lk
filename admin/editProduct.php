<?php
include('../db.php');
session_start();
?>

<!DOCTYPE html>
<?php

$submit_id = $_REQUEST['id'];
$sql = "SELECT * from product  WHERE id ='" . $submit_id . "';";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $pname = $row['name'];
        $category = $row['category'];
        $price = $row['price'];
        $qty = $row['quantity'];
        $image = $row['image'];

    }
}
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
    <body style="overflow-x:hidden ;">

    <?php

    if(isset($_POST['update'])){

        $productname = $_POST['pname'];
        $nprice = $_POST['price'];
        $nquantity = $_POST['quantity'];
        $ncategory = $_POST['category'];
        $filename=$_FILES['product_image']['name'];
        $imageFileType=pathinfo($filename,PATHINFO_EXTENSION);
        $extensions_arr = array("jpg","jpeg","png","gif");

        $image=$_FILES['product_image']['name'];

        move_uploaded_file($_FILES["product_image"]["tmp_name"],"upload/product/".$_FILES["product_image"]["name"]);
        echo  "work";
            $sql = "UPDATE product SET name='" . $productname . "',category='" . $ncategory . "',price='" . $nprice . "',quantity='" . $ncategory . "',image='" . $image ."' WHERE id='" . $submit_id . "'";
            
            if ($conn->query($sql) === TRUE) {
                echo "Error updating record:1 " . $conn->error;
                echo  "<script type=\"text/javascript\">
                        Swal.fire('Updated!!',
                          'Product details are updated',
                          'success'
                    )
                  </script>";
            } else {
                echo "Error updating record: " . $conn->error;
                echo "<script>
                    swal({
                    title: 'Error',
                    text: 'Data did not add!',
                    icon: 'warning',
                    button: 'Ok',
                    });
                  </script>";
            }
        }
        ?>
        <br><br>
        <div>
            <?php include('navbar/navigationbarProduct.php') ?>
        </div>
        <div class="container-fluid img js-fullheight" style="background-image: url(img/background/updateProduct.jpg);  background-size: cover;">
            <br>
            <br>
            <br>
            <br>
            <div class="row">
                <div class="col-md-6 col-lg-6 ml-3 mb-3" >
                    <form id="AddDoctorForm" class="needs-validation p-5"  method="POST" novalidate>
                        <h2 class="text text-primary" style="text-align: center">Update Product Details</h2><br>
                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="inputEmail4"><strong>Name</strong></label>
                                <input type="text" class="form-control" name="pname" id="inputEmail4" value="<?php echo $pname; ?>" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Name.
                                </div>
                            </div>        
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="validationCustom03"><strong>price</strong></label>
                                <input type="text" class="form-control" name="price" id="validationCustom03" value="<?php echo $price; ?>" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Price.
                                </div>
                            </div>
                        </div>  
                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="validationCustom03"><strong>Quantity</strong></label>
                                <input type="number" class="form-control" name="quantity" id="validationCustom03"value="<?php echo $qty; ?>" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Quantity.
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="validationCustom03"><strong>Category</strong></label>
                                <select class="form-control" name="category" id="exampleFormControlSelect1" id="validationCustom03" placeholder="Product Categor">
                                        <?php
                                            $res=mysqli_query($conn,"SELECT * FROM category");
                                            while($row=mysqli_fetch_assoc($res)){
                                              ?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['type']; ?></option>
                                                <?php
                                            }
                                        ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please choose a Category.
                                    </div>
                            </div>
                        </div>
                        <div class="form-row mt-3">
                            <div class="col-md-12">
                                <label for="validationCustom01"><strong>Product Image</strong></label>
                                <img src='upload/product/<?php echo $image; ?>' width="100px">
                                <input type="file" name="product_image" id="productImage">
                                <div class="invalid-feedback">
                                   Upload a relevent picture.
                                </div>
                            </div>
                        </div>                             
                        <br>
                        <button class="btn btn-primary" type="submit" name="update">Update Details</button>
                    </form>   
                </div>

            </div>
        </div>

    </div>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict';
            window.addEventListener('load', function () {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
    <script type="text/javascript">
        $("#password").password('toggle');
    </script>

</body>
</html>
