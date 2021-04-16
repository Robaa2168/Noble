<?php
require_once('connection.php');

$refer =$_GET['ad'];
$sql21 = "UPDATE coins

SET due_date = '2021-04-05 00:00:00' WHERE order_id ='$refer'";
 // Prepare statement
 $stmt = $dbh->prepare($sql21);

 // execute the query
 $stmt->execute();
?>
<script>
alert('Validated')
</script>
<script>

window.location = "admin_investments.php";
</script>