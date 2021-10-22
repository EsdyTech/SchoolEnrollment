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

        $ret=mysqli_query($con,"SELECT tblprogramme.regNo, tblprogramme.dateCreated,tblfaculty.facultyName,tbldepartment.departmentName,
        tblsession.sessionName,tblprogrammemode.modeName,tblprogrammetype.typeName,tblprogramme.passport
        from tblprogramme 
        INNER JOIN tblfaculty ON tblfaculty.Id = tblprogramme.facultyId
        INNER JOIN tbldepartment ON tbldepartment.Id = tblprogramme.departmentId
        INNER JOIN tblsession ON tblsession.Id = tblprogramme.sessionId
        INNER JOIN tblprogrammemode ON tblprogrammemode.Id = tblprogramme.programmeModeId
        INNER JOIN tblprogrammetype ON tblprogrammetype.Id = tblprogramme.programmeTypeId
        where tblprogramme.regNo = '$regNo'");
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

						<h2 class="page-title">Applicant Programme (Registration No: <?php echo $regNo;?>)</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Applicant Programme</div>
							<div class="panel-body">
							<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
                                            <th>RegNo</th>
											<th>Programme</th>
											<th>Programme Type</th>
											<th>Faculty</th>
											<th>Department</th>
											<th>Session</th>
											<th>Passport</th>
                                            <th>Date </th>
										</tr>
									</thead>
									<tfoot>
										<tr>
                                    <th>RegNo</th>
											<th>Programme</th>
											<th>Programme Type</th>
											<th>Faculty</th>
											<th>Department</th>
											<th>Session</th>
											<th>Passport</th>
                                            <th>Date </th>
										</tr>
									</tfoot>
									<tbody>
								<tr>
											<td><?php echo htmlentities($row['regNo']);?></td>
											<td><?php echo htmlentities($row['typeName']);?></td>
											<td><?php echo htmlentities($row['modeName']);?></td>
											<td><?php echo htmlentities($row['facultyName']);?></td>
											<td><?php echo htmlentities($row['departmentName']);?></td>
											<td><?php echo htmlentities($row['sessionName']);?></td>
											<td><img src="../passports/<?php echo $row['passport'];?>" style="width:100px;height:100px" alt="" class="img-fluid"></td>
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
