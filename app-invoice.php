<?php
require_once('connection.php');
?>
<?php
include_once('sidebar.php');
?>	
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





				<?php

    $refer =$_GET['id'];
    $query = "SELECT * from pairs where order_no='$refer'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        if($row = mysqli_fetch_assoc($result)) {

#$payment_status=$row['payment_status'];
#$contact_sell=$row['payment_status'];
$pay=$row['order_cost'];
$customer_email1=$row['Customer_email'];

                    }
    }

  
    ?>
<?php
 $queryf = "SELECT * from coins where order_id='$refer'";
 $resultsf = mysqli_query($conn, $queryf);

 if (mysqli_num_rows($resultsf) > 0) {
     if($row = mysqli_fetch_assoc($resultsf)) {
$phone2=$row['phone'];
$customer_id3=$row['customer_id'];
$invoice=$row['invoice_no'];
$due=$row['due_date'];
$customer_email2=$row['Customer_email'];
     }

                 }
                 ?>
                 <?php
                 $querysell = "SELECT * from customers where customer_id=$customer_id3";
                 $resultsell = mysqli_query($conn, $querysell);
                
                 if (mysqli_num_rows($result) > 0) {
                     if($row = mysqli_fetch_assoc($resultsell)) {
                $customer_first =$row['customer_name'];
                $customer_email3=$row['customer_email'];
                     }
                
                                 }
								 ?>
								 								<?php
$sql12 =  "SELECT * from coins where  order_id= '$refer'"; 
  $result = $conn->query($sql12); 
  
  ?> 
  
                        <?php   // LOOP TILL END OF DATA  
                while($rows=$result->fetch_assoc()) 
               
            
                {

					$invoice_user  = $rows['invoice_no'];
					$receiver_num = $rows['phone'];
					$receiver_name = $rows['Customer_email'];
				 }
             ?>
 
 <?php 
  
 
  // SQL query to select data from database 
  $sql15 =  "SELECT * from pairs where  order_no = '$refer'"; 
  $result = $conn->query($sql15); 
  
  ?> 
  
                        <?php   // LOOP TILL END OF DATA  
                while($rows=$result->fetch_assoc()) 
               
            
                { 
             ?>
				<!--end breadcrumb-->
				<div class="card">
					<div class="card-body">
						<div id="invoice">
							<div class="toolbar hidden-print">
								<div class="text-end">
								<td>
									<div class="badge rounded-pill text-info bg-light-info p-2 text-uppercase px-3">
									<i class='bx bxs-circle align-middle me-1'></i> <?php echo $rows['payment_status'];?></div></td>
									
								
									

<span class="badge badge-dot mr-4">
<?php

 if ($rows['payment_status'] == "pending"){ ?>
                        <i class="bg-warning"></i>
                      
					   <a type="button" href="confirm.php?id=<?php echo $rows['pair_id'];?>"
					   class="btn btn-outline-warning btn btn-sm text-warning" name="confirm">Confirm </a>
                       </div>
                       <?php } else { ?> 
               
  <a type="button" href=""class="btn btn-outline-success btn btn-sm text-success" name="confirmed">confirmed</a>
  </div>
<?php } ?>         
                       
    
    
								<hr/>
							</div>
							<div class="">
								<div>
									<header>
										<div class="row">
											<div class="col">
												<a href="javascript:;">
													<img src="assets/images/logo-icon.png" width="80" alt="" />
												</a>
											</div>
											<div class="col company-details">
												<h2 class="name">
									<a  href="javascript:;">
									Noble
									</a>
								</h2>
												
												<div class="text-gray-light">INVOICE FROM:</div>
				

<div>Invoice:#<?php echo $invoice_user?></div>
<div>Username: <?php echo $receiver_name;?></div>
<div> <strong> Phone: <?php echo $receiver_num?> </strong> </div>

			
											</div>
										</div>
									</header>
									<main>
										<div class="row contacts">
											<div class="col invoice-to">
												<div class="text-gray-light">INVOICE TO:</div>
												<h2 class="to"><?php echo $rows['Customer_email'];?></h2>
												<div class="address"><?php echo $rows['phone'];?></div>
												<div class="email"><a href="">john@example.com</a>
												</div>
											</div>
											<div class="col invoice-details">
												<h1 class="invoice-id">INVOICE</h1>
												<div class="date">Date of Invoice: 01/10/2018</div>
												<div class="date">Due Date: 30/10/2018</div>
											</div>
										</div>
										<hr>
										<div class="notices"> </div>
											<div>NOTICE:</div>
											<div class="notice">In cases where transaction takes long kinldy contact us .</div>
										</div>
									</main>
								
						</div>
					</div>
				</div>
			</div>
		
		<?php 
                }
				?>  
				</div>
				<?php
include_once('footer.php');
?>	