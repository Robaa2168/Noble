<?php

//Database Configuration File
define('DB_HOST','localhost'); // Host name
define('DB_USER','root'); // db user name
define('DB_PASS',''); // db user password name
define('DB_NAME','Nurucoin'); // db name
// Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS);
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}

$errors = array();
	// variable declaration
  function getRealUserIp(){
      switch(true){
        case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
        case (!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
        case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
        default : return $_SERVER['REMOTE_ADDR'];
      }
   }

date_default_timezone_set("Africa/Lusaka");
if (isset($_POST['register'])) {
  $remoteip = $_SERVER['REMOTE_ADDR'];
  $customer_username =$_POST['username'];
  $First_name =$_POST['First_name'];
  $customer_email =$_POST['customer_email'];
  $refer =$_GET['ref'];
  $password_1 =$_POST['password_1'];
  $password_2 =$_POST['password_2'];
  $encrypted_password = password_hash($password_1, PASSWORD_DEFAULT);
  $customer_contact = $_POST['phone'];
  $create_datetime = date("Y-m-d H:i:s");
  $customer_confirm_code = mt_rand();
  $c_ip = getRealUserIp();
  $Loan = mt_rand(1000,20000);
    if ($password_1 != $password_2) {
  	array_push($errors, "The two passwords do not match");
    }
    else {
      // code...

// Query for validation of username and email-id
$ret="SELECT * FROM customers where (customer_email=:customer_email) ";
$queryt = $dbh -> prepare($ret);

$queryt->bindParam(':customer_email',$customer_email,PDO::PARAM_STR);
$queryt -> execute();
$results = $queryt -> fetchAll(PDO::FETCH_OBJ);
if($queryt -> rowCount() == 0)
{
// Query for Insertion
$sql="INSERT INTO customers (username,customer_name,customer_email,customer_pass,customer_contact,customer_ip,
customer_confirm_code,Loan,Created,referral) 
VALUES(:username,:customer_name,:customer_email,:encrypted_password,:customer_contact,
:customer_ip,:customer_confirm_code,:Loan,:Created,:referral)";
$query = $dbh->prepare($sql);
// Binding Post Values
$query->bindParam(':username',$customer_username,PDO::PARAM_STR);
$query->bindParam(':customer_name',$First_name,PDO::PARAM_STR);
$query->bindParam(':customer_email',$customer_email,PDO::PARAM_STR);
$query->bindParam(':encrypted_password',$encrypted_password,PDO::PARAM_STR);

$query->bindParam(':customer_contact',$customer_contact,PDO::PARAM_STR);
$query->bindParam(':customer_ip',$c_ip,PDO::PARAM_STR);
$query->bindParam(':customer_confirm_code',$customer_confirm_code,PDO::PARAM_STR);
$query->bindParam(':Loan',$Loan,PDO::PARAM_STR);
$query->bindParam(':Created',$create_datetime,PDO::PARAM_STR);
$query->bindParam(':referral',$refer,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
	header('location: index.php');
}

else
{
  	array_push($errors, "Something went wrong.Please try again");

}
}
 else
{
  array_push($errors,"Username or Email-id already exist.<br> Please try another");
}
}
}
?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />
	<script src="assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/icons.css" rel="stylesheet">
	<title>Noble-Investments</title>
</head>

<body class="bg-login">
	<!--wrapper-->
	<div class="wrapper">
		<div class="d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
					<div class="col mx-auto">
						<div class="my-4 text-center">
							<img src="assets/images/logo-img.png" width="180" alt="" />
						</div>
						<div class="card">
							<div class="card-body">
								<div class="border p-4 rounded">
									<div class="text-center">
										<h3 class="">Sign Up</h3>
										<p>Already have an account? <a href="index.php">Sign in here</a>
										</p>
									</div>
									<?php if (count($errors) > 0) : ?>
            <div class="alert alert-warning m-2 p-2" role="alert">
            <?php foreach ($errors as $error) : ?>
    <span class="alert-icon"><i class="ni ni-send"></i></span>
    <span class="alert-text"><strong>Warning!</strong><?php echo $error ?></span>
    
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php endforeach ?>
<?php endif ?>
									<div class="d-grid">
										<a class="btn my-4 shadow-sm btn-white" href="javascript:;"> <span class="d-flex justify-content-center align-items-center">
                          <img class="me-2" src="assets/images/icons/search.svg" width="16" alt="">
                          <span>Sign Up with Google</span>
											</span>
										</a> <a href="javascript:;" class="btn btn-facebook"><i class="bx bxl-facebook"></i>Sign Up with Facebook</a>
									</div>
									<div class="login-separater text-center mb-4"> <span>OR SIGN UP WITH EMAIL</span>
										<hr/>
									</div>
									<div class="form-body">
										<form class="row g-3" role="form" method="post" action="">
											<div class="col-sm-6">
												<label for="inputFirstName" class="form-label">First Name</label>
												<input type="text" name="First_name" class="form-control"
												 id="inputFirstName" placeholder="First Name" required >
											</div>
											<div class="col-sm-6">
												<label for="inputLastName" class="form-label">Last Name</label>
												<input type="text" name="Last_name" class="form-control"
												 id="inputLastName" placeholder="Last Name" required>
											</div>
											<div class="col-sm-6">
												<label for="inputFirstName" class="form-label">Username</label>
												<input type="text" name="username" class="form-control"
												 id="inputFirstName" placeholder="username" required >
											</div>
											<div class="col-sm-6">
												<label for="inputLastName" class="form-label">Phone Number</label>
												<input type="tel" name="phone" class="form-control"
												 id="inputLastName" placeholder="Phone Number" required>
											</div>
											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">Email Address</label>
												<input type="email" name="customer_email" class="form-control" 
												id="inputEmailAddress" placeholder="example@user.com" required>
											</div>
											<div class="col-12">
												<label for="inputChoosePassword" class="form-label">Password</label>
												<div class="input-group" id="show_hide_password">
													<input type="password"  name= "password_1" class="form-control border-end-0" 
													id="inputChoosePassword"  placeholder="Enter Password" required> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
												</div>
												<div class="col-12">
												<label for="inputChoosePassword" class="form-label">Password</label>
												<div class="input-group" id="show_hide_password">
													<input type="password"  name= "password_2" class="form-control border-end-0" 
													id="inputChoosePassword"  placeholder="Enter Password" required> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
												</div>
											</div>
											<div class="col-12">
												<label for="inputSelectCountry" class="form-label">Country</label>
												<select class="form-select" id="inputSelectCountry" aria-label="Default select example">
													<option selected>Kenya</option>
													<option value="1">Uganda</option>
													<option value="2">Tanzania</option>
													<!-- <option value="3">Dubai</option> -->
												</select>
											</div>
											<div class="col-12">
												<div class="form-check form-switch">
													<input class="form-check-input" type="checkbox" 
													id="flexSwitchCheckChecked" checked>
													<label class="form-check-label" for="flexSwitchCheckChecked">I read and agree to Terms & Conditions</label>
												</div>
											</div>
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" name="register"class="btn btn-primary"><i class='bx bx-user'></i>Sign up</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<!--Password show & hide js -->
	<script>
		$(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
	</script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>
</body>


<!-- Mirrored from codervent.com/rukada/demo/vertical/authentication-signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 10 Apr 2021 20:23:03 GMT -->
</html>