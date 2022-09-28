<?php
// Start the session
session_start();
?>
<html>
    <head>
        <title>Order</title>
    
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <link rel="stylesheet" href="admindashboard.css">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <style>

.size-im{
     width:100px;}
           

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

.bu_li:link, .bu_li:visited {
  background-color: green;
  color: white;
  padding: 15px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  border-radius: 15px;
  font-family:roboto;
  margin-left:200px;
  
}

.bu_li:hover, .bu_li:active {
  background-color: rubik;
}
         

            </style>
        </head>
    <body>
   

 <?php
 error_reporting(0);
   

    include('DB.php');
            
    //delete record
    if(isset($_POST['delete_btn']))
    {
        $id = $_POST['delete_id'];

        $query = "DELETE FROM checkouts WHERE id='$id' ";
        $query_run = mysqli_query($conn, $query);

        if($query_run)
        {
            $_SESSION['status'] = "Your Data is Deleted";
            $_SESSION['status_code'] = "success";
            header('Location: view_product.php'); 
        }
        else
        {
            $_SESSION['status'] = "Your Data is NOT DELETED";       
            $_SESSION['status_code'] = "error";
            header('Location: view_product.php'); 
        }    
    }
   
 ?>
 <input type="checkbox" id="check">

<!--header area start-->
    <header>
         <label for="check">
            <i class="fa fa-bars" id="sidebar_btn"></i>
     </label>
        <div class="left_area">
           <h3 class="header_one">Zara <span class="shop">Shooping</span>
           <span class="topic-ta">   Admin table content     <a  class= "bu_li" href="admin_product.php" target="_blank">CHECKOUT DETAIL</a>    </span></h3>
        </div>

     </header>
 <!--header area end-->

<!--sliderbar start-->
<div class="sidebar">
        <center>
        <img src="user.png" width="60%" >
        <h4>Admin</h4>
        </center>
                               <a href="adminindex.php"><i class="fa fa-home"></i><span>Dashboard</span></a>
                                <a  href="add_admin.php">  <i class="fa fa-user" aria-hidden="true"></i></i><span>Add admin</span></a>
                                <a  class="active" href="show_checkout.php"><i class="fa fa-shopping-bag" aria-hidden="true"></i><span>Orders</span></a>
                               <a  href="view_product.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Products</span></a>
                                <a href="category.php"><i class="fa fa-list" aria-hidden="true"></i><span>Categories</span></a>
                                <a href="adminIndex.php"><i class="fa fa-users" aria-hidden="true"></i><span>Customers</span></a>


              <a href="admin.php"><i class="fa fa-sign-out" aria-hidden="true"></i><span>Sign out</span></a>


      

  </div>



  <div class="container">
    <div class="content">
     
       <table  class="table table-bordered" style="margin-left:8px; margin-right:auto; align-content:center; margin-top:100px; ">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Payement_Type</th>
                                <th>Action</th>
                            </tr>
                          </thead>
                           <tbody>
                             <?php
                                   $query="SELECT id,name,email,phone,address,payment_type FROM checkouts";
                                   $query_run=mysqli_query($conn,$query);
                                   if(mysqli_num_rows($query_run)>0)
                                   {
                                        foreach($query_run as $item)
                                        {
                                          ?> 
                                          <tr>
                                                <td> <?= $item['id']; ?></td>
                                                <td> <?= $item['name']; ?></td>
                                                <td> <?= $item['email']; ?></td>
                                                <td> <?= $item['phone']; ?></td>
                                                <td> <?= $item['address']; ?></td>
                                                <td> <?= $item['payment_type']; ?></td>
                                                <td><form action="" method="post">
                                                    <input type="hidden" name="delete_id" value="<?php echo $item['id']; ?>">
                                                    <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
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

      </div>
                               


      <?php

/*
function getAll($table)
{
   
    $query="SELECT * FROM $table";
    $query_run=mysqli_query($conn,$query);
    return $query_run;
}

function getID($table,$id)
{
    
    $query="SELECT * FROM $table WHERE id='$id'";
    return $query_run=mysqli_query($conn,$query);

}

function redirect($url,$message)
{
    $_SESSION['$massage']=$message;
    header('Location: '.$url);
    exit();
}

*/

mysqli_close($conn);
?>

                                  
  </body>
</html>