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
								
							</div>
							<div class="font-22 ms-auto"><i class='bx bx-dots-horizontal-rounded'></i>
							</div>
						</div>
						<hr/>
						<div class="table-responsive">
							<table class="table align-middle mb-0">
								<thead class="table-light">
									<tr>
										<th>Name</th>
										<th>Amount</th>
										<th>Action</th>
									
									</tr>
								</thead>
								<tbody>
                                <?php 
  
 
  // SQL query to select data from database 
  $sql = "SELECT * FROM referral WHERE order_status = $customer_confirm_code "; 
  $result = $conn->query($sql); 
  
  ?> 
  
                        <?php   // LOOP TILL END OF DATA  
                while($rows=$result->fetch_assoc()) 
            
                { 
             ?>
         <tr>
                    <th scope="row">
                    <?php echo $rows['username'];?>
                    </th>
                    <td>
                    <?php echo $rows['earning'];?>
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-warning"></i>
                        <?php 
                     
                        if($rows['initial']== 0){
                          ?>
                        <div class="d-flex align-items-center text-danger">
						<i class='bx bx-radio-circle-marked bx-burst bx-rotate-90 align-middle font-18 me-1'></i>
												<span>Pending</span>
											</div>  
                        <?php 
                        } else{
					  ?>
					 <div class="badge rounded-pill text-info bg-light-info p-2 text-uppercase px-3">
									<i class='bx bxs-circle align-middle me-1'></i>fulfilled</div></td>
									
					 
					  
                  
                  <?php
                     } ?>
                    </td>
					
                  
						
									</tr>
									
								</tbody>
                                <?php
                     } ?>
							</table>
						</div>
					</div>
				</div>
			</div>
        </div>
        
		<?php
                include_once('footer.php')
                ?>