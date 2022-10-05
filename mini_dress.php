

<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <link rel="stylesheet" href="css/main2.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <title>Mini dress!</title>
   </head>
   <body>
        <div class="bg-dark">
                <?php include 'navigationbar.php'; ?>
        </div>
    <!--TOP hedaer-->

        <br>
      <!--Product Grid-->'
      <div class="container">
        <div class="row">
        <?php

        $conn=mysqli_connect("localhost","root","","zara");
        $sql="SELECT * FROM product WHERE category='53'";
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
                        <li><a href="#" data-tip="Quick View"><i class="fa fa-eye"></i></a></li>
                        <li><a href="#" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                        <li><a href="#" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                    </ul>
                    <a class="add-to-cart" href="">Add to cart</a>
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