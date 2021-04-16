<?php
require_once('connection.php');

$refer =$_GET['id'];

$querypair = "SELECT * FROM pairs WHERE pair_id ='$refer'";
$resultpair = mysqli_query($conn, $querypair);

if (mysqli_num_rows($result) > 0) {
    if($row = mysqli_fetch_assoc($resultpair)) {
        $locamount=$row['order_cost'];
        $sell_id=$row['sell_id'];
    }
}

$lookuptotal = "SELECT control_bal FROM coins WHERE order_id = $sell_id";
$result = mysqli_query($conn, $lookuptotal);
$row = mysqli_fetch_row($result);
$cont_bal = $row['0'];
$rem = $cont_bal - $locamount;

$sql10 = "UPDATE pairs
SET payment_status = 'paid' WHERE pair_id ='$refer'";
 // Prepare statement
 $stmt = $dbh->prepare($sql10);

 // execute the query
 $stmt->execute();

 $sql16 = "UPDATE coins
SET control_bal = $rem WHERE order_id = $sell_id";
 // Prepare statement
 $stmt = $dbh->prepare($sql16);

 // execute the query
 $stmt->execute();
?>
<script>
alert('Action successful')
</script>
<script>

window.location = "dashboard.php";
</script>