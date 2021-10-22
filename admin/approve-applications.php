<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/mailer.php');

if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{

    if(isset($_GET['regNo']) && isset($_GET['type']) && $_GET['type'] == 'approve')
    {
        $regNo=$_GET['regNo'];
    
        $ret=mysqli_query($con,"SELECT * from tblinitialreg where regNo = '$regNo'");
        $rows=mysqli_fetch_array($ret);
        $emailAddress = $rows['emailAddress'];

        //generate unique Admission Number for student

        //pick current session
        $query = mysqli_query($con,"select * from tblsession where  isActive = '1'");
        $count = mysqli_num_rows($query);
        $row = mysqli_fetch_array($query);

         $query2 = mysqli_query($con,"select * from tblinitialreg");
         $count2 = mysqli_num_rows($query2);

         $regCount = 0;
            if($count2 == 1){
                $regCount = 1;
            }
            else{
                $regCount  =  $count2 + 1;
            }

            $sessionName = $row['sessionName'];
            $currentSession = str_replace("/","",$sessionName);
            $dateApproved = date("Y-m-d");

            //Registration Number ge
            $admissionNumber = "OPMA/".$currentSession."/00000".$regCount;


             //send mail to the parent for approval notification
              //The Subject and the body of the Mail
              $subject = "OPMA PRIVATE SCHOOL REGISTRATION";
              $body = "Your Child/Ward application has been Approved Successfuly. You Child/Ward Admission Number is: $admissionNumber ";
              $body .= "Thanks Best Regards!";
  
              //send mail 
              $status = sendmail($subject, $body, $emailAddress);
              if( $status == true){

                $quek = mysqli_query($con,"UPDATE tblinitialreg set admissionNo = '$admissionNumber',isApproved = '1', dateApproved = '$dateApproved' where regNo='$regNo'");
                if($quek == TRUE){
                    
                    $msg="Application Approved, and Admission Number Generated successfully";
                 }
                 else{
                    $error="Something went wrong. Please try again";
                }
            }
        else{

            $error="Something went wrong. Please try again";
        }
    }


    //Declining Applications
    if(isset($_GET['regNo']) && isset($_GET['type']) && $_GET['type'] == 'decline')
    {
        $regNo=$_GET['regNo'];
    
        $ret=mysqli_query($con,"SELECT * from tblinitialreg where regNo = '$regNo'");
        $rows=mysqli_fetch_array($ret);
        $emailAddress = $rows['emailAddress'];


           //The Subject and the body of the Mail
           $subject = "OPMA PRIVATE SCHOOL REGISTRATION";
           $body = "Your Child/Ward application has been Declined due to some Reasons, Kindly Contact the School Administrator for more Details";
           $body .= "Thanks Best Regards!";

           //send mail 
           $status = sendmail($subject, $body, $emailAddress);
           if( $status == true){

            $quek = mysqli_query($con,"UPDATE tblinitialreg set admissionNo = '', isApproved = '2', dateApproved = '$dateApproved' where regNo='$regNo'");
            if($quek == TRUE){
            //send mail to the parent for approval notification
            $msg="Application Declined Successfully";
            
        }
        else{

            $error="Something went wrong. Please try again";
        }
           }
           else{

             $error="Something went wrong. Please try again";
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

						<h2 class="page-title">Approve/Decline Applications (Mail Will be sent to the Parent/Guardian of the student)</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default" style="width:1550px;">
							<div class="panel-heading" style="width:1550px;">Approve/Decline Applications</div>
							<div class="panel-body" style="width:1550px;">
							<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                <a href="download-applicantslists.php" style="color:red; font-size:16px;">Click here to Download Applicants List</a>
                <br><br>
								<table class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>#</th>
											<th>Fullname</th>
											<th>Email Address</th>
											<th>PhoneNo</th>
                                            <th>RegNo</th>
											<th>Admission Number</th>
											<th>Registration Status</th>
											<th>Approval Status</th>
                                            <th>Date</th>
											<th>Approve </th>
                                            <th>Decline </th>
										</tr>
									</thead>
									<tfoot>
										<tr>
										<th>#</th>
											<th>Fullname</th>
											<th>Email Address</th>
											<th>PhoneNo</th>
                                            <th>RegNo</th>
											<th>Admission Number</th>
											<th>Registration Status</th>
											<th>Approval Status</th>
                                            <th>Date</th>
                                            <th>Approve </th>
                                            <th>Decline </th>
										</tr>
									</tfoot>
									<tbody>

<?php 
$ret=mysqli_query($con,"SELECT * from tblinitialreg");
if(mysqli_num_rows($ret) > 0 )
{
while ($row=mysqli_fetch_array($ret)) 
{ 
	
	?>	
                    <tr>
                        <td><?php echo htmlentities($cnt);?></td>
                        <td><?php echo htmlentities($row['firstName']." ".$row['lastName']." ".$row['othername']);?></td>
                        <td><?php echo htmlentities($row['emailAddress']);?></td>
                        <td><?php echo htmlentities($row['phoneNo']);?></td>
						<td><?php echo htmlentities($row['regNo']);?></td>
						<td><?php echo htmlentities($row['admissionNo']);?></td>
						<td><?php if($row['isRegComplete'] == '1'){echo "Complete";}else{echo "InComplete"; }?></td>
						<td><?php if($row['isApproved'] == '1'){echo "Approved";} else if($row['isApproved'] == '0'){echo "Pending";}else{echo "Declined"; }?></td>
                        <td><?php echo htmlentities($row['dateCreated']);?></td>
					    <td><a href="approve-applications.php?regNo=<?php echo htmlentities($row['regNo']);?>&type=approve" onclick="return confirm('Do you want to Approve Application?');"><i class="fa fa-check"></i></a></td>
                        <td><a href="approve-applications.php?regNo=<?php echo htmlentities($row['regNo']);?>&type=decline" onclick="return confirm('Do you want to Decline Application?');"><i class="fa fa-trash"></i></a></td>

										</tr>
										<?php $cnt=$cnt+1; }} ?>
										
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
