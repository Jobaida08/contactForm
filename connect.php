<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $message = $_POST['message'];

    //Database Connection
    $conn = new mysqli('localhost', 'root','','newdb');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }
    else{
        $stmt = $conn->prepare("insert into contact(name, email, number, message)
        value(?, ?, ?, ?)");
        $stmt->bind_param("ssis", $name, $email, $number, $message);
        $stmt->execute();
        echo "Message Sent!";
        $stmt->close();
        $conn->close();
    }
?>