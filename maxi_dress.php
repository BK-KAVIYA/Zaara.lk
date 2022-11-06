
<?php
   include("db.php");
   session_start();
   
   ?>
<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Bootstrap CSS -->
      <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <link rel="stylesheet" href="css/main2.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <title>Mini dress!</title>

      <!--Alert-->
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   </head>
   <body>
   <?php
 

 if(isset($_GET['pid'])){
	if(isset($_SESSION['uid'])){
		
	// echo "Form submitted";
	//getting the data
	$pid=$_GET['pid'];
	$uid=$_SESSION['uid'];
	$date="2022-10-14 13.02";
	

	   $sql="INSERT INTO shopping_cart(customer_id,product_id,date_time) VALUES('$uid','$pid','$date')";
		 $res=mysqli_query($conn,$sql);
		 echo mysqli_error($conn);

			 if($res){
				 echo  "<script type=\"text/javascript\">
				 Swal.fire('Added!!',
					   'Product is added to the cart',
					   'success'
				 )
			   </script>";
			
			 }
			 else{
			   echo "<script>
				 swal({
				 title: 'Error',
				 text: 'product didnot add!',
				 icon: 'warning',
				 button: 'Ok',
				 });
			   </script>";
			 }
			 
	}else{
		echo  "<script type=\"text/javascript\">
                         Swal.fire('Login First!!',
                               'To Use Fhis Feature Please Login',
                               'info'
                         )
                       </script>";

	}

 }

  ?>
        <div class="bg-dark">
                <?php include 'navigationbar.php'; ?>
        </div>
    <!--TOP hedaer-->

        <br>
      <!--Product Grid-->'
      <div class="container">
        <div class="row">
        <?php

        $sql="SELECT * FROM product WHERE category='52'";
        $result=mysqli_query($conn,$sql);

       

        while($row=mysqli_fetch_array($result)){

        ?>
                
                <div class="col-md-3 col-sm-6">
            <div class="product-grid2">
                <div class="product-image2">
                    <a href="#">
                        <img class="pic-1" src="admin/upload/product/<?php echo $row['image']; ?>">
                        <img class="pic-2" src="admin/upload/product/<?php echo $row['image']; ?>">
                    </a>
                    <ul class="social">
                        <li><a href="productDetail.php?id=<?php echo $row['id']; ?>" data-tip="Quick View"><i class="fa fa-eye"></i></a></li>
                        <li><a href="#" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                        <li><a href="maxi_dress.php?pid=<?php echo $row['id']; ?>" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                    </ul>
                    <a class="add-to-cart" href="add_cart.php">Add to cart</a>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="#"><?php echo $row['name']; ?></a></h3>
                    <span class="price"><?php echo $row['price']; ?></span>
                </div>
           
            </div>
        </div>  
       

        <?php
                }
                
                ?>
        </div>
      </div>
      

        
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script> 
   </body>
   <?php
   require_once("footer.php");
   ?>
</html>