<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery</title>
    <link rel="stylesheet" href="logincss.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>
<body>
    <?php
    $con=mysqli_connect("localhost","root","","studio8");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $sql = "CREATE TABLE IF NOT EXISTS `delivery` (
                `order_ID` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
                `weight` double NOT NULL,
                `d_status` tinyint(1) NOT NULL,
                `track_no` text DEFAULT NULL,
                `due_date` date NOT NULL,
                `got_date` date NOT NULL,
                `employee_ID` int(11) NOT NULL
                );";
    mysqli_query($con,$sql)
    ?> 

    <h1>Studio8</h1>
    <select name="Type">
        <option value="Delivery">Delivery</option>
    </select>
    
    <form name="search" action="findinsearch.php" method="get">
        <table border='0' align='center'>
            <tr>
                <td><input name="textsearch" type="text" size="80"> In: 
                    <select name="from">
                        <option value="1">Order ID</option>
                        <option value="2">Tracking Number</option>
                        <option value="3">Responisble Employee ID</option>
                    </select>
                </td>
                <td><input name="searchsubmit" type="submit" value="Search"></td>
            </tr>
        </table>
    </form>
    
    <br>
    <table border="1" align='center'>
        <tr>
            <td width="75">Order ID</td>
            <td>Package Weight</td>
            <td>Delivery Status</td>
            <td>Tracking Number</td>
            <td>Delivery Date</td>
            <td>Receive Date</td>
            <td>Responisble Employee ID</td>
            <td>Commit</td>
        </tr>
        <tr>
            <form name="indeliver" action="indelivery.php" method="post">
            <td>new</td>
            <td><input type="float" name="weight"></td>
            <td align='center'><input type="checkbox" name="d_status"></td>
            <td><input type="text" name="track_no"></td>
            <td><input type="date" name="due_date"></td>
            <td><input type="date" name="got_date"></td>
            <td><input type="number" name="employee_ID"></td>
            <td><input name="add" type="submit" ></td>
            </form>
        </tr>
        <?php
            $r=1;
            $query = "SELECT * FROM delivery";
            $result = mysqli_query($con, $query);
            foreach( $result as $row ) {
                $r++;
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
        ?>
    </table>
</body>
</html>