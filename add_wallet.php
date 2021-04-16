<?php
require_once('connection.php');
$query = "SELECT * from customers where `customer_id`='".$_GET['ad']."'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    if($row = mysqli_fetch_assoc($result)) {
        $totalmon2=$row['Savings'];

                }
}

if (isset($_POST['btn2'])) {
 
    $Added =$_POST['wallet'];
    $total= $totalmon2 + $Added;
$refer =$_GET['ad'];
}
extract($_POST);
if (empty($Added)) { array_push($errors, "Email is required"); }else{
$q1="UPDATE `customers` SET `Savings`='$total' WHERE `customer_id`='".$_GET['ad']."'";
   
if ($conn->query($q1) === TRUE) {
?>
<script>
alert('Added successfully')
</script>
<script>

window.location = "admin_users.php";
</script>
<?php  } else { ?>
    <script>
alert('Something went wrong')
</script>
<?php }
} ?>
<?php include_once('admin_sidebar.php')?>
<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Applications</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Invoice</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<button type="button" class="btn btn-primary">Settings</button>
							<button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">
								<!--	<a class="dropdown-item" href="javascript:;">Action</a>
								<a class="dropdown-item" href="javascript:;">Another action</a>
								<a class="dropdown-item" href="javascript:;">Something else here</a>
								<div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
							</div>
-->
</div>
						</div>
					</div>
				</div>
   
            <div class="col-12">
    <form  method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Amount</label>
    <input type="number" class="form-control" name="wallet" placeholder="Amount" required>

  </div>
  <div class="form-group"> <br>
  <button type="submit" name="btn2" class="btn btn-primary">Submit</button>
  </div>
</form>
</div>


<?php include_once('footer.php')?>