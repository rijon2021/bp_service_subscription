<?php
 $adminURL='http://bp_service_subscription.oo/admin';
// if($_SERVER=='http://127.0.0.1'){
    $servername = "localhost";
    $username = "root"; // Put the MySQL Username
    $password = ""; // Put the MySQL Password
    $database = "bp_service_subscription"; // Put the Database Name
// }else{
    // $servername = "localhost";
    // $username = "websuppo_rijon"; // Put the MySQL Username
    // $password = "rijon@2023#"; // Put the MySQL Password
    // $database = "websuppo_wsbd"; // Put the Database Name
// }



// Create connection for integration
$conn_integration = mysqli_connect($servername, $username, $password, $database);

// Check connection for integration
if (!$conn_integration) {
    die("Connection failed: " . mysqli_connect_error());
}

