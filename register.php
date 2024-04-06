<?php

$username = $_POST['username'];
$accnumber = $_POST['accnumber'];
$phnumber = $_POST['phnumber'];


if(!empty($username) || !empty($accnumber) || !empty($phnumber))
{

    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "identity";

    // Create connection 
    $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

    if(mysqli_connect_error()){
        die('connect Error('.mysqli_connect_errno().')'
        .mysqli_connect_error());
    }
    else{
        $SELECT = "SELECT phnumber From register
             Where phnumber = ? LIMIT 1";

        $INSERT = "INSERT INTO register (username, accnumber, phnumber)
             VALUES(?,?,?)"; 
        
        #prepare statement
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("i", $phnumber);
        $stmt->execute();
        $stmt->bind_result($phnumber);
        $stmt->store_result();
        $rnum = $stmt->num_rows;
        
        #checking username
        if($rnum==0){
            $stmt->close();
            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("ssi",$username, $accnumber, $phnumber);
            $stmt->execute();
            echo "New record inserted successfully";
        }
        else{
            echo "some already register using this Phone Number";
        }
        $stmt->close();
        $conn->close();
    }
}
else{
    echo"All field are required";
    die();
}

?>