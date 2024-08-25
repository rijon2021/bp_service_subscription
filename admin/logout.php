<?php
include_once('../db_connection.php');
session_start();
session_destroy();
// header("location: $adminURL.'/login.php'");
?>
<script language="javascript">
document.location="<?php echo $adminURL?>/login.php";
</script>
