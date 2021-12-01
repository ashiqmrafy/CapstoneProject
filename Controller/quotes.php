<?php

function insertQuote($packkageid, $sedanid, $suvid, $convertibleid, $truckid, $price, $insurance, $userid){

    require('./model/automatrixdb.php');
    $q = "INSERT INTO quotes VALUES (null, $packkageid, $sedanid, $suvid, $convertibleid, $truckid, $price, '$insurance', $userid)";
    $mysqli->query($q);
}

function getLastQuotes(){

    require('./model/automatrixdb.php');
    $userid = $_SESSION['userid'];
    $q1 = 'SELECT CONCAT(quotes.sedanid,",",quotes.suvid,",",quotes.convertibleid,",",quotes.truckid) AS Vehicles FROM quotes WHERE quotes.userid = '.$userid.' ORDER BY quotes.quoteid DESC LIMIT 1';

    $r1 = $mysqli->query($q1);

    $row1 = $r1->fetch_assoc();

    $q = 'SELECT Vehicles.type, CONCAT(Vehicles.vehiclebrand, " ", Vehicles.vehiclemodel) AS vehicle_name, Vehicles.price, packages.packagename, packages.monthlyCost FROM Vehicles JOIN packages ON Vehicles.packageid = packages.packageid WHERE Vehicles.vehicleid IN ('.$row1['Vehicles'].')';
    
    $r = $mysqli->query($q);
    return $r;

}

function getQuotePrice(){
    require('./model/automatrixdb.php');
    $userid = $_SESSION['userid'];
    $q = 'SELECT quotes.qoutePrice, quotes.insurance, packages.monthlyCost, packages.monthlyInsurance FROM quotes JOIN packages ON quotes.packageid = packages.packageid WHERE quotes.userid = '.$userid.' ORDER BY quotes.quoteid DESC LIMIT 1';

    $r = $mysqli->query($q);

    return $r;

}

?>