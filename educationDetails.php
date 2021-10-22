<?php
 include('includes/dbconnection.php');
 include('includes/session.php');


    $quersy = mysqli_query($con,"select * from tbleducation where regNo ='$_SESSION[regNo]'");
    $rowss = mysqli_fetch_array($quersy);

if(isset($_POST['submit'])){

     $alertStyle ="";
      $statusMsg="";

    $classRequired =$_POST['classRequired'];
    $formerSchool =$_POST['formerSchool'];
    $formerClass =$_POST['formerClass'];
    $formerSchoolAddress =$_POST['formerSchoolAddress'];
    $reasonForLeaving =$_POST['reasonForLeaving'];
    $transferCertNo =$_POST['transferCertNo'];

        $query = mysqli_query($con,"select * from tbleducation where regNo ='$_SESSION[regNo]'");
        $count = mysqli_num_rows($query);
        $row = mysqli_fetch_array($query);

    if($count > 0)
    {
        $ret=mysqli_query($con,"update tbleducation set regNo='$regNo',classRequired='$classRequired',formerSchool='$formerSchool',formerClass='$formerClass',formerSchoolAddress='$formerSchoolAddress',
        reasonForLeaving='$reasonForLeaving',transferCertNo='$transferCertNo' where regNo='$regNo'");
        if ($ret) {

            echo "<script type = \"text/javascript\">
            window.location = (\"educationDetails.php\");
            </script>";
        }
        else
        {
            $alertStyle ="genric-btn danger";
            $statusMsg="An error Occurred!";
        }
       
    }
    else{

         $queryy=mysqli_query($con,"insert into tbleducation(regNo,classRequired,formerSchool,formerClass,formerSchoolAddress,reasonForLeaving,transferCertNo) 
         value('$regNo','$classRequired','$formerSchool','$formerClass','$formerSchoolAddress','$reasonForLeaving','$transferCertNo')");
        if ($queryy) {

            echo "<script type = \"text/javascript\">
            window.location = (\"educationDetails.php\");
            </script>";
        }
        else
            {
                $alertStyle ="genric-btn danger";
                $statusMsg="An error Occurred!";
            }
    }

  }

?>




<!doctype html>
<html class="no-js" lang="zxx">

<head>
           <?php include "includes/head.php";?>
           <!-- Scripts for Country and Regions Dropdown Addedd-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="js/geodatasource-cr.min.js"></script>
    <!-- <link rel="stylesheet" href="assets/css/geodatasource-countryflag.css"> -->
    <!-- link to languages po files -->
    <link rel="gettext" type="application/x-po" href="languages/en/LC_MESSAGES/en.po" />
    <script type="text/javascript" src="../js/Gettext.js"></script>
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
          <?php include "includes/header1.php";?>

    <!-- header-end -->

    <!-- bradcam_area_start  -->
    <div class="bradcam_area breadcam_bg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3><?php echo $rows['firstName'].' '.$rows['lastName'];?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bradcam_area_end  -->
   
    <!-- Start Align Area -->
    <div class="whole-wrap">
        <div class="container box_1170">
             <div class="section-top-border">
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <h3 class="mb-30">Child/Ward Educational Details</h3>
                        <form action="#" method="post">
                          
                            <div class="input-group-icon mt-10">
                                 <div class="icon"><i class="fa fa-home" aria-hidden="true"></i></div>
                                 <div class="form-select" id="default-select">
                                 <select required class="form-select" name="classRequired">
                                 <?php 
                                    $query=mysqli_query($con,"select * from tblclasses");                        
                                    $count = mysqli_num_rows($query);
                                    if($count > 0){                       
                                        echo'<option value="">--Select Class Required--</option>';
                                        while ($row = mysqli_fetch_array($query)) {
                                        echo'<option value="'.$row['className'].'" >'.$row['className'].'</option>';
                                            }
                                            }
                                    ?>     
                                </select>
                                </div>
                            </div>      
                            <div class="input-group-icon mt-10">
                                <div class="icon"><i class="fa fa-home" aria-hidden="true"></i></div>
                                <div class="form-select" id="default-select">
                                <input type="text" name="formerSchool" value="<?php echo $rowss['formerSchool'];?>" placeholder="Former School Attended" required class="single-input">                               
                             </div>
                            </div>                      
                            <div class="input-group-icon mt-10">
                                 <div class="icon"><i class="fa fa-home" aria-hidden="true"></i></div>
                                 <div class="form-select" id="default-select">
                                 <select required class="form-select" name="formerClass">
                                 <?php 
                                    $query=mysqli_query($con,"select * from tblclasses");                        
                                    $count = mysqli_num_rows($query);
                                    if($count > 0){                       
                                        echo'<option value="">--Select Former Class--</option>';
                                        while ($row = mysqli_fetch_array($query)) {
                                        echo'<option value="'.$row['className'].'" >'.$row['className'].'</option>';
                                            }
                                            }
                                    ?>     
                                </select>
                                </div>
                            </div>      
                            <div class="input-group-icon mt-10">
                                <div class="icon"><i class="fa fa-globe" aria-hidden="true"></i></div>
                                <input type="text" name="reasonForLeaving" value="<?php echo $rowss['reasonForLeaving'];?>" placeholder="Reason For Leaving School" required class="single-input">
                            </div>
                            <div class="input-group-icon mt-10">
                                <div class="icon"><i class="fa fa-thumb-tack" aria-hidden="true"></i></div>
                                <input type="text" name="transferCertNo" value="<?php echo $rowss['transferCertNo'];?>" placeholder="Transfer Certificate Number" required class="single-input">
                            </div>
                            <div class="input-group-icon mt-10">
                                <div class="icon"><i class="fa fa-home" aria-hidden="true"></i></div>
                                <input type="text" name="formerSchoolAddress" value="<?php echo $rowss['formerSchoolAddress'];?>" placeholder="FormerSchoolAddress" required class="single-input">
                            </div>
                           
                            <div class="button-group-area mt-40">
                            <a href="personalData.php" class="genric-btn success circle"><< Back</a>
                                <input type="submit" name="submit" value="Save" class="genric-btn success circle">
                                <a href="guardianDetails.php" class="genric-btn success circle">Continue >></a>
                            </div>
                             <input type="hidden" name="regNo" value="<?php echo $rows['regNo']; ?>">
                              <input type="hidden" name="surName" value="<?php echo $rows['lastName']; ?>">
                               <input type="hidden" name="firstName" value="<?php echo $rows['firstName']; ?>">
                                <input type="hidden" name="middleName" value="<?php echo $rows['otherName']; ?>">
                                  <input type="hidden" name="phoneNo" value="<?php echo $rows['phoneNo']; ?>">
                        </form>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-sm-30">
                        <div class="single-element-widget mt-30">
                            <h3 class="mb-30">Education Details Preview</h3>
                            <div class="switch-wrap d-flex justify-content-between">
                                <p>Class Required: <?php echo $rowss['classRequired'];?></p>&nbsp;<p>Former School: <?php echo $rowss['formerSchool'];?></p>
                            </div>
                            <div class="switch-wrap d-flex justify-content-between">
                                <p>Former Class: <?php echo $rowss['formerClass'];?></p>&nbsp;<p>Reason For Leaving School: <?php echo $rowss['reasonForLeaving'];?></p>
                            </div>
                            <div class="switch-wrap d-flex justify-content-between">
                                <p>Transfer Certificate Number: <?php echo $rowss['transferCertNo'];?></p>&nbsp;<p>Former School Address: <?php echo $rowss['formerSchoolAddress'];?></p>
                            </div>
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