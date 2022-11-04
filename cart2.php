<?php 
   include("db.php");     
   session_start();
  
   
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="css/stylesheet.css">
      <!--add style sheet-->
      <title>Shopping Cart</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
      <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
      <link rel="stylesheet" href="css/cartstyle.css">
      <!--add style sheet-->
   </head>
   <script>
      function totalPrice(){
       var total = 0 
       var quantity = document.getElementById('qty').value;
       var price = document.getElementById('price').value;
       total = parseInt(quantity)*parseInt(price);
       console.log(total);
       //document.getElementById('totalPrice').textContent=total;
       
       }
   </script>
   <body>
      <!--Cart View--------------------------------------------------->
      <main class="page">
         <section class="shopping-cart dark">
         <!-- page content row 1 | topic -->
         <div class="container">
            <div class="mt-4">
               <h1 class="display-4 text-danger"><img src="PHOTO/cart.png" width="60px">Checkout</h1>
               <p>Zara.lk provides a reliable, secure shopping cart solution for your order.</p>
            </div>
         </div>
         <div class="container">
            <!--left code--->
            <div class="content mt-5">
               <div class="row">
                  <div class="col-md-12 col-lg-8 mt-3">
                     <div class="items">
                        <?php

                           $tot=0;
                           if(isset($_SESSION['uid'])){ 
                            if($_SESSION['uid']!=0){
                              $sql = "SELECT * FROM shopping_cart where customer_id=".$_SESSION['uid'];
                              $result = mysqli_query($conn, $sql);
                               foreach($result as $key=>$value){
                                 $sql2 = "SELECT * FROM product where id=".$value['product_id'];
                                 $result1 = mysqli_query($conn, $sql2);
                                 foreach($result1 as $key1=>$value1){
                                       $tot=$tot+$value1['price'];
                           ?>
                        <div class="product">
                           <div class="row">
                              <div class="col-md-2 ml-3">
                                 <img class="img-fluid img-thumbnail" src="<?php echo "admin/upload/product/".$value1['image']?>"><!--phto adding-->
                              </div>
                              <div class="col-md-8">
                                 <div class="info">
                                    <div class="row">
                                       <div class="col-md-5 product-name">
                                          <div class="product-name">
                                             <a href="#"><?php echo $value1['name']?></a>
                                             <p class="text-dark"><?php echo $value1['description']?></p>
                                             <div class="product-info">
                                             </div>
                                          </div>
                                       </div>

                                       <div class="col-md-3 price">
                                          <span name="uprice"><label for="price">LKR</label><input class="border-0" type="text" id="price" name="price" value="<?php echo $value1['price']?>" disabled></span>
                                       </div>
                                       <form action="add_cart.php" method="POST">
                                          &nbsp;&nbsp;&nbsp;&nbsp;
                                          &nbsp;&nbsp;&nbsp;&nbsp;
                                     
                                          <input type="hidden" name="p_id" value="<?php echo $value1['id'];?>">
                                       </form>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <?php 
                           }
                           }
                        }
                           }else{ 
                           
                           ?>      
                        <?php
                           echo "<div class=\"justify-content-center mb-2 px-5\" >
                                <img src=\"PHOTO/cart_empty.png\" class=\"img-fluid mx-auto d-block\" style=\"width:20%;\">
                                <h2 class=\"text-center\">You don't have any items in your shopping cart.</h2>
                                <h3 class=\"text-center lead mt-4\">Have an account? Sign in to see your items.</h3>
                           
                                <div class=\"justify-content-center p-1 d-flex my-5\">
                                    <a href=\"join.php\" class=\"btn btn-danger px-5 mr-5\">Join</a>
                                    <a href=\"sign_in.php\" class=\"btn btn-outline-danger px-5\">Sign In</a>
                                </div>
                            </div>";
                            } ?> 
                     </div>
                  </div>
                  <!--summery -->
                  <div class="col-lg-4">
                     <div class="summary">
                        <h2 class="text-light">Summary</h2>
                        <div class="summary-item"><span class="text">Subtotal</span><span class="price"><?php if($tot>0){echo $tot;} ?></span></div>
                        <div class="summary-item"><span class="text">Discount</span><span class="price">$0</span></div>
                        <div class="summary-item"><span class="text">Shipping</span><span class="price">$0</span></div>
                        <div class="summary-item"><span class="text">Total</span><span class="price"><?php if($tot>0){echo $tot;} ?></span></div>
                        <button type="button" class="btn btn-danger"><a href="checkout.php" class="text-light"> Checkout</button></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </main>
      <!--<?php
         /* require_once("footer.php");*/
          ?>--->
   </body>
   <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
   <script></script>
</html>