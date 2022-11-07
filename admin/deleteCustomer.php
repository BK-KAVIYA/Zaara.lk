<?php
include('../db.php');
session_start();
?>

<!DOCTYPE html>
<?php

$submit_id = $_REQUEST['id'];
$sql = "SELECT * from customer  WHERE id ='" . $submit_id . "';";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $pname=$row['user_name'];
        $tel=$row['Telephone'];
        $email=$row['email'];
        $add=$row['address'];
        $pass=$row['password'];

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

    if(isset($_POST['delete'])){

 

        

            $submit_id = $_REQUEST['id'];
            $sql = "DELETE FROM Customer WHERE id ='" . $submit_id . "';";
            header('Location: viewCustomers.php');

            
            if ($conn->query($sql) === TRUE) {
                echo "Error updating record:1 " . $conn->error;
                echo  "<script type=\"text/javascript\">
                        Swal.fire('Updated!!',
                          'customer details are deleted',
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
        <?php include('navbar/navigationbarCustomer.php') ?>
        </div>
        <div class="container-fluid img js-fullheight" style="background-image: url(img/background/delete.jpg);  background-size: cover;">
            <br>
            <br>
            <br>
            <br>
            <div style="padding-left:4rem;" class="row">
                <div class="col-md-6 col-lg-6 ml-3 mb-3" >
                    <form id="AddDoctorForm" class="needs-validation p-5"  method="POST" novalidate>
                        <h2 class="text text-primary" style="text-align: center">Delete Customer Details</h2><br>
                        <div class="form-row">



                        <div class="col-md-8 mb-3">
                                <label for="validationCustom01"><strong> Name</strong></label>
                                <input type="text" class="form-control" name="name" id="validationCustom01" placeholder="Enter Name" value="<?php echo $pname; ?>" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>

                            <div class="col-md-8 mb-3">
                                <label for="validationCustom01"><strong> Telephone</strong></label>
                                <input type="text" class="form-control" name="Tphone" id="validationCustom01" placeholder="xxxxxxxxxx" value="<?php echo $tel; ?>" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>

                            <div class="col-md-8 mb-3">
                                <label for="validationCustom01"><strong> Email</strong></label>
                                <input type="text" class="form-control" name="email" id="validationCustom01" placeholder="Zara@gmail.com" value="<?php echo $email; ?>" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>


                            <div class="col-md-8 mb-3">
                                <label for="validationCustom01"><strong> address</strong></label>
                                <input type="text" class="form-control" name="address" id="validationCustom01" placeholder="address" value="<?php echo $add; ?>" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>


                            <div class="col-md-8 mb-3">
                                <label for="validationCustom01"><strong> password</strong></label>
                                <input type="password" class="form-control" name="pwd" id="validationCustom01" placeholder="Strong Password" value="<?php echo $pass; ?>" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>


                        </div>
                        <br>
                        <button class="btn btn-primary" type="submit" name="delete">Delete</button>
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
