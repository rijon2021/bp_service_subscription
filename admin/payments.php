<?php
 session_start();
include_once('../db_connection.php');
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{
?>
<?php include("./common/header.php"); ?>
<?php include("./common/sidebar.php"); ?>
        <!-- Content Start -->
        <div class="content">
        
            <?php include("./common/topbar.php"); ?>

            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">

                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Search Payments</h6>
                            <form method="POST" >
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="row mb-1">
                                            <label for="Batch" class="col-sm-3 col-form-label">Batch</label>
                                            <div class="col-sm-9">
                                                <select name="class_id" class="form-select" >
                                                    <option selected="selected" value="0">All</option>
                                                    <option value="221">Eleven</option>
                                                    <option value="222">Twelve</option>
                                                    <option value="223">ElevenBMT</option>
                                                    <option value="224">TwelveBMT</option>
                                                    <option value="226">DegreeFirstYear</option>
                                                    <option value="227">HonoursFirstYear</option>
                                                    <option value="228">MastersFinal</option>
                                                    <option value="229">DegreeSecondYear</option>
                                                    <option value="230">PreliminaryToMasters</option>
                                                    <option value="231">DegreeThirdYear</option>
                                                    <option value="232">HonoursSecondYear</option>
                                                    <option value="233">HonoursThirdYear</option>
                                                    <option value="234">test1</option>
                                            
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="row mb-1">
                                            <label for="fromDate" class="col-sm-3 col-form-label">Status</label>
                                            <div class="col-sm-9">
                                                <select name="status" class="form-select" >
                                                    <option selected="selected" value="0">All</option>
                                                    <option value="'success'">Success</option>
                                                    <option value="'Pending'">Pending</option>
                                            
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                                                      
                                    <div class="col-md-2">
                                        <div class="text-end">
                                            <button type="submit" name="search" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!--  ==================== List of  Category======= -->
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Payment List</h6>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive table-height">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>SN  </th>
                                                    <th>Admission No</th>
                                                    <th>Student Name</th>
                                                    <th>Father Name</th>
                                                    <th>Class Name</th>
                                                    <th>Group Name</th>
                                                    <th>Student Phone</th>
                                                    <th>Total Amount</th>
                                                    <th>Status</th>
                                                    <th>Transaction Id</th>
                                                    <th>Create date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                             if(isset($_POST['search']))
                                                {
                                                    $class_id=$_POST['class_id'];
                                                    $status=$_POST['status'];
                                                    
                                                   
                                                    $query="select * from orders where class_id=$class_id and status=$status";
                                                    $query_result=mysqli_query($conn_integration, $query);
                                                }
                                            if($query_result){
                                                $count = 1;
                                                while($result=mysqli_fetch_array($query_result))
                                        
                                                {
                                            ?>
                                                <tr>
                                                    <td><?php echo $count; ?></td>
                                                    <td><?php echo $result['admission_no'];?></td>
                                                    <td><?php echo $result['student_name'];?></td>
                                                    <td><?php echo $result['father_name'];?></td>
                                                    <td><?php echo $result['class_name'];?></td>
                                                    <td><?php echo $result['group_name'];?></td>
                                                    <td><?php echo $result['student_phone'];?></td>
                                                    <td><?php echo $result['total_amount'];?></td>
                                                    <td><?php echo $result['status'];?></td>
                                                    <td><?php echo $result['transaction_id'];?></td>
                                                    <td><?php echo $result['create_date'];?></td>
                                                </tr>
                                            <?php
                                                $count ++;
                                                } }
                                            ?>
                                            </tbody>
                                            
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <!-- Form End -->


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4 d-none">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Web Support BD</a>, All Right Reserved.
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            <!-- Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                            <br>Distributed By: <a href="https://themewagon.com" target="_blank">ThemeWagon</a> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->

<?php } ?>
<?php include("./common/footer.php"); ?>