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
    $weight = mysqli_escape_string($con, $_POST['weight']);
    $d_status = mysqli_escape_string($con, isset($_POST['d_status']));
    $track_no = mysqli_escape_string($con, $_POST['track_no']);
    $due_date = mysqli_escape_string($con, $_POST['due_date']);
    $got_date = mysqli_escape_string($con, $_POST['got_date']);
    $employee_ID = mysqli_escape_string($con, $_POST['employee_ID']);
    
    $sql = "INSERT INTO delivery (weight,d_status,track_no,due_date,got_date,employee_ID)
    VALUES ('$weight', '$d_status', '$track_no', '$due_date', '$got_date', '$employee_ID')
    ";
    if (!mysqli_query($con,$sql)) {
        die('Error: ' . mysqli_error($con));
        }
        echo "Success" ;
        
}
mysqli_close($con)
?>
<link rel="stylesheet" href="logincss.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<form name="back" method="post" action="deliveryform.php">
<input name="reset" type="submit" id="Back" value="Back"/>