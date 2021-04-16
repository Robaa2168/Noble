<?php
    session_start();
    if(!isset($_SESSION["customer_email"])) {
        header("location:index.php");
      }
      $con = mysqli_connect("localhost", "root", "", "Nurucoin") or die("connection failed".mysqli_connect_error());
 
  $conn = mysqli_connect("localhost", "root", "", "Nurucoin") or die("connection failed".mysqli_connect_error());
    $user = $_SESSION["customer_email"];
    $query = "SELECT * from customers where customer_email='$user'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        if($row = mysqli_fetch_assoc($result)) {
            $totalmon=$row['Savings'];
            $referral=$row['referral'];
            $customer_contact=$row['customer_contact'];
            $customer_username=$row['username'];
            $customer_email=$row['customer_email'];
            $customer_fname=$row['customer_name'];
            $customer_idi=$row['customer_id'];
            $created=$row['Created'];
            $customer_confirm_code=$row['customer_confirm_code'];
      

                    }
    }

// DB credentials.
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
?>
