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

//check empty
if(empty($_POST['weight'])){
	echo "Please Input data Package Weight" ;
}elseif(empty($_POST['employee_ID'])){
	echo "Please Input Employee ID" ;
}

else{
    //esc//ape variables for security
    $order_id = mysqli_escape_string($con, $_POST['order_id']);
    $weight = mysqli_escape_string($con, $_POST['weight']);
    $d_status = mysqli_escape_string($con, isset($_POST['d_status']));
    $track_no = mysqli_escape_string($con, $_POST['track_no']);
    $due_date = mysqli_escape_string($con, $_POST['due_date']);
    $got_date = mysqli_escape_string($con, $_POST['got_date']);
    $employee_ID = mysqli_escape_string($con, $_POST['employee_ID']);
    
    $sql = "INSERT INTO delivery (order_id,weight,d_status,track_no,due_date,got_date,employee_ID)
    VALUES ('$order_id', '$weight', '$d_status', '$track_no', '$due_date', '$got_date', '$employee_ID')
    ";
    if (!mysqli_query($con,$sql)) {
        die('Error: ' . mysqli_error($con));
        }
        echo "Success" ;
        
}
mysqli_close($con)
?>

<form name="back" method="post" action="deliveryform.php">
<input name="reset" type="submit" id="Back" value="Back"/>