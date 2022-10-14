<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- css link -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/fontawesome.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
      <style media="screen">
         .section-team {
         font-family: "Poppins", sans-serif;
         padding: 80px 0;
         }
         .section-team .header-section {
         margin-bottom: 50px;
         }
         .section-team .header-section .small-title {
         margin-bottom: 25px;
         font-size: 16px;
         font-weight: 500;
         color: #3e64ff;
         }
         .section-team .header-section .title {
         font-weight: 700;
         font-size: 45px;
         color: white;
         }
         .section-team .single-person {
         margin-top: 30px;
         padding: 30px;
         background-color: #f6f9ff;
         border-radius: 5px;
         height: 420px;
         }
         .section-team .single-person:hover {
         background: linear-gradient(to right, #e8d543, #ec015b);
         }
         .section-team .single-person .person-image {
         position: relative;
         margin-bottom: 50px;
         border-radius: 50%;
         border: 4px dashed transparent;
         transition: padding .3s;
         }
         .section-team .single-person:hover .person-image {
         padding: 12px;
         border: 4px dashed #fff;
         }
         .section-team .single-person .person-image img {
         width: 100%;
         border-radius: 50%;
         }
         .section-team .single-person .person-image .icon {
         position: absolute;
         bottom: 0;
         left: 50%;
         transform: translate(-50%,50%);
         display: inline-block;
         width: 60px;
         height: 60px;
         line-height: 60px;
         text-align: center;
         background: linear-gradient(to right, #016cec, #00b5f7);
         color: #fff;
         border-radius: 50%;
         font-size: 24px;
         }
         .section-team .single-person:hover .person-image .icon {
         background: none;
         background-color: #fff;
         color: #016cec;
         }
         .section-team .single-person .person-info .full-name {
         margin-bottom: 10px;
         font-size: 28px;
         font-weight: 700;
         }
         .section-team .single-person .person-info .speciality {
         text-transform: uppercase;
         font-size: 14px;
         color: #016cec;
         }
         .section-team .single-person:hover .full-name,
         .section-team .single-person:hover .speciality {
         color: #fff;
         }
         .mini-footer {
         background:#192027;
         text-align:center;
         padding:32px 0
         }
         .mini-footer p {
         margin:0;
         line-height:26px;
         font-size:15px;
         color:white;
         }
         .mini-footer p a {
         color:white;
         }
         .mini-footer p a:hover {
         color:#34bfa3
         }
         .same-height{
         height: 190px;
         }
         .carousel-caption1{position:absolute;right:15%;bottom:400px;left:15%;z-index:10;padding-top:20px;padding-bottom:20px;color:#fff;text-align:center}
      </style>
      <!-- js -->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <title>Zaara.lk</title>
   </head>
   <body >
      <?php
         //database connection
         $conn = new mysqli('localhost','root','','zara');
         
         if($conn->connect_error){
             die('Could not connect:'.$conn->connect_error);
         }
         if(isset($_POST['submit'])){
             
             $name = $_POST['name'];
             $email = $_POST['email'];
             $subject = $_POST['subject'];
             $message = $_POST['mesg'];
             
             $stmt= $conn->prepare("insert into Customer_feeedback(C_name,Email,Subject,Massage) values(?,?,?,?)");
             $stmt->bind_param("ssss",$name,$email,$subject,$message);
             if($stmt->execute()){ 
             echo  "<script type=\"text/javascript\">
             Swal.fire({ 
                 position: 'top-end',
                 icon: 'success',
                 title: 'Your feedback has been saved',
                 showConfirmButton: false,
                 timer: 1500
                 
         })
         
         </script>";
                 
             }
             $stmt->close();
             $conn->close();
             
         }
         ?>
      <div class="fixed-top bg-dark">
         <?php include 'navigationbar.php'; ?>
      </div>
      <div class="container-fluid mt-5">
         <div id="carouselExampleIndicators" class="carousel slide mt-5" data-ride="carousel">
            <ol class="carousel-indicators">
               <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
               <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
               <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <img class="d-block w-100" src="PHOTO/about1.jpg" alt="First slide">
                  <div class="carousel-caption1">
                     <h3 class="text-light">Zaara.lk</h3>
                     <p>Founded here in the Paradise Island of Sri Lanka in Year 2017, ZARA is an inclusive and innovative brand targeting value oriented customers. It has been pushing boundaries to bring its customers up-to-date and inspirational fashion.
                     </p>
                  </div>
               </div>
               <div class="carousel-item">
                  <img class="d-block w-100" src="PHOTO/about2.jpg" alt="Second slide">
                  <div class="carousel-caption1">
                     <h3 class="text-light">Misson</h3>
                     <p>Zara has grown rapidly in bringing the versatile Modern Women of today with magnificent taste in Fashion. We are a family of fashion enthusiasts, driven by our desire to make exceptional designs maintaining sustainability while aiming to be the leading e-Commerce and offline Women’s Fashion brand in Sri Lanka.
                     </p>
                  </div>
               </div>
               <div class="carousel-item">
                  <img class="d-block w-100" src="PHOTO/about3.jpg" alt="Third slide">
                  <div class="carousel-caption1">
                     <h3 class="text-light">Vission</h3>
                     <p>This sort of data should cost thousands, but SaleCycle are making it available to anyone. Get your free download for the best stats and trends including online buying behaviour. Expert Advice And Tips. Enhance your eCommerce results from acquisition to retention with full-funnel services. Drive high-intent traffic to your eCommerce store with integrated marketing solutions. Subscribe To Newsletter. View Case Studies. 
                     </p>
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
      </div>
      <section class="section-team " id="aboutus">
         <div class="container">
            <!-- Start Header Section -->
            <div class="row justify-content-center text-center">
               <div class="col-md-8 col-lg-6">
                  <div class="header-section">
                     <h3 class="small-title">Our Experts</h3>
                     <h2 class="title text-dark">Our Directors</h2>
                  </div>
               </div>
            </div>
            <hr>
            <!-- / End Header Section -->
            <div class="row">
               <!-- Start Single Person -->
               <div class="col-sm-6 col-lg-4 col-xl-3">
                  <div class="single-person">
                     <div class="person-image">
                        <img class="same-height" src="img\Directors\Pro1.png" alt="">
                        <span class="icon">
                        </span>
                     </div>
                     <div class="person-info">
                        <h3 class="full-name">DR. Jayanth Thilakarathna</h3>
                        <span class="speciality">Specilies for EYE</span>
                     </div>
                  </div>
               </div>
               <!-- / End Single Person -->
               <!-- Start Single Person -->
               <div class="col-sm-6 col-lg-4 col-xl-3">
                  <div class="single-person">
                     <div class="person-image">
                        <img class="same-height" src="img\Directors\Pro2.jpg" alt="">
                        <span class="icon">
                        </span>
                     </div>
                     <div class="person-info">
                        <h3 class="full-name">MS. Mauri Kumari</h3>
                        <span class="speciality">Specilies for baby</span>
                     </div>
                  </div>
               </div>
               <!-- / End Single Person -->
               <!-- Start Single Person -->
               <div class="col-sm-6 col-lg-4 col-xl-3">
                  <div class="single-person">
                     <div class="person-image">
                        <img class="same-height" src="img\Directors\Pro3.jpg" alt="">
                        <span class="icon">
                        </span>
                     </div>
                     <div class="person-info">
                        <h3 class="full-name">Miss. Saduni Marasinhe</h3>
                        <span class="speciality">Specilies for Lady</span>
                     </div>
                  </div>
               </div>
               <!-- / End Single Person -->
               <!-- Start Single Person -->
               <div class="col-sm-6 col-lg-4 col-xl-3">
                  <div class="single-person">
                     <div class="person-image">
                        <img class="same-height" src="img\Directors\Pro4.jpg" alt="">
                        <span class="icon">
                        </span>
                     </div>
                     <div class="person-info">
                        <h3 class="full-name">MR. Sarath Makanda</h3>
                        <span class="speciality">Specilies for body</span>
                     </div>
                  </div>
               </div>
               <!-- / End Single Person -->
            </div>
         </div>
      </section>
      <section class="container mt-5" id="contactus">
         <!--Contact heading-->
         <div class="row">
         <!--Grid column-->
         <div class="col-sm-12 mb-4 col-md-5">
            <!--Form with header-->
            <div class="card border-light rounded-0">
               <div class="card-header p-0">
                  <div class="bg-danger text-white text-center py-2">
                     <h3 class="text-light"><i class="fa fa-envelope text-light"></i > Write to us:</h3>
                     <p class="m-0">We’ll write rarely, but only the best content.</p>
                  </div>
               </div>
               <div class="card-body p-3">
                  <div class="form-group">
                     <!--Editing-->
                     <form method="POST" >
                        <label> Your name </label>
                        <div class="input-group">
                           <input value="" type="text" name="name" class="form-control" id="inlineFormInputGroupUsername" placeholder="Your name" required>
                        </div>
                  </div>
                  <div class="form-group">
                  <label>Your email</label>
                  <div class="input-group mb-2 mb-sm-0">
                  <input type="email" value="" name="email" class="form-control" id="inlineFormInputGroupUsername" placeholder="Email" required>
                  </div>
                  </div>
                  <div class="form-group">
                  <label>Subject</label>
                  <div class="input-group mb-2 mb-sm-0">
                  <input type="text" name="subject" class="form-control" id="inlineFormInputGroupUsername" placeholder="Subject">
                  </div>
                  </div>
                  <div class="form-group">
                  <label>Message</label>
                  <div class="input-group mb-2 mb-sm-0">
                  <input type="text" class="form-control" name="mesg" id="messege" required>
                  </div>
                  </div>
                  <div class="text-center">
                  <input type="submit" name="submit" value="submit" class="btn btn-danger btn-block rounded-0 py-2" onclick="openPopup()">
                  </div>
                  </form>
               </div>
            </div>
         </div>
         <!--Grid column-->
         <!--Grid column-->
         <div class="col-sm-12 col-md-7">
            <!--Google map-->
            <div class="mb-4">
               <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63492.94592205695!2d80.51572821913888!3d5.952076466278308!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae138d151937cd9%3A0x1d711f45897009a3!2sMatara!5e0!3m2!1sen!2slk!4v1607445502568!5m2!1sen!2slk" width="600" height="470" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
            <!--Grid column-->
         </div>
      </section>
      <?php include 'footer.php'; ?>
   </body>
</html>