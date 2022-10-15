<?php
include('../db.php');

session_start();
//$uid=$_SESSION['sid'];


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>| Zaara.lk |</title>
        
        <!-- CSS -->
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/doctorPageStyle.css">

        <!-- JS-->
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

    </head>
    <body class="ml-5">

<?php
    //delete record
         if(isset($_POST['delete_btn']))
         {
             $id = $_POST['delete_id'];
         
             $query = "DELETE FROM admin WHERE id='$id' ";
             $query_run = mysqli_query($conn, $query);
         
             if($query_run)
             {
                 $_SESSION['status'] = "Your Data is Deleted";
                 $_SESSION['status_code'] = "success";
                 header('Location: add_admin.php'); 
             }
             else
             {
                 $_SESSION['status'] = "Your Data is NOT DELETED";       
                 $_SESSION['status_code'] = "error";
                 header('Location: add_admin.php'); 
             }    
         }

         ?>
         
        <br><br>
        <div  >
            <?php include('navbar/navigationbarProduct.php') ?>
        </div>
        <br><br>
        <div >
            <hr>
            <br>

            <div class="ml-4 mr-2">
                <div >
                        <h3 class="text text-info" style="text-align: center">Customer List</h3><br>

                    <?php
                    $sql = "SELECT * FROM customer";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        ?>
                        <table class="table">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Telephone</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Update</th>
                                   
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row["id"]; ?></th>
                                        <td><?php echo $row["user_name"]; ?></td>
                                        <td><?php echo $row["Telephone"]; ?></td>
                                        <td><?php echo $row["email"]; ?></td>
                                        <td><?php echo $row["address"]; ?></td>
                                        
                                        <td>
                                            <a href="editCustomer.php?id=<?php echo $row['id'] ?>"type="button" class="btn btn-success btn-sm">Edit</a>
                                            <a href="deleteCustomer.php?id=<?php echo $row['id'] ?>" type="button" class="btn btn-danger btn-sm">Delete</a>
                                        </td>

                                    </tr>
                                </tbody>
                                <?php
                            }
                        } else {
                            echo "0 results";
                        }

                        mysqli_close($conn);
                        ?>
                    </table>                  
                </div>
            </div>
        </div>

    </div>
</body>
</html>
