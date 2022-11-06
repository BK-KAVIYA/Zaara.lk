<?php
   include("db.php");
   if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
       
?>
<!DOCTYPE html>
<html>
   <head>
      <!-- css link -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/w3.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://kit.fontawesome.com/f80ec8587b.js" crossorigin="anonymous"></script>
      <!-- Mobile Specific Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <!-- js -->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <!--Alert-->
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <title>Zaara.lk</title>
   </head>
   <body>
      <div>
         <nav class="navbar navbar-expand-lg navbar-dark ">
            <!-- Brand -->
            <b><a class="navbar-brand text-danger" href="#">Zaara.lk</a></b>
            <img src="PHOTO/logo.png" class="logo-nav float-right navbar-brand" >
            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
               <ul class="navbar-nav">
                  <li class="nav-item">
                     <a class="nav-link text-uppercase w3-bar-item w3-button w3-padding-large w3-hide-small text-white" href="home.php">Home</a>
                  </li>
                  <li class="nav-item">
                     <a href="about.php" class="nav-link text-uppercase w3-bar-item w3-button w3-padding-large w3-hide-small text-white" >About</a></center>
                  </li>
                  <li class="nav-item">
                     <div class="dropdown">
                     <a class="nav-link text-uppercase w3-bar-item w3-button w3-padding-large w3-hide-small text-white" name="category">Category</a>
                     <div class="dropdown-content">
                        <a href="max">Max</a>
                        <a href="mini_dress.php">Min</a>
                        <a href="#">Bags</a>
                     </div>
                     </div>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link text-uppercase w3-bar-item w3-button w3-padding-large w3-hide-small text-white" href="about.php">Contact us</a>
                  </li>
               </ul>
               <form class="form-inline sercch-alighnment" style="margin-left:25px;" action="#">
                  <div class="row" style="flex-wrap: nowrap;">
                     <input class="form-control mr-sm-2" type="text" placeholder="Search">
                     <button class="btn btn-danger" type="submit">Search</button>
                  </div>
               </form>
               <div style="margin-left: auto;" class="mt-4">
                  <ul class="navbar-nav ml-4" >
                     <i class="text-light fa-solid fa-user  ml-1 mr-1"></i>
                        <form method="post" class=" ">
                           <button class="bg-transparent text-light border-0" name="check">
                              Profile
                           </button>
                     <i class="text-light fa-solid fa-cart-shopping  ml-2 mr-1 "></i>
                        <form method="post">
                        <a href="cart.php"><button class="bg-transparent text-light border-0" name="check1">
                              Cart</a>
                           </button>
                        </form>
                  
                     <i class="text-light fa-solid fa-right-from-bracket  ml-3 "></i>
                     <li class="nav-item">
                     <div class="dropdown">
                     <a class="nav-link text-uppercase btn-sm align-top w3-hide-small text-white  dropdown-toggle text-danger" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" name="category">Login/Sing UP</a>
                     <div class="dropdown-content mr-3">
                     <p class="dropdown-item text-danger"><?php if(isset($_SESSION['uid'])) echo "Welcome back, ".$_SESSION['email']; else echo "Welcome to Zaara.lk"; ?></p>
                     <?php
                            if(!isset($_SESSION['uid'])) {
                        ?>
                        <a class="btn btn-danger btn-sm" href="Register/register.php">Join</a>
                        <a href="login/index.php" class="btn btn-outline-danger btn-sm">Sign in</a>
                        <?php
                            }
                            else {
                        ?>
                        <a class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure you want to logout?');"  href="logout.php">Logout</a>
                        <?php
                            }
                        ?>

                     </div>
                     </div>
                  </li>


                     
            </div>


                  </ul>
                 <!-- <ul class="navbar-nav ml-4" >
                     <li class="nav-item">
                        <a class="nav-link text-uppercase btn btn-primary text-dark" href="login.php">Login</a>
                     </li>
                     <li class="nav-item ml-3">
                     
                        <a class="nav-link text-uppercase btn btn-primary text-dark" href="register.php">Register</a>
                     </li>
                  </ul> -->
               </div>
            </div>
         </nav>
      </div>
      <?php
        //$status=$_SESSION['status'];
       // $uid=$_SESSION['sid'];
        if (isset($_POST['check']) || isset($_POST['check1'])) {
            myFunction();
          }
           function myFunction() {
            if (isset($_SESSION['status'])){
               echo "<script>window.location.href='Account/customer_account.php'</script>";
              //header("location:Account/customer_account.php");  
             }else{
               echo  "<script type=\"text/javascript\">
                         Swal.fire('Login First!!',
                               'To Use Fhis Feature Please Login',
                               'info'
                         )
                       </script>";
              // header("location:home.php");
             }
        }
         ?>
   </body>
</html>