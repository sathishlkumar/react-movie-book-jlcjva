<?php      
    include('connection.php');  
	$movie_cust = $_POST['movie'];  
    $screen_cust = $_POST['screen'];  
   $username_cust = $_POST['user'];  
    $mobile_cust = $_POST['mobile']; 
    $count_cust = $_POST['totalCount'];  
    $total_cust = $_POST['totalprice']; 
      
$sql = "INSERT INTO booking (`name`, `mobile no`, `movie`, `screen`, `seatcount`, `price`)  VALUES ('$username_cust','$mobile_cust','$movie_cust','$screen_cust','$count_cust','$total_cust')";

if (mysqli_query($conn, $sql)){
  echo "Booked successfully";
} else {
  echo "Error: ";
}


       ?>