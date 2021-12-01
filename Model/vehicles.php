<?php

function getVehiclesSedan($id){

    require('automatrixdb.php');
    $q = "SELECT * from Vehicles WHERE type = 'Sedan' AND packageid=".$id;
    $r = $mysqli->query($q);
    return $r;
}

function getVehiclesSUV($id){

    require('automatrixdb.php');
    $q = "SELECT * from Vehicles WHERE type = 'SUV' AND packageid=".$id;
    $r = $mysqli->query($q);
    return $r;
}

function getVehiclesConvertible($id){

    require('automatrixdb.php');
    $q = "SELECT * from Vehicles WHERE type = 'Convertible' AND packageid=".$id;
    $r = $mysqli->query($q);
    return $r;
}

function getVehiclesTruck($id){

    require('automatrixdb.php');
    $q = "SELECT * from Vehicles WHERE type = 'Truck' AND packageid=".$id;
    $r = $mysqli->query($q);
    return $r;
}

?>