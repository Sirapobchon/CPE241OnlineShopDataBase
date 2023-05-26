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

start_table();

?>

</tr>
</table>

<form name="back" method="post" action="deliveryform.php">
<input name="reset" type="submit" id="Back" value="Back"/>