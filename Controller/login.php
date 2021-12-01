<?php

session_start();

function verifyLogin($username1, $password1){

    require('model/automatrixdb.php');
    $q = "SELECT userid, firstname FROM users WHERE username = '".$username1."' AND password = '".$password1."'";
    $r = $mysqli->query($q);

    $row = $r->fetch_assoc();
    
    $_SESSION['userid'] = $row['userid'];
    $_SESSION['firstname'] = $row['firstname'];

}

function register($firstname, $lastname, $email, $phone, $address, $postalcode, $username1, $password1){

    require('model/automatrixdb.php');
    $q = "INSERT INTO users VALUES (null, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $mysqli->prepare($q);

    $stmt->bind_param("ssssssss", $firstname, $lastname, $email, $phone, $address, $postalcode, $username1, $password1);

    $stmt->execute();

    if($mysqli->affected_rows == 1){
        $_SESSION['userid'] = $row['userid'];
        $_SESSION['firstname'] = $row['firstname'];
    }
}

function checkIfUsername($username1){
    require('model/automatrixdb.php');
    $q = "SELECT * FROM users WHERE LOWER(username) = LOWER('$username1')";
    $r = $mysqli->query($q);
}

?>