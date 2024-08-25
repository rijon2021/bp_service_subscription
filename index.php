
<?php

error_reporting(0);

if($_GET['url_adm_no']){
    $_POST['admission_no'] = $_GET['url_adm_no'];
}

if(isset($_POST['search']))
{
    $admissionNo=$_POST['admission_no'];
    $api_url = 'https://islampurcollege.edu.bd/api/student/'.$admissionNo;
    $json_data = file_get_contents($api_url);
    
    $response_data = json_decode($json_data);
    $user_data = $response_data->Data;

}

?>
<?php include("./common/header.php"); ?>

<main style="margin-top: 100px">
    <div class="container">
        <div class="row" >
            <div class="col-md-8">
                <h4 class="mb-3"> Customer Search by Customer ID </h4>
           
                    <form method="POST" class="row">
                       <div class="col-md-8">
                          <div class="mb-2">
                            <label for="firstName">Customer ID</label>
                            <input type="text" name="admission_no" class="form-control" id="admissionNo" value="<?php echo $_POST['admission_no'];?>" placeholder="" required>
                          </div>
                        </div>
                        <div class="col-md-4 text-end">
                          <button type="submit" name="search" class="btn btn-success" style="margin-top: 32px;"><i class="fa fa-search"></i> Search Customer</button>
                        </div>
                    </form>
                    <?php if (($user_data==NULL) && (isset($_POST['search']))){ ?>
                     <div class="row mt-5">
                        <div class="col-md-12">
                            <div class="student-not-found text-center">
                              <h3>Customer Not Found</h3>
                              <h5>Please check your Customer ID and search again</h5>
                             
                            </div>
                        </div>
                    </div>
                    <?php } else if ((!empty($user_data)) && (isset($_POST['search']))){ ?>
                    <div class="row">
                        <div class="col-md-12">
                          <div class="student-data mt-3">
                            <div class="table-responsive bg-white p-3">
                              <h5>Customer Information</h5>
                              <table class="table table-bordered table-dark-bordered">
                                <tbody>
                                  <tr>
                                    <th style="width: 120px;">Admission No</th>
                                    <td style="width: 5px;">:</td>
                                    <td>
                                      <span id="lblAdmissionNo"><?php echo $user_data->AdmissionFormNo ?></span>
                                    </td>
                                    <td colspan="3" style="text-align: center;">
                                      <div id="ForLeftSideMenuList_divImage">
                                        <div style="width: 100px;height:100px;background: #ededed;padding: 4px;border: 1px solid #000;margin:auto">
                                            <img id="lblStudentPhotoImg" class="img-responsive" style="width:auto;height:100%;" src="<?php echo $user_data->ImageName ?>" alt="Student Photo">
                                            <span style="display:none" id="lblStudentPhoto"><?php echo $user_data->ImageName ?></span>
                                          </div>
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <th style="width: 120px;">Name</th>
                                    <td style="width: 5px;">:</td>
                                    <td>
                                      <span id="lblStudentName"><?php echo $user_data->FullName; ?></span>
                                    </td>
                                    <th style="width: 120px;">Mobile</th>
                                    <td style="width: 5px;">:</td>
                                    <td>
                                      <span id="lblFathersName"><?php echo $user_data->FathersName ?></span>
                                    </td>
                                  </tr>
                                 
                                  
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                    </div>
                    
                    <?php } ?>
                
            </div>
            <div class="col-md-4 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Payment Info</span>
                </h4>
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                      <!-- <h6 class="text-info mb-0">Subscription for : <?php if(!empty($user_data->ClassName)){ ?><span> Class <?php echo $user_data->ClassName ?> </span><?php } ?> <br>
                        </h6> -->
                      <h6 class="text-info mb-0">Subscription for : July/2024 <br>
                        </h6>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                      <div>
                        <h5 class="my-0">Service Subscription Fee</h5>
                        <p class="text-muted mb-0">1. Free Delevery</p>
                        <p class="text-muted mb-0">2. Cleaning </p>
                        <p class="text-muted mb-0">3. Gas Service</p>
                      </div>
                      <h5 class="text-dark">100</h5>
                    </li>
              
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                      <div>
                        <h6 class="my-0">Proccesing Charge</h6>
                        <p class="text-muted">Payment charge for minimum amount</p>
                      </div>
                      <h5 class="text-dark">2</h5>
                    </li>
                    
                    <li class="list-group-item d-flex justify-content-between bg-light">
                      <h4 class="text-primary">Total (BDT)</h4>
                      <h4 class="text-primary"><strong>5 TK</strong></h4>
                      <input type="hidden" value="81" name="amount" id="total_amount" required/>
                    </li>
                  </ul>
                  
                  <div class="custom-control custom-checkbox my-3">
                        <input type="checkbox" class="custom-control-input" id="save-info" checked>
                        <label class="custom-control-label" for="save-info">I agree with <a href="javascript:void(0)">Terms and Condition</a></label>
                    </div>
                 <?php if ((!empty($user_data)) && (isset($_POST['search']))){ ?>
                    <button class="btn btn-outline-info btn-lg btn-block" id="sslczPayBtn" 
                            token="if you have any token validation"
                            postdata="your javascript arrays or objects which requires in backend"
                            order="If you already have the transaction generated for current order"
                            endpoint="checkout_ajax.php"> Payment By <img src="https://islampurcollege.edu.bd/Images/ssl-icon.png"> 
                    </button>
                    <?php } ?>
            </div>
        </div>
        
        
        
        <?php include("./common/footer.php"); ?>
        <script>
            // $(document).on('change keyup','#student_class,#student_name,#admission_no,#ssc_roll,#stundent_mobile',function(){
            //     make_form_data();
            // })
     
             
             $('#sslczPayBtn').click(function(){
                 make_form_data();
             })
            
            function make_form_data(){
                var obj = {};
                obj.category_id = 1;
                obj.class_id = document.getElementById("lblClassId").innerHTML;
                obj.student_class = document.getElementById("lblClassName").innerHTML;
                obj.fathers_name = document.getElementById("lblFathersName").innerHTML;
                obj.student_name = document.getElementById('lblStudentName').innerHTML;
                obj.student_photo_url = document.getElementById('lblStudentPhoto').innerHTML;
                obj.admission_no = document.getElementById('lblAdmissionNo').innerHTML;
                obj.admission_year = document.getElementById('lblAdmissionYear').innerHTML;
                obj.group_name = document.getElementById('lblGroupName').innerHTML;
                obj.student_mobile = document.getElementById('lblMobile').innerHTML;
                obj.amount = $('#total_amount').val();
                
                $('#sslczPayBtn').prop('postdata', obj);
            }
            (function (window, document) {
                   
                var loader = function () {
                    var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
                    script.src = "https://seamless-epay.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // NOTE: USE THIS FOR LIVE
                    //script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // NOTE: USE THIS FOR SANDBOX
                    tag.parentNode.insertBefore(script, tag);
                };
        
                window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
            })(window, document);
        </script>
        
        
    </body>
</html>