<?php
######
# THIS FILE IS ONLY AN EXAMPLE. PLEASE MODIFY AS REQUIRED.
# Contributors: 
#       Md. Rakibul Islam <rakibul.islam@sslwireless.com>
#       Prabal Mallick <prabal.mallick@sslwireless.com>
######

error_reporting(0);
ini_set('display_errors', 0);
?>
<!DOCTYPE html>

<head>
    <meta name="author" content="SSLCommerz">
    <title>Successful Transaction </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row" style="margin-top: 10%;">
            <div class="col-md-8 offset-md-2">

                <?php
                require_once(__DIR__ . "/../lib/SslCommerzNotification.php");
                include_once(__DIR__ . "/../db_connection.php");
                include_once(__DIR__ . "/../OrderTransaction.php");

                use SslCommerz\SslCommerzNotification;

                $sslc = new SslCommerzNotification();
                $tran_id = $_POST['tran_id'];
                $amount =  $_POST['amount'];
                $currency =  $_POST['currency'];

                $ot = new OrderTransaction();
                $sql = $ot->getRecordQuery($tran_id);
                $result = $conn_integration->query($sql);
            
                $row = $result->fetch_array(MYSQLI_ASSOC);
                

                if ($row['status'] == 'Pending' || $row['status'] == 'Processing') {
                    $validated = $sslc->orderValidate($_POST, $tran_id, $amount, $currency);

                    if ($validated) {
                        $sql = $ot->updateTransactionQuery($tran_id, 'success');

                        if ($conn_integration->query($sql) === TRUE) { ?>
                            <h2 class="text-center text-success">Congratulations! Your Transaction is Successful.</h2>
                            <br>
                            <div id="printElementID">
                                <div style="width:100%;text-align:center;">
                                    <p><img style="height: 70px;margin: 15px auto;" src="../assets/images/ws-logo.png"></p>
                                </div>
                                <table border="1" class="table table-striped">
                                    <thead class="thead-dark">
                                        
                                        <tr class="text-center">
                                            <th colspan="2">Subscription Details</th>
                                        </tr>
                                    </thead>
                                    <tr>
                                        <td style="width:50%" class="text-right">Transaction ID</td>
                                        <td><?= $_POST['tran_id'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">Transaction Time</td>
                                        <td><?= $_POST['tran_date'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">Payment Method</td>
                                        <td><?= $_POST['card_issuer'] ?></td>
                                    </tr>
                                 
                                    <tr>
                                        <td class="text-right">Amount</td>
                                        <td><?= $_POST['amount'] . ' ' . $_POST['currency'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">Admission No</td>
                                        <td><?=  $row['admission_no'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">Student Name</td>
                                        <td><?=  $row['student_name'] ?></td>
                                    </tr>
                                     <tr>
                                        <td class="text-right">Father Name</td>
                                        <td><?=  $row['father_name'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">Class Name</td>
                                        <td><?=  $row['class_name'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">Group Name</td>
                                        <td><?=  $row['group_name'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">Mobile No</td>
                                        <td><?=  $row['student_phone'] ?></td>
                                    </tr>
                                </table>
                            </div>

                        <?php

                        } else { // update query returned error

                            echo '<h2 class="text-center text-danger">Error updating record: </h2>' . $conn_integration->error;

                        } // update query successful or not 

                    } else { // $validated is false

                        echo '<h2 class="text-center text-danger">Payment was not valid. Please contact with the merchant.</h2>';

                    } // check if validated or not

                } else { // status is something else

                    echo '<h2 class="text-center text-danger">Invalid Information.</h2>';

                } // status is 'Pending' or already 'Processing'
                ?>

            </div>
            
        </div>
        <div style="text-align:center">
            <a class="btn btn-info mr-3" href="javascript:void(0)" onclick="portraitPrintHTML('printElementID')"> Print Cirtificate</a>
            <a class="btn btn-success" target="_blank" href="https://islampurcollege.edu.bd/payment"><i class="fa fa-link"></i> Go to Payment</a>
        </div>
    </div>
    
    <script>
    function portraitPrintHTML(printElementID) {
      var mywindow = window.open('', 'PRINT', 'height=400,width=600');
      mywindow.document.write('<html><head><title></title>');
      mywindow.document.write('<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >');
      mywindow.document.write('<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500&family=Great+Vibes&display=swap">');
      mywindow.document.write('<style>');
      mywindow.document.write('@media print{');
      mywindow.document.write('table {width:100%}');
      mywindow.document.write('.footer-sign {margin-top:180px!important}');
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