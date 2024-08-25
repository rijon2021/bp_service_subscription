<?php session_start();
include_once('../../db_connection.php');


 if(isset($_POST['search']))
{

    $class_id=$_POST['class_id'];
    $status=$_POST['status'];

}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Payment List</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" >
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <div id="layoutSidenav">
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">

                        <h1 class="mt-4">Payment List</h1>
                        <form method="POST"  style="margin:15px 0">
                                <div class="row">
                                    <div class="col-md-3">
                                        <select name="class_id" class="form-control" >
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
                                    <div class="col-md-3">
                                        <select name="status" class="form-control" >
                                    		<option selected="selected" value="0">All</option>
                                    		<option value="'success'">Success</option>
                                    		<option value="'Pending'">Pending</option>
                                    
                                    	</select>
                                    </div>
                                    <div class="col-md-3">
                                        <button type="submit" name="search" class="btn btn-success" ><i class="fa fa-search"></i> Search </button>
                                    </div>
                                    
                                </div>
                            </form>
                        <div class="card mb-4">
                           
                            
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>SN <?php echo $count; ?> </th>
                                        <th>admission_no</th>
                                        <th>student_name</th>
                                        <th>father_name</th>
                                        <th>class_id</th>
                                        <th>class_name</th>
                                        <th>group_name</th>
                                        <th>student_phone</th>
                                        <th>total_amount</th>
                                        <th>status</th>
                                        <th>transaction_id</th>
                                        <th>create_date</th>
                                    </tr>                   
                                    <?php 
                                        $count = 1;
                                        $query=mysqli_query($conn_integration,"select * from orders where class_id=$class_id && status=$status");
                                        while($result=mysqli_fetch_array($query))
                                        
                                    {
                                    ?>
                                    
                                   <tr>
                                     <td><?php echo $count; ?></td>
                                    <td><?php echo $result['admission_no'];?></td>
                                    <td><?php echo $result['student_name'];?></td>
                                    <td><?php echo $result['father_name'];?></td>
                                    <td><?php echo $result['class_id'];?></td>
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
                                   } 
                                   ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>

