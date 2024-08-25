<?php
    session_start();
    include_once('../db_connection.php');
    if (strlen($_SESSION['id']==0)) {
    header('location:logout.php');
    } else{
        //Code for Registration 
        if(isset($_POST['submit']))
        {
            $class_id = $_POST['class_id'];
            $from_date = $_POST['from_date'];
            $to_date =$_POST['to_date'];
            $due_amount =$_POST['due_amount'];
            $payment_charge =$_POST['payment_charge'];
            $amount = $_POST['amount'];
            $total_amount = $due_amount+$payment_charge+$amount;
            $status = (int)$_POST['status'];
            // $create_date = $_POST['create_date'];
            // $update_date = $_POST['update_date'];
            var_dump($_POST['status']);
       
            $msg=mysqli_query($conn_integration,"insert into subscription_category(class_id,from_date,to_date,due_amount,payment_charge,amount,total_amount,status) values('$class_id','$from_date','$to_date','$due_amount','$payment_charge','$amount','$total_amount','$status')");
         
           
            if($msg)
            {
                echo "<script>alert('Category Save successfully');</script>";
            }
        
        }
    
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
                            <h6 class="mb-4">Subscription Category Entry</h6>
                            <form method="post">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="row mb-1">
                                            <label for="Batch" class="col-sm-4 col-form-label text-end">Batch</label>
                                            <div class="col-sm-8">
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
                                    <div class="col-md-4">
                                        <div class="row mb-1">
                                            <label for="fromDate" class="col-sm-4 col-form-label text-end">From Date</label>
                                            <div class="col-sm-8">
                                                <input type="date" class="form-control" id="fromDate" name="from_date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row mb-1">
                                            <label for="toDate" class="col-sm-4 col-form-label text-end">To Date</label>
                                            <div class="col-sm-8">
                                                <input type="date" class="form-control" name="to_date" id="toDate">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row mb-1">
                                            <label for="Amount" class="col-sm-4 col-form-label text-end">Due
                                                Amount</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="due_amount" id="dueAmount">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row mb-1">
                                            <label for="paymentCharge" class="col-sm-4 col-form-label text-end">Payment Charge</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control"  name="payment_charge" id="paymentCharge">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row mb-1">
                                            <label for="Amount" class="col-sm-4 col-form-label text-end">Amount </label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="amount" id="Amount">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row mb-1">
                                            <label for="Status" class="col-sm-4 col-form-label text-end">Status </label>
                                            <div class="col-sm-8">
                                                <div class="form-check form-switch mt-2">
                                                    <input class="form-check-input" type="checkbox" role="switch" name="status" id="Status" checked="true">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="text-end mt-1">
                                            <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!--  ==================== List of  Category======= -->
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Subscription Category List</h6>
                            <div class="row">
                                <div class="col-md-12">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-6"></div>
                                            <div class="col-md-4">
                                                <div class="row mb-1">
                                                    <label for="Batch" class="col-sm-3 col-form-label">Batch</label>
                                                    <div class="col-sm-9">
                                                        <select id="Batch" class="form-select mb-3"
                                                            aria-label="Default select example">
                                                            <option selected>Select Batch</option>
                                                            <option value="1">Eleven2021</option>
                                                            <option value="1">Eleven2022</option>
                                                            <option value="1">Eleven2023</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="">
                                                    <button type="submit" class="btn btn-info"><i class="fa fa-search"></i> Search</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">From Date</th>
                                                    <th scope="col">From Date</th>
                                                    <th scope="col">To Date</th>
                                                    <th scope="col">Due Amount</th>
                                                    <th scope="col">Payment Charge</th>
                                                    <th scope="col">Amount</th>
                                                    <th scope="col">Total Amount</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                
                                                    $count = 1;
                                                    $query=mysqli_query($conn_integration,"select * from subscription_category");
                                                    while($result=mysqli_fetch_array($query))
                                            
                                                {
                                            ?>
                                                <tr>
                                                    <td><?php echo $count; ?></td>
                                                    <td><?php echo $result['class_id'];?></td>
                                                    <td><?php echo $result['from_date'];?></td>
                                                    <td><?php echo $result['to_date'];?></td>
                                                    <td><?php echo $result['due_amount'];?></td>
                                                    <td><?php echo $result['payment_charge'];?></td>
                                                    <td><?php echo $result['amount'];?></td>
                                                    <td><?php echo $result['total_amount'];?></td>
                                                    <td>
                                                         <?php if($result['status']==0){ ?> <span class="text-success">Active</span><?php }else{ ?>
                                                        <span class="text-danger">InActive</span> <?php } ?>
                                                    </td>
                                                    <td>
                                                        <a href="" class="text-info"><i class="fa fa-edit"></i></a>
                                                        <a href="" class="text-danger ms-3"><i
                                                                class="fa fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            <?php
                                                $count ++;
                                                }
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
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->
<?php } ?>
<?php include("./common/footer.php"); ?>