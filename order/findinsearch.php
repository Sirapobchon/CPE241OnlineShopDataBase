<link rel="stylesheet" href="workerpgs.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

<div class="main-box">
<div class="box">
<div class="navbar">
    <a href="orderform.php"><img src="../main-asset/LOGO_STUDIO8.svg" class="logo_MAIN"></a>
</div>
<form class="h2text">
    <select class="h2text" name="Type">
        <option value="Delivery">Delivery</option>
    </select>
</form>

<?php
$con=mysqli_connect("localhost","root","","online_store");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

function start_table(){
    echo "<h2 class='h2text'>The results:</h2>
        <table border='0' align='center'>
            <tr>
                <td width='75'>Order ID</td>
                <td>Customer ID</td>
                <td>Customer Name</td>
                <td>Responsible Employee ID</td>
                <td>Amount</td>
                <td>Points</td>
                <td>Total</td>
                <td>Transaction Status</td>
            </tr>";
}

$textsearch = mysqli_escape_string($con, $_GET['textsearch']);
$searchfrom = mysqli_escape_string($con, $_GET['from']);
//check empty
if(empty($_GET['textsearch'])){
	echo "<h1 class='h1text'>To search for something, Please input item to search for.</h1>" ;
}elseif($searchfrom == "1"){
    $sql = "SELECT * FROM online_store.order WHERE order_id='$textsearch' ";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0){
        start_table();
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>" .$row["order_id"]. "</td>";
            echo "<td>" .$row["customer_id"]. "</td>";
            echo "<td>" .$row["customer_name"]. "</td>";
            echo "<td>" .$row["employee_id"]. "</td>";
            echo "<td>" .$row["amount"]. "</td>";
            echo "<td>" .$row["point_redeem"]. "</td>";
            echo "<td>" .$row["total"]. "</td>";
            echo "<td align='center'>" .$row["transaction_status"]. "</td>";
            //echo "<form name="deldeliver" action="deldelivery.php" method="post">";
            //echo "<td><input name='delete' type='submit' value='Delete'></td>";
            //echo "</form>";
            echo "</tr>";
        }
    }else{
        echo "<h2>No results found.</h2>";
    }
}elseif($searchfrom == "2"){
    $sql = "SELECT * FROM online_store.order WHERE customer_id='$textsearch' ";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0){
        start_table();
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>" .$row["order_id"]. "</td>";
            echo "<td>" .$row["customer_id"]. "</td>";
            echo "<td>" .$row["customer_name"]. "</td>";
            echo "<td>" .$row["employee_id"]. "</td>";
            echo "<td>" .$row["amount"]. "</td>";
            echo "<td>" .$row["point_redeem"]. "</td>";
            echo "<td>" .$row["total"]. "</td>";
            echo "<td align='center'>" .$row["transaction_status"]. "</td>";
            //echo "<form name="deldeliver" action="deldelivery.php" method="post">";
            //echo "<td><input name='delete' type='submit' value='Delete'></td>";
            //echo "</form>";
            echo "</tr>";
        }
    }else{
        echo "<h2>No results found.</h2>";
    }
}elseif($searchfrom == "3"){
    $sql = "SELECT * FROM online_store.order WHERE customer_name='$textsearch' ";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0){
        start_table();
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>" .$row["order_id"]. "</td>";
            echo "<td>" .$row["customer_id"]. "</td>";
            echo "<td>" .$row["customer_name"]. "</td>";
            echo "<td>" .$row["employee_id"]. "</td>";
            echo "<td>" .$row["amount"]. "</td>";
            echo "<td>" .$row["point_redeem"]. "</td>";
            echo "<td>" .$row["total"]. "</td>";
            echo "<td align='center'>" .$row["transaction_status"]. "</td>";
            //echo "<form name="deldeliver" action="deldelivery.php" method="post">";
            //echo "<td><input name='delete' type='submit' value='Delete'></td>";
            //echo "</form>";
            echo "</tr>";
        }
    }else{
        echo "<h2>No results found.</h2>";
    }
}elseif($searchfrom == "4"){
    $sql = "SELECT * FROM online_store.order WHERE * employee_id '%$textsearch%'";
    $result = mysqli_query($con, $sql);
    echo $result;
    if(mysqli_num_rows($result) > 0){
        start_table();
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>" .$row["order_id"]. "</td>";
            echo "<td>" .$row["customer_id"]. "</td>";
            echo "<td>" .$row["customer_name"]. "</td>";
            echo "<td>" .$row["employee_id"]. "</td>";
            echo "<td>" .$row["amount"]. "</td>";
            echo "<td>" .$row["point_redeem"]. "</td>";
            echo "<td>" .$row["total"]. "</td>";
            echo "<td align='center'>" .$row["transaction_status"]. "</td>";
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
<form name="back" method="post" action="orderform.php">
<input name="reset" type="submit" id="Back" value="Back"/>