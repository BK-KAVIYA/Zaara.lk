<?php
include('../db.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ===== BOX ICONS ===== -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">


    <!-- jQuery library -->
    <script src="js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/adminscript.js"></script>

    <!-- css link -->
    <style>
     
    </style>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/main.css">
    <link href="css/paper-dashboard.css?v=2.0.1">
    <link rel="stylesheet" href="css/adminstyle.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
</head>
<body class="ml-5">
  <section id="content">   
     <main>
      <div class="head-title">
        <div class="left">
          <h1>Dashboard</h1>
          <ul class="breadcrumb">
            <li>
              <a href="#">Admin Dashboard</a>
            </li>
            <li><i class='bx bx-chevron-right' ></i></li>
            <li>
              <a class="active" href="#">Home</a>
            </li>
          </ul>
        </div>
        <a href="#" class="btn-download">
          <i class='bx bxs-cloud-download' ></i>
          <span class="text">Download PDF</span>
        </a>
      </div>
      </main>
    </section>
  <div class="flex-column">
    <img class="justify-content-center" src="img/avatar.png">
    <h5 class="mt-2">
      <?php session_start();
       // echo $_SESSION['email'];
      ?>
  </h5>
  </div>

     <br><hr class="hr">
     <section id="content">   
     <main>
      
      <ul class="box-info">
        <li>
          <i class='bx bxs-calendar-check' ></i>
          <span class="text">
          <?php
                    $sql = "SELECT COUNT(id) AS NumberOfOrder FROM order_product;";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
            <h3><?php echo $row['NumberOfOrder']; ?></h3>
            <?php
                                }
                    }
            ?>
            <p>Processing Orders</p>
          </span>
        </li>
        <li>
          <i class='bx bx-user custom w3-xxxlarge' ></i>
          <span class="text">
          <?php
                    $sql = "SELECT COUNT(id) AS NumberOfCstomer FROM customer;";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
            <h3><?php echo $row['NumberOfCstomer']; ?></h3>
            <?php
                                }
                    }
            ?>
            <p>Customers</p>
          </span>
        </li>
        <li>
          <i class='bx bx-box w3-xxxlarge' ></i>
          <span class="text">
          <?php
                    $sql = "SELECT COUNT(id) AS NumberOfProduct FROM product;";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
            <h3><?php echo $row['NumberOfProduct']; ?></h3>
            <?php
                                }
                    }
            ?>
            <p>Products</p>
          </span>
        </li>
      </ul>


      <div class="table-data">
        <div class="order">
          <div class="head">
            <h3>Recent Appoinment</h3>
            <i class='bx bx-search' ></i>
            <i class='bx bx-filter' ></i>
          </div>
          <table>
            <thead>
              <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                    $sql = "SELECT * FROM product limit 7";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
              <tr>
                  <td><img class= "size-im"src="upload/product/<?=  $row['image']; ?>" alt="" srcset=""> </td>                
                  <td> <?= $row['name']; ?></td>
                  <td> <?= $row['price']; ?></td>
                  <td> <?= $row['quantity']; ?></td>
                  
                  <td><form action="" method="post">
                  <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                  <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                  </form>
                  </td>
              </tr>
              <?php
                  }
                } ?>
            </tbody>
          </table>
        </div>
        <div class="todo">
          <div class="head">
            <h3>Works Load</h3>
            <i class='bx bx-plus' ></i>
            <i class='bx bx-filter' ></i>
          </div>
          <ul class="todo-list">
            <li class="completed">
              <p>This month sales target</p>
              <i class='bx bx-dots-vertical-rounded' ></i>
            </li>
            <li class="completed">
              <p>Database Update</p>
              <i class='bx bx-dots-vertical-rounded' ></i>
            </li>
            <li class="not-completed">
              <p>Interface Updates</p>
              <i class='bx bx-dots-vertical-rounded' ></i>
            </li>
            <li class="completed">
              <p>Feedback</p>
              <i class='bx bx-dots-vertical-rounded' ></i>
            </li>
            <li class="not-completed">
              <p>Brand Promotion</p>
              <i class='bx bx-dots-vertical-rounded' ></i>
            </li>
          </ul>
        </div>
      </div>
    </main>
    <!-- MAIN -->
  </section>   
 <script src="js/main.js"></script>
  </body>
</html>
