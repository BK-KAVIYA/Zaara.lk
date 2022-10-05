<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">
  <head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>eCommerce Product Detail</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="css/product_css.css">

  </head>

  <body>
  <div class="bg-dark">
	<?php
   include("navigationbar.php");
    ?>
	</div>


	<form action="add_cart.php" method="post">
            <?php
               //require('connection.php');

			   
      

               
                   if(isset($_GET['49'])){
                     $conn=mysqli_connect("localhost","root","","zaraa");
                     $pid=$_GET['49'];
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
						
						<div class="preview-pic tab-content">
						  <div class="tab-pane active" id="pic-1"><img src="PHOTO/product/maxi_dress/1/2.jpg" /></div>
						  <div class="tab-pane" id="pic-2"><img src="PHOTO/product/maxi_dress/1/3.jpg" /></div>
						  <div class="tab-pane" id="pic-3"><img src="PHOTO/product/maxi_dress/1/4.jpg" /></div>
						  
						</div>
						<ul class="preview-thumbnail nav nav-tabs">
						  <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="PHOTO/product/maxi_dress/1/2.jpg" /></a></li>
						  <li><a data-target="#pic-2" data-toggle="tab"><img src="PHOTO/product/maxi_dress/1/3.jpg" /></a></li>
						  <li><a data-target="#pic-3" data-toggle="tab"><img src="PHOTO/product/maxi_dress/1/4.jpg" /></a></li>
				
						</ul>
						
					</div>
					<div class="details col-md-6">
						<h3 class="product-title">men's shoes fashion</h3>
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
						<p class="product-description-p">Suspendisse quos? Tempus cras iure temporibus? Eu laudantium cubilia sem sem! Repudiandae et! Massa senectus enim minim sociosqu delectus posuere.</p>
						<h4 class="price">current price: <span>$180</span></h4>
						<p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p>
						<h5 class="sizes">sizes:
                        <button type="button" class="btn btn-dark">S</button>
                        <button type="button" class="btn btn-dark">M</button>
						<button type="button" class="btn btn-dark">L</button>
						<button type="button" class="btn btn-dark">XL</button>
						</h5>
						
						<div class="action">
                            <input type="number" id="quantity" name="quantity" min="1" max="10"> <br>
                            
							<button class="add-to-cart btn btn-default bg-danger text-white" type="button">add to cart</button>
							
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
