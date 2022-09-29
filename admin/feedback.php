<?php 
  include("../db.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSS FILES -->
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		@import url(http://fonts.googleapis.com/css?family=Calibri:400,300,700);

		body {
		    background-color: #1976d2;
		    font-family: 'Calibri', sans-serif !important
			
		}

		.card-no-border .card {
		    border: 0px;
		    border-radius: 4px;
		    -webkit-box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05);
		    box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05)
		}

		.card-body {
		    -ms-flex: 1 1 auto;
		    flex: 1 1 auto;
		    padding: 1.25rem
		}

		.comment-widgets .comment-row:hover {
		    background: rgba(0, 0, 0, 0.02);
		    cursor: pointer
		}

		.comment-widgets .comment-row {
		    border-bottom: 1px solid rgba(120, 130, 140, 0.13);
		    padding: 15px
		}

		.comment-text:hover {
		    visibility: hidden
		}

		.comment-text:hover {
		    visibility: visible
		}

		.label {
		    padding: 3px 10px;
		    line-height: 13px;
		    color: #ffffff;
		    font-weight: 400;
		    border-radius: 4px;
		    font-size: 75%
		}

		.round img {
		    border-radius: 100%
		}

		.label-info {
		    background-color: #1976d2
		}

		.label-success {
		    background-color: green
		}

		.label-danger {
		    background-color: #ef5350
		}

		.action-icons a {
		    padding-left: 7px;
		    vertical-align: middle;
		    color: #99abb4
		}

		.action-icons a:hover {
		    color: #1976d2
		}

		.mt-100 {
		    margin-top: 100px
		}

		.mb-100 {
		    margin-bottom: 100px
		}
	</style>

	<!-- JAVA SCRIPT FILES-->
	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<title>MEDI LANKA</title>
</head>
<body class="ml-5">
	<div class="container d-flex justify-content-center mt-100 mb-100">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Recent Feedback</h4>
                    <h6 class="card-subtitle">Latest Feedback section by users</h6>
                </div>
                <?php
                    $sql = "SELECT * FROM customer_feeedback;";
                    $result = mysqli_query($conn, $sql);
                   echo mysqli_error($conn);
                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <div class="comment-widgets m-b-20">

				                    <div class="d-flex flex-row comment-row ">
				                        <div class="p-2"><span class="round"><img src="img/avatar.png" alt="user" width="50"></span></div>
				                        <div class="comment-text active w-100">
				                            <h5><?php echo $row['C_name']; ?></h5>
				                            <div class="comment-footer"> <span class="date"><?php echo $row['Subject']; ?></span> <span class="label label-success">Approved</span> <span class="action-icons active"> <a href="#" data-abc="true"><i class="fa fa-pencil"></i></a> <a href="#" data-abc="true"><i class="fa fa-rotate-right text-success"></i></a> <a href="#" data-abc="true"><i class="fa fa-heart text-danger"></i></a> </span> </div>
				                            <p class="m-b-5 m-t-10"><?php echo $row['Massage']; ?></p>
				                        </div>
				                    </div>
				                </div>
                                <?php
                            } }
                       		 mysqli_close($conn);
                        ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>