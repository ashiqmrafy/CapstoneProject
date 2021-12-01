<?php

function getPackages(){

    require('./model/automatrixdb.php');
    $q = "SELECT * from packages";
    $r = $mysqli->query($q);
    return $r;
}

function getPrice($insurance){

    require('./model/automatrixdb.php');

    if(strtoupper($insurance) == 'Y'){
        $q = "SELECT monthlycost, monthlyinsurance from packages WHERE packageid = ".$_SESSION['packageid'];
        $r = $mysqli->query($q);
        $row = $r->fetch_assoc();
         return $row['monthlycost']+$row['monthlyinsurance'];
    }else{
        $q = "SELECT monthlycost from packages WHERE packageid = ".$_SESSION['packageid'];
        $r = $mysqli->query($q);
        $row = $r->fetch_assoc();
        return $row['monthlycost'];
    }

    
}

?>