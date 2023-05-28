<link rel="stylesheet" href="workerpgs.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

<div class="main-box">
<div class="box">
<div class="navbar">
    <a href="orderform.php"><img src="../main-asset/LOGO_STUDIO8.svg" class="logo_MAIN"></a>
</div>
<form class="h2text">
    <select class="h2text" name="Type">
        <option value="Order">Order</option>
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
                <td></td>
                <td>Order ID</td>
                <td>Customer ID</td>
                <td>Customer Name</td>
                <td>Responsible Employee ID</td>
                <td>Amount</td>
                <td>Points</td>
                <td>Total</td>
                <td>Transaction Status</td>
            </tr>";
}

$var_value = $_REQUEST['varname'];
$type_value = $_REQUEST['type'];

if($type_value == 1){
    $sql = "SELECT * FROM online_store.order WHERE order_id ='$var_value' ";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0){
        start_table();
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td></td>";
            echo "<td>" .$row["order_id"]. "</td>";
            echo "<td>" .$row["customer_id"]. "</td>";
            echo "<td>" .$row["customer_name"]. "</td>";
            echo "<td>" .$row["employee_id"]. "</td>";
            echo "<td>" .$row["amount"]. "</td>";
            echo "<td>" .$row["point_redeem"]. "</td>";
            echo "<td>" .$row["total"]. "</td>";
            echo "<td align='center'>" .$row["transaction_status"]. "</td>";
            echo "</tr>";
        }
    }
}
elseif($type_value == 2)
{  
	//$order_id = mysqli_escape_string($con, $_POST['order_id']);//
	$customer_id = mysqli_escape_string($con, $_POST['customer_id']);
	$customer_name = mysqli_escape_string($con, $_POST['customer_name']);
    $employee_id = mysqli_escape_string($con, $_POST['employee_id']);
	$amount = mysqli_escape_string($con, $_POST['amount']);
	$point_redeem = mysqli_escape_string($con, $_POST['point_redeem']);
    $total = mysqli_escape_string($con, $_POST['total']);
    $transaction_status = mysqli_escape_string($con, isset($_POST['transaction_status']));

    if(!empty($customer_id)){
        $query = "UPDATE online_store.order SET customer_id = '$customer_id' WHERE order_id='$var_value'";
        mysqli_query($con, $query);
    }if(!empty($customer_name)){
        $query = "UPDATE online_store.order SET customer_name= '$customer_name' WHERE order_id='$var_value'";
        mysqli_query($con, $query);
    }if(!empty($employee_id)){
        $query = "UPDATE online_store.order SET employee_id = '$employee_id' WHERE order_id='$var_value'";
        mysqli_query($con, $query);
    }if(!empty($amount)){
        $query = "UPDATE online_store.order SET amount= '$amount' WHERE order_id='$var_value'";
        mysqli_query($con, $query);
    }if(!empty($point_redeem)){
        $query = "UPDATE online_store.order SET point_redeem= '$point_redeem' WHERE order_id='$var_value'";
        mysqli_query($con, $query);
    }if(!empty($total)){
        $query = "UPDATE online_store.order SET total= '$total' WHERE order_id='$var_value'";
        mysqli_query($con, $query);
    }if(!empty($transaction_status)){
        $query = "UPDATE online_store.order SET transaction_status= '$transaction_status' WHERE order_id='$var_value'";
        mysqli_query($con, $query);
    }

    $sql = "SELECT * FROM online_store.order WHERE order_id='$var_value' ";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0)
    {
        start_table();
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>";
            echo "<td>" .$row["order_id"]. "</td>";
            echo "<td>" .$row["customer_id"]. "</td>";
            echo "<td>" .$row["customer_name"]. "</td>";
            echo "<td>" .$row["employee_id"]. "</td>";
            echo "<td>" .$row["amount"]. "</td>";
            echo "<td>" .$row["point_redeem"]. "</td>";
            echo "<td>" .$row["total"]. "</td>";
            echo "<td align='center'>" .$row["transaction_status"]. "</td>";
            echo "</tr>";
        }
    }
}


?>
        <tr>
            <form name="orderedit" action="orderedit.php" method="post">
                <td></td>
                <td></td>
                <td><input type="int" name="customer_id" size="5"></td>
                <td><input type="text" name="customer_name"></td>
                <td><input type="int" name="employee_id"></td>
                <td><input type="float" name="amount"></td>
                <td><input type="float" name="point_redeem"></td>
                <td><input type="float" name="total"></td>
                <td align='center'><input type="checkbox" name="transaction_status"></td>
            
        </tr>
    </table>

    <div class="commitbar" align="center">
    <div class="commitedit-btn">
            <?php
                echo "<input type='hidden' name='varname' value=".$var_value.">";
            ?>
            <input type='hidden' name='type' value='2'>
            <input name="edit" type="submit" value="Confirm Edit" style="background: rgb(0, 255, 0,0.8);color: #ffffff;">
        </form>
        <form name="delorder" action="orderform.php" method="post">
            <input name="delete" type="submit" value="Delete" style="margin-top: 20px;background: rgb(255, 0, 0);color: #ffffff;">
        </form>
        <form name="back" method="post" action="orderform.php">
            <input name="reset" type="submit" id="Back" value="Back" style="margin-top: 20px;">
        </form>
    </div>
</div>