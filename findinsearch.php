<link rel="stylesheet" href="workerpgcss.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

<div class="main-box">
<div class="box">

<h1 class="h1main">Studio8</h1>

<form class="h2text">
    <select class="h2text" name="Type">
        <option value="Delivery">Delivery</option>
    </select>
</form>

<?php
$con=mysqli_connect("localhost","root","","studio8");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

function start_table(){
    echo "<h2>The results:</h2>
        <table border='0' align='center'>
            <tr>
                <td width='75'>Order ID</td>
                <td>Package Weight</td>
                <td>Delivery Status</td>
                <td>Tracking Number</td>
                <td>Delivery Date</td>
                <td>Receive Date</td>
                <td>Responisble Employee ID</td>
            </tr>";
}

$textsearch = mysqli_escape_string($con, $_GET['textsearch']);
$searchfrom = mysqli_escape_string($con, $_GET['from']);
//check empty
if(empty($_GET['textsearch'])){
	echo "<h1>To search for something, Please input item to search for.</h1>" ;
}elseif($searchfrom == "1"){
    $sql = "SELECT * FROM delivery WHERE order_ID='$textsearch' ";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0){
        start_table();
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>" .$row["order_ID"]. "</td>";
            echo "<td>" .$row["weight"]. "</td>";
            echo "<td align='center'>" .$row["d_status"]. "</td>";
            echo "<td>" .$row["track_no"]. "</td>";
            echo "<td>" .$row["due_date"]. "</td>";
            echo "<td>" .$row["got_date"]. "</td>";
            echo "<td align='center'>" .$row["employee_ID"]. "</td>";
            //echo "<form name="deldeliver" action="deldelivery.php" method="post">";
            //echo "<td><input name='delete' type='submit' value='Delete'></td>";
            //echo "</form>";
            echo "</tr>";
        }
    }else{
        echo "<h2>No results found.</h2>";
    }
}elseif($searchfrom == "2"){
    $sql = "SELECT * FROM delivery WHERE track_no='$textsearch' ";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0){
        start_table();
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>" .$row["order_ID"]. "</td>";
            echo "<td>" .$row["weight"]. "</td>";
            echo "<td align='center'>" .$row["d_status"]. "</td>";
            echo "<td>" .$row["track_no"]. "</td>";
            echo "<td>" .$row["due_date"]. "</td>";
            echo "<td>" .$row["got_date"]. "</td>";
            echo "<td align='center'>" .$row["employee_ID"]. "</td>";
            //echo "<form name="deldeliver" action="deldelivery.php" method="post">";
            //echo "<td><input name='delete' type='submit' value='Delete'></td>";
            //echo "</form>";
            echo "</tr>";
        }
    }else{
        echo "<h2>No results found.</h2>";
    }
}elseif($searchfrom == "3"){
    $sql = "SELECT * FROM delivery WHERE employee_ID='$textsearch' ";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0){
        start_table();
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>" .$row["order_ID"]. "</td>";
            echo "<td>" .$row["weight"]. "</td>";
            echo "<td align='center'>" .$row["d_status"]. "</td>";
            echo "<td>" .$row["track_no"]. "</td>";
            echo "<td>" .$row["due_date"]. "</td>";
            echo "<td>" .$row["got_date"]. "</td>";
            echo "<td align='center'>" .$row["employee_ID"]. "</td>";
            //echo "<form name="deldeliver" action="deldelivery.php" method="post">";
            //echo "<td><input name='delete' type='submit' value='Delete'></td>";
            //echo "</form>";
            echo "</tr>";
        }
    }else{
        echo "<h2>No results found.</h2>";
    }
}
?>
</table><br>
<form name="back" method="post" action="deliveryform.php">
<input name="reset" type="submit" id="Back" value="Back"/>