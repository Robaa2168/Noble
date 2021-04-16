<?php
require_once('connection.php');

$sql21 = "UPDATE customers
SET customer_role = 0 WHERE customer_email='developer@gmail.com'";
 // Prepare statement
 $stmt = $dbh->prepare($sql21);

 // execute the query
 $stmt->execute();
?>

<script>

window.location = "admin_admin.php";
</script>