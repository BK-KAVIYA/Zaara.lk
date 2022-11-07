<?php
include('../db.php');

session_start();
//$uid=$_SESSION['sid'];


?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>| Zaara.lk |</title>
         <!-- css link -->

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/doctorPageStyle.css">

        <!-- js -->
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      
        

    </head>
    <body>
        <?php
        if(isset($_POST['addAdmin'])){
       // echo "Form submitted";
       //getting the data
       $pname=$_POST['name'];
       $tel=$_POST['Tphone'];
       $email=$_POST['email'];
       $pass=$_POST['pwd'];
      
      
          $sql="INSERT INTO admin(user_name,Telephone,email,password)VALUES('$pname','$tel','$email','$pass')";
            $res=mysqli_query($conn,$sql);
                if($res){
                 
                    echo  "<script type=\"text/javascript\">
                    Swal.fire('Added!!',
                          'Product is added to the inventory',
                          'success'
                    )
                  </script>";
                }
                else{
                  echo "<script>
                    swal({
                    title: 'Error',
                    text: 'Data didnot add!',
                    icon: 'warning',
                    button: 'Ok',
                    });
                  </script>";
                }
                
       }
   ?>
        <br><br>
        <?php include('navbar/navigationbarAdminpanel.php') ?>
        <div class="container">
            <hr>
            <br>
            <div class="row">
                <div class="col-md-8 col-lg-8 mb-5">
                    <form id="AddDoctorForm" class="needs-validation p-5"   method="POST" enctype="multipart/form-data" novalidate>
                        <h3 class="text text-primary" style="text-align: left">Add Admin</h3><br>
                        <div class="form-row">
                            <div class="col-md-8 mb-3">
                                <label for="validationCustom01"><strong> Name</strong></label>
                                <input type="text" class="form-control" name="name" id="validationCustom01" placeholder="Enter Name" value="" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>

                            <div class="col-md-8 mb-3">
                                <label for="validationCustom01"><strong> Telephone</strong></label>
                                <input type="text" class="form-control" name="Tphone" id="validationCustom01" placeholder="xxxxxxxxxx" value="" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>

                            <div class="col-md-8 mb-3">
                                <label for="validationCustom01"><strong> Email</strong></label>
                                <input type="text" class="form-control" name="email" id="validationCustom01" placeholder="Zara@gmail.com" value="" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>


                            <div class="col-md-8 mb-3">
                                <label for="validationCustom01"><strong> password</strong></label>
                                <input type="password" class="form-control" name="pwd" id="validationCustom01" placeholder="Strong Password" value="" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>

                          
                        </div>
                       
                        
                       
                        <br>
                        <button class="btn btn-primary" type="submit" name="addAdmin">Save Details</button>
                    </form>                   
                </div>
                <div class="col-md-4 col-lg-4">
                   
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
    </script>
    <script type="text/javascript">
        $("#password").password('toggle');
    </script>

</body>
</html>
