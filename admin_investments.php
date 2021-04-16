<?php
require_once('connection.php');
?>
<?php
include_once('admin_sidebar.php');
?>
		<div class="page-wrapper">
			<div class="page-content">
				
				<!--end row-->
				<div class="card radius-10">
					<div class="card-body">
						<div class="d-flex align-items-center">
							<div>
								<h5 class="mb-0">All investments</h5>
							</div>
							<div class="font-22 ms-auto"><i class='bx bx-dots-horizontal-rounded'></i>
							</div>
						</div>
						<hr/>
						<div class="table-responsive">
							<table class="table align-middle mb-0">
								<thead class="table-light">
									<tr>
                  <th>Tickets</th>
                <th>Username</th>
                <th>Invested</th>
                <th>Expects</th>
               
                <th>Balance</th>
                <th>Delete</th>
                <th>status</th>
                <th>start</th>
                <th>End</th>
               
									</tr>
								</thead>
								<tbody>
							  <?php
      // SQL query to select data from database 
  $sql =  "SELECT * from coins  ORDER BY due_date ASC "; 
  $result = $conn->query($sql); 
  $i=0;
                while($rows=$result->fetch_assoc()) 
            
                { 
             ?>
            <tr>
                <th> #<?php echo $rows['invoice_no'];?></th>
                <td> <?php echo $rows['Customer_email'];?></td>
                <td> <?php echo $rows['order_cost'];?></td>
                <td> <?php echo $rows['order_total'];?></td>
                <td> <?php echo $rows['total_balance'];?></td>
                <td>   <span class="badge badge-dot ">
                        <i class="bg-danger"></i>
                        <a type="button" href="del_transaction.php?ad=<?php echo $rows['order_id'];?>"
                        class="btn btn-outline-danger btn btn-sm text-danger">Delete</a> </td>
                <td>  <?php if ($rows['total_balance'] == 0){ ?>
                  <span class="badge badge-dot ">
                        <i class="bg-success"></i>
                        <a type="button" href=""
                        class="btn btn-outline-success btn btn-sm text-success">completed</a>
                      
              
                       <?php } elseif($rows['due_date'] > date("Y-m-d H:i:s")) { ?> 
                        <span class="badge badge-dot ">
                        <i class="bg-info"></i>
                        <a type="button" href="validate.php?ad=<?php echo $rows['order_id'];?>"
                        class="btn btn-outline-info btn btn-sm text-info">Validate</a>
                      
  
  <?php } 
  else{?>     
   <span class="badge badge-dot ">
                        <i class="bg-warning"></i>
                        <a type="button" href=""
                        class="btn btn-outline-warning btn btn-sm text-warning">Pending</a>
  <?php }
             ?>
               </td>
               <td> <?php echo $rows['order_date'];?></td>
               <td> <?php echo $rows['due_date'];?></td>
  </tbody>
  <?php 
  $i++;
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