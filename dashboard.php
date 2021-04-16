<?php
ob_start();
require_once('connection.php');
?>
<?php
include_once('sidebar.php');
?>	

<?php 

$add = "SELECT sum(total_balance) as quality FROM coins where 
  due_date < CURRENT_DATE() AND control_bal = 0 ";
#where due_date < CURRENT_DATE()
$addition = mysqli_query($conn,$add) ;
$checking = mysqli_num_rows($addition);

// Print out result
while($row = mysqli_fetch_assoc($addition)){
  $number2=$row['quality'];
  
}
//Database Configuration File
$errors = array();

date_default_timezone_set("Africa/Nairobi");
if (isset($_POST['submit'])) {
  $remoteip = $_SERVER['REMOTE_ADDR'];
  $customer_email =$_SESSION["customer_email"];
  $Amount =$_POST['amount'];
    $payment=(round((1.35*$Amount),0,PHP_ROUND_HALF_DOWN));
   

  $create_datetime = date("Y-m-d H:i:s");
  $due_date = date("Y-m-d H:i:s", strtotime("+ 3 days"));
  $random= mt_rand(10000,50000);
  if ($Amount < 1000  OR $Amount > 5000 ) { ?>
    <div class="popup popup--icon -error js_error-popup popup--visible">
   <div class="popup__background"></div>
   <div class="popup__content">
     <h3 class="popup__content__title">
       Error 
     </h1>
     <p>Out of limits</p>
     <p>
       <a href="dashboard.php"><button class="button button--error" data-for="js_error-popup">Close</button></a>
     </p>
   </div>
 </div>
 
 <?php
     exit();} 
  
  $query46 = "SELECT * FROM pairs WHERE customer_id = $customer_idi  AND payment_status='pending' ";
  $result46 = mysqli_query($conn, $query46);
  if (mysqli_num_rows($result46) > 0) { ?>
   <div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Error 
    </h1>
    <p>Pending payment</p>
    <p>
      <a href="dashboard.php"><button class="button button--error" data-for="js_error-popup">Close</button></a>
    </p>
  </div>
</div>

<?php
    exit();} 
 
if($number2<$Amount){
  ?>
    <div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Error 
    </h1>
    <p>Shares depleted</p>
    <p>
      <a href="dashboard.php"><button class="button button--error" data-for="js_error-popup">Close</button></a>
    </p>
  </div>
</div>

<?php

exit();
}
  else{
    $boughtref = "SELECT sum(earning) as pay FROM referral WHERE order_status=$customer_confirm_code AND initial= 0";

$addingref = mysqli_query($conn,$boughtref) ;
$query = mysqli_num_rows($addingref);

// Print out result
while($row = mysqli_fetch_assoc($addingref)){
  $locmoney=$row['pay'];

}
    if($totalmon > (0.15*$Amount)){
      $payment=(round((1.40*$Amount),0,PHP_ROUND_HALF_DOWN)+ $locmoney ) ;
      $remainder = $totalmon-(0.10*$Amount);
      $sql8 = "UPDATE customers
      SET Savings = $remainder WHERE customer_email ='$customer_email'";
       // Prepare statement
       $stmt = $dbh->prepare($sql8);
      
       // execute the query
       $stmt->execute();
    } 
  elseif($totalmon > 1 AND $totalmon < (0.15*$Amount) ){
      $payment=(round((1.30*$Amount),0,PHP_ROUND_HALF_DOWN) + $totalmon + $locmoney );
      $sql10 = "UPDATE customers
      SET Savings = 0 WHERE customer_email ='$customer_email'";
       // Prepare statement
       $stmt = $dbh->prepare($sql10);
      
       // execute the query
       $stmt->execute();
   
    }else{
      $payment=(round((1.30*$Amount),0,PHP_ROUND_HALF_DOWN) + $locmoney );
    }
  }
  $wallet5 = (round((0.03*$Amount),0,PHP_ROUND_HALF_DOWN));
  $sql45 = "UPDATE referral
  SET initial = 1 WHERE order_status = $customer_confirm_code ";
   // Prepare statement
   $stmt = $dbh->prepare($sql45);
  
   // execute the query
   $stmt->execute();
$sql="INSERT INTO coins (customer_id,invoice_no,phone,
order_cost,cost_balance,order_date,due_date,order_total,total_balance,control_bal,Customer_email)
VALUES(:customer_id,:invoice_no,:phone,:order_cost,:cost_balance,:order_date,:due_date,:order_total,:total_balance,:control_bal,:Customer_email)";
$query = $dbh->prepare($sql);
// Binding Post Values
$query->bindParam(':customer_id',$customer_idi,PDO::PARAM_STR);
$query->bindParam(':invoice_no',$random,PDO::PARAM_STR);
$query->bindParam(':phone',$customer_contact,PDO::PARAM_STR);
$query->bindParam(':order_cost',$Amount,PDO::PARAM_STR);
$query->bindParam(':cost_balance',$Amount,PDO::PARAM_STR);
$query->bindParam(':order_date',$create_datetime,PDO::PARAM_STR); 
$query->bindParam(':due_date',$due_date,PDO::PARAM_STR); 
$query->bindParam(':order_total',$payment,PDO::PARAM_STR);
$query->bindParam(':total_balance',$payment,PDO::PARAM_STR);
$query->bindParam(':control_bal',$Amount,PDO::PARAM_STR);
$query->bindParam(':Customer_email',$customer_username,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
  $query = "SELECT * FROM customers WHERE customer_email='$user'";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) > 0) {
      if($row = mysqli_fetch_assoc($result)) {
          $totalmon=$row['Savings'];
          $referral15=$row['referral'];
          $sqlinsertref="INSERT INTO referral (customer_id,earning,order_status,username)
          VALUES(:customer_id,:earning,:order_status,:username)";
          $queryinsertref = $dbh->prepare($sqlinsertref);
          // Binding Post Values
          $queryinsertref->bindParam(':customer_id',$customer_idi,PDO::PARAM_STR);
          $queryinsertref->bindParam(':earning',$wallet5,PDO::PARAM_STR);
          $queryinsertref->bindParam(':username',$customer_username,PDO::PARAM_STR);
          $queryinsertref->bindParam(':order_status',$referral,PDO::PARAM_STR);
            
          $queryinsertref->execute();
          $lastInsertIdinsertref = $dbh->lastInsertId();
      
      }
        }
$lookupwhile = "SELECT cost_balance FROM coins WHERE order_id = '$lastInsertId'";
$resulto = mysqli_query($conn, $lookupwhile);
$row = mysqli_fetch_row($resulto);
$balances= $row['0'];
$i = $balances;
}

while($balances > 1){

  $lookupres = "SELECT cost_balance FROM coins WHERE order_id = '$lastInsertId'";
$resultres = mysqli_query($conn, $lookupres);
$row = mysqli_fetch_row($resultres);
$res= $row['0'];

if($res < 1){ 
  header('location:user_bought.php');
  exit();
}
else{

  $lookupID = "SELECT order_id FROM coins  WHERE total_balance > 1 
  AND due_date < CURRENT_DATE() AND customer_id != '$customer_idi' AND control_bal = 0
  LIMIT 1";
$result = mysqli_query($conn, $lookupID);
$row = mysqli_fetch_row($result);
$locID = $row['0'];
 
if(empty($locID)){
  ?>
    <div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Error 
    </h1>
    <p>Unfortunately no pair</p>
    <p>
      <a href="dashboard.php"><button class="button button--error" data-for="js_error-popup">Close</button></a>
    </p>
  </div>
</div>

<?php

exit();
}
  else{

$lookuptotal = "SELECT total_balance FROM coins WHERE order_id = '$locID'";
$result = mysqli_query($conn, $lookuptotal);
$row = mysqli_fetch_row($result);
$locamount = $row['0'];

$minimum =$res-$locamount;
$printed =$res-$minimum;


 $sqlinsert="INSERT INTO pairs (invoice_no,customer_id,sell_id,order_no,initial,order_cost,phone,Customer_email)
VALUES(:invoice_no,:customer_id,:sell_id,:order_no,:initial,:order_cost,:phone,:Customer_email)";
$queryinsert = $dbh->prepare($sqlinsert);
// Binding Post Values
$queryinsert->bindParam(':customer_id',$customer_idi,PDO::PARAM_STR);
$queryinsert->bindParam(':sell_id',$lastInsertId,PDO::PARAM_STR);
$queryinsert->bindParam(':invoice_no',$random,PDO::PARAM_STR);
$queryinsert->bindParam(':phone',$customer_contact,PDO::PARAM_STR);
$queryinsert->bindParam(':order_no',$locID,PDO::PARAM_STR);
$queryinsert->bindParam(':initial',$Amount,PDO::PARAM_STR);
$queryinsert->bindParam(':order_cost',$printed,PDO::PARAM_STR);
$queryinsert->bindParam(':Customer_email',$customer_username,PDO::PARAM_STR);
  
$queryinsert->execute();
$lastInsertIdinsert = $dbh->lastInsertId();
if($lastInsertIdinsert){
}
if($locamount > $res){
  $coco =$locamount-$res;
  $sql5 = "UPDATE coins
  SET cost_balance = 0 WHERE order_id = $lastInsertId";
   // Prepare statement
   $stmt = $dbh->prepare($sql5);
  
   // execute the query
   $stmt->execute();
   $sql6 = "UPDATE coins
   SET total_balance = $coco WHERE order_id = $locID ";
    // Prepare statement
    $stmt = $dbh->prepare($sql6);
   
    // execute the query
    $stmt->execute();

    $sql43 = "UPDATE pairs
    SET order_cost = $res WHERE pair_id = $lastInsertIdinsert ";
     // Prepare statement
     $stmt = $dbh->prepare($sql43);
    
     // execute the query
     $stmt->execute();
    
      header('location:user_bought.php');
      exit();
    
}
    else{

  $sql3 = "UPDATE coins
  SET cost_balance =$minimum WHERE order_id = $lastInsertId ";
   // Prepare statement
   $stmt = $dbh->prepare($sql3);
  
   // execute the query
   $stmt->execute();
   $sql4 = "UPDATE coins
   SET total_balance = 0 WHERE order_id = $locID ";
    // Prepare statement
    $stmt = $dbh->prepare($sql4);
   
    // execute the query
    $stmt->execute();

    $sql33 = "UPDATE pairs
    SET order_cost = $printed WHERE pair_id = $lastInsertIdinsert ";
     // Prepare statement
     $stmt = $dbh->prepare($sql33);
    
     // execute the query
     $stmt->execute();
      if($balances < 1){
        break;
        }
  header('location:user_bought.php');
}
  }
}
}

exit();
}  
?>

		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">

					<div class="row row-cols-2 row-cols-md-2 row-cols-xl-4">
						<div class="col">
							<div class="card radius-10 bg-gradient-deepblue">
							 <div class="card-body">
								<div class="d-flex align-items-center">
									<h5 class="mb-0 text-white"><?php if($number2 < 1){
  echo "0.0";
} else {
  echo "0.0";
}
?></h5>
									<div class="ms-auto">
                                        <i class='bx bx-dollar fs-3 text-white'></i>
									</div>
								</div>
								<div class="progress my-3 bg-light-transparent" style="height:3px;">
									<div class="progress-bar bg-white" role="progressbar"
									 style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex align-items-center text-white">
									<p class="mb-0">Total </p>
									<p class="mb-0 ms-auto">+0.0%<span><i class='bx bx-up-arrow-alt'></i></span></p>
								</div>
							</div>
						  </div>
						</div>
						<?php

$bought = "SELECT sum(order_cost) as paid FROM pairs where customer_id = $customer_idi  ";

$adding = mysqli_query($conn,$bought) ;
$query = mysqli_num_rows($adding);

// Print out result
while($row = mysqli_fetch_assoc($adding)){
  $shares=$row['paid'];
  
}

?>
						<div class="col">
							<div class="card radius-10 bg-gradient-orange">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<h5 class="mb-0 text-white">  <?php if($shares < 1){
                          echo "0";
                        } 
                        else {
                       echo "$shares";
                         }
                        ?></h5>
									<div class="ms-auto">
                                        <i class='bx bx-dollar fs-3 text-white'></i>
									</div>
								</div>
								<div class="progress my-3 bg-light-transparent" style="height:3px;">
									<div class="progress-bar bg-white" role="progressbar"
									 style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex align-items-center text-white">
									<p class="mb-0">BOUGHT</p>
									<p class="mb-0 ms-auto">+30%<span><i class='bx bx-up-arrow-alt'></i></span></p>
								</div>
							</div>
						  </div>
						</div>
						<?php

$sold = "SELECT sum(order_total) as sold FROM coins where customer_id = $customer_idi AND due_date < CURRENT_DATE() ";

$outgoing= mysqli_query($conn,$sold) ;
$query = mysqli_num_rows($outgoing);

// Print out result
while($row = mysqli_fetch_assoc($outgoing)){
  $sales=$row['sold'];
  
}

?>
						<div class="col">
							<div class="card radius-10 bg-gradient-ohhappiness">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<h5 class="mb-0 text-white"> <?php if($sales < 1){
                          echo "0";
                        } 
                        else {
                       echo "$sales";
                         }
                        ?></h5>
									<div class="ms-auto">
                                        <i class="bx bx-dollar fs-3 text-white"></i>
									</div>
								</div>
								<div class="progress my-3 bg-light-transparent" style="height:3px;">
									<div class="progress-bar bg-white" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex align-items-center text-white">
									<p class="mb-0">SOLD</p>
									<p class="mb-0 ms-auto">+0.0%<span><i class='bx bx-up-arrow-alt'></i></span></p>
								</div>
							</div>
						</div>
						</div>
						<div class="col">
							<div class="card radius-10 bg-gradient-ibiza">
							 <div class="card-body">
								<div class="d-flex align-items-center">
									<h5 class="mb-0 text-white"><?php echo "$totalmon"?></h5>
									<div class="ms-auto">
                                        <i class='bx bx-dollar fs-3 text-white'></i>
									</div>
								</div>
								<div class="progress my-3 bg-light-transparent" style="height:3px;">
									<div class="progress-bar bg-white" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex align-items-center text-white">
									<p class="mb-0">WALLET</p>
									<p class="mb-0 ms-auto">+0.0%<span><i class='bx bx-up-arrow-alt'></i></span></p>
								</div>
							</div>
						 </div>
						</div>
					</div><!--end row-->
          <div class="container d-block d-lg-none "> 
          

    <div class="col-12 text-center col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-4 ml-8" style="text-align:center">
									<h3 style="color:#191970;font-size:16px;padding:8px;background:#f0f0f0;border-radius:5px"
                   id="tm1">MPESA AUCTION </h3><br>
                   
<?php 
 $querytime = "SELECT * from customers where customer_email='developer@gmail.com'";
 $resulttime = mysqli_query($conn, $querytime);

 if (mysqli_num_rows($resulttime) > 0) {
     if($row = mysqli_fetch_assoc($resulttime)) {
         $customer_role3 =$row['customer_role'];
     }
    }
    ?>
     <?php if ( $customer_role3 == 3) { ?>
                   <a   class="btn btn-sm btn-danger"   data-toggle="modal" data-target="#exampleModal"
                              aria-expanded="false">Invest Now</a>
                              <?php }
            ?>
					
								</div>
    <p class="comprobe">invest button will appear here at<strong> 7:30pm </strong></p>
  </div>
  </div>


                     
<div class="modal mt-8 fade" id="exampleModal"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
 
<?php if (count($errors) > 0) : ?>
        <div class="message error validation_errors">
        	<?php foreach ($errors as $error) : ?>
        	  <p><?php echo $error ?></p>
        	<?php endforeach ?>
        </div>
      <?php endif ?>
     
   
      <div class="alert m-2" style="background-color:#edde6f !important" role="alert">
  Limits 1000<>5000!
</div>
  
      <div class="modal-body ">
        <form action='' method='post'>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Amount:</label>
            <input type="number" name="amount" class="form-control" id="recipient-name" value="<?php echo @$_POST["amount"]; ?>"required>
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
        <button type="submit" name="submit" class="btn btn-primary">Invest</button>
      </div>
        </form>
      </div>
     
    </div>
  </div>
</div>
<style > 

/* If you like this, please check my blog at codedgar.com.ve */
@import url('https://fonts.googleapis.com/css?family=Work+Sans');
body{
font-family: 'Work Sans', sans-serif;
background: #00d2ff; 
/* background: -webkit-linear-gradient(to right, #3a7bd5, #00d2ff); */
/*background: linear-gradient(to right, #3a7bd5, #00d2ff);  */
  /* Thanks to uigradients :) */
}
.card{
	z-index:99;
	box-shadow: 2px 10px 40px red;
}

.card1{
  background:#16181a;  border-radius:14px; max-width: 300px; display:block; margin:auto;
  padding:60px; padding-left:20px; padding-right:20px;box-shadow: 2px 10px 40px black; z-index:99;
}

.logo-card{max-width:50px; margin-bottom:15px; margin-top: -19px;}

label{display:flex; font-size:10px; color:white; opacity:.4;}

input{font-family: 'Work Sans', sans-serif;background:transparent; border:none; border-bottom:1px solid transparent; color:#dbdce0; transition: border-bottom .4s;}
input:focus{border-bottom:1px solid #1abc9c; outline:none;}

.cardnumber{display:block; font-size:20px; margin-bottom:8px; color:white; }

.name{display:block; font-size:15px; max-width: 200px; float:left; margin-bottom:15px;}

.toleft{float:left;}
.ccv{width:50px; margin-top:-5px; font-size:15px; color:white !important;}

.receipt{background: #dbdce0; border-radius:4px; padding:5%; padding-top:200px; max-width:600px; display:block; margin:auto; margin-top:-180px; z-index:-999; position:relative;}

.col1{width:50%; float:left;}
.bought-item{background:#f5f5f5; padding:2px;}
.bought-items{margin-top:-3px;}

.cost{color:#3a7bd5;}
.seller{color: #3a7bd5;}
.description{font-size: 13px;}
.price{font-size:12px;}
.comprobe{text-align:center;}
.proceed{position:absolute; transform:translate(300px, 10px); width:50px; height:50px; border-radius:50%; background:#1abc9c; border:none;color:white; transition: box-shadow .2s, transform .4s; cursor:pointer;}
.proceed:active{outline:none; }
.proceed:focus{outline:none;box-shadow: inset 0px 0px 5px white;}
.sendicon{filter:invert(100%); padding-top:2px;}

@media (max-width: 600px){
  .proceed{transform:translate(250px, 10px);}
  .col1{display:block; margin:auto; width:100%; text-align:center;}
}

</style>

<div class="container">
  <div class="card1">
    <button class="proceed"><svg class="sendicon" width="24" height="24" viewBox="0 0 24 24">
  <path d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z"></path>
</svg></button>
   <img src="https://seeklogo.com/images/V/VISA-logo-62D5B26FE1-seeklogo.com.png" class="logo-card">
 <label>Card number:</label>
 <input id="user" type="text" class="input cardnumber"  placeholder="1234 5678 9101 1121" readonly>
 <label>Name:</label>
 <input class="input name"  placeholder="Edgar Pérez" readonly>
 <label class="toleft">CCV:</label>
 <input class="input toleft ccv" placeholder="321" readonly>
  </div>
  <div class="receipt">
    <div class="col1">
    <!-- <h2 class="cost">$400</h2><br> -->

    </div>



</div>			
					<?php
include_once('footer.php');
?>	
