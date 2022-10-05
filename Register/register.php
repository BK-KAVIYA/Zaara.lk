<?php
include("../db.php");
if(!isset($_SESSION)) 
       { 
           session_start(); 
       } 
   
   ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Zaara.lk</title>
    <!-- Font-->
    <link rel="stylesheet" type="text/css" href="css/font.css">

    <!-- form Style Css -->

     <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- js -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/popup.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style type="text/css">
    	.register{
            /*background: -webkit-linear-gradient(left, #3931af, #00c6ff);*/
            margin-top: 3%;
            padding: 3%;
            border-radius: 5%;
        }
        .register-left{
            text-align: center;
            color: #fff;
            margin-top: 4%;

        }
        .register-left input{
            border: none;
            border-radius: 1.5rem;
            padding: 2%;
            width: 60%;
            background: #f8f9fa;
            font-weight: bold;
            color: #383d41;
            margin-top:0%;
            margin-bottom: 3%;
            cursor: pointer;
        }
        .register-right{
            /*background: #f8f9fa;*/
            border-top-left-radius: 10% 50%;
            border-bottom-left-radius: 10% 50%;
        }
        .register-left img{
            margin-top: 15%;
            margin-bottom: 5%;
            border: none;
            width: 50%;
            -webkit-animation: mover 2s infinite  alternate;
            animation: mover 1s infinite  alternate;
        }
        @-webkit-keyframes mover {
            0% { transform: translateY(0); }
            100% { transform: translateY(-20px); }
        }
        @keyframes mover {
            0% { transform: translateY(0); }
            100% { transform: translateY(-20px); }
        }
        .register-left p{
            font-weight: lighter;
            padding: 12%;
            margin-top: -9%;
        }
        .register .register-form{
            padding: 10%;
            margin-top: 10%;
        }
        .btnRegister{
            float: right;
            margin-top: 10%;
            border: none;
            border-radius: 1.5rem;
            padding: 2%;
            background: #0062cc;
            color: #fff;
            font-weight: 600;
            width: 50%;
            cursor: pointer;
        }
        .register .nav-tabs{
            margin-top: 3%;
            border: none;
            /*background: #0062cc;*/
            border-radius: 1.5rem;
            width: 28%;
            float: right;
        }
        .register .nav-tabs .nav-link{
            padding: 2%;
            height: 34px;
            font-weight: 600;
            color: #fff;
            border-top-right-radius: 1.5rem;
            border-bottom-right-radius: 1.5rem;
        }
        .register .nav-tabs .nav-link:hover{
            border: none;
        }
        .register .nav-tabs .nav-link.active{
            width: 100px;
            color: #0062cc;
            border: 2px solid #0062cc;
            border-top-left-radius: 1.5rem;
            border-bottom-left-radius: 1.5rem;
        }
        .register-heading{
            text-align: center;
            margin-top: 8%;
            margin-bottom: -15%;
            color: #495057;
        }
    </style>
</head>
<body style="background-image: url('Image/bg.jpg'); background-size: cover;">
    
    	<?php
    // define variables and set to empty values
    $nameErr = $emailErr = $AddressErr = $TelephoneErr = $passwordErr = $confirmpasswordErr =   "";
    $name = $email = $Address = $Telephone =  $password = $confirmpassword = "";

    //Name validate
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    	if (empty($_POST["full-name"])) {
    	   $nameErr = "Name is required";
    	}else {
    	   $name = test_input($_POST["full-name"]);

    	   $name = $_REQUEST["full-name"];
    	   if(!preg_match("/^[a-zA-Z\s]*$/",$name)){
            $nameErr = "only letters allowed";
    	   }
    	}
    }

        //email validate
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        	if(empty($_POST["your-email"])){
        		$emailErr = "Email is required";
        }else {
        	$email = test_input($_POST["your-email"]);
        	
        	// check if e-mail address is well-formed
        	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        	   $emailErr = "Invalid email format"; 
        	}
         }
        }

        //address validate
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        	if(empty($_POST["Address"])){
        		$AddressErr = "Enter your address";
        	}
        	else{
        		$Address = test_input($_POST["Address"]);

        		$address = $_REQUEST["Address"];
        		if(!preg_match("/[a-zA-Z0-9\-\\,.]+$/",$address)){
        			$AddressErr = "only letters and numbers allowed";
        		}
        	
        	}
        }


    //telephone validate
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    	if(empty($_POST["Telephone"])){
    		$TelephoneErr = "Enter your number";
    	}
    	else{
    		$Telephone = test_input($_POST["Telephone"]);

    		$Telephone = $_REQUEST["Telephone"];
    		if(!preg_match("/^[0-9]+$/",$Telephone)){
    			$TelephoneErr = "only numbers allowed";

    		}

    	}
    }

    //password validate
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    	if(empty($_POST["password"])){
    		$passwordErr = "Enter your password";
    	}
    	else{
    		if(isset($_POST['password'])) {
    		  $password = $_POST['password'];
    		  $number = preg_match('@[0-9]@', $password);
    		  $uppercase = preg_match('@[A-Z]@', $password);
    		  $lowercase = preg_match('@[a-z]@', $password);
    		  $specialChars = preg_match('@[^\w]@', $password);
    		 
    		  if(strlen($password) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
    			$passwordErr = "Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.";
    		  }
    		}
    	}
    }

    //re-enter password validate
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    	if(empty($_POST["confirm-password"])){
    		$confirmpasswordErr = "re-enter your password";
    	}
    	else{
    		$confirmpassword = test_input($_POST["confirm-password"]);
    		if($confirmpassword != $password){
    			$confirmpasswordErr = "Your password is not match";
    		}
    	}		
    }


    function test_input($data) {
    	$data = trim($data);
    	$data = stripslashes($data);
    	$data = htmlspecialchars($data);
    	return $data;
     }
?>
	   <div class="col-md-8 register" >
                <div class="row">
                    <div class="col-md-3 mt-5 register-left">
                        <img src="Image/zara.png" alt=""/>
                        <h3 class="text-light">Welcome</h3>
                        <p>You are 30 seconds away from online shopping!</p>
                        <a href="../login/index.php"><input type="submit" name="" value="Login"/></a><br/>
                    </div>
                    <!-- Methanata enna ona -->
                    <div class="col-md-9 register-right">
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist" >
                            <li class="nav-item">
                                <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="home" aria-selected="true">Customer</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#tab" role="tab" aria-controls="profile" aria-selected="false">Admin</a>
                            </li>
                        </ul>
                         <div class="content">
            <form class="ml-5 mt-5" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <h2 class="mb-3" style="font-style: Brush Script;">Customer Registration</h2>
                <?php 

                    if(isset($_POST['register'])){ 
                        if(($nameErr or $emailErr or $AddressErr or $TelephoneErr or $passwordErr or $confirmpasswordErr)==""){
                            $pwd=password_hash($password, 
                                PASSWORD_DEFAULT);

                            $sql = "INSERT INTO customer(user_name,telephone,email,address,Password)
                            VALUES('{$name}','{$Telephone}','{$email}','{$Address}','{$pwd}')";
                            if(mysqli_query($conn,$sql)){
                                echo  "<script type=\"text/javascript\">
                                        Swal.fire({
                                        title: '<strong>SUCCESSFULLY <u>register!!</u></strong>',
                                      icon: 'success',
                                      html:
                                        'Please ' + '<a href=\"../\login/\index.php\">click hear</a>' + ' to ' + '<b>login</b>', 
                                         
                                      showCloseButton: true,
                                      showCancelButton: false,
                                      focusConfirm: false,
                                      confirmButtonText:
                                        '<i class=\"fa fa-thumbs-up\"></i> Great!',
                                      confirmButtonAriaLabel: 'Thumbs up, great!',
                                      cancelButtonText:
                                        '<i class=\"fa fa-thumbs-down\"></i>',
                                      cancelButtonAriaLabel: 'Thumbs down'
                                })
                                    </script>";
                                
                            }else{
                                echo  "<script type=\"text/javascript\">
                                    Swal.fire({
                                      icon: 'error',
                                      title: 'Oops...',
                                      text: 'Something went wrong!',
                                      footer: 'Please enter the details according to the requerment!!'
                                    })
                                </script>";
                                
                            }
                        
                    }else{
                         echo "<script type=\"text/javascript\">
                                    Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Please Cheack the Input !',
                                    footer: 'Please enter the details according to the requerment!!'
                                    })
                                </script>"; 
                    }
                }
    
                ?>
                <div class="form-group">
                    <input type="text" name="full-name" id="full-name" class="form-control" placeholder="Your Name">
                    <span class = "text-danger text-uppercase"><?php echo $nameErr;?></span>
                </div>
                <div class="form-group">
                    <input type="text" name="your-email" id="your-email" class="form-control text-light" placeholder="Email Address">
                    <span class = "text-danger text-uppercase"> <?php echo $emailErr;?></span>
                </div>
                <div class="form-group">
                    <input type="text" name="Address" id="Address" class="form-control" placeholder="Address">
                    <span class = "text-danger text-uppercase"> <?php echo $AddressErr;?></span>
                </div>
                <div class="form-group">
                    <input type="text" name="Telephone" id="Telephone" class="form-control" placeholder="Telephone">
                    <span class = "text-danger text-uppercase"> <?php echo $TelephoneErr;?></span>
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                    <span class = "text-danger text-uppercase"> <?php echo $passwordErr;?></span>
                </div>
                <div class="form-group">
                    <input type="password" name="confirm-password" id="confirm-password" class="form-control" placeholder="Confirm Password">
                    <span class = "text-danger text-uppercase"> <?php echo $confirmpasswordErr;?></span>
                </div>
                <div class="form-row-last">
                    <input type="submit" name="register" class="btn btn-primary mt-3 mb-5" value="Register">
                </div>
                
            </form>
            
        </div>
                    </div>
                </div>
           
    </div>
    <br><br>

</body>
</html>
<?php mysqli_close($conn);?>