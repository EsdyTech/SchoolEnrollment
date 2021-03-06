<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{

if(isset($_GET['regNo']))
{
    $regNo=$_GET['regNo'];

	$rets=mysqli_query($con,"SELECT * from tblpassports where regNo = '$regNo'");
    if(mysqli_num_rows($rets) > 0 )
    {
        $rows=mysqli_fetch_array($rets);
    }
    else{

        $error = "No Record Found!";
    }

   $ret=mysqli_query($con,"SELECT * from tblpayments where regNo = '$regNo'");
    if(mysqli_num_rows($ret) > 0 )
    {
        $row=mysqli_fetch_array($ret);
    }
    else{

        $error = "No Record Found!";
    }
}

 ?>

<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<?php include('includes/title.php');
?>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
  <style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>

</head>

<body>
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
		<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Student Payment Details(Registration No: <?php echo $regNo;?>)</h2>
						<?php if ($rows['studentPassport'] != ''){?>
						<img src="../passports/<?php echo $rows['studentPassport'];?>" style="width:200px;height:150px" alt="" class="img-fluid">
						<?php } else{?>
							<img src="../passports/user.png" style="width:200px;height:150px" alt="" class="img-fluid">
							<?php }?>								<br><br>
						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Student Payment Details</div>
							<div class="panel-body">
							<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
                                            <th>RegNo</th>
											<th>Transaction-ID</th>
											<th>Amount</th>
											<th>Date Paid</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
                                     <th>RegNo</th>
											<th>Transaction-ID</th>
											<th>Amount</th>
											<th>Date Paid</th>
										</tr>
									</tfoot>
									<tbody>
								<tr>
											<td><?php echo htmlentities($row['regNo']);?></td>
											<td><?php echo htmlentities($row['transactionId']);?></td>
											<td>&#8358;<?php echo htmlentities(number_format($row['amount']));?></td>
											<td><?php echo htmlentities($row['dateCreated']);?></td>
										</tr>										
									</tbody>
								</table>

						

							</div>
						</div>

					

					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
<?php } ?>
