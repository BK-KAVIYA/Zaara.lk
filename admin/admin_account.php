<?php

    require_once('../db.php');

    session_start();

    date_default_timezone_set("Asia/Colombo");
    $alert = "";
    $alertStatus = 0;

    if(isset($_POST['btnSubmit'])){
        
        $firstName = $_POST['firstName'];

        $sql = "UPDATE `admin` SET `user_name`= '{$firstName}' WHERE `id` = '{$_SESSION['uid']}'";
  
        mysqli_query($conn, $sql);

            $sql = "SELECT * FROM `admin` WHERE `id` = {$_SESSION['uid']}";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "done";
                $_SESSION['name'] = $row['user_name'];

            }
        }
        
        $alert = "Name Changed.";
        $alertStatus = 1;
    }

    if(isset($_POST['btnSubmitPassword'])){
        
        $currentPwd = $_POST['currentPassword'];
        $newPwd = $_POST['newPassword'];
        
        $h_currentPwd = md5($currentPwd);
        $h_newPwd = md5($newPwd);
        
        $sql = "SELECT * FROM `admin` WHERE `id` = '{$_SESSION['uid']}' AND `password` = '{$h_currentPwd}'";
        
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) != 1) {
            $alert = "Current password is incorrect. Try agin.";
            $alertStatus = 2;
        } else {
            $sql = "UPDATE `admin` SET`password`= '{$h_newPwd}' WHERE `id` = '{$_SESSION['uid']}'";
            
            mysqli_query($conn, $sql);
            
            $alert = "Password changed.";
            $alertStatus = 1;
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
    <link type="text/css" href="../css/navbar.css" rel="stylesheet">
    
    <!-- google font -->
    <link href='https://fonts.googleapis.com/css?family=Alata' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Atomic Age' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Abel' rel='stylesheet'>
    
    <!-- Fontawesome icons -->
    <script src="https://kit.fontawesome.com/faf1c6588d.js" crossorigin="anonymous"></script>

    <!-- jQuery -->
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    
    <style>
        body {
            /*background-image: url('../image/back.gif');
            background-image: url('../image/back.png');*/
            <?php if(isset($_COOKIE['theme']) && ($_COOKIE['theme']=='dark'))echo "background-color: #404550"; ?>
        }
        
        .aboutDescription {
            background-color: rgba(221,18,60,0.1);
            font-family: 'Abel';
            font-size: 20px;
        }
        
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
        
        function passwordVisible() {
            var x = document.getElementById("currentPassword");
            var y = document.getElementById("newPassword");
            var z = document.getElementById("confirmPassword");
            
            if (x.type === "password") {
                x.type = "text";
                y.type = "text";
                z.type = "text";
            } else {
                x.type = "password";
                y.type = "password";
                z.type = "password";
            }
        }
        
        $(document).ready(function(){
            $("#confirmPassword").keyup(function(){
                if ($("#newPassword").val() != $("#confirmPassword").val()) {
                    $("#match-msg").html("Password do not match").css("color","red");
                    $("#btnSubmitPassword").attr('disabled','disabled');
                }else{
                    $("#match-msg").html("Password matched").css("color","green");
                    $("#btnSubmitPassword").removeAttr('disabled');
                }
            });
        });
    </script>
    
    
</head>
    
<body>
    
    <div class="toastNotify  col-7 col-sm-6 col-md-4 col-lg-3" data-autohide="false">
        <div class="toast-header ">
            <strong class="mr-auto text-danger"><?php if($alertStatus == 1) echo "Successful !"; else echo "Unsuccessful !"; ?></strong>
            <small class="text-muted"></small>
            <button type="button" class="ml-2 mb-1 close text-danger" data-dismiss="toast">&times;</button>
        </div>

        <div class="toast-body ">
            <?php echo $alert; ?>
        </div>
    </div>
    
 
    
    <div class="container mt-5 ml-5">
        <h3 class="text-danger mb-3"><i class="far fa-user-circle"></i> My Account</h3>
        
        <div class="sidebar shadow-lg d-flex flex-column rounded-lg">
            <a class="p-3" href="admin_account.php">My Account Setting</a>          
        </div>
        
        <div class="content p-1 mb-5 rounded-lg shadow-lg">
            <h4 class="text-danger mb-3"><i class="fas fa-user-cog"></i> My Account Setting</h4>
            <div class="row mw-100 p-2" id="product-container">
                
                <div class="col-md-6 col-sm-12">
                        <div class="custom-control custom-checkbox">
                            <form action="admin_account.php" method="post">
                                <div class="">
                                    <div class="form-group">
                                        <label for="userId" >User Id</label>
                                        <input type="text" class="form-control"  name="userId" id="userId" value="<?php echo $_SESSION['uid']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" >Email</label>
                                        <input type="email" class="form-control" name="email" id="email" value="<?php echo $_SESSION['uname']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="firstName" >Name</label>
                                        <input type="text" class="form-control" name="firstName" id="firstName" value="<?php echo $_SESSION['name']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Change Name" class="btn btn-outline-danger paymentInput px-5" id="btnSubmit" name="btnSubmit">
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                    
                    </div>
                    
                    <div class="col-md-6 col-sm-12">
                        <div class="custom-control custom-checkbox">
                            <form action="admin_account.php" method="post">
                                <div class="">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" onclick="passwordVisible()" name="mailRadio" id="showPwd">
                                        <label class="custom-control-label" for="showPwd">Show Password</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control"  name="currentPassword" id="currentPassword" placeholder="CURRENT PASSWORD *" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="newPassword" id="newPassword" placeholder="NEW  PASSWORD *" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="CONFIRM NEW  PASSWORD *" required>
                                        <small id="match-msg"></small>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Change Password" class="btn btn-outline-danger paymentInput px-5" id="btnSubmitPassword" name="btnSubmitPassword">
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                    
                    </div>
            
            </div>
            
        </div>

        
    </div>
    

</body>
</html>