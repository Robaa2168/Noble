<?php
require_once('connection.php');
?>
<?php
include_once('sidebar.php');
?>

<style> 
@import url('https://fonts.googleapis.com/css?family=Karla:400,700');

body {
  padding: 20px;
  margin: 0;
  color: #04048c;
  font-family: 'Karla', sans-serif;
  
  .background {
    background-image: linear-gradient( 135deg, #ABDCFF 10%, #0396FF 100%);
    height: calc(100vh - 20px * 2);
    border-radius: 5px;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  
  .clipboard {
    border: 0;
    padding: 15px;
    border-radius: 3px;
    background-image: linear-gradient( 135deg, #FDEB71 10%, #F8D800 100%);
    cursor: pointer;
    color: #04048c;
    font-family: 'Karla', sans-serif;
    font-size: 16px;
    position: relative;
    top: 0;
    transition: all .2s ease;
    &:hover {
      top: 2px;
    }
  }
  
  p {
    font-weight: 700;
  }
}
</style>



		<div class="page-wrapper">
			<div class="page-content">
				
				<!--end row-->
				<div class="card radius-10">
					<div class="card-body">
						<div class="d-flex align-items-center">
						
                        <button class="clipboard">Click me to copy current Url</button>
  <p>click to copy</p>

							
							<div class="font-22 ms-auto"><i class='bx bx-dots-horizontal-rounded'></i>
							</div>
						</div>
						<hr/>
						<div class="table-responsive">
							<table class="table align-middle mb-0">
								<thead class="table-light">
									<tr>
                                    <th scope="col" class="sort" data-sort="name">Username</th>
                    <th scope="col" class="sort" data-sort="budget">Contact</th>
                    <th scope="col" class="sort" data-sort="status">Created</th>
									</tr>
                                </thead>
                                <tbody>
                                <?php 
  
 
  // SQL query to select data from database 
  $sql = "SELECT * FROM customers WHERE referral = $customer_confirm_code ORDER BY Created DESC "; 
  $result = $conn->query($sql); 
  
  ?> 
  
                        <?php   // LOOP TILL END OF DATA  
                while($rows=$result->fetch_assoc()) 
            
            
                { 				  
                    ?>
                            <th scope="row">
                    <?php echo $rows['username'];?>
                    </th>
                    <td>
                    <?php echo $rows['customer_contact'];?>
                    </td>
                    <td>
                    <?php echo $rows['Created'];?>
                                                  
   
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
                <script>
                    var $temp = $("<input>");
var $url = $(location).attr('href');

$('.clipboard').on('click', function() {
  $("body").append($temp);
  $temp.val($url).select();
  document.execCommand("copy");
  $temp.remove();
  $("p").text("URL copied!");
})
                </script>