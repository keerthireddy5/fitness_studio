<?php
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $mobileNumber = $_POST['mobileNumber'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $package = $_POST['selectedPlan'];

    $conn= new mysqli('localhost','root','','join');
    if($conn->connect_error){
        die('Connection Failed: '.$conn->connect_error);
    }
    else{
        $stmt= $conn->prepare("insert into join_details(firstName,lastName,email,mobileNumber,city,state,country,package) 
        values(?,?,?,?,?,?,?,?) ");
        $stmt->bind_param("sssissss",$firstName,$lastName,$email,$mobileNumber,$city,$state,$country,$package);
        $stmt->execute();
        $stmt->close();
        $conn->close();
      
        header("Location: index.html");
        exit();

    }
?>