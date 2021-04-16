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
								<h5 class="mb-0">All users</h5>
							</div>
							<div class="font-22 ms-auto"><i class='bx bx-dots-horizontal-rounded'></i>
							</div>
						</div>
						<hr/>
						<div class="table-responsive">
							<table class="table align-middle mb-0">
								<thead class="table-light">
									<tr>
                                    <th>Username</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Wallet</th>
                <th>Status</th>
                <th>view</th>
                <th>Add</th>
									</tr>
								</thead>
								<tbody>
                                <?php
      // SQL query to select data from database 
  $sql =  "SELECT * from customers ORDER BY Created DESC "; 
  $result = $conn->query($sql); 
  
  ?> 
  
                        <?php   // LOOP TILL END OF DATA  
                while($rows=$result->fetch_assoc()) 
            
                { 
             ?>
        
							
                  <tr>
                   
                <td> <?php echo $rows['username'];?></td>
                <td> <?php echo $rows['customer_email'];?></td>
                <td> <?php echo $rows['customer_contact'];?></td>
                <td> <?php echo $rows['Savings'];?></td>
                <td>  <?php if ($rows['customer_role'] == 0){ ?>
                  <span class="badge badge-dot ">
                        <i class="bg-warning"></i>
                        <a type="button" href="block.php?ad=<?php echo $rows['customer_id'];?>"
                        class="btn btn-outline-warning btn btn-sm text-warning">Block</a>
                      
              
                       <?php } elseif ($rows['customer_role'] == 4) { ?> 
                        <span class="badge badge-dot ">
                        <i class="bg-info"></i>
                        <a type="button" href="#"
                        class="btn btn-outline-info btn btn-sm text-info">Admin</a>
                      
  
  <?php }
  else{
   ?>     
              <span class="badge badge-dot ">
                        <i class="bg-info"></i>
                        <a type="button" href="unblock.php?ad=<?php echo $rows['customer_id'];?>"
                        class="btn btn-outline-danger btn btn-sm text-danger">Unblock</a>
  <?php } ?>  
                
               </td><td>
               <td>  <span class="badge badge-dot ">
                        <i class="bg-success"></i>
                        <a type="button" href="admin_prof.php?vw=<?php echo $rows['customer_id'];?>"
                        class="btn btn-outline-success btn btn-sm text-success">View</a></td>
                        <td> 
                        <span class="badge badge-dot ">
                        <i class="bg-success"></i>
                        <a type="button" href="add_wallet.php?ad=<?php echo $rows['customer_id'];?>"
                        class="btn btn-outline-success btn btn-sm text-success">Add</a></td>
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
        
		<?php
                include_once('footer.php')
                ?>