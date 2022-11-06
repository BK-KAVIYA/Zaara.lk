<?php
   include('../db.php');
   session_start();
?>
<!doctype html>
<html lang="en">
   <head>
      <title>Zaara.lk | Login</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="css/style.css">

      <!--Alert-->
	   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   </head>
   <?php

	if(isset($_POST['login'])){
		$email=$_POST['email'];
		$pass=$_POST['pass'];
	}

	if(isset($_POST['login'])){
		$email = $_POST["email"];
		$sql="SELECT password FROM customer WHERE email=\"".$email."\";";
		$s="SELECT password FROM admin WHERE email=\"".$email."\";";
		if($q=mysqli_query($conn,$s)){
	 		$row=mysqli_fetch_array($q);
	 		$verify = password_verify($_POST['pass'],$row['password']);
			if ($verify) {
				$_SESSION['uname']=$email;
				header("location:../admin/dashboard.php");
			}else{
            echo ".";
            echo  "<script type=\"text/javascript\">
                  Swal.fire({
                     icon: 'error',
                     title: 'Invalid!',
                     text: 'username or password!',	  
                        })
               </script>";
      }
	 	}
	 	if($sqll=mysqli_query($conn,$sql)){
	 		$row=mysqli_fetch_array($sqll);
	 		$verify = password_verify($_POST['pass'],$row['password']);
			if ($verify) {
     		 	if(isset($_POST['remember'])){
					setcookie('email',$email,time()+60*60*7);
					setcookie('password',$pass,time()+60*60*7);
				}
				//session_start();
				$sql="SELECT id FROM customer WHERE email=\"".$email."\";";
				$q=mysqli_query($conn,$sql);
	 			$row=mysqli_fetch_array($q);
             $_SESSION['uid']=$row['id'];
             $_SESSION['uname']=$row['user_name'];
             $_SESSION['email']=$row['email'];
				header("location:../home.php");


 		 	}else{
               echo ".";
      			echo  "<script type=\"text/javascript\">
							Swal.fire({
								icon: 'error',
								title: 'Invalid!',
								text: 'username or password!',	  
									})
						</script>";
			}
		}else{
			echo  "<script type=\"text/javascript\">
										Swal.fire({
						  				title: '<strong>Register!! <u>first</u></strong>',
									  icon: 'info',
									  html:
									    'Please ' + '<a href=\"register.php\">click hear</a>' + ' to ' + '<b>register</b>', 
									     
									  showCloseButton: true,
									  showCancelButton: false,
									  focusConfirm: false,
									  confirmButtonText:
									    '<i class=\"fa fa-thumbs-up\"></i> Ok!',
									  confirmButtonAriaLabel: 'Thumbs up, Ok!',
									  cancelButtonText:
									    '<i class=\"fa fa-thumbs-down\"></i>',
									  cancelButtonAriaLabel: 'Thumbs down'
								})
									</script>";;
		}
			/*$sql="SELECT id FROM customer WHERE email='".$email."' ";
			$result=mysqli_query($conn,$sql);
			$rows = mysqli_num_rows($result);
            if ($rows > 0) {
		 		while($row=mysqli_fetch_array($result)){
					$_SESSION['uid']=$row['id'];
               $_SESSION['uname']=$row['user_name'];
               $_SESSION['email']=$row['email'];
		 		}
			}*/
	 	}
	

?>
   <body class="img js-fullheight" style="background-image: url(images/bg.jpg);">
      <section class="ftco-section">
         <div class="container">
            <div class="row justify-content-center">
               <div class="col-md-6 text-center mb-5">
                  <img src="images/zara.png" class="col-md-4">
               </div>
            </div>
            <div class="row justify-content-center">
               <div class="col-md-6 col-lg-4">
                  <div class="login-wrap p-0">
                     <h3 class="mb-4 text-center">Have an account?</h3>
                     <form method="post" class="signin-form">
                        <div class="form-group">
                           <input type="text" class="form-control" placeholder="Username" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                           <input id="password-field" type="password" id="password" class="form-control" placeholder="Password" name="pass" required >
                           <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                           <button type="submit" name="login" class="form-control btn btn-primary submit px-3">Sign In</button>
                        </div>
                        <div class="form-group d-md-flex">
                           <div class="w-50">
                              <label class="checkbox-wrap checkbox-primary">Remember Me
                              <input type="checkbox" name="remember" checked>
                              <span class="checkmark"></span>
                              </label>
                           </div>
                           <div class="w-50 text-md-right">
                              <a href="../Register/register.php" style="color: #fff">Sing Up</a>
                           </div>
                        </div>
                     </form>
                     <p class="w-100 text-center">&mdash; Or Sign In With &mdash;</p>
                     <div class="social d-flex text-center">
                        <a href="#" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> Facebook</a>
                        <a href="#" class="px-2 py-2 ml-md-1 rounded"><span class="ion-logo-twitter mr-2"></span> Twitter</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <?php
         if(isset($_COOKIE['email']) and isset($_COOKIE['password'])){
            $email=$_COOKIE['email'];
            $pass=$_COOKIE['password'];
            echo "<script>
               document.getElementById('email').value='$email';
               document.getElementById('password').value='$pass';

            </script>";
         }
      ?>
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/main.js"></script>
   </body>
</html>