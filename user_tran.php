<?php
require_once('connection.php');
?>
<?php
include_once('sidebar.php');
?>
		<div class="page-wrapper">
			<div class="page-content">
				
				<!--end row-->
				<div class="card radius-10">
					<div class="card-body">
						<div class="d-flex align-items-center">
							<div>
								<h5 class="mb-0">Sold shares</h5>
							</div>
							<div class="font-22 ms-auto"><i class='bx bx-dots-horizontal-rounded'></i>
							</div>
						</div>
						<hr/>
						<div class="table-responsive">
							<table class="table align-middle mb-0">
								<thead class="table-light">
									<tr>
										<th>Order id</th>
										<th>Amount</th>
										<th>Due-date</th>
										<th>Received</th>
										<th>Pending</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
								<?php 
  
 
  // SQL query to select data from database 
  $sql = "SELECT * FROM coins WHERE customer_id = $customer_idi AND control_bal = 0 ORDER BY  order_date DESC "; 
  $result = $conn->query($sql); 
  
  ?> 
  
                        <?php   // LOOP TILL END OF DATA  
           
                while($rows = mysqli_fetch_array($result))  
                { 
                
             ?>
         
									<tr>
									<td>
                   #os-<?php echo $rows['invoice_no'];?>
                    </td>
                    <td>
                    <?php echo $rows['order_total'];?>
                    </td>
                    <td>
                    <?php echo $rows['due_date'];?>

   
                    </td>
                    <td>
                    <?php echo $rows['order_total'] - $rows['total_balance'];?>
                    </td>
                    <td>
                    <?php echo $rows['total_balance'];?>
                    </td>
   
                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-warning"></i>
                        <?php 
                        date_default_timezone_set("Africa/Nairobi");
                        $date = $rows['due_date'];
                        if($date > date('Y-m-d H:i:s')){
                          ?>
                        <div class="d-flex align-items-center text-danger">
						<i class='bx bx-radio-circle-marked bx-burst bx-rotate-90 align-middle font-18 me-1'></i>
												<span>Pending</span>
											</div>  
                        <?php 
                        } else{
					  ?>
					  <div class="badge rounded-pill text-success bg-light-success p-2 text-uppercase px-3">
						  <i class='bx bxs-circle align-middle me-1'></i>completed</div>
						</td>
					 
					  
                  
                  <?php
                     } ?>
                    </td>
					<td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-warning"></i>
                        <?php 
                        date_default_timezone_set("Africa/Nairobi");
                        $date = $rows['due_date'];
                        if($date > date('Y-m-d H:i:s')){
                          ?>
                        <div class="d-flex align-items-center text-info">
						<i class='bx bx-radio-circle-marked bx-burst bx-rotate-90 align-middle font-18 me-1'></i>
												<span>In progress</span>
											</div>  
                        <?php 
                        } else{
					  ?>
					  
					  <div class="d-flex align-items-center text-success">
						
						<a type="button" href="app-invoice.php?id=<?php echo $rows['order_id'];?>"
					   class="btn btn-outline-success btn btn-sm text-success">Details</a>
											</div>
                     
					  
                  
                  <?php
                     } ?>
                    </td>
                  
						
									</tr>
									
								</tbody>
								<?php 
                } 
             ?> 
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		<?PHP include_once('footer.php') ?>