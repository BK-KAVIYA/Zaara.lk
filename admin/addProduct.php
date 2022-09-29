<?php
include('../db.php');

session_start();
//$uid=$_SESSION['sid'];


?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>| MEDI LANKA |</title>
         <!-- css link -->

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/doctorPageStyle.css">

        <!-- js -->
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        

    </head>
    <body>
        <br><br>
        <?php include('navbar/navigationbarProduct.php') ?>
        <div class="container">
            <hr>
            <br>
            <div class="row">
                <div class="col-md-8 col-lg-8 mb-5">
                    <form id="AddDoctorForm" class="needs-validation p-5"  action="doctorRegistration.php" method="POST" enctype="multipart/form-data" novalidate>
                        <h3 class="text text-primary" style="text-align: left">Add a Product</h3><br>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01"><strong>Product Name</strong></label>
                                <input type="text" class="form-control" name="pname" id="validationCustom01" placeholder="First name" value="" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="validationCustom02"><strong>Product Category</strong></label>
                                <div class="input-group">
                                    <select class="form-control" name="specialty" id="exampleFormControlSelect1" id="validationCustom03" >
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
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="inputEmail4">Price</label>
                                <input type="text" class="form-control" name="price" id="price" placeholder="Email" required>
                                <div class="invalid-feedback">
                                    Please provide a Price.
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Product Image</label>
                                <input type="file" name="product_image" id="productImage">
                                <div class="invalid-feedback">
                                   Upload a relevent picture.
                                </div>                                    
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="inputPassword4">Product quantity</label>
                                <input type="password" class="form-control" name="quantity" id="quantity" placeholder="Password" data-toggle="password" required>
                                <div class="invalid-feedback">
                                    Please provide a quantity
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="validationCustom03"><strong>Product Description</strong></label>
                                <input type="text" class="form-control" name="description" id="description" placeholder="Address Line 1" required>
                                <div class="invalid-feedback">
                                    Please provide a Description.
                                </div>
                            </div>
                        </div>
                       
                        <br>
                        <button class="btn btn-primary" type="submit" name="submit">Save Details</button>
                    </form>                   
                </div>
                <div class="col-md-4 col-lg-4">
                    <img style="border:none;width: 100%;" src="img/Doctors/adddoc.png">
                </div>
            </div>
        </div>

    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
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
