<?php

 include('includes/dbconnection.php');
 include('includes/session.php');


$qy = mysqli_query($con,"select * from tblinitialreg where regNo ='$_SESSION[regNo]' and isRegComplete='1'");
$rqy = mysqli_fetch_array($qy);
$count = mysqli_num_rows($qy);

//Logout if the registration is incomplete!!!
    if($count == 0){

        echo "<script type = \"text/javascript\">
        window.location = (\"index.php\");
        </script>";
        
    }


?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
	           <?php include "includes/head.php";?>
</head>

<body>
	<!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
          <?php include "includes/header1.php";?>
    <!-- header-end -->
  
	<!-- bradcam_area_start  -->
	<!-- <div class="bradcam_area breadcam_bg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3><?php echo $rows['firstName'].' '.$rows['lastName'];?></h3>
                    </div>
                </div>
            </div>
        </div>  
    </div> -->
	<!-- bradcam_area_end  -->


	
	<!-- Start Align Area -->
	<div class="whole-wrap">
		<div class="container box_1170">
			<div class="section-top-border">
				<div class="row">
					<div class="col-md-3">
						<img src="img/admission/landmark_logo.png" style="width:200px;height:150px" alt="" class="img-fluid">
					</div>
					<div class="col-md-9 mt-sm-20">
                        <h2>OPMA PRIVATE NURSERY AND PRIMARY SCHOOL</h2>  
                        <h4 style="margin-left:100px;">NURTURING GODLY AMBASSADOR</h4>  
                        <h4 style="margin-left:80px;">Ayetoro/Itele Via Ayobo, Ogun State.</h4>    
					</div>
				</div>
			</div>
		
			
					</div>
				</div>
			</div>
		</div>
    </div>			

    <?php


    $quersy = mysqli_query($con,"select * from tblpersonaldata where regNo ='$_SESSION[regNo]'");
    $rowss = mysqli_fetch_array($quersy);

    $queGuad = mysqli_query($con,"select * from tblguardian where regNo ='$_SESSION[regNo]'");
    $rGuad= mysqli_fetch_array($queGuad);

    $queNext = mysqli_query($con,"select * from tblnextofkin where regNo ='$_SESSION[regNo]'");
    $rNext = mysqli_fetch_array($queNext);

    $queEdu = mysqli_query($con,"select * from tbleducation where regNo ='$_SESSION[regNo]'");
    $rEdu = mysqli_fetch_array($queEdu);

    $qryPay = mysqli_query($con,"select * from tblpayments where regNo ='$_SESSION[regNo]'");
    $rPay = mysqli_fetch_array($qryPay);

    $qryPass = mysqli_query($con,"select * from tblpassports where regNo ='$_SESSION[regNo]'");
    $rrr = mysqli_fetch_array($qryPass);

    $qryAdm = mysqli_query($con,"select * from tbladmin");
    $rrAdm = mysqli_fetch_array($qryAdm);
    
    
    
    ?>


    <!-- Start Align Area -->
	<div class="whole-wrap" style="margin-top:-80px">
		<div class="container box_1170">
			<div class="section-top-border">
                <h3 class="mb-10" align="center">PUPILS REGISTRATION FORM</h3>
                <h3 class="mb-10" align="center"><?php echo strToUpper($rowss['firstName'].' '.$rowss['surName']);?></h3>
                 <br>
				<div class="row">
					<div class="col-md-3">
						<img src="passports/<?php echo $rrr['studentPassport'];?>" style="width:200px;height:150px" alt="" class="img-fluid">
                    </div>
<!-- STUDENT INFORMATION ------------------------------------------------------------------------------------------->

					<div class="col-md-9 mt-sm-20">
						 <div class="form-group row mb-3">
                            <div class="col-xl-6">
                              Registration Number:
                        </div>
                        <div class="col-xl-6">
                                <?php echo $rowss['regNo'];?>
                            </div>
                        </div>
					    <div class="form-group row mb-3">
                            <div class="col-xl-6">
                              Student Full Name
                        </div>
                        <div class="col-xl-6">
                                <?php echo $rowss['firstName']." ".$rowss['surName']." ".$rowss['middleName'];?>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col-xl-6">
                              Gender
                        </div>
                        <div class="col-xl-6">
                                <?php echo $rowss['sex'];?>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col-xl-6">
                              Nationality
                        </div>
                        <div class="col-xl-6">
                                <?php echo $rowss['nationality'];?>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col-xl-6">
                              State/LGA
                        </div>
                        <div class="col-xl-6">
                                <?php echo $rowss['state'];?>/<?php echo $rowss['lga'];?>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col-xl-6">
                              Phone Number
                        </div>
                        <div class="col-xl-6">
                                <?php echo $rowss['phoneNo'];?>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col-xl-6">
                              Date Of Birth
                        </div>
                        <div class="col-xl-6">
                                <?php echo $rowss['dob'];?>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col-xl-6">
                             Nationality / Place Of Birth
                        </div>
                        <div class="col-xl-6">
                                <?php echo $rowss['nationality']. " / ".$rowss['placeOfBirth'];?>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col-xl-6">
                              Weight/Height
                        </div>
                        <div class="col-xl-6">
                                <?php echo $rowss['weight']. " / ".$rowss['height'] ;?>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col-xl-6">
                              Religion
                        </div>
                        <div class="col-xl-6">
                                <?php echo $rowss['religion'];?>
                            </div>
                        </div>

                        
                        
                        <div class="form-group row mb-3">
                            <div class="col-xl-6">
                              <b>Parent/Guardian Details</b>
                        </div>
                        <div class="col-xl-6">
                            <!-------->
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col-xl-6">
                              Parent/Guardian FullName:
                        </div>
                        <div class="col-xl-6">
                            <?php echo $rGuad['guardianName'];?>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col-xl-6">
                            Parent/Guardian Address:
                        </div>
                        <div class="col-xl-6">
                                <?php echo $rGuad['guardianAddress'];?>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col-xl-6">
                            Parent/Guardian Phone Number:
                        </div>
                        <div class="col-xl-6">
                                <?php echo $rGuad['guardianPhoneNo'];?>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col-xl-6">
                            Parent/Guardian Office Address / Occupation
                        </div>
                        <div class="col-xl-6">
                                <?php echo $rGuad['officeAddress'];?>  / <?php echo $rGuad['occupation'];?>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col-xl-6">
                              <b>Next Of Kin Details (Relationship: <?php echo $rNext['nextofkinRelationship'];?>)</b>
                        </div>
                        <div class="col-xl-6">
                            <!-------->
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col-xl-6">
                              Next Of Kin Name:
                        </div>
                        <div class="col-xl-6">
                            <?php echo $rNext['nextofkinName'];?>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col-xl-6">
                            Next Of Kin Address:
                        </div>
                        <div class="col-xl-6">
                                <?php echo $rNext['nextofkinAddress'];?>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col-xl-6">
                            Next Of Kin Number:
                        </div>
                        <div class="col-xl-6">
                                <?php echo $rNext['nextofkinPhoneNo'];?>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col-xl-6">
                            Next Of Kin Office Address / Occupation
                        </div>
                        <div class="col-xl-6">
                                <?php echo $rNext['officeAddress'];?>  / <?php echo $rNext['occupation'];?>
                            </div>
                        </div>



                         
                        <div class="form-group row mb-3">
                            <div class="col-xl-6">
                              <b>Education Details</b>
                        </div>
                        <div class="col-xl-6">
                            <!-------->
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col-xl-6">
                              Class Applied For
                        </div>
                        <div class="col-xl-6">
                                <?php echo $rEdu['classRequired'];?>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col-xl-6">
                              Former School Name
                        </div>
                        <div class="col-xl-6">
                                <?php echo $rEdu['formerSchool'];?>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col-xl-6">
                            Former School Class 
                        </div>
                        <div class="col-xl-6">
                                <?php echo $rEdu['formerClass'];?>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col-xl-6">
                            Former School Address
                        </div>
                        <div class="col-xl-6">
                                <?php echo $rEdu['formerSchoolAddress'];?>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col-xl-6">
                           Reason For Leaving / Transfer Certificate Number
                        </div>
                        <div class="col-xl-6">
                                <?php echo $rEdu['reasonForLeaving'];?> / <?php echo $rEdu['transferCertNo'];?>
                            </div>
                        </div>



                        <div class="form-group row mb-3">
                            <div class="col-xl-6">
                              <b>Payment Details</b>
                        </div>
                        <div class="col-xl-6">
                            <!-------->
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col-xl-6">
                              Transaction Reference
                        </div>
                        <div class="col-xl-6">
                                <?php echo $rPay['transactionId'];?>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col-xl-6">
                              Approved Amount
                        </div>
                        <div class="col-xl-6">
                                &#8358;<?php echo number_format($rPay['amount']);?>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col-xl-6">
                              Amount Paid 
                        </div>
                        <div class="col-xl-6">
                                &#8358;<?php echo number_format($rPay['amount']);?>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col-xl-6">
                              Payment Status
                        </div>
                        <div class="col-xl-6">
                                <?php echo "Approved";?>
                            </div>
                        </div>
                          <div class="form-group row mb-3">
                            <div class="col-xl-6">
                              Payment Date
                        </div>
                        <div class="col-xl-6">
                                <?php echo $rPay['dateCreated'];?>
                            </div>
                        </div>
                            
					</div>
				</div>
			</div>
        
    <div class="whole-wrap" style="margin-top:-80px">
		<div class="container box_1170">
			<div class="section-top-border">
				<div class="row">
					<div class="col-md-12">
                        Admission Number : <b><?php if ($rows['isApproved'] == '1'){ echo $rqy['admissionNo'];} else {echo "<font color='red'>No Approval Yet!</font>";} ?>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </b> Admitted Into Class: <b><?php if ($rows['isApproved'] == '1'){ echo $rEdu['classRequired'];} else {echo "<font color='red'>No Approval Yet!</font>";} ?></b>
                        <br>  <br>  <br>
                        Admission Officer Full Name: <b><?php echo  $rrAdm['firstName']." ". $rrAdm['lastName'];?></b>
                        <br>  <br>  <br>
                        Admission Officer Signature: ________________________ Approved Date : <b><?php if ($rows['isApproved'] == '1'){ echo $rqy['dateApproved'];} else {echo "<font color='red'>No Approval Yet!</font>";} ?></b>
                        <br>  <br>  <br>
                        Signature of Parent/Guardian_________________________________________  Date :  <b><?php echo date("Y-m-d");?></b>
					</div>
				</div>
            </div>
             <div class="button-group-area mt-40">
                         <a href="studentDashboard.php" class="genric-btn success circle"><< Back</a>
            <a href="printRegistration.php" style="margin-left:350px;" class="genric-btn success circle">Goto Printing</a>
            </div>
            <br>
			<!-- <div class="section-top-border">
				<h3 class="mb-30">Table</h3>
				<div class="progress-table-wrap">
					<div class="progress-table">
						<div class="table-head">
							<div class="serial">#</div>
							<div class="country">Countries</div>
							<div class="visit">Visits</div>
							<div class="percentage">Percentages</div>
						</div>
						<div class="table-row">
							<div class="serial">01</div>
							<div class="country"> <img src="img/elements/f1.jpg" alt="flag">Canada</div>
							<div class="visit">645032</div>
							<div class="percentage">
								<div class="progress">
									<div class="progress-bar color-1" role="progressbar" style="width: 80%"
										aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> -->
		
			
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
    
    
	 <!-- End Align Area -->

    <!-- footer start -->
          <?php include "includes/footer.php";?>
    <!-- footer end  -->

    <!-- JS here -->
             <?php include "includes/scripts.php";?>
</body>
</html>