<?php
// Start the session
session_start();
?>
<html>
    <head>
        <title>Admin Dashboard</title>
        <link rel="stylesheet" href="admindashboard.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        
    <style>
    .container{
    position: fixed;
    right: 0;
    top: 3rem;
    width: 80vw;
    height:1000px;;
}

.container .content{
    margin-top: 10vh;
    min-height: 90vh;
    background: url(../images/adminbg1.jpg);
    background-position: center;
    background-size: cover;
    height: 100vh;
    transition: 0.5s;
}

.container .content .cards{
    padding: 15px 15px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
}

.container .content .cards .card{
    border-radius: 25px;
    width: 250px;
    height: 350px;
    background:#8794a8;
    color:white;
    margin: 20px 10px;
    display: flex;
    align-items: center;
    justify-content: space-around;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
}

.container .content .cards .card .icon-design img{
    width: 100px;
    height: 120px;
}

.container .content .content-ii{
    min-height: 60vh;
    display: flex;
    justify-content: space-around;
    align-items: flex-start;
    flex-wrap: wrap;
}
    </style>

    </head>
    <body>


    <?php

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
         
            $select=" SELECT * FROM admin WHERE email = '$email' && password='$pass' ";
            $result= mysqli_query($conn, $select);
        
            if(mysqli_num_rows($result)>0){          //Checking whether the entered email already exist in the system
                $error[]='the email you entered is already used.!!!';
            }else{
                 $insert="INSERT INTO 
                            admin(user_name,Telephone,email,password) VALUES('$name','$tel','$email','$pass')";
                            if (mysqli_query($conn,$insert)){
                             // header('location:adminindex.php');
                             echo '<script>alert("Sucessfully Added")</script>';
                            }
                         //   header('location:Login.php');  After the filling the form and click on "Register now" button it will lead navigate to this location 
                }
                
            
        };


        ?>

<input type="checkbox" id="check">

                 <!--header area start-->
                     <header>
                          <label for="check">
                             <i class="fa fa-bars" id="sidebar_btn"></i>
                      </label>
                         <div class="left_area">
                            <h3 class="header_one">Zara <span class="shop">Shooping</span></h3>
                         </div>
           
                      </header>
                  <!--header area end-->
    
                 <!--sliderbar start-->
                 <div class="sidebar">
                         <center>
                         <img src="user.png" width="60%" >
                         <h4>Admin</h4>
                         </center>
                               <a class="active" href="adminindex.php"><i class="fa fa-home"></i><span>Dashboard</span></a>
                               <a  href="add_admin.php">  <i class="fa fa-user" aria-hidden="true"></i></i><span>Add admin</span></a>
                                <a  href="show_checkout.php"><i class="fa fa-shopping-bag" aria-hidden="true"></i><span>Orders</span></a>
                               <a href="view_product.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Products</span></a>
                                <a href="category.php"><i class="fa fa-list" aria-hidden="true"></i><span>Categories</span></a>
                                <a href="adminIndex.php"><i class="fa fa-users" aria-hidden="true"></i><span>Customers</span></a>
                                  

                               <a href="../HTML/index.php"><i class="fa fa-sign-out" aria-hidden="true"></i><span>Sign out</span></a>

                             

      
                    </div>


                    <div class="container">
            <!--Today-->
            <div class="content">
                <div class="cards">
                    <div class="card">
                       
                        <div class="icon-design">
                        <img src="dash_icon/od.png">
                        </div>

                        <div class="box">
                            <h1>0</h1>
                            <h3>Orders</h3>
                        </div>
                    </div>
                    
                        <div class="card">
                            
                            <div class="icon-design">
                                <img src="dash_icon/pro.png">
                            </div>

                            <div class="box">
                                <?php 
                                        $query = "SELECT id FROM product ORDER BY id";
                                        $query_run = mysqli_query($conn, $query);

                                        $row = mysqli_num_rows($query_run);

                                        echo '<h1 style="color:black;">'.$row.'</h1>'  
                                ?>
                                <h3>Products</h3>
                            </div>
                        </div>
                        
                            <div class="card">
                            <div class="icon-design">
                            <img src="dash_icon/cat.png">
                                </div>
                                <div class="box">
                                <?php 
                                        $query = "SELECT id FROM category ORDER BY id";
                                        $query_run = mysqli_query($conn, $query);

                                        $row = mysqli_num_rows($query_run);

                                        echo '<h1 style="color:black;">'.$row.'</h1>' 
                                    ?>
                                   
                                    <h3>Categories</h3>
                                </div>
                                
                            </div>
                            
                                <div class="card">
                                    
                                    <div class="icon-design">
                                    <img src="dash_icon/cus.png">
                                    </div>
                                    <div class="box">
                                    <?php 
                                        $query = "SELECT id FROM customer ORDER BY id";
                                        $query_run = mysqli_query($conn, $query);

                                        $row = mysqli_num_rows($query_run);

                                        echo '<h1 style="color:black;">'.$row.'</h1>' 
                                    ?>
                                    
                                        <h3>Customers</h3>
                                    </div>

                                </div>
                </div>
                


            <div class="content-ii"> </div>
            </div>
        </div>




              
        
    </body>
</html>