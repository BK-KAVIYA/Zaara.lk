<?php
// Start the session
session_start();
?>
<html>
    <head>
        <title>Admin Dashboard</title>
        <link rel="stylesheet" href="admindashboard.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

        <style>
          th, td {
                  padding: 22px;
                  text-align: left;
                 
                  

         }

         th{ font-size:20px;

          }
                  tr
   {
            background-color:#8794a8;
            
    }
    table {
  border-collapse: collapse;
  border-radius: 1em;
  overflow: hidden;
  border-spacing: 50px;
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
        //delete record
    if(isset($_POST['delete_btn']))
    {
        $id = $_POST['delete_id'];

        $query = "DELETE FROM category WHERE id='$id' ";
        $query_run = mysqli_query($conn, $query);

        if($query_run)
        {
            $_SESSION['status'] = "Your Data is Deleted";
            $_SESSION['status_code'] = "success";
            echo '<script>alert("Sucessfully Added")</script>';
            header('Location: category.php');

        }
        else
        {
            $_SESSION['status'] = "Your Data is NOT DELETED";       
            $_SESSION['status_code'] = "error";
            header('Location: category.php'); 
        }    
    }

        if(isset($_POST['submit'])){
            $name=$_POST['name'];
           
         /*
            $select=" SELECT * FROM admin WHERE email = '$email' && password='$pass' ";
            $result= mysqli_query($conn, $select);
        
            if(mysqli_num_rows($result)>0){          //Checking whether the entered email already exist in the system
                $error[]='the email you entered is already used.!!!';  */
                $insert="INSERT INTO category(type) VALUES('$name')";
                if (mysqli_query($conn,$insert)){
                    echo "<script>
                                alert('product added to cart');
                                window.location.href = 'category.php';
                            </script>";
                    
                }
                else{
                echo mysqli_error($conn);
                }
            }else{
                
                         //   header('location:Login.php');  After the filling the form and click on "Register now" button it will lead navigate to this location 
                         //  header('location:adminindex.php');
                
            
        };


        ?>



      

  <div>
  
            <input type="checkbox" id="check">

                 <!--header area start-->
                     <header>
                          <label for="check">
                             <i class="fa fa-bars" id="sidebar_btn"></i>
                      </label>
                         <div class="left_area">
                            <h3 class="header_one">Zara <span class="shop">Shooping</span>
                            <span class="topic-ta">    Category table content       </span></h3>
                         </div>
           
                      </header>
                  <!--header area end-->
    
                 <!--sliderbar start-->
                 <div class="sidebar">
                         <center>
                         <img src="user.png" width="60%" >
                         <h4>Admin</h4>
                         </center>
                         <a  href="adminindex.php"><i class="fa fa-home"></i><span>Dashboard</span></a>
                               <a   href="add_admin.php">  <i class="fa fa-user" aria-hidden="true"></i></i><span>Add admin</span></a>
                                <a  href="adminIndex.php"><i class="fa fa-shopping-bag" aria-hidden="true"></i><span>Orders</span></a>
                               <a href="view_product.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Products</span></a>
                                <a  class="active" href="category.php"><i class="fa fa-list" aria-hidden="true"></i><span>Categories</span></a>
                                <a href="adminIndex.php"><i class="fa fa-users" aria-hidden="true"></i><span>Customers</span></a>


                               <a href="admin.php"><i class="fa fa-sign-out" aria-hidden="true"></i><span>Sign out</span></a>

      
      
                    </div>
                                
                            <!--slider bar end-->
                                <div class="container">
                                      <div class="content">
                

                                        <div class="card" >
         
                                            <div class="card-body">
                                                 <table class="table table-bordered" style="margin-left:250px; margin-right:auto; align-content:center; margin-top:100px; ">
                                            <thead>
                                             <tr>
                                           <th> Id</th>
                                         <th> Type</th>
                                         <th>delete</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                   
                                   $select=" SELECT * FROM category ";
                                   $result= mysqli_query($conn, $select);

                                    if(mysqli_num_rows($result) > 0)
                                    {
                                        foreach($result as $item)
                                        {
                                            ?>
                                            <tr>
                                                <td> <?= $item['id']; ?></td>
                                                <td> <?= $item['type']; ?></td>
                                       

                                               
                                                <td><form action="" method="post">
                                                    <input type="hidden" name="delete_id" value="<?php echo $item['id']; ?>">
                                                    <button type="submit" name="delete_btn" class="btn-danger"> DELETE</button>
                                                    </form>
                                                </td>

                                                
                                            </tr>
                                        <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "No records found";
                                    }
                                ?>
                               
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>



                  
 <div> 
<button class="open-button" onclick="openForm()">Add Category</button>

<div class="form-popup" id="myForm">
  <form method="post" class="form-container">
    <h1 class="admin" style="text-align:center">Category</h1>
    

    <label for="email"><b>Category_Name :</b></label>
    <input type="text" placeholder="Enter Name" name="name" required>




     
    <button type="submit" name="submit" class="btn">Add</button>
    <button type="button"  class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>


</div>




</div>




              
        
    </body>
</html>