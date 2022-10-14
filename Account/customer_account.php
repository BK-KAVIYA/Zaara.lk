<?php

    require_once('../db.php');

    session_start();

    date_default_timezone_set("Asia/Colombo");
    $alert = "";
    $alertStatus = 0;


    $unreadMsgCount = 0;

    if(isset($_SESSION['digimart_current_user_id'])){
        
        $sql = "SELECT COUNT(*) AS 'unreadMsg' FROM `customer_message` WHERE `to` = '{$_SESSION['digimart_current_user_id']}' AND `is_unread` = 1 AND `is_deleted` = 0";
        
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $unreadMsgCount = $row['unreadMsg'];
            }
        }
    }

    if(isset($_POST['btnSubmit'])){
        
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        
        $sql = "UPDATE `customer` SET `first_name`= '{$firstName}', `last_name`= '{$lastName}' WHERE `id` = '{$_SESSION['digimart_current_user_id']}' AND `is_deleted` = 0";
        
        $result = mysqli_query($conn, $sql);

        if ($result) {
            //if data inserted display tooltips message as Successful
            $alert = "Name changed";
            $alertStatus = 1;
        }
        else {
            //if data not inserted display tooltips message as Unsuccessful
            $alert = "Name not changed";
            $alertStatus = 2;
        }
        
        $sql = "SELECT * FROM `customer` WHERE `id` = '{$_SESSION['digimart_current_user_id']}' AND `is_deleted` = 0";
        
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $_SESSION['digimart_current_user_first_name'] = $row['first_name'];
                $_SESSION['digimart_current_user_last_name'] = $row['last_name'];
            }
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
    <!-- title -->
	<title>My Account | Zaara.lk</title>
    
    <!-- title icon -->
    <link rel="icon" type="image/ico" href="../image/logo.png"/>
    
    <!-- Bootstrap CSS -->
    <link type="text/css" href="../css/bootstrap.min.css" rel="stylesheet">
    
    <!-- CSS -->
    <link type="text/css" href="navbar.css" rel="stylesheet">
    
    <!-- google font -->
    <link href='https://fonts.googleapis.com/css?family=Alata' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Atomic Age' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Abel' rel='stylesheet'>
    
    <!-- Fontawesome icons -->
    <script src="https://kit.fontawesome.com/faf1c6588d.js" crossorigin="anonymous"></script>

    <!-- jQuery -->
    <script src="jquery-3.4.1.min.js"></script>
    <script src="bootstrap.js"></script>
    
    <style>

        
        .sidebar {
            width: 200px;
            position: fixed;
            overflow: auto;
        }

        .sidebar a {
            text-decoration: none;
            color: #dd123d;
        }
        
        .sidebar a:hover:not(.active) {
            background-color: #dd123d;
            color: white;
        }

        div.content {
            margin-left: 220px;
            min-height: 500px;
        }
        
        @media screen and (max-width: 700px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                margin-bottom: 10px;
            }
            
            .sidebar a {
                float: left;
            }
            
            div.content {
                margin-left: 0;
            }
        }
        
        @media screen and (max-width: 400px) {
            .sidebar a {
                text-align: center;
                float: none;
            }
        }
        
        .form-control {
            border-color: #dd123d;
            color: #dd123d;
            background:none!important;
        }
        
        .form-control:focus {
            border-color: #dd123d;
            color: #dd123d;
        }
        
        .toastNotify {
            position: fixed;
            top: 10px;
            right: 10px;
            z-index: 1;
            border: 1px solid #dd123d;
            display: <?php if($alertStatus != 0) echo "block"; else echo "none"; ?>;
            
            -webkit-animation: cssAnimation 8s forwards; 
            animation: cssAnimation 8s forwards;
        }
        
        @keyframes cssAnimation {
            0%   {opacity: 1;}
            50%  {opacity: 0.7;}
            100% {opacity: 0;}
        }
        
        @-webkit-keyframes cssAnimation {
            0%   {opacity: 1;}
            50%  {opacity: 0.7;}
            100% {opacity: 0;}
        }
        
    </style>
    
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    
    
</head>
    
<body class="bg-dark">
    
    <div class="toastNotify <?php if(isset($_COOKIE['theme']) && ($_COOKIE['theme']=='dark'))echo "bg-dark"; else echo "bg-white"; ?> col-7 col-sm-6 col-md-4 col-lg-3" data-autohide="false">
        <div class="toast-header <?php if(isset($_COOKIE['theme']) && ($_COOKIE['theme']=='dark'))echo "bg-dark"; ?>">
            <strong class="mr-auto text-danger"><?php if($alertStatus == 1) echo "Successful !"; else echo "Unsuccessful !"; ?></strong>
            <small class="text-muted"></small>
            <button type="button" class="ml-2 mb-1 close text-danger" data-dismiss="toast">&times;</button>
        </div>

        <div class="toast-body <?php if(isset($_COOKIE['theme']) && ($_COOKIE['theme']=='dark'))echo "text-white"; ?>">
            <?php echo $alert; ?>
        </div>
    </div>
    
    <?php
       // include('../navigationbar.php');
    ?>
    
    
    <div class="container-fluide">
        
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark my-3">
            <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active mx-5">
                        <a class="nav-link" href="customer_account.php">My Account</a>
                    </li>
                    <li class="nav-item mx-5">
                        <a class="nav-link" href="customer_order.php">My Order</a>
                    </li>
                    <li class="nav-item mx-5">
                        <a class="nav-link" href="customer_customize_order.php">My Customize Order</a>
                    </li>
                    <li class="nav-item mx-5">
                        <a class="nav-link" href="customer_message_center.php">Message Center <span class="badge badge-pill badge-danger"><?php if($unreadMsgCount!=0) echo $unreadMsgCount; ?></span></a>
                    </li>
                </ul>
            </div>
        </nav>
        
    </div>
    
    <div class="container">
        <h3 class="text-danger mb-3"><i class="far fa-user-circle"></i> My Account</h3>
        
        <div class="sidebar shadow-lg d-flex flex-column rounded-lg <?php if(isset($_COOKIE['theme']) && ($_COOKIE['theme']=='dark')) echo "bg-dark"; ?>">
            <a class="p-3" href="customer_account.php">My Account Setting</a>
            <a class="p-3" href="customer_review.php">My Review</a>
            <a class="p-3" href="customer_mail.php">My Mail Address</a>
            <a class="p-3" href="customer_payment.php">My Payment Card</a>
            <a class="p-3" href="customer_change_password.php">Change Password</a>
        </div>
        
        <div class="content p-1 mb-5 rounded-lg shadow-lg bg-dark">
            <h4 class="text-danger mb-3"><i class="fas fa-user-cog"></i> My Account Setting</h4>
            <div class="row mw-100 p-2" id="product-container">
            
            <?php

                //if(isset($_SESSION['digimart_current_user_id'])){
            if(1){ 
        
                $sql = "SELECT * from customer where id=8";
        
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $uname = $row['user_name'];
                        $telephone = $row['Telephone'];
                        $email = $row['email'];
                        $address = $row['address'];
                        $password = $row['password'];
                    }
                }
             }

             ?>

                <div class="col-12">
                    <div class="col-md-6 col-sm-12">
                        <div class="custom-control custom-checkbox">
                            <form action="customer_account.php" method="post">
                                <div class="">
                                    <div class="form-group">
                                        <label for="userId" class="text-white">User Id</label>
                                        <input type="text" class="form-control"  name="userId" id="userId" value="<?php echo $id; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="text-white">Email</label>
                                        <input type="email"class="form-control" name="email" id="email" value="<?php echo $email; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="firstName" class="text-white"; >First Name</label>
                                        <input type="text" class="form-control" name="firstName" id="firstName" value="<?php echo $uname; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="lastName" class="text-white">Address</label>
                                        <textarea class="form-control" id="addreaa" name="address" rows="3"> <?php echo $address; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Change Name" class="btn btn-outline-danger paymentInput px-5" id="btnSubmit" name="btnSubmit">
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                    
                    </div>
                    
                </div>
            
            </div>
            
        </div>

        
    </div>
    
</body>
</html>