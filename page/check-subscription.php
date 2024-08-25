
<?php

include("../db_connection.php");

if(isset($_POST['submit']))
{
   $admissionNo=$_POST['admission_no'];
   $sql = "select * from orders WHERE admission_no=".$admissionNo." AND status='success' ORDER BY create_date DESC";
   $result = $conn_integration->query($sql);
   $user_data = $result->fetch_array(MYSQLI_ASSOC);
}

?>
<?php include("../common/header.php"); ?>

<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500&family=Great+Vibes&display=swap"
    rel="stylesheet">
<main style="margin-top: 100px">
    <div class="container">
        <div class="row justify-content-center" >
            <div class="col-md-10">
                <h4 class="mb-3">Check Your Subscription Validity  </h4>
           
                    <form method="POST" class="row">
                       <div class="col-md-7">
                          <div class="mb-2">
                            <label for="firstName">Admission No</label>
                            <input type="text" name="admission_no" class="form-control" id="admissionNo" placeholder="" required>
                          </div>
                        </div>
                        <div class="col-md-5 text-end">
                          <button type="submit" name="submit" class="btn btn-primary" style="margin-top: 32px;"><i class="fa fa-search"></i> Check Validity</button>
                        </div>
                    </form>
                    
                    <?php if (($user_data==NULL) && (isset($_POST['submit']))){ ?>
                     <div class="row mt-5">
                        <div class="col-md-12">
                            <div class="student-not-found text-center">
                              <h3 style="color: #ff0000">No Subscription</h3>
                              <h5>Please subscribe for using software</h5>
                             
                            </div>
                        </div>
                    </div>
                    <?php } else if ((!empty($user_data)) && (isset($_POST['submit']))){ ?>
                    <div class="row" >
                        <div class="col-md-12" style=" text-align:center;width:100%;margin:50px 0px 15px">
                            <button class="btn btn-info mr-3"  onclick="portraitPrintHTML('printElementID')"> Print Cirtificate</button>
                        </div>
                        <div class="col-md-12" id="printElementID" >
                          <div class="student-data-box"
                            style="background: url(../assets/images/cirtificate.jpg);background-size: 100%;height: 700px;background-repeat: no-repeat;">
                            <div class="">
                              <div style="width: 88%;margin:auto;">
                                <div style="text-align: center;padding: 60px 0 10px;display: block;">
                                  <h5 class="ctitle" style="font-size: 40px;color: #000;font-family: 'Dancing Script', cursive;">Subscription Cirtificate
                                  </h5>
                                </div>
                                 <div style="text-align:right">
                                  <p><img id="lblStudentPhotoImg" class="img-responsive" style="height:100px;padding: 4px;border: 2px solid #000;" src="<?php echo $user_data['student_photo_url'] ?>" alt="Student Photo"></p>
                                </div>
                                <table class="table-bordered" style="width: 100%;margin:auto;">
                                  <tbody>
                                    
                                    <tr>
                                      <th style="width: 140px;">Admission No</th>
                                      <td style="width: 10px;text-align:center">:</td>
                                      <td>
                                        <span id="lblAdmissionNo">
                                          <?php echo $user_data['admission_no'] ?>
                                        </span>
                                      </td>
                                      <th style="width: 110px;">Subscription Class</th>
                                      <td style="width: 10px;text-align:center">:</td>
                                      <td>
                                        <span id="lblClassName" style="font-weight: 500; color: #3e9df1; ">
                                          <?php echo $user_data['class_name'] ?>
                                        </span>
                                      </td>
                                    </tr>
                                    <tr>
                                      <th style="width: 120px;">Name</th>
                                      <td style="width: 10px;text-align:center">:</td>
                                      <td>
                                        <span id="lblStudentName">
                                          <?php echo $user_data['student_name'] ?>
                                        </span>
                                      </td>
                                      <th style="width: 110px;">Father Name</th>
                                      <td style="width: 10px;text-align:center">:</td>
                                      <td>
                                        <span id="lblFathersName">
                                          <?php echo $user_data['father_name'] ?>
                                        </span>
                                      </td>
                                    </tr>
                                    <tr>
                                      <th style="width: 120px;">Group</th>
                                      <td style="width: 10px;text-align:center">:</td>
                                      <td>
                                        <span id="lblGroupName">
                                          <?php echo $user_data['group_name'] ?>
                                        </span>
                                      </td>
                                      <th style="width: 120px;">Mobile</th>
                                      <td style="width: 10px;text-align:center">:</td>
                                      <td>
                                        <span id="lblMobile">
                                          <?php echo $user_data['student_phone'] ?>
                                        </span>
                                      </td>
                                    </tr>
                                    <tr>
                                      <th style="width: 120px;">Paid Amount</th>
                                      <td style="width: 10px;text-align:center">:</td>
                                      <td>
                                        <span id="lblGroupName">
                                          <?php echo ($user_data['total_amount']-9) ?> TK
                                        </span>
                                      </td>
                                      <th style="width: 120px;">Txn Date</th>
                                      <td style="width: 10px;text-align:center">:</td>
                                      <td>
                                        <span id="lblMobile">
                                          <?php echo $user_data['create_date'] ?>
                                        </span>
                                      </td>
                                    </tr>
                                     <tr>
                                      <th style="width: 120px;">Txn ID</th>
                                      <td style="width: 10px;text-align:center">:</td>
                                      <td colspan="4">
                                        <span id="lblGroupName">
                                          <?php echo $user_data['transaction_id'] ?>
                                        </span>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                                <div class="footer-sign" style="text-align:center;margin-top:40px">
                                    <img style=" height: 30px; margin-top: 14px; margin-left: 24px; " src="../assets/images/sign.png">
                                    <p style="margin-bottom:3px">Authorized By</p>
                                    <p style="font-weight: 600">Web Support BD</p>
                                </div>
                              </div>
                    
                            </div>
                          </div>
                        </div>
                        
                    </div>
                    
                    <?php } ?>
                
            </div>
           
        </div>
        
 <?php include("../common/footer.php"); ?>
 
 <script>
    function portraitPrintHTML(printElementID) {
      var mywindow = window.open('', 'PRINT', 'height=400,width=600');
      mywindow.document.write('<html><head><title></title>');
      mywindow.document.write('<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >');
      mywindow.document.write('<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500&family=Great+Vibes&display=swap" rel="stylesheet">');
      mywindow.document.write('<style>');
      mywindow.document.write('@media print{');
      mywindow.document.write('.ctitle {font-family: "Dancing Script", cursive!important;}');
      mywindow.document.write('table {width:100%}');
      mywindow.document.write('.footer-sign {margin-top:90px!important}');
      mywindow.document.write('.table-bordered th{vertical-align: middle!important;}');
      mywindow.document.write('.table-bordered th, .table-bordered td {border: 1px solid #ddd !important;font-size:14px!important;color:#000!important;padding: 8px 8px!important}');
      // Report Display with print same table 
      mywindow.document.write('}');
      mywindow.document.write('</style>');
      mywindow.document.write('</head><body style="" >');
      mywindow.document.write(document.getElementById(printElementID).innerHTML);
      mywindow.document.write('</body></html>');
      mywindow.document.close(); // necessary for IE >= 10
      mywindow.focus(); // necessary for IE >= 10*/

      setTimeout(function () {
        mywindow.print();
        var ival = setInterval(function () {
          mywindow.close();
          clearInterval(ival);
        }, 200);
      }, 500);
      return true;
    }
</script>
 
</body>
</html>