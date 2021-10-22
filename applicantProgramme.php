<?php
 include('includes/dbconnection.php');
 include('includes/session.php');



    $que = mysqli_query($con,"select * from tblpassports where regNo = '$regNo'");
    $rrr = mysqli_fetch_array($que);
    $studentPassport = $rrr['studentPassport'];
    $parentPassport = $rrr['parentPassport'];

    $queFee = mysqli_query($con,"select * from tblregistrationfee");
    $rrrFee = mysqli_fetch_array($queFee);


    $alertStyle ="";
    $statusMsg="";

if(isset($_POST['submit'])){

   
       $dateCreated = date("Y-m-d");
    
       //student Passport
    $fileTmpPath1 = $_FILES['studentPassport']['tmp_name'];
    $fileName1 = $_FILES['studentPassport']['name'];
    $fileSize1 = $_FILES['studentPassport']['size'];
    $fileType1 = $_FILES['studentPassport']['type'];
    $fileNameCmps1 = explode(".", $fileName1);
    $fileExtension1 = strtolower(end($fileNameCmps1));
    //gives the fileupoladed a unique Identifier
    $newFileName1 = md5(time().$fileName1).'.'.$fileExtension1;

    //guardian Passport
    $fileTmpPath2 = $_FILES['parentPassport']['tmp_name'];
    $fileName2 = $_FILES['parentPassport']['name'];
    $fileSize2 = $_FILES['parentPassport']['size'];
    $fileType2 = $_FILES['parentPassport']['type'];
    $fileNameCmps2 = explode(".", $fileName2);
    $fileExtension2 = strtolower(end($fileNameCmps2));
    //gives the fileupoladed a unique Identifier
    $newFileName2 = md5(time().$fileName2).'.'.$fileExtension2;

    $allowedfileExtensions = array('jpg', 'png','jpeg');
    if (!in_array($fileExtension1, $allowedfileExtensions) || !in_array($fileExtension2, $allowedfileExtensions)) {

        echo "<script type = \"text/javascript\">
        alert(\"The File type is not allowed!\");
        </script>";
    }
    else{

        $uploadFileDir = 'passports/';
        $dest_path1 = $uploadFileDir . $newFileName1;
        $dest_path2 = $uploadFileDir . $newFileName2;

        move_uploaded_file($fileTmpPath1, $dest_path1);
        move_uploaded_file($fileTmpPath2, $dest_path2);
        
        $query = mysqli_query($con,"select * from tblpassports where regNo = '$regNo'");
        $count = mysqli_num_rows($query);

        if($count > 0)
        {
            $ret=mysqli_query($con,"update tblpassports set regNo='$regNo',studentPassport='$newFileName1',parentPassport='$newFileName2' where regNo='$regNo'");
            if ($ret) {

            echo "<script type = \"text/javascript\">
            window.location = (\"applicantProgramme.php\")
            </script>";
        }
        else
        {
            $alertStyle ="genric-btn danger";
            $statusMsg="An error Occurred!";
        }
       
        }
        else{

                $queryy=mysqli_query($con,"insert into tblpassports(regNo,studentPassport,parentPassport,dateCreated) 
                value('$regNo','$newFileName1','$newFileName2','$dateCreated')");
            if ($queryy) {

                echo "<script type = \"text/javascript\">
                window.location = (\"applicantProgramme.php\")
                </script>";
            }
            else
            {
                $alertStyle ="genric-btn danger";
                $statusMsg="An error Occurred!";
            }
        }

    }
}

?>




<!doctype html>
<html class="no-js" lang="zxx">

<head>
           <?php include "includes/head.php";?>
    <script>
        function showValues(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajaxCalldept.php?fid="+str,true);
        xmlhttp.send();
    }
}

        </script>

<script>
   
    var paymentForm = document.getElementById('paymentForm');
    paymentForm.addEventListener('submit', payWithPaystack, true);
    function payWithPaystack() {
        var handler = PaystackPop.setup({
            key: 'pk_test_74c53a49cf86f2b421b52ae3b7e5bf15cd106dd0', // Replace with your public key
            email: document.getElementById('email-address').value,
            amount: document.getElementById('amount').value * 100, // the amount value is multiplied by 100 to convert to the lowest currency unit
            currency: 'NGN', // Use GHS for Ghana Cedis or USD for US Dollars
            firstname: document.getElementById('first-name').value,
            lastname: document.getElementById('last-name').value,
            reference: 'YOUR_REFERENCE', // Replace with a reference you generated
            callback: function (response) {
                //this happens after the payment is completed successfully
                var reference = response.reference;
                document.getElementById('reference').value = reference;

                var regNo = document.getElementById('reg-no').value;
                var theamount = document.getElementById('amount').value;

                // alert('Payment Successful and complete! Reference: ' + reference);
                alert('Payment Successful and complete!');
                window.location.href = 'paymentComplete.php?&reference='+ reference +'&amount='+ theamount +'&regNo='+ regNo +'';
                // Make an AJAX call to your server with the reference to verify the transaction
            },
            onClose: function () {

                alert('Transaction was not completed.');
                 //window.location.href = '/customer/checkout';
            },
        });
        handler.openIframe();
    }

</script>

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
                        <h3 class="mb-30">Passport Photographs</h3>
                         <a href="#" class="<?php echo $alertStyle;?>"><?php echo $statusMsg;?></a>
                        <form action="" method="post" enctype="multipart/form-data">
                    
                              <i style="font-size:12px;">Student Passport photograph upload must not exceed 1mb (218 x 321)</i>
                             <div class="input-group-icon mt-10">
                                <div class="icon"><i class="" aria-hidden="true"></i></div>
                                <input type="file" name="studentPassport" placeholder="Student Passport"  required class="form-control">
                            </div>
                            <i style="font-size:12px;">Parent/Guardian Passport photograph upload must not exceed 1mb (218 x 321)</i>
                            <div class="input-group-icon mt-10">
                                <div class="icon"><i class="" aria-hidden="true"></i></div>
                                <input type="file" name="parentPassport" placeholder="parentPassport" required class="form-control">
                            </div>
                            <br>
                            <i style="font-size:15px;">Registration Fee:</i> <i style="font-size:15px;color:red;">&#8358;<?php echo number_format($rrrFee['fee']);?></i>

                             <br>
                            <div class="button-group-area mt-40">
                                <a href="nextOfKinDetails.php" class="genric-btn success circle"><< Back</a>
                                <input type="submit" name="submit" value="Save" class="genric-btn success circle">
                            </div>
                        </form>
                        <br>

                    <form id="paymentForm">
                    <input type="hidden" id="email-address" value="<?php echo $rows['emailAddress'];?>" required />
                    <input type="hidden" id="amount" value="<?php echo $rrrFee['fee'];?>" required />
                    <input type="hidden" id="first-name" value="<?php echo $rows['firstName'];?>" />
                    <input type="hidden" id="last-name" value="<?php echo $rows['lastName'];?>" />
                    <input type="hidden" id="reg-no" name="reg-no" value="<?php echo $_SESSION['regNo'];?>" />
                    <input type="hidden" id="reference" name="reference" />
                   
                <button type="button" class="genric-btn success circle" onclick="payWithPaystack()">Continue To Payment >></button>
                <script src="https://js.paystack.co/v1/inline.js"></script>
                    </form>


                    </div>
                    <div class="col-lg-3 col-md-4 mt-sm-30">
                        <div class="single-element-widget mt-30">
                        <h3 class="mb-30">Passport Photographs Details Preview</h3>
                             <div class="switch-wrap d-flex justify-content-between">
                                <p><b>Reg No:</b> <?php echo $regNo;?></p>
                            </div>
                            <p><b>Student Passport:</b></p>
                            <?php if($studentPassport != ''){?>
                            <img src="passports/<?php echo $studentPassport;?>" alt="" class="img-fluid">
                            <br><br>
                            <?php }else {?>
                            <?php }?>
                            <p><b>Parent/Guardian Passport:</b></p>
                            <?php if($parentPassport != ''){?>
                            <img src="passports/<?php echo $parentPassport;?>" alt="" class="img-fluid">
                            <br><br>
                            <?php }else {?>
                            <?php }?>
                            <!-- <div class="switch-wrap d-flex justify-content-between">
                                <p><b>Faculty:</b> <?php echo $rFac['facultyName'];?></p>
                            </div>
                            <div class="switch-wrap d-flex justify-content-between">
                                <p><b>Department:</b> <?php echo $rDept['departmentName'];?></p>
                            </div>
                            <div class="switch-wrap d-flex justify-content-between">
                                <p><b>Programme Type:</b><?php echo $rType['typeName'];?></p>
                            </div>
                            <div class="switch-wrap d-flex justify-content-between">
                                <p><b>Programme Mode:</b><?php echo $rMode['modeName'];?></p>
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