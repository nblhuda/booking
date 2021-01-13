<?php  //open php tag			//0.5m
    $host="localhost";
    $username="root";
    $password="";
        
    // variable declaration  +  getting data from previous form
    $a = $_POST["book_num"];   			//0.5m
    $b = $_POST["cust_name"];   			//0.5m
    $c = $_POST["contact_num"];			//0.5m
    $d = $_POST["room_type"];			//0.5m
    $e = $_POST["duration"];				//0.5m

    //calculate charge
    if ( $d == "Presidential" )				//0.5m
        $f = ( $e * 775 );
    else if ( $d == "Executive" )			//0.5m
        $f = ( $e * 550 );
    else if ( $d == "Deluxe" )				//0.5m
        $f = ( $e * 320 );
    else									//0.5m
        $f = ( $e * 270 );

    $connect = mysqli_connect($host,$username,$password)or die("Could not connect");
    
    $db = mysqli_select_db( $connect,'Record')or die("Could not select database");

    //SQL Query

    //  mysql_query("INSERT INTO ‘reservation’ (booking_num,cus_name,contact_num,room,duration,charge) VALUES  
    //      ('$a','$b','$c','$d','$e','$f')");			//0.5m + 0.5m

    $query = "INSERT INTO reservation  (booking_num,cust_name,contact_num,room_type,duration,charge) 
    VALUES ('$a','$b','$c','$d','$e','$f')";
    
    $result = mysqli_query( $connect,$query) or die("Query failed");	// SQL statement for checking

?>

<html>
    <head>   <title> Holiday Villa Langkawi </title>  </head> <!--0.5m-->

    <body>
        <?php //display the data from the form ?>

        Booking Num : <?php echo $a; ?> <br />			<!--0.5m-->
        Customer Name : <?php echo $b; ?> <br />			<!--0.5m-->
        Contact Number : <?php echo $c; ?> <br />			<!--0.5m-->
        Room Type : <?php echo $d; ?> <br />				<!--0.5m-->
        Duration : <?php echo $e; ?> <br />					<!--0.5m-->
        Charge : RM <?php echo $f; ?>  <br /> <br />		<!--0.5m-->

        <table width="493" border="1"> 
            <tr>
                <td>Booking Number</td>
                <td>Customers Name</td>
                <td>Contact Number</td>
                <td>Room Type</td>
                <td>Duration</td>
                <td>Charge</td>
            </tr>
        <?php
        //to retrieve from database

        $query="Select * from reservation order by  cust_name Asc";
        $result = mysqli_query( $connect,$query) or die("Query failed");	// SQL statement for checking
        //data looping

        while($row = mysqli_fetch_array($result)){ ?>
        <tr>
            <td><?php echo $row['booking_num'];?></td>
            <td><?php echo $row['cust_name'];?></td>
            <td><?php echo $row['contact_num'];?></td>
            <td><?php echo $row['room_type'];?></td>
            <td><?php echo $row['duration'];?></td>
            <td><?php echo $row['charge'];?></td>
        </tr>
        <?php
            }	
        ?>
    </table>



    </body>
</html>