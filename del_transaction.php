

<?php
require_once('connection.php');

$refer =$_GET['ad'];
$sql21 ="DELETE FROM `coins` WHERE order_id='".$_GET["ad"]."'";
 // Prepare statement
 $stmt = $dbh->prepare($sql21);

 // execute the query
 $stmt->execute();
?>
<script>
alert('Deleted')
</script>
<script>

window.location = "admin_investments.php";
</script>