<?php
require_once('connection.php');
?>


<?php
require_once('connection.php');

if (isset($_POST['btn2'])) {
 
  $mobile =$_POST['mobile'];
  $total= $totalmon + $Added;

}
extract($_POST);
if (empty($mobile)) { array_push($errors, "Email is required"); }else{
$q1="UPDATE `customers` SET `customer_contact`='$mobile' WHERE `customer_id`='".$_GET['vw']."'";
 
if ($conn->query($q1) === TRUE) {
?>
<script>
alert('Added successfully')
</script>
<script>

window.location = "views.php";
</script>
<?php  } else { ?>
  <script>
alert('Something went wrong')
</script>
<?php }
} ?>
<?php
    
    $user = $_SESSION["customer_email"];
    $refer =$_GET['vw'];
    $query = "SELECT * from customers where customer_id='$refer'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        if($row = mysqli_fetch_assoc($result)) {
            $customer_idi9=$row['customer_id'];
            $totalmon9=$row['Savings'];
            $customer_contact9=$row['customer_contact'];
            $customer_username9=$row['username'];
            $customer_email9=$row['customer_email'];
            $customer_fname9=$row['customer_name'];

                    }
    }

  
    ?>
<?php
include_once('admin_sidebar.php');
?>
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">User Profile</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">User <strong> 
                                <?php echo strtoupper("$customer_username9");?> </strong></li>
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
				<style >
				.card3{
	z-index:99;
	box-shadow: 2px 7px 30px red;
}
</style>
				<!--end breadcrumb-->
				<div class="container">
					<div class="main-body">
						<div class="row">
							<div class="col-lg-4">
								<div class="card card3" 
								style=" background-image: url('assets/images/avatars/gradient.jpg');">
									<div class="card-body">
										<div class="d-flex flex-column align-items-center text-center">
											<img src="assets/images/avatars/kenyan.jpg" alt="user" class="rounded-circle p-1 bg-primary" width="110">
											<div class="mt-3">
												<h4><?php echo strtoupper("$customer_username9");?></h4>
												<p class="text-secondary mb-1">crypto::</p>
												
												<button class="btn btn-sm btn-info ">Telegram</button>
												<button class="btn btn-sm btn-success">Whatsapp</button>
											</div>
										</div>
										<hr class="my-4"/>
										<ul class="list-group list-group-flush">
											<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
												<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg"
												 width="24" height="24" viewBox="0 0 24 24" fill="none" 
												 stroke="currentColor" stroke-width="2" stroke-linecap="round" 
												 stroke-linejoin="round" class="feather feather-globe me-2 icon-inline">
												 <circle cx="12" cy="12" r="10"></circle><line x1="2" 
												 y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
												</svg>Link</h6>
												<span class="text-secondary">
								https://noble-investments.org?ref=<?php echo "$customer_confirm_code";?></span>
</span>
											</li>
											
											<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
												<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter me-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
												<span class="text-secondary">@noble</span>
											</li>
											<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
												<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram me-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
												<span class="text-secondary">noble</span>
											</li>
											<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
												<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook me-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
												<span class="text-secondary">noble</span>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-lg-8">
								<div class="card">
									<div class="card-body">
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Full Name</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" 
												placeholder="<?php echo "$customer_fname9";?>" readonly >
												
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Username</h6>
											</div>
											<div class="col-sm-9 text-secondary">
                                                <input type="text" class="form-control" 
                                                placeholder="<?php echo "$customer_username9";?>" readonly>
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Email</h6>
											</div>
											<div class="col-sm-9 text-secondary">
                                                <input type="text" class="form-control"
                                                 placeholder="<?php echo "$customer_email9";?>" readonly>
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Phone</h6>
											</div>
											<div class="col-sm-9 text-secondary">
                                                <input type="text" class="form-control"
                                                value="<?php echo "$customer_contact9"?>" type="text" readonly>
											</div>
										</div>
										
									
										<div class="row">
											<div class="col-sm-3"></div>
											<div class="col-sm-9 text-secondary">
												<input type="button" class="btn btn-primary px-4" value="Save Changes" disabled/>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="card d-none d-md-inline-block">
											<div class="card-body">
												<h5 class="d-flex align-items-center mb-3">Project Status</h5>
											
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
	<?php include_once('footer.php') ?>