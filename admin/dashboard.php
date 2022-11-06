
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ===== BOX ICONS ===== -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/w3.css">



    <!-- jQuery library -->
    <script src="js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!-- css link -->
    <style>
        html, body {
            height: 90%;
        width:100%;
        margin:0;
    }
    .h_iframe iframe {
        width:100%;
        height:100%;
    }
    .h_iframe {
        height: 100%;
        width:100%;
    }

    body {
          overflow: hidden; 
      }
    </style>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/paper-dashboard.css?v=2.0.1">
    <title>Zaara.lk</title>
</head>
<body id="body-pd">
  <?php
          if(isset($_POST['button1'])) {
            echo "done";
            header("location:../home.php");
            session_start();
              session_destroy();
              if(isset($_COOKIE['uname']) and isset($_COOKIE['password'])){
              //  $uname=$_COOKIE['uname'];
               // $pass=$_COOKIE['password'];
                unset($_COOKIE['uname']);
                unset($_COOKIE['password']);
                setcookie('uname','',time()-3600);
                setcookie('password','',time()-3600);
                
                }
                
           }
            ?>

            
    <header class="header" id="header">
        <div class="header__toggle">
            <i class='bx bx-menu' id="header-toggle"></i>
        </div>
        <form class="form-inline" action="/action_page.php">
          <input class="form-control" type="text" placeholder="Search">
          <button class="btn btn-primary ml-3" type="submit">Search</button>
        </form>
        <div class="row">
            <img class="header__img" src="logo/logooo.png">
            <form action="../logout.php" class="form-inline">
                <input type="submit" value="Log Out"  name="button1" class="btn btn-dark">
            </form>
        </div> 
    </header>

	<br>
    <div class="h_iframe">
        <iframe  src="dashhome.php" name="myFrame" frameborder="0" allowfullscreen></iframe>
    </div>     
     <br><br><hr class="hr">
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="#" class="nav__logo">
                    <i class='bx bx-layer nav__logo-icon'></i>
                    <span class="nav__logo-name">Zaara.lk</span>
                </a>

                <div class="nav__list">
                    <a href="dashhome.php" class="nav__link active" target="myFrame"> 
                    <i class='bx bx-grid-alt nav__icon' ></i>
                        <span class="nav__name">Admin Dashboard</span>
                    </a>

                    <a href="viewCustomers.php" class="nav__link" target="myFrame">
                        <i class='bx bx-user nav__icon' ></i>
                        <span class="nav__name">Customer Information</span>
                    </a>

                    <a href="addAdmin.php" class="nav__link" target="myFrame">
                        <i class='bx bx-plus-medical nav__icon' ></i>
                        <span class="nav__name">Add Admin</span>
                    </a>
                    <a href="addProduct.php" class="nav__link" target="myFrame">
                        <i class='bx bx-brightness nav__icon'  target="myFrame"></i>
                        <span class="nav__name">Add product</span>
                    </a>

                    <a href="viewProduct.php" class="nav__link active" target="myFrame"> 
                    <i class='bx bx-grid-alt nav__icon' ></i>
                        <span class="nav__name">View product</span>
                    </a>

                    <a href="feedback.php" class="nav__link" target="myFrame">
                        <i class='bx bx-edit nav__icon' ></i>
                        <span class="nav__name">Feedback</span>
                    </a>

                    <a href="message_center.php" class="nav__link" target="myFrame">
                        <i class='bx bx-chat nav__icon' ></i>
                        <span class="nav__name">Chat</span>
                    </a>

                    
                </div>
            </div>
		</nav>
    </div>
    <script src="js/main.js"></script>
  </body>
</html>
