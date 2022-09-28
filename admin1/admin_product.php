<?php
// Start the session
session_start();
?>
<html>
    <head>
        <title>Admin Dashboard</title>
    
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <link rel="stylesheet" href="admindashboard.css">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <style>

.size-im{
     width:100px;}
            input[type=text], select, textarea {
              width: 100%;
              padding: 12px;
              border: 1px solid #ccc;
              border-radius: 4px;
              resize: vertical;
            }

            label {
              padding: 12px 12px 12px 0;
              display: inline-block;
            }

            input[type=submit] {
              background-color: #04AA6D;
              color: white;
              padding: 12px 20px;
              border: none;
              border-radius: 4px;
              cursor: pointer;
              float: right;
            }

            input[type=submit]:hover {
              background-color: blue;
            }

            .main-one {
              border-radius: 5px;
              padding-right:1px;
              padding-top:90px;
              padding-left:20px;
              margin-bottom:2rem;
              overflow-y: auto;

            }

            .col-25 {
              float: left;
              width: 15%;
              margin-top: 6px;
            }

            .col-75 {
              float: left;
              width: 75%;
              margin-top: 6px;
            }

            .form-dec{

                
            }

            /* Clear floats after the columns */
            .row:after {
              content: "";
              display: table;
              clear: both;
            }

            /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
            @media screen and (max-width: 600px) {
              .col-25, .col-75, input[type=submit] {
                width: 100%;
                margin-top: 0;
              }
            }

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
  background-color: black;
  color: white;
  padding: 15px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  border-radius: 15px;
  font-family:roboto;
}

.bu_li:hover, .bu_li:active {
  background-color: green;
}
         

            </style>
        </head>
    <body>
   

 <?php
 error_reporting(0);
   

    include('DB.php');
   
    //session
    
    /*if(isset($_SESSION['status']) && $_SESSION['status']!='')
    {
    
      <script>
          swal({
          title: "<?php echo $_SESSION['status']; ?>",
         // text: "You clicked the button!",
          icon: "<?php echo $_SESSION['status_code']; ?>",
          button: "Aww yiss!",
          });
      </script>
    
     
      unset($_SESSION['sucess']);
    }*/
    
            
   
    if(isset($_POST['addproduct']))
    {
       // echo "Form submitted";
       //getting the data
       $pname=$_POST['pname'];
       $category=$_POST['cat_id'];
       $price=$_POST['price'];
       $filename=$_FILES['product_image']['name'];
       $imageFileType=pathinfo($filename,PATHINFO_EXTENSION);
       $extensions_arr = array("jpg","jpeg","png","gif");
       $quantity=$_POST['quantity'];
       $description=$_POST['description'];
       $image=$_FILES['product_image']['name'];

       move_uploaded_file($_FILES["product_image"]["tmp_name"],"upload/product/".$_FILES["product_image"]["name"]);
        
      
          $sql="INSERT INTO product(name,category,price,description,quantity,image)VALUES('$pname','$category','$price','$description',$quantity,'$image')";
            $res=mysqli_query($conn,$sql);
                if($res){
                 
                  echo  
                  "<script>
                                alert('product added to cart');
                                window.location.href = 'view_product.php';
                      </script>";
                }
                else{
                 echo mysqli_error($conn);
                  echo "<script>
                    swal({
                    title: 'Error',
                    text: 'Data didnot add!',
                    icon: 'warning',
                    button: 'Ok',
                    });
                  </script>";
                  echo "Error:".mysqli_error($con);
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
           <span class="topic-ta">   Add product        </span></h3>
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
                                <a  href="adminIndex.php"><i class="fa fa-shopping-bag" aria-hidden="true"></i><span>Orders</span></a>
                               <a  class="active"href="view_product.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Products</span></a>
                                <a href="category.php"><i class="fa fa-list" aria-hidden="true"></i><span>Categories</span></a>
                                <a href="adminIndex.php"><i class="fa fa-users" aria-hidden="true"></i><span>Customers</span></a>


              <a href="admin.php"><i class="fa fa-sign-out" aria-hidden="true"></i><span>Sign out</span></a>


      

  </div>

           
   
<div class="main-one" style="margin-left:275px; padding-top:150px;">
  <form class="form-dec" method="POST" enctype="multipart/form-data">

  <div class="row">
    <div class="col-25">
      <label for="productname">Product Name</label>
    </div>
    <div class="col-75">
      <input type="text" id="pname" name="pname" placeholder="product name..">
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="Category">Product category</label>
    </div>
    <div class="col-75">



            <select name="cat_id">
                                <option selected>Select Category</option>
                                <?php
                              
                                    $res=mysqli_query($conn,"SELECT * FROM category");
                                    while($row=mysqli_fetch_assoc($res)){
                                        if($row['id']==$cat_id){
                                            echo "<option selected value=".$row['id'].">".$row['type']."</option>";
                                        }else{
                                            echo "<option value=".$row['id'].">".$row['type']."</option>";
                                        }
                                    }
                                ?>
                             </select>



    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="price">Price</label>
    </div>
    <div class="col-75">
      <input type="text" id="price" name="price" placeholder="product price..">
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="image">Product Image</label>
    </div>
    <div class="col-75">
      <input type="file" name="product_image" id="productImage">
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="quantity">Product quantity</label>
    </div>
    <div class="col-75">
    <input type="text" id="quantity" name="quantity" placeholder="product quantity..">
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="description">Product Description</label>
    </div>
    <div class="col-75">
      <textarea id="description" name="description" placeholder="product description.." style="height:200px"></textarea>
      <br><br>
      <a  class= "bu_li"href="view_product.php" target="_blank">Back</a>
      <input type="submit" value="Add product" name="addproduct">
    
    </div>
  </div>

  <br>
  <div class="row">
   
  </div>
  </form>
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
