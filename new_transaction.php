<?php
require_once('connection.php');
$errors = array();
date_default_timezone_set("Africa/Nairobi");
if (isset($_POST['submit'])) {
    
  $Amount =$_POST['wallet'];
  $username1 =$_POST['username'];
  $query5 = "SELECT * from customers where username='$username1'";
  $result5 = mysqli_query($conn, $query5);

  if (mysqli_num_rows($result5) > 0) {
      if($row = mysqli_fetch_assoc($result5)) {
          $totalmon12=$row['Savings'];
          $referral=$row['referral'];
          $customer_contact12=$row['customer_contact'];
          $customer_username12=$row['username'];
          $customer_email12=$row['customer_email'];
          $customer_fname12=$row['customer_name'];
          $customer_idi12=$row['customer_id'];
          $customer_confirm_code12=$row['customer_confirm_code'];
          $zero = 0 ;
        

                  }
  }
    $payment=(round((1.30*$Amount),0,PHP_ROUND_HALF_DOWN));
    $wallet5 = ($totalmon + (0.03*$Amount));

  $create_datetime = date("Y-m-d H:i:s");
  $due_date = date("Y-m-d H:i:s", strtotime("+ 4 days"));
  $random= mt_rand(4000,20000);
  
  if (empty($Amount)) { array_push($errors, "Amount required"); }   else {
    // code...

// Query for validation of username and email-id
$ret="SELECT * FROM customers where (customer_email=:customer_email) ";
$queryt = $dbh -> prepare($ret);

$queryt->bindParam(':customer_email',$customer_email,PDO::PARAM_STR);
$queryt -> execute();
$results = $queryt -> fetchAll(PDO::FETCH_OBJ);
if($queryt -> rowCount() == 1 )
{
  //Query for Insertion
$sql="INSERT INTO coins (customer_id,invoice_no,phone,
order_cost,cost_balance,order_date,due_date,order_total,total_balance,control_bal,Customer_email)
VALUES(:customer_id,:invoice_no,:phone,:order_cost,:cost_balance,:order_date,:due_date,:order_total,:total_balance,:control_bal,:Customer_email)";
$query = $dbh->prepare($sql);
// Binding Post Values
$query->bindParam(':customer_id',$customer_idi12,PDO::PARAM_STR);
$query->bindParam(':invoice_no',$random,PDO::PARAM_STR);
$query->bindParam(':phone',$customer_contact12,PDO::PARAM_STR);
$query->bindParam(':order_cost',$Amount,PDO::PARAM_STR);
$query->bindParam(':cost_balance',$Amount,PDO::PARAM_STR);
$query->bindParam(':order_date',$create_datetime,PDO::PARAM_STR); 
$query->bindParam(':due_date',$due_date,PDO::PARAM_STR); 
$query->bindParam(':order_total',$Amount,PDO::PARAM_STR);
$query->bindParam(':total_balance',$Amount,PDO::PARAM_STR);
$query->bindParam(':control_bal',$zero,PDO::PARAM_STR);
$query->bindParam(':Customer_email',$customer_username12,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
  
if($lastInsertId)
{
    header('location: admin_investments.php');
}

    else
{
  array_push($errors,"username doesn't exist");

}}}
}?>
<?php include_once ('admin_sidebar.php') ?>

<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Forms</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Transaction</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<button type="button" class="btn btn-primary">Settings</button>
							<button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">
                                	<a class="dropdown-item" href="javascript:;">Action</a>
								<a class="dropdown-item" href="javascript:;">Another action</a>
								<a class="dropdown-item" href="javascript:;">Something else here</a>
                                <div class="dropdown-divider"></div>
                                	<a class="dropdown-item" href="javascript:;">Separated link</a>
                            </div>

						</div>
					</div>
				</div>
				<!--end breadcrumb-->
				<div class="row">
					<div class="col-xl-7 mx-auto">
						<h6 class="mb-0 text-uppercase">Admin Transaction</h6>
						<hr/>
						<div class="card border-top border-0 border-4 border-primary">
							<div class="card-body p-5">
								<div class="card-title d-flex align-items-center">
									<div><i class="bx bxs-user me-1 font-22 text-primary"></i>
									</div>
									<h5 class="mb-0 text-primary">Admin Transaction</h5>
								</div>
								<hr>
								<form class="row g-3" role="form" action="" method="post">
                                <?php if (count($errors) > 0) : ?>
            <div class="alert alert-warning m-2 p-2" role="alert">
            <?php foreach ($errors as $error) : ?>
    <span class="alert-icon"><i class="ni ni-send"></i></span>
    <span class="alert-text"><strong>Warning!</strong><?php echo $error ?></span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php endforeach ?>
        <?php endif ?>
									<div class="col-md-6">
										<label for="inputFirstName" class="form-label">Username</label>
										<input type="text" class="form-control"name="username" placeholder="username" required>
									</div>
									<div class="col-md-6">
										<label for="inputLastName" class="form-label">Amount</label>
										<input type="text" class="form-control"  name="wallet" placeholder="Amount" required>
									</div>
									
									<div class="col-12">
										<button type="submit" name="submit" class="btn btn-primary px-5">complete</button>
									</div>
								</form>
							</div>
						</div>
		<?php include_once('footer.php') ?>