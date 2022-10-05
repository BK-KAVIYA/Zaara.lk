<?php
   include("db.php");
   session_start();
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <!-- css link -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/main1.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="css/style2.css" type="text/css" media="screen">

      <style>
         .navi {
            position: sticky;
            top: 0;
         }
      </style>
      <!-- js -->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script>
         //type writter
        var TxtType = function(el, toRotate, period) {
            this.toRotate = toRotate;
            this.el = el;
            this.loopNum = 0;
            this.period = parseInt(period, 10) || 2000;
            this.txt = '';
            this.tick();
            this.isDeleting = false;
        };

        TxtType.prototype.tick = function() {
            var i = this.loopNum % this.toRotate.length;
            var fullTxt = this.toRotate[i];

            if (this.isDeleting) {
                this.txt = fullTxt.substring(0, this.txt.length - 1);
            } else {
                this.txt = fullTxt.substring(0, this.txt.length + 1);
            }

            this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

            var that = this;
            var delta = 200 - Math.random() * 100;

            if (this.isDeleting) { delta /= 2; }

            if (!this.isDeleting && this.txt === fullTxt) {
                delta = this.period;
                this.isDeleting = true;
            } else if (this.isDeleting && this.txt === '') {
                this.isDeleting = false;
                this.loopNum++;
                delta = 500;
            }

            setTimeout(function() {
                that.tick();
            }, delta);
        };

        window.onload = function() {
            var elements = document.getElementsByClassName('typewrite');
            for (var i=0; i<elements.length; i++) {
                var toRotate = elements[i].getAttribute('data-type');
                var period = elements[i].getAttribute('data-period');
                if (toRotate) {
                    new TxtType(elements[i], JSON.parse(toRotate), period);
                }
            }
            // INJECT CSS
            var css = document.createElement("style");
            css.type = "text/css";
            css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #dd123d}";
            document.body.appendChild(css);
        };

      </script>
      <title>Zara.lk</title>
   </head>
   <body>
      
      <!--slider-->
      <div class="container-fluid">
         <div class="brand">
            <div style="background-color: #333;" class="col-md-12">
              <img class="brand-header-logo col-md-3" src="PHOTO/logo/zara.png">
            </div>
         </div>
         <div class="navi" style="z-index: 100;">
            <?php include 'navigationbar.php'; ?>
         </div>
         
         <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
            <ol class="carousel-indicators">
               <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
               <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
               <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
               <div class="bg-dark login-register d-none d-lg-block">
                  <div class="row">
                     <img class="logo-home" src="PHOTO/logooo.png" >
                  </div>
                  <div class="row">
                     <input type="button" class="btn btn-outline-light btn-blockd m " value="LOGIN" onclick="location.href='login.php'">
                  </div>
                  <div class="row">
                     <input type="button" class="btn btn-outline-light btn-blockd " value="JOIN" onclick="location.href='register.php'">
                  </div>
                  <p class="text-light p-4 text-justify">Digital Health Private Limited is Sri Lanka’s pioneering digital health solutions service provider, offering medical services to subscribers from the convenience of their mobile phone and website.</p>
               </div>
               <div class="carousel-item active">
                  <img class="d-block w-100" src="img/slider/one.jpg" alt="First slide">
                  <div class="carousel-caption">
                     <h3>Best Doctors</h3>
                     <p>There are many of Best Doctors are here</p>
                  </div>
               </div>
               <div class="carousel-item">
                  <img class="d-block w-100" src="img/slider/two.jpg" alt="Second slide">
                  <div class="carousel-caption">
                     <h3>Best Specialies</h3>
                     <p>There are many of Best Specialies are here</p>
                  </div>
               </div>
               <div class="carousel-item">
                  <img class="d-block w-100" src="img/slider/three.jpg" alt="Third slide">
                  <div class="carousel-caption">
                     <h3>Best Medicines</h3>
                     <p>There are many of Best Medicines are here</p>
                  </div>
               </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </a>
         </div>
      
      <br><br>
      <h2 class="text-center mt-5" style="z-index: 10000;">
                        <a class="typewrite" data-period="2000" data-type='[ "Hi, Welcome to DigiMart.", "Become a our registered customer.", "Have a great experience." ]'>
                            <span class="wrap"></span>
                        </a>
            </h2>
      <!-- discription_one -->
      <div class="container desc1-section">
         <div class="row">
            <div class="col-md-4 desc1-col" id="discription_one">
               <img src="PHOTO/discription/one.jpg">
               <p id="dis_con">Get 'dolled up in a stylish floral dress with an elegant flare. Sobeſhhades ideal for daytime and the perkier textures to shine when the sun is not.<br><a style="text-decoration:none;" href="mini_dress.php"> SHOP NOW </a></p>
            </div>
            <div class="col-md-4 desc1-col" id="discription_one">
               <p id="dis_con">Get 'dolled up in a stylish floral dress with an elegant flare. Sobeſhhades ideal for daytime and the perkier textures to shine when the sun is not. <br><a style="text-decoration:none;" href="mini_dress.php"> SHOP NOW </a></p>
               <img src="PHOTO/discription/two.jpg">
            </div>
            <div class="col-md-4 desc1-col" id="discription_one">
               <img src="PHOTO/discription/three.jpg">
               <p id="dis_con">Get 'dolled up in a stylish floral dress with an elegant flare. Sobeſhhades ideal for daytime and the perkier textures to shine when the sun is not. <br><a style="text-decoration:none;" href="mini_dress.php"> SHOP NOW </a></p>
            </div>
         </div>
      </div>
      <br>
      <center>
         <h1>New Arrival</h1>
         <hr style="width:60%;">
      </center>
      <div class="container">
         <div class="row">
            <?php
               $conn=mysqli_connect("localhost","root","","zara");
               $sql="SELECT * FROM product WHERE category='53' ORDER BY id DESC";
               $result=mysqli_query($conn,$sql);
               
               
               
               while($row=mysqli_fetch_array($result)){
               
               
                       
                       echo"<div class='col-md-4'>";
                               echo"<div class='row product-pr m-3'>";
                               echo"<div class='col container-product' >";
                                       echo "<img src='admin1/upload/product/".$row['image']."'>";
                                       // echo "<img src='../PHOTO/product/mini_dress/5/1.jpg' alt='img' class='image-pr' style='width:100%'>";
                                       echo "<div class='middle-pr'>";
                                               echo"<p><a href='/HTML/productDetail.php?id=".$row['id']."'><button>Shop Now</button></a></p>";
                                       echo"</div>";
                                       echo"<h2 class='dress-code'>".$row['name']."</h2>";
                                       // echo"<p>".$row['description']."</p>";
                                       echo"<p class='p_tag'>".$row['price']."</p>";
                               echo"</div>";
                               echo"</div>";
                       echo"</div>";
                       }
                       
                       ?>
         </div>
      </div>
      <br><br>   
      <div>
         <center>
            <img src="PHOTO/discription/four.jpg" width="90%"> 
         </center>
      </div>
      <div class="container desc2-section">
         <div class="row">
            <div class="col-md-4 desc2-col" id="discription2_one">
               <h2>July Month Collection</h2>
               <p> July Month Collection
                  See what is at Nils this month to ‘cat-walk’ in your favourite attire and step into the next month with your chin up and head high.<br><br>
                  SHOP NOW 
               </p>
            </div>
            <div class="col-md-8 desc2-col" id="discription2_one">
               <img src="PHOTO/discription/five.jpg" width="100%" height="500px">
            </div>
         </div>
      </div>
      <div class="container desc2-section">
         <div class="row">
            <div class="col-md-8 desc2-col" id="discription2_one">
               <img src="PHOTO/discription/seven.jpg" width="100%">
            </div>
            <div class="col-md-4 desc2-col" id="discription2_one">
               <h2>July Month Collection</h2>
               <p> July Month Collection
                  See what is at Nils this month to ‘cat-walk’ in your favourite attire and step into the next month with your chin up and head high.<br><br>
                  <a style="text-decoration:none;" href="mini_dress.php">SHOP NOW </a>
               </p>
            </div>
         </div>
      </div>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126985.91233567244!2d80.48070740135898!3d5.95198778472467!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae138d151937cd9%3A0x1d711f45897009a3!2sMatara!5e0!3m2!1sen!2slk!4v1607139275787!5m2!1sen!2slk" width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
      <?php include 'footer.php'; ?>
   </div>
   </body>
</html>