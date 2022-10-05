<html>
   <head>
      <style>
         body {
         background-image: url("../PHOTO/call2.png");
         background-repeat: none;
         align-items: left;
         }
      </style>
      <title>login and registration</title>
      <link rel="stylesheet" href="main.css">
      <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
   </head>
   <body>
      <?php
         session_start();
         $conn=mysqli_connect('localhost','root','','zara');
         if($conn->connect_error){
          die("Connection Failed:" . $conn->mysqli_connect_error."<br>");	
         }
         else{
         // echo "Connected Successfully"."<br>";
         }
         
         
         
         
          if(isset($_POST['submit'])){
              $name=$_POST['name'];
              $email=$_POST['email'];
              $tel=$_POST['tel'];
              $pwd=$_POST['pwd'];
              $pass=password_hash($pwd,PASSWORD_DEFAULT); 
              $cpass=$_POST['cpwd'];
         
              //echo $pass;
             
          
              $select=" SELECT * FROM customer WHERE email = '$email' && password='$pass' ";
              $result= mysqli_query($conn, $select);
          
              if(mysqli_num_rows($result)>0){          //Checking whether the entered email already exist in the system
                  $error[]='the email you entered is already used.!!!';
              }else{
                  if($pwd !=$cpass){                   //Checking whether two passwords are matching
                      $error[]='passwords not matched';
                  }else{
                      $insert="INSERT INTO 
                              customer(user_name,Telephone,email,password)
                               VALUE
                              ('$name','$tel','$email','$pass')";
                              if (mysqli_query($conn,$insert)){
         
                                  echo "query okay";
                              }
                           //   header('location:Login.php');  After the filling the form and click on "Register now" button it will lead navigate to this location 
                  }
                  
              }
          };
         
         
          ?>
      <?php
         ?>
      <?php
         if(isset($_POST['login'])){
                $email=$_POST['log_name'];
         	//$pass=md5($_POST['log_pass']);
         	
         	$sqlc="SELECT password FROM customer WHERE user_name='$email'";
         	$sqla="SELECT password FROM admin WHERE user_name='$email'";
         
         	if($res=mysqli_query($conn,$sqla)){
          		$row=mysqli_fetch_assoc($res);
          		//$verify = password_verify($_POST['pass'],$row['password']);
                     if(isset($_POST['log_pass'])){
                        $verify = password_verify($_POST['log_pass'],$row['password']);
         		if ($verify) {
         			//$_SESSION['uname']=$email;
         			header("location:../admin1/adminIndex.php");
         		}
          	}
            }
          	if($res=mysqli_query($conn,$sqlc)){
                        $row=mysqli_fetch_assoc($res);
                    if(isset($_POST['log_pass'])){
          		$verify = password_verify($_POST['log_pass'],$row['password']);
         		if ($verify) {
         			//session_start();
         		/*	$sql="SELECT uname FROM patient WHERE Email=\"".$email."\";";
         			$q=mysqli_query($conn,$sql);
          			$row=mysqli_fetch_array($q);
         			$_SESSION['email']=$row['uname'];
         			$_SESSION['status']=1;  */
         			header("location: index.php");
         
         
         		 	}else{
                        echo "error 1";
              			//Error msg en on
         		}
                    }
         	}else{
         		//Error msg en on
                    echo "error 2";
         	}
         		/*$sql="SELECT Id FROM patient WHERE Email='".$email."' ";
         		$result=mysqli_query($conn,$sql);
         		$rows = mysqli_num_rows($result);
                    if ($rows > 0) {
         	 		while($row=mysqli_fetch_array($result)){
         				$_SESSION['uid']=$row['Id'];
         	 		} 
         		} */
          	}
         
         
         ?>
      <div class="hero">
         <div class="form-box" style="padding-bottom:">
            <!-- <div class="logosec"><img src="logooo.png"></div>-->
            <div class="button-box">
               <div id="btn"></div>
               <button type="button" class="toggle-btn" onclick="login()">Log in</button>
               <button type="button" class="toggle-btn" onclick="register()">Register</button>
            </div>
            <div class="social-icons">
               <img src="../PHOTO/logooo.png">
            </div>
            <form id="login" class="input-group" method="post">
               <input type="text" name="log_name" class="input-field" placeholder="User name" required>
               <input type="password" name="log_pass" class="input-field" placeholder="Enter password" required>
               <p class="remember"><input type="checkbox" class="check-box">Remember password</p>
               <button type="submit" name="login" class="submit-btn" >Log in</button>
            </form>
            <form id="register" class="input-group" method="post">
               <?php
                  if(isset($error)){
                    foreach($error as $error){
                      echo '<span class"error_msg">'.$error.'</span>';
                     }
                  }
                  ?>
               <input type="text" class="input-field" placeholder="User name" name="name" required>
               <input type="email" class="input-field" placeholder="Email " name="email" required>
               <input type="text" class="input-field" placeholder="Telephone" name="tel"required>
               <input type="password" class="input-field" placeholder="Enter password" name="pwd" required>
               <input type="password" class="input-field" name="cpwd" required placeholder="Confirm Your Password">
               <p class="terms"><input type="checkbox" class="check-box">I agree to terms and condition</p>
               <button type="submit" name="submit" class="submit-btn">Register</button>
               <p>already have an account ? <a href="login_&_registration.php" target="#login">Login now</a></p>
            </form>
         </div>
      </div>
      <script>
         var x=document.getElementById("login");
          var y=document.getElementById("register");
          var z=document.getElementById("btn");
             
            function  register()
             {
                 x.style.left="-400px";
                  y.style.left="50px";
                  z.style.left="110px";
             }
             function  login()
             {
                 x.style.left="50px";
                  y.style.left="450px";
                  z.style.left="0";
             }
             
      </script>
   </body>
</html>