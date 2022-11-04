<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<?php
   include("db.php");
   session_start();
   
   ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>eCommerce Product Detail</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="css/product_css.css">
	<!--Alert-->
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  </head>

  <body>

  <?php
 

 if(isset($_POST['add_product'])){
	if(isset($_SESSION['uid'])){
   
	// echo "Form submitted";
	//getting the data
	$pid=$_GET['id'];
	$uid=$_SESSION['uid'];
	$date="2022-10-14 13.02";
	

	   $sql="INSERT INTO shopping_cart(customer_id,product_id,date_and_time) VALUES('$uid','$pid','$date')";
		 $res=mysqli_query($conn,$sql);

			 if($res){
			  
				 echo  "<script type=\"text/javascript\">
				 Swal.fire('Added!!',
					   'Product is added to the cart',
					   'success'
				 )
			   </script>";
			   header("location:cart.php");
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
	<?php
   include("navigationbar.php");
    ?>
	</div>


	<form  method="post">
            <?php
               
                   if(isset($_GET['id'])){
                     $pid=$_GET['id'];
                     $sql="SELECT * FROM product WHERE id='$pid'";
                     $res=mysqli_query($conn,$sql);
               
                     $row=mysqli_fetch_assoc($res);

				   	}

					 ?>
	
	<div class="container">
  
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
					<?php
								$sql1="SELECT * FROM product_image WHERE product_id=$pid";
								$res1=mysqli_query($conn,$sql1);
								$results = array();
								while($row1=mysqli_fetch_assoc($res1)){ 
									array_push($results,$row1['image_url']);

								}
								?>
								
						<div class="preview-pic tab-content">
							
						  <div class="tab-pane active" id="pic-1"><img src="admin/upload/mini_dress/<?php echo $results[0]; ?>" /></div>
						  <div class="tab-pane" id="pic-2"><img src="admin/upload/mini_dress/<?php echo $results[1]; ?>" /></div>
						  <div class="tab-pane" id="pic-3"><img src="admin/upload/mini_dress/<?php echo $results[2]; ?>" /></div>
						  
						</div>
						<ul class="preview-thumbnail nav nav-tabs">
						  <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="admin/upload/mini_dress/<?php echo $results[0]; ?>" /></a></li>
						  <li><a data-target="#pic-2" data-toggle="tab"><img src="admin/upload/mini_dress/<?php echo $results[1]; ?>" /></a></li>
						  <li><a data-target="#pic-3" data-toggle="tab"><img src="admin/upload/mini_dress/<?php echo $results[2]; ?>" /></a></li>
				
						</ul>
					</div>
					<div class="details col-md-6">
						<h3 class="product-title"><?php echo $row['name']; ?></h3>
						<div class="rating">
							<div class="stars">
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
							</div>
							<span class="review-no">41 reviews</span>
						</div>
						<p class="product-description-p"><?php echo $row['description']; ?></p>
						<h4 class="price">current price: <span><?php echo $row['price']; ?></span></h4>
						<p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p>
						<h5 class="sizes">sizes:
                        <button type="button" class="btn btn-dark">S</button>
                        <button type="button" class="btn btn-dark">M</button>
						<button type="button" class="btn btn-dark">L</button>
						<button type="button" class="btn btn-dark">XL</button>
						</h5>
						
						<div class="action">
                            <input type="number" id="quantity" name="quantity" min="1" max="10"> <br>
                            
							<form method="post"><input class="add-to-cart btn btn-default bg-danger text-white" type="submit" value="Add to cart" name="add_product"></form>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	</form>

	<?php
       include("footer.php");
    ?>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

  </body>
</html>
