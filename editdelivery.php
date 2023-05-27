<link rel="stylesheet" href="deliverypgs.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

<div class="main-box">
<div class="box">
<div class="navbar">
    <a href="deliveryform.php" target="_blank"><img src="LOGO_STUDIO8.svg" class="logo_MAIN"></a>
</div>
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
    echo "<h2 class='h2text'>The results:</h2>
        <table border='0' align='center'>
            <tr>
                <td></td>
                <td width='75'>Order ID</td>
                <td>Package Weight</td>
                <td>Delivery Status</td>
                <td>Tracking Number</td>
                <td>Delivery Date</td>
                <td>Receive Date</td>
                <td>Responisble Employee ID</td>
            </tr>";
}

$var_value = $_REQUEST['varname'];
$type_value = $_REQUEST['type'];

if($type_value == 1){
    $sql = "SELECT * FROM delivery WHERE order_ID='$var_value' ";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0){
        start_table();
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td></td>";
            echo "<td>" .$row["order_ID"]. "</td>";
            echo "<td>" .$row["weight"]. "</td>";
            echo "<td align='center'>" .$row["d_status"]. "</td>";
            echo "<td>" .$row["track_no"]. "</td>";
            echo "<td>" .$row["due_date"]. "</td>";
            echo "<td>" .$row["got_date"]. "</td>";
            echo "<td align='center'>" .$row["employee_ID"]. "</td>";
            echo "</tr>";
        }
    }
}elseif($type_value == 2){  
    //$order_id = mysqli_escape_string($con, $_POST['order_id']);
    $weight = mysqli_escape_string($con, $_POST['weight']);
    $d_status = mysqli_escape_string($con, isset($_POST['d_status']));
    $track_no = mysqli_escape_string($con, $_POST['track_no']);
    $due_date = mysqli_escape_string($con, $_POST['due_date']);
    $got_date = mysqli_escape_string($con, $_POST['got_date']);
    $employee_ID = mysqli_escape_string($con, $_POST['employee_ID']);

    if(!empty($weight)){
        $query = "UPDATE delivery SET weight = '$weight' WHERE order_ID='$var_value'";
        mysqli_query($con, $query);
    }if(!empty($track_no)){
        $query = "UPDATE delivery SET track_no = '$track_no' WHERE order_ID='$var_value'";
        mysqli_query($con, $query);
    }if(!empty($employee_ID)){
        $query = "UPDATE delivery SET employee_ID = '$employee_ID' WHERE order_ID='$var_value'";
        mysqli_query($con, $query);
    }

    $sql = "SELECT * FROM delivery WHERE order_ID='$var_value' ";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0){
        start_table();
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td style='font-family: sans-serif;'>After Edit</td>";
            echo "<td>" .$row["order_ID"]. "</td>";
            echo "<td>" .$row["weight"]. "</td>";
            echo "<td align='center'>" .$row["d_status"]. "</td>";
            echo "<td>" .$row["track_no"]. "</td>";
            echo "<td>" .$row["due_date"]. "</td>";
            echo "<td>" .$row["got_date"]. "</td>";
            echo "<td align='center'>" .$row["employee_ID"]. "</td>";
            echo "</tr>";
        }
    }
}


?>
        <tr>
            <form name="editdeliver" action="editdelivery.php" method="post">
                <td></td>
                <td><!--<input type="int" name="order_id" size="5">--></td>
                <td><input type="float" name="weight" size="12"></td>
                <td align='center'><input type="checkbox" name="d_status"></td>
                <td><input type="text" name="track_no"></td>
                <td><input type="date" name="due_date"></td>
                <td><input type="date" name="got_date"></td>
                <td><input type="number" name="employee_ID"></td>
            
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
        <form name="deldeliver" action="deliveryform.php" method="post">
            <input name="delete" type="submit" value="Delete" style="margin-top: 20px;background: rgb(255, 0, 0);color: #ffffff;">
        </form>
        <form name="back" method="post" action="deliveryform.php">
            <input name="reset" type="submit" id="Back" value="Back" style="margin-top: 20px;">
        </form>
    </div>
</div>