<?php
 include('connection.php'); 


$result = mysqli_query($conn,"SELECT * FROM booking");
echo "<center>
 <table border='5'>
<tr>
<th>Name</th>
<th>Mobile Number</th>
<th>Movie Name</th>
<th>Screen Name</th>
<th>Seat Count</th>
<th>Price</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['name'] . "</td>";
echo "<td>" . $row['mobile no'] . "</td>";
echo "<td>" . $row['movie'] . "</td>";
echo "<td>" . $row['screen'] . "</td>";
echo "<td>" . $row['seatcount'] . "</td>";
echo "<td>" . $row['price'] . "</td>";
echo "</tr>";
}
echo "</table>";

mysqli_close($conn);
?>


